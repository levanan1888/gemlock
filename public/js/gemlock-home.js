// GemLock Home page scripts

(function () {
    'use strict';

    const config = window.gemlockHomeConfig || {};
    const cartAddUrl = config.cartAddUrl || '/cart/add';
    const csrfToken =
        config.csrfToken ||
        (document.querySelector('meta[name="csrf-token"]')
            ? document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            : '');

    document.addEventListener('DOMContentLoaded', function () {
        (function () {
            var slider = document.getElementById('hero-slider');
            if (!slider) return;
            var slidesContainer = slider.querySelector('.hero-slides');
            var slides = slider.querySelectorAll('.hero-slide');
            var dots = slider.querySelectorAll('.hero-dot');
            var btnPrev = slider.querySelector('.hero-slider-prev');
            var btnNext = slider.querySelector('.hero-slider-next');
            var total = slides.length;
            var current = 0;
            var autoplayTimer;
            var isDragging = false;
            var startX = 0;
            var dragThreshold = 50; 

            function goTo(i) {
                current = (i + total) % total;
                slides.forEach(function (s, idx) {
                    s.classList.toggle('active', idx === current);
                });
                dots.forEach(function (d, idx) {
                    d.classList.toggle('active', idx === current);
                });
            }

            function next() {
                goTo(current + 1);
            }

            function prev() {
                goTo(current - 1);
            }

            function startAutoplay() {
                clearInterval(autoplayTimer);
                autoplayTimer = setInterval(next, 5000);
            }

            // Click dots
            dots.forEach(function (dot, i) {
                dot.addEventListener('click', function () {
                    goTo(i);
                    startAutoplay();
                });
            });

            // Click buttons
            if (btnPrev) {
                btnPrev.addEventListener('click', function () {
                    prev();
                    startAutoplay();
                });
            }
            if (btnNext) {
                btnNext.addEventListener('click', function () {
                    next();
                    startAutoplay();
                });
            }

            // Drag/Swipe support
            slidesContainer.style.cursor = 'grab';

            slidesContainer.addEventListener('mousedown', function (e) {
                isDragging = true;
                startX = e.pageX;
                slidesContainer.style.cursor = 'grabbing';
                clearInterval(autoplayTimer);
            });

            slidesContainer.addEventListener('mousemove', function (e) {
                if (!isDragging) return;
                e.preventDefault();
            });

            slidesContainer.addEventListener('mouseup', function (e) {
                if (!isDragging) return;
                isDragging = false;
                slidesContainer.style.cursor = 'grab';
                var deltaX = e.pageX - startX;
                if (deltaX < -dragThreshold) {
                    next();
                } else if (deltaX > dragThreshold) {
                    prev();
                }
                startAutoplay();
            });

            slidesContainer.addEventListener('mouseleave', function () {
                if (isDragging) {
                    isDragging = false;
                    slidesContainer.style.cursor = 'grab';
                    startAutoplay();
                }
            });

            // Touch support
            slidesContainer.addEventListener('touchstart', function (e) {
                isDragging = true;
                startX = e.touches[0].pageX;
                clearInterval(autoplayTimer);
            });

            slidesContainer.addEventListener('touchmove', function () {
                if (!isDragging) return;
            });

            slidesContainer.addEventListener('touchend', function (e) {
                if (!isDragging) return;
                isDragging = false;
                var deltaX = e.changedTouches[0].pageX - startX;
                if (deltaX < -dragThreshold) {
                    next();
                } else if (deltaX > dragThreshold) {
                    prev();
                }
                startAutoplay();
            });

            startAutoplay();
        })();

        // Intersection Observer for scroll animations
        var observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.15
        };

        var observer = new IntersectionObserver(function (entries, obs) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');

                    // Trigger counter animation if it's the stats section
                    if (entry.target.classList.contains('stats-wrapper')) {
                        animateNumbers();
                    }

                    obs.unobserve(entry.target); // Only animate once
                }
            });
        }, observerOptions);

        // Observe elements
        document.querySelectorAll('.team-card').forEach(function (el) {
            el.classList.add('fade-in-up');
            observer.observe(el);
        });

        document.querySelectorAll('.heading-h2').forEach(function (el) {
            el.classList.add('fade-in-up');
            observer.observe(el);
        });

        var statsWrapper = document.querySelector('.stats-wrapper');
        if (statsWrapper) {
            statsWrapper.classList.add('zoom-in');
            observer.observe(statsWrapper);
        }

        // Number Counter Animation
        function animateNumbers() {
            var statsNumbers = document.querySelectorAll('.large-stats-number');
            statsNumbers.forEach(function (counter) {
                var targetText = counter.innerText;
                var target = parseInt(targetText.replace(/\D/g, ''), 10);
                if (isNaN(target)) {
                    return;
                }
                var suffix = targetText.replace(/[0-9]/g, '');

                var count = 0;
                var duration = 2000; // 2 seconds
                var increment = target / (duration / 16); // ~60fps

                var updateCount = function () {
                    count += increment;
                    if (count < target) {
                        counter.innerText = Math.ceil(count) + suffix;
                        window.requestAnimationFrame(updateCount);
                    } else {
                        counter.innerText = target + suffix;
                    }
                };
                updateCount();
            });
        }

        // Category Product Sliders with Drag to Scroll
        document.querySelectorAll('.category-slider-container').forEach(function (container) {
            var category = container.dataset.category;
            var track = container.querySelector('.category-slider-track');
            var prevBtn = document.querySelector('.category-slider-prev[data-category="' + category + '"]');
            var nextBtn = document.querySelector('.category-slider-next[data-category="' + category + '"]');

            if (!track) return;

            var productSlides = track.querySelectorAll('.product-slide');
            var slideWidth = 280;
            var currentScroll = 0;
            var isDragging = false;
            var startX = 0;
            var scrollLeft = 0;

            function getMaxScroll() {
                var visibleSlides = Math.floor(container.offsetWidth / slideWidth);
                return Math.max((productSlides.length - visibleSlides) * slideWidth, 0);
            }

            function updateSlider() {
                track.style.transform = 'translateX(-' + currentScroll + 'px)';
            }

            // Button navigation
            if (nextBtn) {
                nextBtn.addEventListener('click', function () {
                    var maxScroll = getMaxScroll();
                    if (currentScroll >= maxScroll) {
                        currentScroll = 0;
                    } else {
                        currentScroll = Math.min(currentScroll + slideWidth, maxScroll);
                    }
                    updateSlider();
                });
            }

            if (prevBtn) {
                prevBtn.addEventListener('click', function () {
                    var maxScroll = getMaxScroll();
                    if (currentScroll <= 0) {
                        currentScroll = maxScroll;
                    } else {
                        currentScroll = Math.max(currentScroll - slideWidth, 0);
                    }
                    updateSlider();
                });
            }

            // Drag to scroll
            container.addEventListener('mousedown', function (e) {
                isDragging = true;
                startX = e.pageX - container.offsetLeft;
                scrollLeft = currentScroll;
                track.style.transition = 'none';
            });

            container.addEventListener('mouseleave', function () {
                isDragging = false;
                track.style.transition = 'transform 0.4s ease';
            });

            container.addEventListener('mouseup', function () {
                isDragging = false;
                track.style.transition = 'transform 0.4s ease';
            });

            container.addEventListener('mousemove', function (e) {
                if (!isDragging) return;
                e.preventDefault();
                var x = e.pageX - container.offsetLeft;
                var walk = (startX - x) * 1.5;
                currentScroll = Math.max(0, Math.min(scrollLeft + walk, getMaxScroll()));
                updateSlider();
            });

            // Touch support
            container.addEventListener('touchstart', function (e) {
                isDragging = true;
                startX = e.touches[0].pageX - container.offsetLeft;
                scrollLeft = currentScroll;
                track.style.transition = 'none';
            });

            container.addEventListener('touchend', function () {
                isDragging = false;
                track.style.transition = 'transform 0.4s ease';
            });

            container.addEventListener('touchmove', function (e) {
                if (!isDragging) return;
                var x = e.touches[0].pageX - container.offsetLeft;
                var walk = (startX - x) * 1.5;
                currentScroll = Math.max(0, Math.min(scrollLeft + walk, getMaxScroll()));
                updateSlider();
            });
        });
    });

    // Cart helpers (called from HTML)
    window.addToCart = function (element) {
        var name = element.getAttribute('data-name');
        var price = element.getAttribute('data-price');
        var image = element.getAttribute('data-image');

        window.fetch(cartAddUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                name: name,
                price: price,
                image: image
            })
        })
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                window.flyToCart(element);

                var cartCount = document.querySelector('.cart-quantity');
                if (cartCount) {
                    setTimeout(function () {
                        var countValue = data.cart_count || 0;
                        cartCount.textContent = countValue;
                        cartCount.classList.toggle('is-empty', countValue < 1);
                    }, 1000);
                }
            })
            .catch(function (error) {
                console.error('Error:', error);
            });
    };

    window.flyToCart = function (element) {
        var productItem = element.closest('.product-item');
        var productImage = productItem ? productItem.querySelector('.product-thumbnail') : null;
        var cartIcon = document.querySelector('.header-cart') || document.querySelector('.w-commerce-commercecartopenlink');

        if (!cartIcon || !productImage) return;

        var flyingImg = productImage.cloneNode(true);
        flyingImg.classList.add('flying-image');

        var imgRect = productImage.getBoundingClientRect();
        var cartRect = cartIcon.getBoundingClientRect();

        flyingImg.style.position = 'fixed';
        flyingImg.style.left = imgRect.left + 'px';
        flyingImg.style.top = imgRect.top + 'px';
        flyingImg.style.width = imgRect.width + 'px';
        flyingImg.style.height = imgRect.height + 'px';

        var imgCenterX = imgRect.left + imgRect.width / 2;
        var imgCenterY = imgRect.top + imgRect.height / 2;
        var cartCenterX = cartRect.left + cartRect.width / 2;
        var cartCenterY = cartRect.top + cartRect.height / 2;

        var deltaX = cartCenterX - imgCenterX;
        var deltaY = cartCenterY - imgCenterY;

        flyingImg.style.setProperty('--tx', deltaX + 'px');
        flyingImg.style.setProperty('--ty', deltaY + 'px');

        document.body.appendChild(flyingImg);

        setTimeout(function () {
            flyingImg.remove();
        }, 1200);
    };

    // Consultation Popup - Show on first visit, with 2 hour hide option
    (function () {
        var POPUP_KEY = 'gemlock_consultation_hidden';
        var TWO_HOURS = 2 * 60 * 60 * 1000; // 2 hours in milliseconds

        function shouldShowPopup() {
            var hiddenUntil = window.localStorage.getItem(POPUP_KEY);
            if (!hiddenUntil) return true;
            return Date.now() > parseInt(hiddenUntil, 10);
        }

        function hidePopupFor2Hours() {
            window.localStorage.setItem(POPUP_KEY, String(Date.now() + TWO_HOURS));
        }

        function createPopup() {
            var popupHtml =
                '<div id="consultationPopup" class="consultation-popup">' +
                '<div class="consultation-popup-overlay" onclick="closeConsultationPopup()"></div>' +
                '<div class="consultation-popup-content">' +
                '<button class="consultation-popup-close" onclick="closeConsultationPopup()">' +
                '<i class="material-icons">close</i>' +
                '</button>' +
                '<div class="consultation-popup-header">' +
                '<div class="consultation-icon">' +
                '<span class="material-icons">support_agent</span>' +
                '</div>' +
                '<h3>Nhận Thông Tin Tư Vấn</h3>' +
                '<p>Để lại thông tin để được tư vấn miễn phí về sản phẩm khóa thông minh & điện mặt trời</p>' +
                '</div>' +
                '<form class="consultation-form" onsubmit="submitConsultation(event)">' +
                '<div class="form-group">' +
                '<input type="text" placeholder="Họ và tên *" required>' +
                '</div>' +
                '<div class="form-group">' +
                '<input type="tel" placeholder="Số điện thoại *" required>' +
                '</div>' +
                '<div class="form-group">' +
                '<select required>' +
                '<option value="">Chọn sản phẩm quan tâm *</option>' +
                '<option value="khoa">Khóa thông minh</option>' +
                '<option value="solar">Điện mặt trời</option>' +
                '<option value="noithat">Nội thất</option>' +
                '<option value="xaydung">Xây dựng</option>' +
                '</select>' +
                '</div>' +
                '<button type="submit" class="btn-consultation-submit">' +
                '<span class="material-icons">send</span>' +
                'Gửi yêu cầu tư vấn' +
                '</button>' +
                '</form>' +
                '<div class="consultation-footer">' +
                '<label class="dont-show-checkbox">' +
                '<input type="checkbox" id="dontShowAgain" onchange="handleDontShowAgain()">' +
                '<span>Không hiển thị trong 2 giờ tới</span>' +
                '</label>' +
                '</div>' +
                '</div>' +
                '</div>';

            document.body.insertAdjacentHTML('beforeend', popupHtml);

            // Show popup with delay
            setTimeout(function () {
                var popup = document.getElementById('consultationPopup');
                if (popup) {
                    popup.classList.add('active');
                }
            }, 2000);
        }

        window.closeConsultationPopup = function () {
            var popup = document.getElementById('consultationPopup');
            if (popup) {
                popup.classList.remove('active');
                setTimeout(function () {
                    popup.remove();
                }, 300);
            }
        };

        window.handleDontShowAgain = function () {
            var checkbox = document.getElementById('dontShowAgain');
            if (checkbox && checkbox.checked) {
                hidePopupFor2Hours();
            }
        };

        window.submitConsultation = function (e) {
            e.preventDefault();
            window.alert('Cảm ơn bạn! Chúng tôi sẽ liên hệ tư vấn trong thời gian sớm nhất.');
            window.closeConsultationPopup();
        };

        // Initialize
        if (shouldShowPopup()) {
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', createPopup);
            } else {
                createPopup();
            }
        }
    })();
})();

