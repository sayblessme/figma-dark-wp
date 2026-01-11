/**
 * Dark Theme - Silver Row
 * Main JavaScript
 */

(function() {
    'use strict';

    /**
     * DOM Ready handler
     */
    function ready(fn) {
        if (document.readyState !== 'loading') {
            fn();
        } else {
            document.addEventListener('DOMContentLoaded', fn);
        }
    }

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        const toggle = document.querySelector('.mobile-menu-toggle');
        const mobileNav = document.querySelector('.mobile-navigation');

        if (!toggle || !mobileNav) return;

        toggle.addEventListener('click', function() {
            const isExpanded = toggle.getAttribute('aria-expanded') === 'true';

            toggle.setAttribute('aria-expanded', !isExpanded);
            mobileNav.classList.toggle('active');
            mobileNav.classList.toggle('hidden');

            // Prevent body scroll when menu is open
            document.body.style.overflow = isExpanded ? '' : 'hidden';
        });

        // Close menu when clicking on a link
        mobileNav.querySelectorAll('a').forEach(function(link) {
            link.addEventListener('click', function() {
                toggle.setAttribute('aria-expanded', 'false');
                mobileNav.classList.remove('active');
                mobileNav.classList.add('hidden');
                document.body.style.overflow = '';
            });
        });

        // Close menu on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mobileNav.classList.contains('active')) {
                toggle.setAttribute('aria-expanded', 'false');
                mobileNav.classList.remove('active');
                mobileNav.classList.add('hidden');
                document.body.style.overflow = '';
            }
        });
    }

    /**
     * Smooth Scroll for anchor links
     */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');

                if (href === '#') return;

                const target = document.querySelector(href);
                if (!target) return;

                e.preventDefault();

                const headerOffset = 80; // Account for fixed header
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });

                // Update URL without jumping
                history.pushState(null, null, href);
            });
        });

        // Handle buttons with scroll action
        document.querySelectorAll('[data-action="scroll-to-contact"]').forEach(function(button) {
            button.addEventListener('click', function() {
                const target = document.querySelector('#contact');
                if (!target) return;

                const headerOffset = 80;
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            });
        });
    }

    /**
     * Header scroll behavior
     */
    function initHeaderScroll() {
        const header = document.querySelector('.site-header');
        if (!header) return;

        let lastScroll = 0;

        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;

            if (currentScroll <= 0) {
                header.classList.remove('scroll-up');
                return;
            }

            if (currentScroll > lastScroll && !header.classList.contains('scroll-down')) {
                // Scrolling down
                header.classList.remove('scroll-up');
                header.classList.add('scroll-down');
            } else if (currentScroll < lastScroll && header.classList.contains('scroll-down')) {
                // Scrolling up
                header.classList.remove('scroll-down');
                header.classList.add('scroll-up');
            }

            lastScroll = currentScroll;
        }, { passive: true });
    }

    /**
     * Contact Form Handler
     */
    function initContactForm() {
        const form = document.getElementById('contact-form');
        if (!form) return;

        const submitBtn = form.querySelector('.form-submit');
        const submitText = submitBtn.querySelector('.submit-text');
        const submitLoading = submitBtn.querySelector('.submit-loading');
        const submitIcon = submitBtn.querySelector('.submit-icon');
        const messageEl = form.querySelector('.form-message');

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form data
            const formData = new FormData(form);
            const name = formData.get('name');
            const email = formData.get('email');
            const message = formData.get('message');

            // Basic validation
            if (!name || !email || !message) {
                showMessage('Пожалуйста, заполните все поля.', 'error');
                return;
            }

            if (!isValidEmail(email)) {
                showMessage('Пожалуйста, введите корректный email.', 'error');
                return;
            }

            // Show loading state
            submitBtn.disabled = true;
            submitText.classList.add('hidden');
            submitIcon.classList.add('hidden');
            submitLoading.classList.remove('hidden');

            // Prepare data for AJAX
            const data = new URLSearchParams();
            data.append('action', 'dark_theme_contact');
            data.append('nonce', darkTheme.nonce);
            data.append('name', name);
            data.append('email', email);
            data.append('message', message);

            // Send AJAX request
            fetch(darkTheme.ajaxUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: data.toString()
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(result) {
                if (result.success) {
                    showMessage(result.data.message || 'Спасибо! Ваше сообщение отправлено.', 'success');
                    form.reset();
                } else {
                    showMessage(result.data.message || 'Произошла ошибка. Попробуйте снова.', 'error');
                }
            })
            .catch(function(error) {
                console.error('Form submission error:', error);
                showMessage('Произошла ошибка. Попробуйте снова.', 'error');
            })
            .finally(function() {
                // Reset button state
                submitBtn.disabled = false;
                submitText.classList.remove('hidden');
                submitIcon.classList.remove('hidden');
                submitLoading.classList.add('hidden');
            });
        });

        function showMessage(text, type) {
            messageEl.textContent = text;
            messageEl.className = 'form-message mb-6 p-4 rounded-lg ' + type;
            messageEl.classList.remove('hidden');

            // Auto-hide after 5 seconds
            setTimeout(function() {
                messageEl.classList.add('hidden');
            }, 5000);
        }

        function isValidEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
    }

    /**
     * Intersection Observer for animations
     */
    function initAnimations() {
        if (!('IntersectionObserver' in window)) return;

        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe elements with animation classes
        document.querySelectorAll('.service-card, .portfolio-card, .stat-card, .contact-info-card').forEach(function(el) {
            el.classList.add('animate-ready');
            observer.observe(el);
        });
    }

    /**
     * Active nav link based on scroll position
     */
    function initActiveNavHighlight() {
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-link, .mobile-menu a');

        if (!sections.length || !navLinks.length) return;

        function setActiveLink() {
            const scrollPos = window.scrollY + 100;

            sections.forEach(function(section) {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.offsetHeight;
                const sectionId = section.getAttribute('id');

                if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                    navLinks.forEach(function(link) {
                        link.classList.remove('active');
                        if (link.getAttribute('href') === '#' + sectionId) {
                            link.classList.add('active');
                        }
                    });
                }
            });
        }

        window.addEventListener('scroll', setActiveLink, { passive: true });
        setActiveLink();
    }

    /**
     * Initialize all functions
     */
    ready(function() {
        initMobileMenu();
        initSmoothScroll();
        initHeaderScroll();
        initContactForm();
        initAnimations();
        initActiveNavHighlight();
    });

})();
