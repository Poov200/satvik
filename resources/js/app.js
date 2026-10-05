
var app = angular.module('sathvikApp', []);

var PRODUCTS = [
            { id: 1, name: "Sathvik Raw Forest Honey 500g", price: 299, mrp: 499, img: "https://images.unsplash.com/photo-1587049352846-4a222e784d38?auto=format&fit=crop&w=500&q=80", rating: 4.5, desc: "100% pure, unprocessed raw honey sourced directly from the forests. Rich in natural enzymes and antioxidants." },
            { id: 2, name: "Premium California Almonds 1kg", price: 749, mrp: 999, img: "https://images.unsplash.com/photo-1608248543803-ba4f8c8ae9f2?auto=format&fit=crop&w=500&q=80", rating: 4.3, desc: "Handpicked premium quality California almonds. Perfect for healthy snacking and rich in protein." },
            { id: 3, name: "Organic Garam Masala Powder 200g", price: 149, mrp: 250, img: "https://images.unsplash.com/photo-1599909533731-eaa36d6e8b8f?auto=format&fit=crop&w=500&q=80", rating: 4.2, desc: "Stone-ground aromatic spices blended traditionally for rich Indian cuisine." },
            { id: 4, name: "Mixed Berry Fruit Preserve 350g", price: 199, mrp: 300, img: "https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=500&q=80", rating: 4.6, desc: "Slow-cooked with natural jaggery. No refined sugar, no preservatives." },
            { id: 5, name: "Detox Herbal Green Tea 100 Bags", price: 349, mrp: 599, img: "https://images.unsplash.com/photo-1568054324020-25b5e024873f?auto=format&fit=crop&w=500&q=80", rating: 4.4, desc: "Relaxing blend of tulsi, ginger, and green tea leaves for daily detox." },
            { id: 6, name: "India Gate Basmati Rice 5kg", price: 899, mrp: 1200, img: "https://images.unsplash.com/photo-1586201375761-83865001e31c?auto=format&fit=crop&w=500&q=80", rating: 4.7, desc: "Long grain, naturally aged premium basmati rice for perfect aroma and taste." }
        ];

app.controller('ShopController', ['$scope', '$window', '$timeout', function($scope, $window, $timeout) {

    // ==============================
    // CONFIG
    // ==============================

    var WHATSAPP_NUMBER = "919876543210";

    // ==============================
    // PRODUCTS
    // ==============================

    $scope.products = PRODUCTS;

    $scope.filteredProducts = angular.copy($scope.products);

    // ==============================
    // CATEGORIES
    // ==============================

    $scope.categories = [
        {
            key: "Honey",
            name: "Honey",
            image: "https://images.unsplash.com/photo-1587049352846-4a222e784d38?auto=format&fit=crop&w=150&q=80"
        },
        {
            key: "Spices",
            name: "Spices",
            image: "https://images.unsplash.com/photo-1599909533731-eaa36d6e8b8f?auto=format&fit=crop&w=150&q=80"
        },
        {
            key: "Dry Fruits",
            name: "Dry Fruits",
            image: "https://images.unsplash.com/photo-1608248543803-ba4f8c8ae9f2?auto=format&fit=crop&w=150&q=80"
        },
        {
            key: "Beverages",
            name: "Beverages",
            image: "https://images.unsplash.com/photo-1568054324020-25b5e024873f?auto=format&fit=crop&w=150&q=80"
        },
        {
            key: "Grains",
            name: "Grains",
            image: "https://images.unsplash.com/photo-1586201375761-83865001e31c?auto=format&fit=crop&w=150&q=80"
        },
        {
            key: "All",
            name: "All Foods",
            image: null
        }
    ];

    // ==============================
    // CART
    // ==============================

    $scope.cart = [];
    $scope.cartCount = 0;

    // Restore cart after page refresh.
    loadCart();

    function loadCart() {

        try {

            var savedCart = $window.localStorage.getItem('sathvik_cart');

            if (savedCart) {

                $scope.cart = JSON.parse(savedCart);

            }

        } catch (error) {

            console.error('Unable to restore cart:', error);

            $scope.cart = [];

        }

        updateCartCount();

    }

    function saveCart() {

        try {

            $window.localStorage.setItem(
                'sathvik_cart',
                JSON.stringify($scope.cart)
            );

        } catch (error) {

            console.error('Unable to save cart:', error);

        }

    }

    // ==============================
    // ADD TO CART
    // ==============================

    $scope.addToCart = function(product) {

        var existing = findCartItem(product.id);

        if (existing) {

            existing.qty = existing.qty + 1;

        } else {

            $scope.cart.push({
                id: product.id,
                name: product.name,
                price: Number(product.price),
                mrp: Number(product.mrp),
                img: product.img,
                rating: product.rating,
                desc: product.desc,
                qty: 1
            });

        }

        updateCartCount();
        saveCart();

        $scope.showToast(
            product.name + ' added to your bag'
        );

    };

    // ==============================
    // INCREASE
    // ==============================

    $scope.increaseQty = function(product) {

        var item = findCartItem(product.id);

        if (!item) {

            $scope.addToCart(product);

            return;

        }

        item.qty++;

        updateCartCount();
        saveCart();

    };

    // ==============================
    // DECREASE
    // ==============================

    $scope.decreaseQty = function(product) {

        var item = findCartItem(product.id);

        if (!item) {
            return;
        }

        if (item.qty > 1) {

            item.qty--;

        } else {

            $scope.removeFromCart(item);

            return;

        }

        updateCartCount();
        saveCart();

    };

    // ==============================
    // REMOVE
    // ==============================

    $scope.removeFromCart = function(item) {

        var index = $scope.cart.findIndex(function(cartItem) {

            return cartItem.id === item.id;

        });

        if (index !== -1) {

            $scope.cart.splice(index, 1);

        }

        updateCartCount();
        saveCart();

        $scope.showToast('Product removed from your bag');

    };

    // ==============================
    // FIND CART ITEM
    // ==============================

    function findCartItem(productId) {

        return $scope.cart.find(function(item) {

            return item.id === productId;

        });

    }

    // ==============================
    // PRODUCT QUANTITY
    // ==============================

    $scope.getCartQuantity = function(productId) {

        var item = findCartItem(productId);

        return item ? item.qty : 0;

    };

    // ==============================
    // CART TOTAL QUANTITY
    // ==============================

    function updateCartCount() {

        $scope.cartCount = $scope.cart.reduce(
            function(total, item) {

                return total + Number(item.qty);

            },
            0
        );

    }

    // ==============================
    // CART TOTAL PRICE
    // ==============================

    $scope.getCartTotal = function() {

        return $scope.cart.reduce(
            function(total, item) {

                return total +
                    (Number(item.price) * Number(item.qty));

            },
            0
        );

    };

    // ==============================
    // FORMAT MONEY
    // ==============================

    $scope.money = function(value) {

        return '₹' + Number(value || 0).toLocaleString('en-IN');

    };

    // ==============================
    // DISCOUNT
    // ==============================

    $scope.discount = function(product) {

        if (!product.mrp || !product.price) {
            return 0;
        }

        return Math.round(
            (1 - product.price / product.mrp) * 100
        );

    };

    // ==============================
    // PRODUCT MODAL
    // ==============================

    $scope.productModalOpen = false;
    $scope.selectedProduct = null;

    $scope.openProduct = function(product) {

        $scope.selectedProduct = product;
        $scope.productModalOpen = true;

    };

    $scope.closeProductModal = function(event) {

        if (event && event.target !== event.currentTarget) {
            return;
        }

        $scope.productModalOpen = false;

    };

    // ==============================
    // CART DRAWER
    // ==============================

    $scope.cartOpen = false;
    $scope.checkoutOpen = false;

    $scope.openCart = function() {

        $scope.cartOpen = true;
        $scope.checkoutOpen = false;

    };

    $scope.closeCart = function(event) {

        if (event && event.target !== event.currentTarget) {
            return;
        }

        $scope.cartOpen = false;
        $scope.checkoutOpen = false;

    };

    // ==============================
    // CHECKOUT
    // ==============================

    $scope.customer = {
        name: '',
        phone: '',
        address: '',
        city: ''
    };

    $scope.showCheckoutForm = function() {

        if ($scope.cart.length === 0) {

            $scope.showToast('Your bag is empty');

            return;

        }

        $scope.checkoutOpen = true;

    };

    $scope.backToCart = function() {

        $scope.checkoutOpen = false;

    };

    // ==============================
    // WHATSAPP ORDER
    // ==============================

    $scope.sendToWhatsApp = function() {

        if ($scope.cart.length === 0) {

            $scope.showToast('Your bag is empty');

            return;

        }

        var message = '';

        message += '*New Order - Sathvik Foods*%0A%0A';

        message += '*Customer Details:*%0A';

        message += 'Name: ' +
            encodeURIComponent($scope.customer.name) +
            '%0A';

        message += 'Phone: ' +
            encodeURIComponent($scope.customer.phone) +
            '%0A';

        message += 'Address: ' +
            encodeURIComponent($scope.customer.address) +
            '%0A';

        message += 'City/Pincode: ' +
            encodeURIComponent($scope.customer.city) +
            '%0A%0A';

        message += '*Order Items:*%0A';

        var total = 0;

        angular.forEach(
            $scope.cart,
            function(item, index) {

                var lineTotal =
                    Number(item.price) *
                    Number(item.qty);

                message +=
                    (index + 1) +
                    '. ' +
                    encodeURIComponent(item.name) +
                    '%0A';

                message +=
                    'Qty: ' +
                    item.qty +
                    ' x ₹' +
                    item.price +
                    ' = ₹' +
                    lineTotal +
                    '%0A';

                total += lineTotal;

            }
        );

        message +=
            '%0A*Total Amount: ₹' +
            total +
            '*%0A';

        message +=
            'Payment Mode: Cash on Delivery (To be confirmed)';

        var whatsappUrl =
            'https://wa.me/' +
            WHATSAPP_NUMBER +
            '?text=' +
            message;

        $window.open(
            whatsappUrl,
            '_blank'
        );

    };

    // ==============================
    // SEARCH
    // ==============================

    $scope.searchQuery = '';

    $scope.filterProducts = function() {

        var query =
            ($scope.searchQuery || '')
            .toLowerCase()
            .trim();

        if (!query) {

            $scope.filteredProducts =
                angular.copy($scope.products);

            return;

        }

        $scope.filteredProducts =
            $scope.products.filter(function(product) {

                return (
                    product.name
                        .toLowerCase()
                        .includes(query)
                    ||
                    product.desc
                        .toLowerCase()
                        .includes(query)
                );

            });

    };

    // ==============================
    // CATEGORY FILTER
    // ==============================

    $scope.selectCategory = function(category) {

        $scope.searchQuery = '';

        if (category === 'All') {

            $scope.filteredProducts =
                angular.copy($scope.products);

            $scope.scrollToDeals();

            return;

        }

        var keywords = {

            Honey: ['honey'],

            Spices: [
                'masala',
                'spice'
            ],

            'Dry Fruits': [
                'almond',
                'fruit'
            ],

            Beverages: [
                'tea'
            ],

            Grains: [
                'rice',
                'grain'
            ]

        };

        var selected =
            keywords[category] || [];

        $scope.filteredProducts =
            $scope.products.filter(
                function(product) {

                    var name =
                        product.name.toLowerCase();

                    return selected.some(
                        function(keyword) {

                            return name.includes(keyword);

                        }
                    );

                }
            );

        $scope.scrollToDeals();

    };

    // ==============================
    // SCROLL
    // ==============================

    $scope.scrollToDeals = function() {

        var element =
            document.getElementById('deals');

        if (element) {

            element.scrollIntoView({
                behavior: 'smooth'
            });

        }

    };

    $scope.scrollToWhy = function() {

        var element =
            document.getElementById('why');

        if (element) {

            element.scrollIntoView({
                behavior: 'smooth'
            });

        }

    };

    // ==============================
    // TOAST
    // ==============================

    $scope.toast = {
        visible: false,
        message: ''
    };

    $scope.showToast = function(message) {

        $scope.toast.message = message;
        $scope.toast.visible = true;

        if ($scope.toastTimer) {

            $timeout.cancel(
                $scope.toastTimer
            );

        }

        $scope.toastTimer = $timeout(
            function() {

                $scope.toast.visible = false;

            },
            1800
        );

    };

    // ==============================
    // DEAL TIMER
    // ==============================

    var remaining =
        (8 * 3600) +
        (45 * 60) +
        12;

    $scope.dealTimer =
        formatTimer(remaining);

    function formatTimer(seconds) {

        var hours =
            Math.floor(seconds / 3600);

        var minutes =
            Math.floor(
                (seconds % 3600) / 60
            );

        var secs =
            seconds % 60;

        return (
            String(hours).padStart(2, '0') +
            ':' +
            String(minutes).padStart(2, '0') +
            ':' +
            String(secs).padStart(2, '0')
        );

    }

    var timerInterval =
        $window.setInterval(
            function() {

                if (remaining > 0) {

                    remaining--;

                }

                $scope.$applyAsync(
                    function() {

                        $scope.dealTimer =
                            formatTimer(remaining);

                    }
                );

            },
            1000
        );

    $scope.$on(
        '$destroy',
        function() {

            $window.clearInterval(
                timerInterval
            );

        }
    );

}]);
