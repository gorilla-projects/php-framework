Vue.component('products', {
    data: function () {
        return {
            products: [],
        }
    },

    props: {
        
    },

    methods: {
        addToCart(product) {
            product.stock--;

            this.$root.$emit('add-to-cart', product);
        },
    },

    created() {
        let self = this;

        // Get all products calling function in controller (Ajax call)
        axios({
            method: 'GET',
            url: 'home/products',
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            }
        }).then(function(response) {
            self.products = response.data.products;
        }).catch(function(response) {

        })
    },

    template: `
        <div class="row">
            <div class="col-md-4 pt-3" v-for="product in products">
                <div class="card">
                    <img :src="'/public/images/webshop/' + product.image" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ product.name }}</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <p>Stock: {{ product.stock }}</p>
                        <input type="button" class="btn btn-primary" :disabled="product.stock === 0" @click="addToCart(product)" value="Order">
                    </div>
                </div>
            </div>
        </div>`,
})