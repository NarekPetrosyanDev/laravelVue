<template>
    <div>
        <div class="container">
            <div class="cart_inner" style="padding: 100px 0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="product in order.products" class="product" v-if="product.pivot.count > 0">
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img :src="'storage/' + product.image" alt=""
                                             style="width: 100%; max-width: 150px;">
                                    </div>
                                    <div class="media-body">
                                        <p>{{ product.name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>{{ product.price }}</h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    <input class="input-number" type="number" @input="orderUpdate(product)"
                                           v-model="product.pivot.count"
                                           min="0"
                                           :data-product-id="product.price">
                                </div>
                            </td>
                            <td>
                                <h5 class="total" >{{ getPriceForCount(product) }}$</h5>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5>{{ getOrderFullPrice(order) }}$</h5>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn" @click="$router.go(-1)">Continue Shopping</a>
                        <a class="btn btn-primary checkout_btn" href="">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Cart",
    data() {
        return {
            order: '',
            total: '',
        }
    },
    methods: {
        getOrder() {
            axios.get('/api/cart')
                .then(res => {
                    this.order = res.data
                });
        },
        orderUpdate(product) {
            axios.post('/api/cart/quantity/change', {quantity: product.pivot.count, product_id: product.id})
                .then(res => {
                    this.total = res.data
                })
        },
        getOrderFullPrice(order) {
            let sum = 0;
            $.map(order.products, function (product) {
                sum += product.price * product.pivot.count
            });
            return sum
        },
        getPriceForCount(product) {
            let price = 0;
            price += product.price * product.pivot.count
            return price
        }
    },
    created() {
        this.getOrder()
    }
}
</script>

<style scoped>

</style>
