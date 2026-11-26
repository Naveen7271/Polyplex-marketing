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

    // --- Desktop Products Dropdown Click & Category Switching Support ---
    const productsMenuContainer = document.getElementById('products-menu-container');
    const productsMenuButton = document.getElementById('products-menu-button');
    const productsMenuChevron = document.getElementById('products-menu-chevron');
    const productsDropdown = document.getElementById('products-dropdown');

    if (productsMenuButton && productsDropdown) {
        const categoryTriggers = productsDropdown.querySelectorAll('.products-dropdown-category');
        const categoryPanels = productsDropdown.querySelectorAll('.products-dropdown-panel');
        const defaultCategoryId = productsDropdown.getAttribute('data-default-category')
            || categoryTriggers[0]?.getAttribute('data-category-trigger');

        const activateCategory = (categoryId) => {
            if (!categoryId) return;

            categoryTriggers.forEach((trigger) => {
                const isMatch = trigger.getAttribute('data-category-trigger') === categoryId;
                trigger.classList.toggle('bg-[#E5E5E5]', isMatch);
                trigger.classList.toggle('is-active', isMatch);
                trigger.classList.toggle('bg-white', !isMatch);
            });

            categoryPanels.forEach((panel) => {
                const isMatch = panel.getAttribute('data-category-panel') === categoryId;
                panel.classList.toggle('hidden', !isMatch);
            });
        };

        categoryTriggers.forEach((trigger) => {
            const categoryId = trigger.getAttribute('data-category-trigger');
            trigger.addEventListener('mouseenter', () => activateCategory(categoryId));
            trigger.addEventListener('focus', () => activateCategory(categoryId));
        });

        const openDropdown = () => {
            productsDropdown.classList.add('!opacity-100', '!visible', '!pointer-events-auto');
            productsMenuButton.setAttribute('aria-expanded', 'true');
            if (productsMenuChevron) {
                productsMenuChevron.classList.add('rotate-180');
            }
        };

        const closeDropdown = () => {
            productsDropdown.classList.remove('!opacity-100', '!visible', '!pointer-events-auto');
            productsMenuButton.setAttribute('aria-expanded', 'false');
            if (productsMenuChevron) {
                productsMenuChevron.classList.remove('rotate-180');
            }
            if (defaultCategoryId) {
                activateCategory(defaultCategoryId);
            }
        };

        productsMenuButton.addEventListener('click', (e) => {
            e.stopPropagation();
            const isOpen = productsDropdown.classList.contains('!opacity-100');
            if (isOpen) {
                closeDropdown();
            } else {
                openDropdown();
            }
        });

        if (productsMenuContainer) {
            productsMenuContainer.addEventListener('mouseleave', () => {
                if (!productsDropdown.classList.contains('!opacity-100') && defaultCategoryId) {
                    activateCategory(defaultCategoryId);
                }
            });
        }

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
    const searchTriggers = document.querySelectorAll('[data-open-search]');
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

    searchTriggers.forEach((trigger) => {
        if (trigger !== openSearchBtn) {
            trigger.addEventListener('click', openSearch);
        }
    });

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
    const newsPages = [
        document.getElementById('news-grid-page-1'),
        document.getElementById('news-grid-page-2'),
        document.getElementById('news-grid-page-3'),
    ].filter(Boolean);
    const newsDots = [
        document.getElementById('news-dot-1'),
        document.getElementById('news-dot-2'),
        document.getElementById('news-dot-3'),
    ];
    const newsPrevBtn = document.getElementById('news-prev-btn');
    const newsNextBtn = document.getElementById('news-next-btn');

    if (newsPages.length > 0 && (newsDots[0] || newsPrevBtn || newsNextBtn)) {
        let currentPage = 1;
        const totalPages = newsPages.length;

        const setNewsPage = (p) => {
            currentPage = p;
            newsPages.forEach((page, idx) => {
                page.classList.toggle('hidden', idx + 1 !== currentPage);
            });

            newsDots.forEach((dot, idx) => {
                if (!dot) return;
                if (idx + 1 === currentPage) {
                    dot.className = 'w-2 h-2 rounded-full bg-[#0b2b4e] transition-all cursor-pointer focus:outline-hidden';
                } else {
                    dot.className = 'w-1.5 h-1.5 rounded-full bg-slate-300 hover:bg-slate-400 transition-all cursor-pointer focus:outline-hidden';
                }
            });
        };

        newsDots.forEach((dot, idx) => {
            if (dot) {
                dot.addEventListener('click', () => setNewsPage(idx + 1));
            }
        });

        if (newsPrevBtn) {
            newsPrevBtn.addEventListener('click', () => {
                const prevP = currentPage <= 1 ? totalPages : currentPage - 1;
                setNewsPage(prevP);
            });
        }

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

// ========== Timeline / Journey Section ==========
(function () {
    const section = document.getElementById('timeline');
    if (!section) return;

    const dial = section.querySelector('.dial');
    const svg = section.querySelector('.dial__svg');
    const labelsEl = section.querySelector('.dial__labels');
    const slides = Array.from(section.querySelectorAll('.slide'));
    const counterNum = section.querySelector('.counter__num');
    const counterTotal = section.querySelector('.counter__total');

    // ---- Design geometry (measured from the 1440px Figma frame) ----
    const R_ARC = 693;      // radius of the thin arc line
    const TICK_OUTER = 655; // ticks run inward from here
    const STEP = 30;        // degrees between years
    const TICK_GAP = 1.3;   // degrees between ticks

    const SVG_NS = 'http://www.w3.org/2000/svg';
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
        for (const k in attrs) { node.setAttribute(k, attrs[k]); }
        return node;
    }

    // Seeded random so the "barcode" tick pattern is the same on every load
    let seed = 7;
    const rand = () => ((seed = (seed * 16807) % 2147483647) - 1) / 2147483646;

    const ticks = el('g', {});
    for (let a = 0; a < 360; a += TICK_GAP) {
        const r = rand();
        const len = r > 0.82 ? 60 + rand() * 18 : r > 0.4 ? 34 + rand() * 22 : 16 + rand() * 16;
        const rad = (a * Math.PI) / 180;
        const cos = Math.cos(rad), sin = Math.sin(rad);
        ticks.appendChild(el('line', {
            class: 'dial__tick',
            x1: (TICK_OUTER * cos).toFixed(2),
            y1: (TICK_OUTER * sin).toFixed(2),
            x2: ((TICK_OUTER - len) * cos).toFixed(2),
            y2: ((TICK_OUTER - len) * sin).toFixed(2),
        }));
    }
    svg.appendChild(ticks);
    svg.appendChild(el('circle', { class: 'dial__arc', cx: 0, cy: 0, r: R_ARC }));

    slides.forEach((slide) => {
        const dot = el('circle', { class: 'dial__dot', r: 4.5 });
        dots.push(dot);
        svg.appendChild(dot);

        const label = document.createElement('div');
        label.className = 'dial__label';
        label.innerHTML = '<span></span>';
        label.firstChild.textContent = slide.dataset.year;
        labelsEl.appendChild(label);
    });
    const labels = Array.from(labelsEl.children);

    function placeMarkers() {
        slides.forEach((_, i) => {
            const a = sign * i * STEP;
            const rad = (a * Math.PI) / 180;
            dots[i].setAttribute('cx', (R_ARC * Math.cos(rad)).toFixed(2));
            dots[i].setAttribute('cy', (R_ARC * Math.sin(rad)).toFixed(2));
            labels[i].style.setProperty('--a', a + 'deg');
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
            cy = 205 - R_ARC * k;
        } else {
            baseAngle = 0;
            sign = 1;
            k = Math.min(1.2, Math.max(0.78, h / 690));
            const arcX = w * (520 / 1440);
            cx = arcX - R_ARC * k;
            cy = h * 0.5;
        }

        section.style.setProperty('--k', k);
        section.style.setProperty('--cx', cx + 'px');
        section.style.setProperty('--cy', cy + 'px');
        section.style.setProperty('--label-tilt', -baseAngle + 'deg');
        placeMarkers();
        setRotation(false);
    }

    function setRotation(animate) {
        if (!animate) { dial.style.transition = 'none'; }
        section.style.setProperty('--rot', baseAngle - sign * index * STEP + 'deg');
        if (!animate) {
            dial.offsetHeight; // flush
            dial.style.transition = '';
        }
    }

    // ---- Slide change ----
    function dur() {
        return parseFloat(getComputedStyle(section).getPropertyValue('--dur')) || 900;
    }

    function goTo(next, dir) {
        if (busy || next === index) { return; }
        busy = true;

        const prev = index;
        index = (next + total) % total;
        const forward = dir ? dir > 0 : index > prev;
        const shift = forward ? 1 : -1;

        // dial
        setRotation(true);
        labels[prev].classList.remove('is-active');
        labels[index].classList.add('is-active');

        // text
        const out = slides[prev];
        const inn = slides[index];
        [out, inn, counterNum].forEach((n) => {
            n.style.setProperty('--enter-y', shift * 40 + 'px');
            n.style.setProperty('--leave-y', -shift * 40 + 'px');
        });
        counterNum.style.setProperty('--enter-y', shift * 100 + '%');
        counterNum.style.setProperty('--leave-y', -shift * 100 + '%');

        out.classList.remove('is-active');
        out.classList.add('is-leaving');

        inn.classList.add('is-entering', 'is-active');
        inn.offsetHeight; // start from the entering state
        requestAnimationFrame(() => inn.classList.remove('is-entering'));

        animateCounter(index + 1);

        setTimeout(() => {
            out.classList.remove('is-leaving');
            busy = false;
        }, dur() + 80);
    }

    function animateCounter(value) {
        counterNum.classList.remove('is-in', 'is-in-start');
        counterNum.classList.add('is-out');
        setTimeout(() => {
            counterNum.textContent = value;
            counterNum.classList.remove('is-out');
            counterNum.classList.add('is-in-start');
            counterNum.offsetHeight;
            counterNum.classList.replace('is-in-start', 'is-in');
        }, 300);
    }

    const nextSlide = () => goTo(index + 1, 1);
    const prevSlide = () => goTo(index - 1, -1);

    // ---- Interaction: click anywhere → next, loops after the last ----
    section.addEventListener('click', nextSlide);

    section.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowRight' || e.key === 'ArrowDown' || e.key === ' ' || e.key === 'Enter') {
            e.preventDefault(); nextSlide();
        } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
            e.preventDefault(); prevSlide();
        }
    });

    // swipe on touch devices
    let touchX = null, touchY = null, swiped = false;
    section.addEventListener('touchstart', (e) => {
        touchX = e.touches[0].clientX; touchY = e.touches[0].clientY; swiped = false;
    }, { passive: true });
    section.addEventListener('touchend', (e) => {
        if (touchX === null) { return; }
        const dx = e.changedTouches[0].clientX - touchX;
        const dy = e.changedTouches[0].clientY - touchY;
        if (Math.abs(dx) > 50 && Math.abs(dx) > Math.abs(dy)) {
            swiped = true;
            dx < 0 ? nextSlide() : prevSlide();
        }
        touchX = null;
    });
    // a swipe shouldn't also count as a click
    section.addEventListener('click', (e) => { if (swiped) { e.stopImmediatePropagation(); swiped = false; } }, true);

    // ---- Init ----
    slides[0].classList.add('is-active');
    labels[0].classList.add('is-active');
    layout();
    window.addEventListener('resize', layout);
})();
