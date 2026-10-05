/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

var app = angular.module('sathvikApp', []);
var PRODUCTS = [{
  id: 1,
  name: "Sathvik Raw Forest Honey 500g",
  price: 299,
  mrp: 499,
  img: "https://images.unsplash.com/photo-1587049352846-4a222e784d38?auto=format&fit=crop&w=500&q=80",
  rating: 4.5,
  desc: "100% pure, unprocessed raw honey sourced directly from the forests. Rich in natural enzymes and antioxidants."
}, {
  id: 2,
  name: "Premium California Almonds 1kg",
  price: 749,
  mrp: 999,
  img: "https://images.unsplash.com/photo-1608248543803-ba4f8c8ae9f2?auto=format&fit=crop&w=500&q=80",
  rating: 4.3,
  desc: "Handpicked premium quality California almonds. Perfect for healthy snacking and rich in protein."
}, {
  id: 3,
  name: "Organic Garam Masala Powder 200g",
  price: 149,
  mrp: 250,
  img: "https://images.unsplash.com/photo-1599909533731-eaa36d6e8b8f?auto=format&fit=crop&w=500&q=80",
  rating: 4.2,
  desc: "Stone-ground aromatic spices blended traditionally for rich Indian cuisine."
}, {
  id: 4,
  name: "Mixed Berry Fruit Preserve 350g",
  price: 199,
  mrp: 300,
  img: "https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=500&q=80",
  rating: 4.6,
  desc: "Slow-cooked with natural jaggery. No refined sugar, no preservatives."
}, {
  id: 5,
  name: "Detox Herbal Green Tea 100 Bags",
  price: 349,
  mrp: 599,
  img: "https://images.unsplash.com/photo-1568054324020-25b5e024873f?auto=format&fit=crop&w=500&q=80",
  rating: 4.4,
  desc: "Relaxing blend of tulsi, ginger, and green tea leaves for daily detox."
}, {
  id: 6,
  name: "India Gate Basmati Rice 5kg",
  price: 899,
  mrp: 1200,
  img: "https://images.unsplash.com/photo-1586201375761-83865001e31c?auto=format&fit=crop&w=500&q=80",
  rating: 4.7,
  desc: "Long grain, naturally aged premium basmati rice for perfect aroma and taste."
}];
app.controller('ShopController', ['$scope', '$window', '$timeout', function ($scope, $window, $timeout) {
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

  $scope.categories = [{
    key: "Honey",
    name: "Honey",
    image: "https://images.unsplash.com/photo-1587049352846-4a222e784d38?auto=format&fit=crop&w=150&q=80"
  }, {
    key: "Spices",
    name: "Spices",
    image: "https://images.unsplash.com/photo-1599909533731-eaa36d6e8b8f?auto=format&fit=crop&w=150&q=80"
  }, {
    key: "Dry Fruits",
    name: "Dry Fruits",
    image: "https://images.unsplash.com/photo-1608248543803-ba4f8c8ae9f2?auto=format&fit=crop&w=150&q=80"
  }, {
    key: "Beverages",
    name: "Beverages",
    image: "https://images.unsplash.com/photo-1568054324020-25b5e024873f?auto=format&fit=crop&w=150&q=80"
  }, {
    key: "Grains",
    name: "Grains",
    image: "https://images.unsplash.com/photo-1586201375761-83865001e31c?auto=format&fit=crop&w=150&q=80"
  }, {
    key: "All",
    name: "All Foods",
    image: null
  }];

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
      $window.localStorage.setItem('sathvik_cart', JSON.stringify($scope.cart));
    } catch (error) {
      console.error('Unable to save cart:', error);
    }
  }

  // ==============================
  // ADD TO CART
  // ==============================

  $scope.addToCart = function (product) {
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
    $scope.showToast(product.name + ' added to your bag');
  };

  // ==============================
  // INCREASE
  // ==============================

  $scope.increaseQty = function (product) {
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

  $scope.decreaseQty = function (product) {
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

  $scope.removeFromCart = function (item) {
    var index = $scope.cart.findIndex(function (cartItem) {
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
    return $scope.cart.find(function (item) {
      return item.id === productId;
    });
  }

  // ==============================
  // PRODUCT QUANTITY
  // ==============================

  $scope.getCartQuantity = function (productId) {
    var item = findCartItem(productId);
    return item ? item.qty : 0;
  };

  // ==============================
  // CART TOTAL QUANTITY
  // ==============================

  function updateCartCount() {
    $scope.cartCount = $scope.cart.reduce(function (total, item) {
      return total + Number(item.qty);
    }, 0);
  }

  // ==============================
  // CART TOTAL PRICE
  // ==============================

  $scope.getCartTotal = function () {
    return $scope.cart.reduce(function (total, item) {
      return total + Number(item.price) * Number(item.qty);
    }, 0);
  };

  // ==============================
  // FORMAT MONEY
  // ==============================

  $scope.money = function (value) {
    return '₹' + Number(value || 0).toLocaleString('en-IN');
  };

  // ==============================
  // DISCOUNT
  // ==============================

  $scope.discount = function (product) {
    if (!product.mrp || !product.price) {
      return 0;
    }
    return Math.round((1 - product.price / product.mrp) * 100);
  };

  // ==============================
  // PRODUCT MODAL
  // ==============================

  $scope.productModalOpen = false;
  $scope.selectedProduct = null;
  $scope.openProduct = function (product) {
    $scope.selectedProduct = product;
    $scope.productModalOpen = true;
  };
  $scope.closeProductModal = function (event) {
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
  $scope.openCart = function () {
    $scope.cartOpen = true;
    $scope.checkoutOpen = false;
  };
  $scope.closeCart = function (event) {
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
  $scope.showCheckoutForm = function () {
    if ($scope.cart.length === 0) {
      $scope.showToast('Your bag is empty');
      return;
    }
    $scope.checkoutOpen = true;
  };
  $scope.backToCart = function () {
    $scope.checkoutOpen = false;
  };

  // ==============================
  // WHATSAPP ORDER
  // ==============================

  $scope.sendToWhatsApp = function () {
    if ($scope.cart.length === 0) {
      $scope.showToast('Your bag is empty');
      return;
    }
    var message = '';
    message += '*New Order - Sathvik Foods*%0A%0A';
    message += '*Customer Details:*%0A';
    message += 'Name: ' + encodeURIComponent($scope.customer.name) + '%0A';
    message += 'Phone: ' + encodeURIComponent($scope.customer.phone) + '%0A';
    message += 'Address: ' + encodeURIComponent($scope.customer.address) + '%0A';
    message += 'City/Pincode: ' + encodeURIComponent($scope.customer.city) + '%0A%0A';
    message += '*Order Items:*%0A';
    var total = 0;
    angular.forEach($scope.cart, function (item, index) {
      var lineTotal = Number(item.price) * Number(item.qty);
      message += index + 1 + '. ' + encodeURIComponent(item.name) + '%0A';
      message += 'Qty: ' + item.qty + ' x ₹' + item.price + ' = ₹' + lineTotal + '%0A';
      total += lineTotal;
    });
    message += '%0A*Total Amount: ₹' + total + '*%0A';
    message += 'Payment Mode: Cash on Delivery (To be confirmed)';
    var whatsappUrl = 'https://wa.me/' + WHATSAPP_NUMBER + '?text=' + message;
    $window.open(whatsappUrl, '_blank');
  };

  // ==============================
  // SEARCH
  // ==============================

  $scope.searchQuery = '';
  $scope.filterProducts = function () {
    var query = ($scope.searchQuery || '').toLowerCase().trim();
    if (!query) {
      $scope.filteredProducts = angular.copy($scope.products);
      return;
    }
    $scope.filteredProducts = $scope.products.filter(function (product) {
      return product.name.toLowerCase().includes(query) || product.desc.toLowerCase().includes(query);
    });
  };

  // ==============================
  // CATEGORY FILTER
  // ==============================

  $scope.selectCategory = function (category) {
    $scope.searchQuery = '';
    if (category === 'All') {
      $scope.filteredProducts = angular.copy($scope.products);
      $scope.scrollToDeals();
      return;
    }
    var keywords = {
      Honey: ['honey'],
      Spices: ['masala', 'spice'],
      'Dry Fruits': ['almond', 'fruit'],
      Beverages: ['tea'],
      Grains: ['rice', 'grain']
    };
    var selected = keywords[category] || [];
    $scope.filteredProducts = $scope.products.filter(function (product) {
      var name = product.name.toLowerCase();
      return selected.some(function (keyword) {
        return name.includes(keyword);
      });
    });
    $scope.scrollToDeals();
  };

  // ==============================
  // SCROLL
  // ==============================

  $scope.scrollToDeals = function () {
    var element = document.getElementById('deals');
    if (element) {
      element.scrollIntoView({
        behavior: 'smooth'
      });
    }
  };
  $scope.scrollToWhy = function () {
    var element = document.getElementById('why');
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
  $scope.showToast = function (message) {
    $scope.toast.message = message;
    $scope.toast.visible = true;
    if ($scope.toastTimer) {
      $timeout.cancel($scope.toastTimer);
    }
    $scope.toastTimer = $timeout(function () {
      $scope.toast.visible = false;
    }, 1800);
  };

  // ==============================
  // DEAL TIMER
  // ==============================

  var remaining = 8 * 3600 + 45 * 60 + 12;
  $scope.dealTimer = formatTimer(remaining);
  function formatTimer(seconds) {
    var hours = Math.floor(seconds / 3600);
    var minutes = Math.floor(seconds % 3600 / 60);
    var secs = seconds % 60;
    return String(hours).padStart(2, '0') + ':' + String(minutes).padStart(2, '0') + ':' + String(secs).padStart(2, '0');
  }
  var timerInterval = $window.setInterval(function () {
    if (remaining > 0) {
      remaining--;
    }
    $scope.$applyAsync(function () {
      $scope.dealTimer = formatTimer(remaining);
    });
  }, 1000);
  $scope.$on('$destroy', function () {
    $window.clearInterval(timerInterval);
  });
}]);

/***/ }),

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/css/app.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;