<template>
    <div>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div>
                <div class="card-body">
                    <div class="form-group w-25">
                        <label for="Name">Name</label>
                        <input type="text"
                               class="form-control"
                               :class="{'is-invalid': $v.name.$error,'is-valid': !$v.name.$invalid}"
                               v-model="name"
                               id="name"
                               name="name"
                               placeholder="Enter name">
                        <div class="invalid-feedback" v-if="!$v.name.required">Name field is required</div>
                    </div>

                    <div class="form-group w-25">
                        <label for="Name">Select Parent Category</label>
                        <select v-model="parent_id" id="parent_id"
                                class="form-control category-category-select"
                                :class="{'is-invalid': $v.parent_id.$error,'is-valid': !$v.parent_id.$invalid}">
                            <option value="" disabled selected>Select Category</option>
                            <template v-for="category in categories">
                                <option :value="category.id">{{ category.id + ' ' + category.name }}</option>
                            </template>
                        </select>
                        <div class="invalid-feedback" v-if="$v.parent_id.$invalid">Category field is required</div>
                    </div>
                </div>
                <div class="card-footer">
                    <button v-if="this.$route.name === 'categories-create'" type="submit" class="btn btn-primary"
                            @click="createCategory()">Create
                    </button>
                    <button v-if="this.$route.name === 'categories-update'" type="submit" class="btn btn-primary"
                            @click="updateCategory()">Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>


import {required} from 'vuelidate/lib/validators'
import axios from "axios";

export default {
    data() {
        return {
            name: '',
            categories: [],
            parent_id: '',
        }
    },
    validations: {
        name: {
            required
        },
        parent_id: {
            required
        },
    },
    methods: {
        getCategories() {
            axios.get('/api/categories/create')
                .then(res => {
                    this.categories = res.data
                })
        },
        createCategory() {
            if (this.$v.$invalid) {
                this.$v.$touch()
                return;
            }

            let formData = new FormData();

            formData.append('name', this.name);
            formData.append('parent_id', this.parent_id);

            axios.post("/api/categories", formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }
            );

            this.$router.push({name: 'categories'})
            alertify.success(`Category ${this.name} Created`);
        },
        getCategory() {
            if (this.$route.name === 'categories-update'){
                axios.get("/api/categories/" + this.$route.params['id'] + "/edit")
                    .then(res => {
                        this.name = res.data.category.name
                        this.parent_id = res.data.category.parent.id
                        this.categories = res.data.categoryList
                    })
            }
        },
        updateCategory() {

            if (this.$v.$invalid) {
                this.$v.$touch()
                return;
            }

            let formData = new FormData();

            formData.append('_method', 'put');
            formData.append('name', this.name);
            formData.append('parent_id', this.parent_id);

            axios.post("/api/categories/" + this.$route.params['id'], formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }
            );
            this.$router.push({name: 'categories'})
            alertify.success(`category ${this.name} Updated`);
        },
    },
    mounted() {
        this.getCategories();
        this.getCategory();
    },

}
</script>

<style scoped>

</style>
