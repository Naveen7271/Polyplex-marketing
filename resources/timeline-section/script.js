(function () {
  const section = document.getElementById("timeline");
  if (!section) return;

  const dial = section.querySelector(".dial");
  const svg = section.querySelector(".dial__svg");
  const labelsEl = section.querySelector(".dial__labels");
  const slides = Array.from(section.querySelectorAll(".slide"));
  const counterNum = section.querySelector(".counter__num");
  const counterTotal = section.querySelector(".counter__total");

  // ---- Design geometry (measured from the 1440px Figma frame) ----
  const R_ARC = 693;      // radius of the thin arc line
  const TICK_OUTER = 655; // ticks run inward from here
  const STEP = 30;        // degrees between years
  const TICK_GAP = 1.3;   // degrees between ticks

  const SVG_NS = "http://www.w3.org/2000/svg";
  const total = slides.length;
  let index = 0;
  let busy = false;
  let baseAngle = 0; // 0 = active year points right (desktop); 90 = points down (mobile)
  let sign = 1;      // 1 = next year comes from below (desktop); -1 = from the right (mobile)
  const dots = [];

  counterTotal.textContent = total;

  // ---- Build the dial ----
  function el(name, attrs) {
    const node = document.createElementNS(SVG_NS, name);
    for (const k in attrs) node.setAttribute(k, attrs[k]);
    return node;
  }

  // Seeded random so the "barcode" tick pattern is the same on every load
  let seed = 7;
  const rand = () => ((seed = (seed * 16807) % 2147483647) - 1) / 2147483646;

  const ticks = el("g", {});
  for (let a = 0; a < 360; a += TICK_GAP) {
    const r = rand();
    // mostly short/medium, with occasional long ticks
    const len = r > 0.82 ? 60 + rand() * 18 : r > 0.4 ? 34 + rand() * 22 : 16 + rand() * 16;
    const rad = (a * Math.PI) / 180;
    const cos = Math.cos(rad), sin = Math.sin(rad);
    ticks.appendChild(el("line", {
      class: "dial__tick",
      x1: (TICK_OUTER * cos).toFixed(2),
      y1: (TICK_OUTER * sin).toFixed(2),
      x2: ((TICK_OUTER - len) * cos).toFixed(2),
      y2: ((TICK_OUTER - len) * sin).toFixed(2),
    }));
  }
  svg.appendChild(ticks);
  svg.appendChild(el("circle", { class: "dial__arc", cx: 0, cy: 0, r: R_ARC }));

  slides.forEach((slide, i) => {
    const dot = el("circle", { class: "dial__dot", r: 4.5 });
    dots.push(dot);
    svg.appendChild(dot);

    const label = document.createElement("div");
    label.className = "dial__label";
    label.innerHTML = "<span></span>";
    label.firstChild.textContent = slide.dataset.year;
    labelsEl.appendChild(label);
  });
  const labels = Array.from(labelsEl.children);

  function placeMarkers() {
    slides.forEach((_, i) => {
      const a = sign * i * STEP;
      const rad = (a * Math.PI) / 180;
      dots[i].setAttribute("cx", (R_ARC * Math.cos(rad)).toFixed(2));
      dots[i].setAttribute("cy", (R_ARC * Math.sin(rad)).toFixed(2));
      labels[i].style.setProperty("--a", a + "deg");
    });
  }

  // ---- Layout: position & scale the dial for the current viewport ----
  function layout() {
    const w = section.clientWidth;
    const h = section.clientHeight;
    const mobile = w < 768;
    let k, cx, cy;

    if (mobile) {
      baseAngle = 90;
      sign = -1;
      k = 0.5;
      cx = w / 2;
      cy = 205 - R_ARC * k; // arc crosses the centre line at y = 205px
    } else {
      baseAngle = 0;
      sign = 1;
      k = Math.min(1.2, Math.max(0.78, h / 690));
      const arcX = w * (520 / 1440);
      cx = arcX - R_ARC * k;
      cy = h * 0.5;
    }

    section.style.setProperty("--k", k);
    section.style.setProperty("--cx", cx + "px");
    section.style.setProperty("--cy", cy + "px");
    section.style.setProperty("--label-tilt", -baseAngle + "deg");
    placeMarkers();
    setRotation(false);
  }

  function setRotation(animate) {
    if (!animate) dial.style.transition = "none";
    section.style.setProperty("--rot", baseAngle - sign * index * STEP + "deg");
    if (!animate) {
      dial.offsetHeight; // flush
      dial.style.transition = "";
    }
  }

  // ---- Slide change ----
  function dur() {
    return parseFloat(getComputedStyle(section).getPropertyValue("--dur")) || 900;
  }

  function goTo(next, dir) {
    if (busy || next === index) return;
    busy = true;

    const prev = index;
    index = (next + total) % total;
    const forward = dir ? dir > 0 : index > prev;
    const shift = forward ? 1 : -1;

    // dial
    setRotation(true);
    labels[prev].classList.remove("is-active");
    labels[index].classList.add("is-active");

    // text
    const out = slides[prev];
    const inn = slides[index];
    [out, inn, counterNum].forEach((n) => {
      n.style.setProperty("--enter-y", shift * 40 + "px");
      n.style.setProperty("--leave-y", -shift * 40 + "px");
    });
    counterNum.style.setProperty("--enter-y", shift * 100 + "%");
    counterNum.style.setProperty("--leave-y", -shift * 100 + "%");

    out.classList.remove("is-active");
    out.classList.add("is-leaving");

    inn.classList.add("is-entering", "is-active");
    inn.offsetHeight; // start from the entering state
    requestAnimationFrame(() => inn.classList.remove("is-entering"));

    animateCounter(index + 1);

    setTimeout(() => {
      out.classList.remove("is-leaving");
      busy = false;
    }, dur() + 80);
  }

  function animateCounter(value) {
    counterNum.classList.remove("is-in", "is-in-start");
    counterNum.classList.add("is-out");
    setTimeout(() => {
      counterNum.textContent = value;
      counterNum.classList.remove("is-out");
      counterNum.classList.add("is-in-start");
      counterNum.offsetHeight;
      counterNum.classList.replace("is-in-start", "is-in");
    }, 300);
  }

  const next = () => goTo(index + 1, 1);
  const prevSlide = () => goTo(index - 1, -1);

  // ---- Interaction (prototype: click anywhere → next, loops after the last) ----
  section.addEventListener("click", next);

  section.addEventListener("keydown", (e) => {
    if (e.key === "ArrowRight" || e.key === "ArrowDown" || e.key === " " || e.key === "Enter") {
      e.preventDefault(); next();
    } else if (e.key === "ArrowLeft" || e.key === "ArrowUp") {
      e.preventDefault(); prevSlide();
    }
  });

  // swipe on touch devices
  let touchX = null, touchY = null, swiped = false;
  section.addEventListener("touchstart", (e) => {
    touchX = e.touches[0].clientX; touchY = e.touches[0].clientY; swiped = false;
  }, { passive: true });
  section.addEventListener("touchend", (e) => {
    if (touchX === null) return;
    const dx = e.changedTouches[0].clientX - touchX;
    const dy = e.changedTouches[0].clientY - touchY;
    if (Math.abs(dx) > 50 && Math.abs(dx) > Math.abs(dy)) {
      swiped = true;
      dx < 0 ? next() : prevSlide();
    }
    touchX = null;
  });
  // a swipe shouldn't also count as a click
  section.addEventListener("click", (e) => { if (swiped) { e.stopImmediatePropagation(); swiped = false; } }, true);

  // ---- Init ----
  slides[0].classList.add("is-active");
  labels[0].classList.add("is-active");
  layout();
  window.addEventListener("resize", layout);
})();
