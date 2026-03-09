// GemLock product listing page scripts

(function () {
    'use strict';

    var config = window.gemlockProductConfig || {};
    var cartAddUrl = config.cartAddUrl || '/cart/add';
    var csrfToken =
        config.csrfToken ||
        (document.querySelector('meta[name="csrf-token"]')
            ? document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            : '');

    function initProductGallery() {
        var mainImage = document.getElementById('product-main-image');
        if (!mainImage) return;

        var thumbs = document.querySelectorAll('.product-thumb-btn[data-image]');
        if (!thumbs.length) return;

        thumbs.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var nextSrc = btn.getAttribute('data-image');
                if (!nextSrc) return;

                mainImage.src = nextSrc;

                thumbs.forEach(function (item) {
                    item.classList.remove('is-active');
                });
                btn.classList.add('is-active');
            });
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        initProductGallery();
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
})();

