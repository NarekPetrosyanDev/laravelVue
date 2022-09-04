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
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="brand in brands">
                        <td>{{ brand.id }}</td>
                        <td>{{ brand.name }}</td>
                        <td>
                            <router-link :to="{name:'brands-update', params: {id: brand.id} }"
                                         class="btn btn-primary"><i class="fas fa-edit"></i></router-link>
                            <button @click="deleteBrand(brand.id)" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <router-link :to="{name:'brands-create'}" class="btn btn-primary mt-3">Create</router-link>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</template>

<script>


import axios from "axios";

export default {
    data: () => ({
        brands: [],
    }),
    methods: {
        getBrands() {
            axios.get('/api/brands')
                .then(res => {
                    this.brands = res.data
                });
        },
        deleteBrand(brand) {
            axios.post("/api/brands/" + brand, {_method: 'delete'}
            );
            alertify.success(`Brand Deleted`);
            this.getBrands();
        }
    },
    mounted() {
        this.getBrands()
    },
    created() {
        this.getBrands()
    }
}
</script>

<style scoped>

</style>
