<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="product in products">
                        <td>{{ product.id }}</td>
                        <td>{{ product.name }}</td>
                        <td>{{ product.category.name }}</td>
                        <td>{{ product.brand.name }}</td>
                        <td>{{ product.price }}</td>
                        <td>{{ product.description }}</td>
                        <td>{{ product.status ? 'On' : 'Off' }}</td>
                        <td>
                            <router-link :to="{name:'products-update', params: {id: product.id} }"
                                         class="btn btn-primary"><i class="fas fa-edit"></i></router-link>
                            <button @click="deleteProduct(product.id)" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <router-link :to="{name:'products-create'}" class="btn btn-primary mt-3">Create</router-link>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</template>

<script>


import axios from "axios";

export default {

    data: () => ({
        products: [],
    }),
    methods: {
        getProducts() {
            axios.get('/api/products')
                .then(res => {
                    this.products = res.data
                })
        },
        editProduct(event) {
            console.log(event)
            // this.$route.push({name: 'products-update'})
        },
        deleteProduct(product) {
            axios.post("/api/products/" + product, {_method: 'delete'}
            );
            alertify.success(`Product Deleted`);
            this.getProducts();
        },
        getAuthUser() {
            axios.get('/api/auth-user')
                .then(res => {
                    console.log(res.data)
                })
        }
    },
    mounted() {
        this.getProducts();
        this.getAuthUser();
    },
    created() {
        this.getProducts();
    }
}
</script>

<style scoped>

</style>
