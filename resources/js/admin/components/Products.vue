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
                        <th style="width: 10px">#</th>
                        <th>Task</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="product in products">
                        <td>{{ product.id }}</td>
                        <td>{{ product.name }}</td>
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



export default {

    data: () => ({
        products: [],
    }),
    mounted() {
        this.getProducts();
    },
    methods: {
        getProducts() {
            axios.get('/api/products')
                .then(res => {
                    this.products = res.data
                })
        }
    }
}
</script>

<style scoped>

</style>
