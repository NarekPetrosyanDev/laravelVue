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
                        <th>Parent</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="category in categories">
                        <td>{{ category.id }}</td>
                        <td>{{ category.name }}</td>
                        <td>{{ category.parent ? category.parent.name : 'This Main Category' }}</td>
                        <td>
                            <router-link :to="{name:'categories-update', params: {id: category.id} }"
                                         class="btn btn-primary"><i class="fas fa-edit"></i></router-link>
                            <button @click="deleteCategory(category.id)" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <router-link :to="{name:'categories-create'}" class="btn btn-primary mt-3">Create</router-link>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</template>

<script>


import axios from "axios";

export default {
    data: () => ({
        categories: [],
    }),
    methods: {
        getCategories() {
            axios.get('/api/categories')
                .then(res => {
                    this.categories = res.data
                });
        },
        deleteCategory(category) {
            axios.post("/api/categories/" + category, {_method: 'delete'}
            );
            alertify.success(`Category Deleted`);
            this.getCategories();
        }
    },
    mounted() {
        this.getCategories()
    },
    created() {
        this.getCategories()
    }
}
</script>

<style scoped>

</style>
