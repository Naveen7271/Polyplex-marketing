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

            // Center the active slide in the middle of the container
            const targetX = (containerWidth / 2) - (slideLeft + (slideWidth / 2));
            carouselTrack.style.transform = `translateX(${targetX}px)`;

            // Update slide scaling and opacity
            carouselSlides.forEach((slide, idx) => {
                const card = slide.querySelector('.innovation-slide-card');
                if (!card) return;

                if (idx === currentIndex) {
                    card.classList.remove('scale-[0.88]', 'opacity-75', 'sm:opacity-85', 'z-10', 'cursor-pointer');
                    card.classList.add('scale-100', 'opacity-100', 'z-20');
                } else {
                    card.classList.remove('scale-100', 'opacity-100', 'z-20');
                    card.classList.add('scale-[0.88]', 'opacity-75', 'sm:opacity-85', 'z-10', 'cursor-pointer');
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
});
