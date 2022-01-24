let app = new Vue({
    el: '#app',
    data: {
        appName: 'The Fruity Bowl',
    },

    mounted() {
        // Add a 'listner'
        this.$on('add-to-cart', (product) => {
            this.addToCart(product)
        });
    },

    methods: {
        /**
         * Adds a new product to the cart or changes the amount of an 
         *  existing product in the cart
         * 
         * @param product (object)
         * @returns void
         */
        addToCart(product) {
            // Check if localStorage key 'cart' is allready initialized
            // if not, then create localStorage entry and add first product
            // Finaly update the cart in the shopping-cart component
            if (window.localStorage.getItem('cart') === null) {
                this.$refs.shoppingCart.cart = this.initCart(product);
                window.localStorage.setItem('cart', JSON.stringify(this.$refs.shoppingCart.cart));

                return;
            }

            // Update cart
            this.updateCart(product);
        },

        /**
         * Initialize a new shopping cart
         * 
         * @param product (object)
         * @returns void
         */
        initCart(product) {
            return {
                totalItems: 1,
                totalPrice: parseFloat(product.price),
                items: [
                    this.addNewProductToCart(product),
                ]
            }
        },

        /**
         * Update the entire shopping cart and calculate totals
         * 
         * @param product (object)
         */
        updateCart(product) {
            // Get and parse the cart from localStorage
            let cart = JSON.parse(window.localStorage.getItem('cart'));
            let itemIndex = false;

            // Check if the product to add to the cart allready exist in the cart
            cart.items.forEach(function(item, index) {
                if (item.id === product.id) {
                    itemIndex = index; // Product found in cart
                }
            });

            // If product was found in the cart
            //  itemIndex is the index in the array of the products in the cart
            //  and then update the ammount and totalPrice of this product
            if (itemIndex !== false) {
                cart.items[itemIndex].amount++;
                cart.items[itemIndex].totalPrice = cart.items[itemIndex].amount * cart.items[itemIndex].price;
            } else {
                // Product not found, so add it to the cart
                cart.items.push(this.addNewProductToCart(product));
            }

            // Finaly update the 'super totals': total products in cart
            //  and totalPrice of all the products in the cart
            let totals = this.updateTotals(cart);

            // Update the cart
            cart.totalItems = totals.totalItems;
            cart.totalPrice = totals.totalPrice;

            // Update the cart in the shopping-cart component
            this.$refs.shoppingCart.cart = cart;

            // And finaly update localStorage
            window.localStorage.setItem('cart', JSON.stringify(cart));
        },

        /**
         * Create a new product object
         * 
         * @param product (object)
         * @return altered object
         */
        addNewProductToCart(product) {
            let price = parseFloat(product.price);

            return {
                id: product.id,
                name: product.name,
                image: product.image,
                price: price,
                amount: 1,
                totalPrice: price
            }
        },

        /**
         * 
         * @param cart (object)
         * @returns total amount of products and totalPrice of all products
         */
        updateTotals(cart) {
            let totalItems = 0;
            let totalPrice = 0;

            cart.items.forEach(item => {
                totalItems += item.amount;
                totalPrice += (item.amount * item.price);
            });

            return {
                totalItems: totalItems,
                totalPrice: totalPrice,
            }
        },

        removeItemFromCart(cart) {

        },

        closeShoppingCart() {
            $('.layer').fadeOut(); 
            $('.cart').fadeOut();
        },
    }
})

Vue.config.devtools = true
Vue.config.productionTip = false