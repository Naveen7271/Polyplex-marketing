// Polyplex DigiPrint Application JavaScript

document.addEventListener('DOMContentLoaded', () => {
    // --- Mobile Menu Toggle ---
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const hamburgerIcon = document.getElementById('hamburger-icon');
    const closeIcon = document.getElementById('close-icon');

    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', () => {
            const isExpanded = mobileMenuToggle.getAttribute('aria-expanded') === 'true';
            mobileMenuToggle.setAttribute('aria-expanded', !isExpanded);
            mobileMenu.classList.toggle('hidden');
            if (hamburgerIcon) hamburgerIcon.classList.toggle('hidden');
            if (closeIcon) closeIcon.classList.toggle('hidden');
        });
    }

    // --- Mobile Products Accordion ---
    const mobileProductsToggle = document.getElementById('mobile-products-toggle');
    const mobileProductsMenu = document.getElementById('mobile-products-menu');
    const mobileProductsChevron = document.getElementById('mobile-products-chevron');

    if (mobileProductsToggle && mobileProductsMenu) {
        mobileProductsToggle.addEventListener('click', () => {
            mobileProductsMenu.classList.toggle('hidden');
            if (mobileProductsChevron) {
                mobileProductsChevron.classList.toggle('rotate-180');
            }
        });
    }

    // --- Desktop Products Dropdown Click Support ---
    const productsMenuButton = document.getElementById('products-menu-button');
    const productsDropdown = document.getElementById('products-dropdown');

    if (productsMenuButton && productsDropdown) {
        productsMenuButton.addEventListener('click', (e) => {
            e.stopPropagation();
            const isOpen = productsDropdown.classList.contains('!opacity-100');
            if (isOpen) {
                closeDropdown();
            } else {
                openDropdown();
            }
        });

        const openDropdown = () => {
            productsDropdown.classList.add('!opacity-100', '!visible', '!pointer-events-auto');
            productsMenuButton.setAttribute('aria-expanded', 'true');
        };

        const closeDropdown = () => {
            productsDropdown.classList.remove('!opacity-100', '!visible', '!pointer-events-auto');
            productsMenuButton.setAttribute('aria-expanded', 'false');
        };

        // Close on click outside
        document.addEventListener('click', (e) => {
            if (!productsMenuButton.contains(e.target) && !productsDropdown.contains(e.target)) {
                closeDropdown();
            }
        });

        // Close on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeDropdown();
            }
        });
    }

    // --- Products Dropdown Category Accordions (Desktop & Mobile) ---
    const categoryAccordions = document.querySelectorAll('.product-category-accordion');

    categoryAccordions.forEach((item) => {
        const toggleBtn = item.querySelector('.product-category-toggle');
        const brandsContainer = item.querySelector('.product-category-brands');
        const chevron = item.querySelector('.product-category-chevron');

        if (toggleBtn && brandsContainer && chevron) {
            toggleBtn.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();

                const isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';

                if (isExpanded) {
                    toggleBtn.setAttribute('aria-expanded', 'false');
                    brandsContainer.classList.add('hidden');
                    chevron.classList.remove('rotate-180');
                } else {
                    toggleBtn.setAttribute('aria-expanded', 'true');
                    brandsContainer.classList.remove('hidden');
                    chevron.classList.add('rotate-180');
                }
            });
        }
    });

    // --- Search Modal Toggle ---
    const openSearchBtn = document.getElementById('open-search-btn');
    const closeSearchBtn = document.getElementById('close-search-btn');
    const searchModal = document.getElementById('search-modal');
    const searchInput = document.getElementById('search-input');

    const openSearch = () => {
        if (!searchModal) return;
        searchModal.classList.remove('hidden');
        searchModal.classList.add('flex');
        setTimeout(() => searchInput?.focus(), 100);
        document.body.style.overflow = 'hidden';
    };

    const closeSearch = () => {
        if (!searchModal) return;
        searchModal.classList.add('hidden');
        searchModal.classList.remove('flex');
        document.body.style.overflow = '';
    };

    if (openSearchBtn) {
        openSearchBtn.addEventListener('click', openSearch);
    }

    if (closeSearchBtn) {
        closeSearchBtn.addEventListener('click', closeSearch);
    }

    if (searchModal) {
        searchModal.addEventListener('click', (e) => {
            if (e.target === searchModal) {
                closeSearch();
            }
        });
    }

    // Shortcut: Ctrl+K or Cmd+K to open search, Escape to close
    document.addEventListener('keydown', (e) => {
        if ((e.metaKey || e.ctrlKey) && e.key.toLowerCase() === 'k') {
            e.preventDefault();
            if (searchModal?.classList.contains('hidden')) {
                openSearch();
            } else {
                closeSearch();
            }
        } else if (e.key === 'Escape' && !searchModal?.classList.contains('hidden')) {
            closeSearch();
        }
    });

    // --- Capabilities Sticky Stacking Cards ---
    // 1. Initial State: All cards & images are laid out naturally and 100% visible.
    // 2. Scrolling Down: Card 0 sticks at top (below navbar). Subsequent cards slide UP
    //    OVER previous images (like a deck of cards), covering them smoothly.
    // 3. Stacking: Headers stack sequentially beneath each other under the navbar.
    // 4. Reverse Scrolling: Cards slide back down, uncovering previous images naturally.
    // 5. Zero JS height manipulation during scroll - pure browser CSS sticky physics.
    const capabilitiesSection = document.getElementById('capabilities-scroll-section');
    const capabilityCards = document.querySelectorAll('.capability-card');

    if (capabilitiesSection && capabilityCards.length > 0) {
        const getNavbarHeight = () => {
            const navbar = document.querySelector('header');
            return navbar ? navbar.offsetHeight : 80;
        };

        // Calculate and set exact sticky top offsets for each card based on measured header heights
        const updateStickyOffsets = () => {
            const navbarHeight = getNavbarHeight();
            let accumulatedTop = navbarHeight;

            capabilityCards.forEach((card, idx) => {
                const header = card.querySelector('.capability-header');
                card.style.top = `${accumulatedTop}px`;
                card.style.zIndex = `${10 + idx}`;

                if (header) {
                    accumulatedTop += header.offsetHeight;
                }
            });
        };

        // Header click: Smoothly scrolls to the exact position where this card reaches its stacked position
        capabilityCards.forEach((card, idx) => {
            const header = card.querySelector('.capability-header');
            if (!header) return;

            header.addEventListener('click', () => {
                const navbarHeight = getNavbarHeight();
                const sectionRect = capabilitiesSection.getBoundingClientRect();
                const sectionAbsoluteTop = window.scrollY + sectionRect.top;
                const sectionStartScroll = sectionAbsoluteTop - navbarHeight;

                if (idx === 0) {
                    window.scrollTo({
                        top: Math.max(0, sectionStartScroll + 2),
                        behavior: 'smooth'
                    });
                    return;
                }

                // To stick card[idx], user must scroll past all previous cards' image heights
                let neededScroll = 0;
                for (let k = 0; k < idx; k++) {
                    const prevCard = capabilityCards[k];
                    const prevImages = prevCard.querySelector('.capability-images');
                    if (prevImages) {
                        neededScroll += prevImages.offsetHeight;
                    }
                }

                window.scrollTo({
                    top: Math.max(0, sectionStartScroll + neededScroll + 2),
                    behavior: 'smooth'
                });
            });
        });

        // Initialize sticky offsets
        updateStickyOffsets();

        // Recalculate on window resize or when fonts finish loading
        window.addEventListener('resize', updateStickyOffsets, { passive: true });
        window.addEventListener('load', updateStickyOffsets);

        if (document.fonts) {
            document.fonts.ready.then(updateStickyOffsets);
        }

        // ResizeObserver on the first header to catch dynamic font rendering or layout changes
        const firstHeader = capabilityCards[0]?.querySelector('.capability-header');
        if (firstHeader && window.ResizeObserver) {
            const ro = new ResizeObserver(() => {
                updateStickyOffsets();
            });
            ro.observe(firstHeader);
        }
    }

    // --- Innovation 3D Focused Carousel ---
    const carouselContainer = document.getElementById('innovation-carousel-container');
    const carouselTrack = document.getElementById('innovation-carousel-track');
    const carouselSlides = document.querySelectorAll('.innovation-slide-wrapper');
    const prevBtn = document.getElementById('innovation-prev-btn');
    const nextBtn = document.getElementById('innovation-next-btn');
    const dots = document.querySelectorAll('.innovation-dot');

    if (carouselContainer && carouselTrack && carouselSlides.length > 0) {
        let currentIndex = 0;
        const totalSlides = carouselSlides.length;

        const updateCarousel = (newIndex) => {
            currentIndex = Math.max(0, Math.min(totalSlides - 1, newIndex));

            const activeSlide = carouselSlides[currentIndex];
            const containerWidth = carouselContainer.offsetWidth;
            const slideLeft = activeSlide.offsetLeft;
            const slideWidth = activeSlide.offsetWidth;

            // Center the active slide in the middle of the container (on mobile align slide 0 to left padding so next slide peeks generously)
            let targetX = (containerWidth / 2) - (slideLeft + (slideWidth / 2));
            if (window.innerWidth < 768) {
                if (currentIndex === 0) {
                    targetX = 16 - slideLeft;
                } else if (currentIndex === totalSlides - 1) {
                    targetX = containerWidth - 16 - (slideLeft + slideWidth);
                }
            }
            carouselTrack.style.transform = `translateX(${targetX}px)`;

            // Update slide scaling and opacity
            carouselSlides.forEach((slide, idx) => {
                const card = slide.querySelector('.innovation-slide-card');
                if (!card) return;

                if (idx === currentIndex) {
                    card.classList.remove('scale-[0.92]', 'scale-[0.88]', 'opacity-75', 'sm:opacity-85', 'z-10', 'cursor-pointer');
                    card.classList.add('scale-100', 'opacity-100', 'z-20');
                } else {
                    card.classList.remove('scale-100', 'opacity-100', 'z-20');
                    card.classList.add('scale-[0.92]', 'opacity-75', 'sm:opacity-85', 'z-10', 'cursor-pointer');
                }
            });

            // Update dots
            dots.forEach((dot, idx) => {
                if (idx === currentIndex) {
                    dot.classList.remove('w-2', 'h-2', 'bg-slate-300', 'hover:bg-slate-400');
                    dot.classList.add('w-2.5', 'h-2.5', 'bg-slate-900');
                } else {
                    dot.classList.remove('w-2.5', 'h-2.5', 'bg-slate-900');
                    dot.classList.add('w-2', 'h-2', 'bg-slate-300', 'hover:bg-slate-400');
                }
            });

            // Update prev / next button states
            if (prevBtn) {
                prevBtn.disabled = currentIndex === 0;
            }
            if (nextBtn) {
                nextBtn.disabled = currentIndex === totalSlides - 1;
            }
        };

        // Navigation buttons
        if (prevBtn) {
            prevBtn.addEventListener('click', () => updateCarousel(currentIndex - 1));
        }
        if (nextBtn) {
            nextBtn.addEventListener('click', () => updateCarousel(currentIndex + 1));
        }

        // Dot navigation
        dots.forEach((dot) => {
            dot.addEventListener('click', () => {
                const idx = parseInt(dot.getAttribute('data-index'), 10);
                if (!isNaN(idx)) updateCarousel(idx);
            });
        });

        // Click peeked slide to focus it
        carouselSlides.forEach((slide, idx) => {
            slide.addEventListener('click', () => {
                if (idx !== currentIndex) {
                    updateCarousel(idx);
                }
            });
        });

        // Touch swipe support for mobile
        let touchStartX = 0;
        let touchEndX = 0;

        carouselContainer.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        carouselContainer.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            const diff = touchStartX - touchEndX;
            if (Math.abs(diff) > 50) {
                if (diff > 0 && currentIndex < totalSlides - 1) {
                    updateCarousel(currentIndex + 1); // Swipe left -> Next
                } else if (diff < 0 && currentIndex > 0) {
                    updateCarousel(currentIndex - 1); // Swipe right -> Prev
                }
            }
        }, { passive: true });

        // Keyboard arrows navigation
        window.addEventListener('keydown', (e) => {
            const rect = carouselContainer.getBoundingClientRect();
            const isInView = rect.top < window.innerHeight && rect.bottom > 0;
            if (isInView) {
                if (e.key === 'ArrowLeft' && currentIndex > 0) {
                    updateCarousel(currentIndex - 1);
                } else if (e.key === 'ArrowRight' && currentIndex < totalSlides - 1) {
                    updateCarousel(currentIndex + 1);
                }
            }
        });

        // Recalculate on window resize & initial mount
        window.addEventListener('resize', () => updateCarousel(currentIndex), { passive: true });
        window.addEventListener('load', () => updateCarousel(currentIndex));

        // Initial setup
        setTimeout(() => updateCarousel(0), 50);
    }

    // --- Product Gallery Carousel ---
    const galleryContainer = document.getElementById('product-gallery-carousel-container');
    const galleryTrack = document.getElementById('product-gallery-carousel-track');
    const gallerySlides = document.querySelectorAll('.product-gallery-slide-wrapper');
    const galleryPrevBtn = document.getElementById('product-gallery-prev-btn');
    const galleryNextBtn = document.getElementById('product-gallery-next-btn');
    const galleryDots = document.querySelectorAll('.product-gallery-dot');

    if (galleryContainer && galleryTrack && gallerySlides.length > 0) {
        let currentGalleryIndex = 0;
        const totalGallerySlides = gallerySlides.length;

        const updateGalleryCarousel = (newIndex) => {
            currentGalleryIndex = Math.max(0, Math.min(totalGallerySlides - 1, newIndex));

            const activeSlide = gallerySlides[currentGalleryIndex];
            const containerWidth = galleryContainer.offsetWidth;
            const slideLeft = activeSlide.offsetLeft;
            const slideWidth = activeSlide.offsetWidth;

            // Center the active slide in the middle of the container
            const targetX = (containerWidth / 2) - (slideLeft + (slideWidth / 2));
            galleryTrack.style.transform = `translateX(${targetX}px)`;

            // Update slide scaling and opacity
            gallerySlides.forEach((slide, idx) => {
                const card = slide.querySelector('.product-gallery-slide-card');
                if (!card) return;

                if (idx === currentGalleryIndex) {
                    card.classList.remove('scale-[0.92]', 'opacity-80', 'z-10', 'cursor-pointer');
                    card.classList.add('scale-100', 'opacity-100', 'z-20', 'shadow-2xl');
                } else {
                    card.classList.remove('scale-100', 'opacity-100', 'z-20', 'shadow-2xl');
                    card.classList.add('scale-[0.92]', 'opacity-80', 'z-10', 'cursor-pointer');
                }
            });

            // Update dots
            galleryDots.forEach((dot, idx) => {
                if (idx === currentGalleryIndex) {
                    dot.classList.remove('bg-slate-300', 'hover:bg-slate-400');
                    dot.classList.add('bg-slate-900');
                } else {
                    dot.classList.remove('bg-slate-900');
                    dot.classList.add('bg-slate-300', 'hover:bg-slate-400');
                }
            });

            // Update prev / next button states
            if (galleryPrevBtn) {
                galleryPrevBtn.disabled = currentGalleryIndex === 0;
            }
            if (galleryNextBtn) {
                galleryNextBtn.disabled = currentGalleryIndex === totalGallerySlides - 1;
            }
        };

        // Navigation buttons
        if (galleryPrevBtn) {
            galleryPrevBtn.addEventListener('click', () => updateGalleryCarousel(currentGalleryIndex - 1));
        }
        if (galleryNextBtn) {
            galleryNextBtn.addEventListener('click', () => updateGalleryCarousel(currentGalleryIndex + 1));
        }

        // Dot navigation
        galleryDots.forEach((dot) => {
            dot.addEventListener('click', () => {
                const idx = parseInt(dot.getAttribute('data-index'), 10);
                if (!isNaN(idx)) updateGalleryCarousel(idx);
            });
        });

        // Click peeked slide to focus it
        gallerySlides.forEach((slide, idx) => {
            slide.addEventListener('click', () => {
                if (idx !== currentGalleryIndex) {
                    updateGalleryCarousel(idx);
                }
            });
        });

        // Touch swipe support for mobile
        let touchStartX = 0;
        let touchEndX = 0;

        galleryContainer.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        galleryContainer.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            const diff = touchStartX - touchEndX;
            if (Math.abs(diff) > 50) {
                if (diff > 0 && currentGalleryIndex < totalGallerySlides - 1) {
                    updateGalleryCarousel(currentGalleryIndex + 1); // Swipe left -> Next
                } else if (diff < 0 && currentGalleryIndex > 0) {
                    updateGalleryCarousel(currentGalleryIndex - 1); // Swipe right -> Prev
                }
            }
        }, { passive: true });

        // Recalculate on window resize & initial mount
        window.addEventListener('resize', () => updateGalleryCarousel(currentGalleryIndex), { passive: true });
        window.addEventListener('load', () => updateGalleryCarousel(currentGalleryIndex));

        // Initial setup
        setTimeout(() => updateGalleryCarousel(0), 50);
    }

    // --- Applications Slider ---
    const appsContainer = document.getElementById('apps-slider-container');
    const appsTrack = document.getElementById('apps-slider-track');
    const appsSlides = document.querySelectorAll('.apps-slide-item');
    const appsPrevBtn = document.getElementById('apps-prev-btn');
    const appsNextBtn = document.getElementById('apps-next-btn');

    if (appsContainer && appsTrack && appsSlides.length > 0) {
        let currentAppIndex = 0;
        const totalApps = appsSlides.length;

        const getItemsPerView = () => {
            return window.innerWidth >= 1024 ? 2 : 1;
        };

        const updateAppsSlider = (newIndex) => {
            const itemsPerView = getItemsPerView();
            const maxIndex = Math.max(0, totalApps - itemsPerView);
            currentAppIndex = Math.max(0, Math.min(maxIndex, newIndex));

            const slideWidth = appsSlides[0].offsetWidth;
            const translateX = -(currentAppIndex * slideWidth);
            appsTrack.style.transform = `translateX(${translateX}px)`;

            if (appsPrevBtn) {
                appsPrevBtn.disabled = currentAppIndex === 0;
            }
            if (appsNextBtn) {
                appsNextBtn.disabled = currentAppIndex >= maxIndex;
            }
        };

        if (appsPrevBtn) {
            appsPrevBtn.addEventListener('click', () => updateAppsSlider(currentAppIndex - 1));
        }
        if (appsNextBtn) {
            appsNextBtn.addEventListener('click', () => updateAppsSlider(currentAppIndex + 1));
        }

        // Touch swipe support
        let touchStartX = 0;
        let touchEndX = 0;

        appsContainer.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        appsContainer.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            const diff = touchStartX - touchEndX;
            const itemsPerView = getItemsPerView();
            const maxIndex = Math.max(0, totalApps - itemsPerView);

            if (Math.abs(diff) > 40) {
                if (diff > 0 && currentAppIndex < maxIndex) {
                    updateAppsSlider(currentAppIndex + 1);
                } else if (diff < 0 && currentAppIndex > 0) {
                    updateAppsSlider(currentAppIndex - 1);
                }
            }
        }, { passive: true });

        window.addEventListener('resize', () => updateAppsSlider(currentAppIndex), { passive: true });
        window.addEventListener('load', () => updateAppsSlider(currentAppIndex));

        // Initial setup
        setTimeout(() => updateAppsSlider(0), 50);
    }

    // --- News Pagination ---
    const page1 = document.getElementById('news-grid-page-1');
    const page2 = document.getElementById('news-grid-page-2');
    const dot1 = document.getElementById('news-dot-1');
    const dot2 = document.getElementById('news-dot-2');
    const dot3 = document.getElementById('news-dot-3');
    const newsNextBtn = document.getElementById('news-next-btn');

    if (page1 && (dot1 || newsNextBtn)) {
        let currentPage = 1;
        const totalPages = page2 ? 2 : 1;

        const setNewsPage = (p) => {
            currentPage = p;
            if (page1 && page2) {
                if (p === 1) {
                    page1.classList.remove('hidden');
                    page2.classList.add('hidden');
                } else {
                    page1.classList.add('hidden');
                    page2.classList.remove('hidden');
                }
            }

            const dots = [dot1, dot2, dot3];
            dots.forEach((dot, idx) => {
                if (!dot) return;
                if (idx + 1 === currentPage) {
                    dot.className = 'w-2 h-2 rounded-full bg-[#0b2b4e] transition-all cursor-pointer focus:outline-hidden';
                } else {
                    dot.className = 'w-1.5 h-1.5 rounded-full bg-slate-300 hover:bg-slate-400 transition-all cursor-pointer focus:outline-hidden';
                }
            });
        };

        if (dot1) dot1.addEventListener('click', () => setNewsPage(1));
        if (dot2) dot2.addEventListener('click', () => setNewsPage(2));
        if (dot3) dot3.addEventListener('click', () => setNewsPage(1));

        if (newsNextBtn) {
            newsNextBtn.addEventListener('click', () => {
                const nextP = currentPage >= totalPages ? 1 : currentPage + 1;
                setNewsPage(nextP);
            });
        }
    }

    // --- About Us Hero Split Image Expand & Hover Handler ---
    const aboutHero = document.getElementById('about-hero-section');
    if (aboutHero) {
        const panelLeft = document.getElementById('about-hero-panel-left');
        const panelRight = document.getElementById('about-hero-panel-right');

        let currentActive = null;

        const setSide = (side) => {
            if (window.innerWidth < 768) {
                aboutHero.classList.remove('is-left-expanded', 'is-right-expanded');
                currentActive = null;
                return;
            }

            if (currentActive === side) return;
            currentActive = side;

            if (side === 'left') {
                aboutHero.classList.add('is-left-expanded');
                aboutHero.classList.remove('is-right-expanded');
            } else if (side === 'right') {
                aboutHero.classList.add('is-right-expanded');
                aboutHero.classList.remove('is-left-expanded');
            } else {
                aboutHero.classList.remove('is-left-expanded', 'is-right-expanded');
            }
        };

        // Smooth cursor tracking across section width (desktop only)
        aboutHero.addEventListener('mousemove', (e) => {
            if (window.innerWidth < 768) return;
            const rect = aboutHero.getBoundingClientRect();
            const mouseX = e.clientX - rect.left;
            const ratio = mouseX / rect.width;

            if (ratio < 0.5) {
                setSide('left');
            } else {
                setSide('right');
            }
        });

        // Mouse leaves section -> smoothly return to 50/50 split
        aboutHero.addEventListener('mouseleave', () => {
            if (window.innerWidth < 768) return;
            setSide(null);
        });

        // Tablet & Desktop click toggle support
        aboutHero.addEventListener('click', (e) => {
            if (window.innerWidth < 768) return;
            const rect = aboutHero.getBoundingClientRect();
            const mouseX = e.clientX - rect.left;
            const ratio = mouseX / rect.width;

            if (ratio < 0.5) {
                setSide(currentActive === 'left' ? null : 'left');
            } else {
                setSide(currentActive === 'right' ? null : 'right');
            }
        });

        // Keyboard accessibility
        if (panelLeft && panelRight) {
            panelLeft.addEventListener('focus', () => setSide('left'));
            panelRight.addEventListener('focus', () => setSide('right'));

            aboutHero.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    e.preventDefault();
                    setSide('left');
                } else if (e.key === 'ArrowRight') {
                    e.preventDefault();
                    setSide('right');
                } else if (e.key === 'Escape') {
                    setSide(null);
                }
            });
        }
    }

    // --- About Us Vision & Pillars Accordion (Expand One At A Time) ---
    const visionAccordionButtons = document.querySelectorAll('.about-pillar-toggle');
    visionAccordionButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            const isCurrentlyExpanded = btn.getAttribute('aria-expanded') === 'true';

            // Close all items first (ensuring only one is expanded at a time)
            visionAccordionButtons.forEach((otherBtn) => {
                otherBtn.setAttribute('aria-expanded', 'false');
                const otherContentId = otherBtn.getAttribute('aria-controls');
                const otherContent = otherContentId ? document.getElementById(otherContentId) : null;
                const otherChevron = otherBtn.querySelector('.pillar-chevron');

                if (otherContent) {
                    otherContent.classList.remove('grid-rows-[1fr]');
                    otherContent.classList.add('grid-rows-[0fr]');
                }
                if (otherChevron) {
                    otherChevron.classList.remove('rotate-180');
                }
            });

            // If the clicked item was closed, expand it now
            if (!isCurrentlyExpanded) {
                btn.setAttribute('aria-expanded', 'true');
                const contentId = btn.getAttribute('aria-controls');
                const content = contentId ? document.getElementById(contentId) : null;
                const chevron = btn.querySelector('.pillar-chevron');

                if (content) {
                    content.classList.remove('grid-rows-[0fr]');
                    content.classList.add('grid-rows-[1fr]');
                }
                if (chevron) {
                    chevron.classList.add('rotate-180');
                }
            }
        });
    });

    // --- About Us: What Sets Us Apart Carousel ---
    const approachCarousel = document.getElementById('approach-carousel');
    if (approachCarousel) {
        const imageTrack = document.getElementById('approach-image-track');
        const textWrapper = document.getElementById('approach-text-wrapper');
        const titleEl = document.getElementById('approach-title');
        const descriptionEl = document.getElementById('approach-description');
        const counterEl = document.getElementById('approach-counter');
        const prevBtn = document.getElementById('approach-prev-btn');
        const nextBtn = document.getElementById('approach-next-btn');
        const dataItems = approachCarousel.querySelectorAll('.approach-data-item');

        const slidesData = Array.from(dataItems).map((item) => ({
            title: item.getAttribute('data-title'),
            description: item.getAttribute('data-description'),
        }));

        const totalSlides = slidesData.length;
        let currentSlide = 0;
        let isTransitioning = false;

        const updateButtons = (idx) => {
            if (prevBtn) {
                if (idx === 0) {
                    prevBtn.classList.add('opacity-30', 'cursor-not-allowed');
                    prevBtn.setAttribute('disabled', 'disabled');
                } else {
                    prevBtn.classList.remove('opacity-30', 'cursor-not-allowed');
                    prevBtn.removeAttribute('disabled');
                }
            }
            if (nextBtn) {
                if (idx === totalSlides - 1) {
                    nextBtn.classList.add('opacity-30', 'cursor-not-allowed');
                    nextBtn.setAttribute('disabled', 'disabled');
                } else {
                    nextBtn.classList.remove('opacity-30', 'cursor-not-allowed');
                    nextBtn.removeAttribute('disabled');
                }
            }
        };

        const goToSlide = (newIndex) => {
            if (newIndex < 0 || newIndex >= totalSlides || newIndex === currentSlide || isTransitioning) {
                return;
            }

            isTransitioning = true;
            currentSlide = newIndex;

            // 1. Image track changes from right to left direction
            if (imageTrack) {
                imageTrack.style.transform = `translateX(-${currentSlide * 100}%)`;
            }

            // Update button states
            updateButtons(currentSlide);

            // 2. Right side text animates from bottom to top
            if (textWrapper && titleEl && descriptionEl) {
                // Outgoing: fade & drift upward
                textWrapper.style.transition = 'transform 180ms ease-in, opacity 180ms ease-in';
                textWrapper.style.transform = 'translateY(-20px)';
                textWrapper.style.opacity = '0';

                setTimeout(() => {
                    // Update content
                    titleEl.textContent = slidesData[currentSlide].title;
                    descriptionEl.textContent = slidesData[currentSlide].description;
                    if (counterEl) {
                        counterEl.textContent = `${currentSlide + 1}/${totalSlides}`;
                    }

                    // Prepare incoming from bottom
                    textWrapper.style.transition = 'none';
                    textWrapper.style.transform = 'translateY(28px)';
                    textWrapper.style.opacity = '0';

                    // Force DOM reflow
                    void textWrapper.offsetHeight;

                    // Animate up to natural position (bottom-to-top entrance)
                    textWrapper.style.transition = 'transform 360ms cubic-bezier(0.16, 1, 0.3, 1), opacity 360ms ease-out';
                    textWrapper.style.transform = 'translateY(0)';
                    textWrapper.style.opacity = '1';

                    setTimeout(() => {
                        isTransitioning = false;
                    }, 380);
                }, 190);
            } else {
                if (counterEl) {
                    counterEl.textContent = `${currentSlide + 1}/${totalSlides}`;
                }
                isTransitioning = false;
            }
        };

        if (prevBtn) {
            prevBtn.addEventListener('click', (e) => {
                e.preventDefault();
                goToSlide(currentSlide - 1);
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', (e) => {
                e.preventDefault();
                goToSlide(currentSlide + 1);
            });
        }

        // Keyboard arrow navigation
        approachCarousel.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                e.preventDefault();
                goToSlide(currentSlide - 1);
            } else if (e.key === 'ArrowRight') {
                e.preventDefault();
                goToSlide(currentSlide + 1);
            }
        });

        // Touch swipe support (swipe left -> next, swipe right -> prev)
        let touchStartX = 0;
        approachCarousel.addEventListener('touchstart', (e) => {
            touchStartX = e.touches[0].clientX;
        }, { passive: true });

        approachCarousel.addEventListener('touchend', (e) => {
            const diffX = touchStartX - e.changedTouches[0].clientX;
            if (Math.abs(diffX) > 40) {
                if (diffX > 0) {
                    goToSlide(currentSlide + 1);
                } else {
                    goToSlide(currentSlide - 1);
                }
            }
        }, { passive: true });

        // Initial button states
        updateButtons(0);
    }

    // --- About Us: Geographic Distribution World / India Toggle ---
    const geoWorldBtn = document.getElementById('geo-toggle-world');
    const geoIndiaBtn = document.getElementById('geo-toggle-india');
    const geoWorldView = document.getElementById('geo-view-world');
    const geoIndiaView = document.getElementById('geo-view-india');

    if (geoWorldBtn && geoIndiaBtn && geoWorldView && geoIndiaView) {
        const setGeoView = (view) => {
            if (view === 'world') {
                geoWorldBtn.classList.add('bg-[#0e4175]', 'text-white', 'shadow-xs');
                geoWorldBtn.classList.remove('bg-white', 'text-slate-800', 'border', 'border-slate-300');
                geoWorldBtn.setAttribute('aria-selected', 'true');

                geoIndiaBtn.classList.add('bg-white', 'text-slate-800', 'border', 'border-slate-300');
                geoIndiaBtn.classList.remove('bg-[#0e4175]', 'text-white', 'shadow-xs');
                geoIndiaBtn.setAttribute('aria-selected', 'false');

                geoWorldView.classList.remove('hidden');
                geoIndiaView.classList.add('hidden');
            } else {
                geoIndiaBtn.classList.add('bg-[#0e4175]', 'text-white', 'shadow-xs');
                geoIndiaBtn.classList.remove('bg-white', 'text-slate-800', 'border', 'border-slate-300');
                geoIndiaBtn.setAttribute('aria-selected', 'true');

                geoWorldBtn.classList.add('bg-white', 'text-slate-800', 'border', 'border-slate-300');
                geoWorldBtn.classList.remove('bg-[#0e4175]', 'text-white', 'shadow-xs');
                geoWorldBtn.setAttribute('aria-selected', 'false');

                geoIndiaView.classList.remove('hidden');
                geoWorldView.classList.add('hidden');
            }
        };

        geoWorldBtn.addEventListener('click', () => setGeoView('world'));
        geoIndiaBtn.addEventListener('click', () => setGeoView('india'));
    }

    // --- Blog & News Page: Category Filter Tabs & Article Modal ---
    const blogTabBlogs = document.getElementById('blog-tab-blogs');
    const blogTabNews = document.getElementById('blog-tab-news');
    const blogTabNewsletter = document.getElementById('blog-tab-newsletter');
    const blogPanelBlogs = document.getElementById('blog-panel-blogs');
    const blogPanelNews = document.getElementById('blog-panel-news');
    const blogExploreContainer = document.getElementById('blog-explore-container');
    const newsExploreContainer = document.getElementById('news-explore-container');

    const updateBlogTabs = (activeTab) => {
        const tabs = [
            { el: blogTabBlogs, id: 'blogs', panel: blogPanelBlogs },
            { el: blogTabNews, id: 'news', panel: blogPanelNews },
            { el: blogTabNewsletter, id: 'newsletter', panel: null },
        ];

        tabs.forEach(({ el, id, panel }) => {
            if (!el) return;
            const isActive = id === activeTab;
            el.setAttribute('aria-selected', isActive ? 'true' : 'false');

            if (isActive) {
                el.classList.add('bg-[#0E4174]', 'text-white', 'shadow-xs');
                el.classList.remove('bg-[#DFDFE7]', 'text-[#0E4174]', 'hover:bg-[#d0dbe6]');
            } else {
                el.classList.remove('bg-[#0E4174]', 'text-white', 'shadow-xs');
                el.classList.add('bg-[#DFDFE7]', 'text-[#0E4174]', 'hover:bg-[#d0dbe6]');
            }

            if (panel) {
                if (isActive) {
                    panel.classList.remove('hidden');
                } else {
                    panel.classList.add('hidden');
                }
            }
        });

        // Switch secondary section grids based on active category
        if (activeTab === 'blogs') {
            if (blogExploreContainer) blogExploreContainer.classList.remove('hidden');
            if (newsExploreContainer) newsExploreContainer.classList.add('hidden');
            if (window.history && window.history.replaceState) {
                window.history.replaceState(null, '', '?tab=blogs');
            }
        } else if (activeTab === 'news') {
            if (newsExploreContainer) newsExploreContainer.classList.remove('hidden');
            if (blogExploreContainer) blogExploreContainer.classList.add('hidden');
            if (window.history && window.history.replaceState) {
                window.history.replaceState(null, '', '?tab=news');
            }
        }
    };

    if (blogTabBlogs && blogTabNews && blogTabNewsletter) {
        blogTabBlogs.addEventListener('click', () => {
            updateBlogTabs('blogs');
        });

        blogTabNews.addEventListener('click', () => {
            updateBlogTabs('news');
        });

        blogTabNewsletter.addEventListener('click', () => {
            updateBlogTabs('newsletter');
            const footerNewsletter = document.querySelector('footer input[name="email"]');
            if (footerNewsletter) {
                footerNewsletter.scrollIntoView({ behavior: 'smooth', block: 'center' });
                setTimeout(() => {
                    footerNewsletter.focus();
                    footerNewsletter.classList.add('ring-2', 'ring-[#0E4174]');
                    setTimeout(() => footerNewsletter.classList.remove('ring-2', 'ring-[#0E4174]'), 2000);
                }, 600);
            }
        });

        // Check URL query parameters or hash on page load (e.g. ?tab=news or #news)
        const urlParams = new URLSearchParams(window.location.search);
        const tabParam = urlParams.get('tab') || (window.location.hash ? window.location.hash.replace('#', '') : null);
        if (tabParam === 'news' || tabParam === 'news-events') {
            updateBlogTabs('news');
        } else if (tabParam === 'newsletter') {
            updateBlogTabs('newsletter');
        }
    }

    // --- More to Explore Section Pagination ---
    const explorePage1 = document.getElementById('explore-grid-page-1');
    const explorePage2 = document.getElementById('explore-grid-page-2');
    const explorePage3 = document.getElementById('explore-grid-page-3');
    const exploreDot1 = document.getElementById('explore-dot-1');
    const exploreDot2 = document.getElementById('explore-dot-2');
    const exploreDot3 = document.getElementById('explore-dot-3');
    const exploreNextBtn = document.getElementById('explore-next-btn');

    if (explorePage1 && (exploreDot1 || exploreNextBtn)) {
        let currentExplorePage = 1;
        const totalExplorePages = explorePage3 ? 3 : (explorePage2 ? 2 : 1);

        const setExplorePage = (p) => {
            currentExplorePage = p;
            const pages = [explorePage1, explorePage2, explorePage3];
            pages.forEach((pg, idx) => {
                if (!pg) return;
                if (idx + 1 === currentExplorePage) {
                    pg.classList.remove('hidden');
                } else {
                    pg.classList.add('hidden');
                }
            });

            const dots = [exploreDot1, exploreDot2, exploreDot3];
            dots.forEach((dot, idx) => {
                if (!dot) return;
                if (idx + 1 === currentExplorePage) {
                    dot.className = 'w-2 h-2 rounded-full bg-[#0E4174] transition-all cursor-pointer focus:outline-hidden';
                    dot.setAttribute('aria-current', 'true');
                } else {
                    dot.className = 'w-1.5 h-1.5 rounded-full bg-slate-300 hover:bg-slate-400 transition-all cursor-pointer focus:outline-hidden';
                    dot.removeAttribute('aria-current');
                }
            });
        };

        if (exploreDot1) exploreDot1.addEventListener('click', () => setExplorePage(1));
        if (exploreDot2) exploreDot2.addEventListener('click', () => setExplorePage(2));
        if (exploreDot3) exploreDot3.addEventListener('click', () => setExplorePage(3));

        if (exploreNextBtn) {
            exploreNextBtn.addEventListener('click', () => {
                const nextP = currentExplorePage >= totalExplorePages ? 1 : currentExplorePage + 1;
                setExplorePage(nextP);
            });
        }
    }

    // --- Individual Blog Post: Like & Share Interactivity ---
    const blogLikeBtn = document.getElementById('blog-like-btn');
    const blogLikeCount = document.getElementById('blog-like-count');
    const blogShareBtn = document.getElementById('blog-share-btn');
    const blogToast = document.getElementById('blog-toast');

    if (blogLikeBtn && blogLikeCount) {
        let isLiked = false;
        const baseCount = parseInt(blogLikeBtn.getAttribute('data-likes') || '128', 10);

        blogLikeBtn.addEventListener('click', () => {
            isLiked = !isLiked;
            const newCount = isLiked ? baseCount + 1 : baseCount;
            blogLikeCount.textContent = newCount;

            const icon = blogLikeBtn.querySelector('svg');
            if (isLiked) {
                blogLikeBtn.classList.add('text-[#0E4174]', 'font-bold');
                if (icon) icon.setAttribute('fill', 'currentColor');
            } else {
                blogLikeBtn.classList.remove('text-[#0E4174]', 'font-bold');
                if (icon) icon.setAttribute('fill', 'none');
            }
        });
    }

    if (blogShareBtn) {
        blogShareBtn.addEventListener('click', async () => {
            if (navigator.share) {
                try {
                    await navigator.share({
                        title: document.title,
                        url: window.location.href,
                    });
                    return;
                } catch (err) {
                    // fall through to clipboard
                }
            }

            if (navigator.clipboard) {
                navigator.clipboard.writeText(window.location.href).then(() => {
                    if (blogToast) {
                        blogToast.classList.remove('hidden', 'translate-y-4');
                        setTimeout(() => {
                            blogToast.classList.add('translate-y-4');
                            setTimeout(() => blogToast.classList.add('hidden'), 300);
                        }, 2500);
                    }
                });
            }
        });
    }
});
