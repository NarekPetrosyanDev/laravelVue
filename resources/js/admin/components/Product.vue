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
                        <label for="Name">Select Category</label>
                        <select v-model="category_id" id="category_id"
                                class="form-control product-category-select"
                                :class="{'is-invalid': $v.category_id.$error,'is-valid': !$v.category_id.$invalid}">
                            <option value="" disabled selected>Select Category</option>
                            <template v-for="category in categories">
                                <option :value="category.id">{{ category.id + ' ' + category.name }}</option>
                            </template>
                        </select>
                        <div class="invalid-feedback" v-if="$v.category_id.$invalid">Category field is required</div>
                    </div>

                    <div class="form-group w-25">
                        <label for="Name">Select Brand</label>
                        <select v-model="brand_id" id="brand_id"
                                class="form-control product-brand-select"
                                :class="{'is-invalid': $v.brand_id.$error,'is-valid': !$v.brand_id.$invalid}">
                            <option value="" disabled selected>Select Brand</option>
                            <template v-for="brand in brands">
                                <option :value="brand.id">{{ brand.id + ' ' + brand.name }}</option>
                            </template>
                        </select>
                        <div class="invalid-feedback" v-if="$v.brand_id.$invalid">Brand field is required</div>
                    </div>

                    <div class="form-group w-25">
                        <label for="CategoryTitle">Price</label>
                        <input type="number" class="form-control" v-model.number="price"
                               id="price" name="price" placeholder="Enter price" min="0"
                               :class="{'is-invalid': $v.price.$error,'is-valid': !$v.price.$invalid}">
                        <div class="invalid-feedback" v-if="!$v.price.required">Price field is required</div>
                        <div class="invalid-feedback" v-if="this.price < 0">Price field is not Negative</div>
                        <div class="invalid-feedback" v-if="!$v.price.numeric">Price field is numeric</div>
                    </div>
                    <div class="form-group w-25">
                        <label for="CategoryTitle">Description</label>
                        <textarea class="form-control" v-model="description"
                                  :class="{'is-invalid': $v.description.$error,'is-valid': !$v.description.$invalid}">
                        </textarea>
                        <div class="invalid-feedback" v-if="!$v.description.required">Description field is required
                        </div>
                        <div class="invalid-feedback" v-if="!$v.description.maxLength">Description max length is 1000
                            symbol
                        </div>
                    </div>

                    <div class="form-group w-25">
                        <label for="CategoryTitle">Status</label>
                        <input type="checkbox" class="form-check" v-model="status" :true-value="1" :false-value="0">
                    </div>

                    <div class="form-group w-25">
                        <label for="CategoryTitle">Select Imgae</label>
                        <input type="file" accept="image/*" class="form-control-file"
                               :class="{'is-invalid': $v.image.$error,'is-valid': !$v.image.$invalid}"
                               @change="getImage">
                        <div class="invalid-feedback" v-if="!$v.image.required">Image field is required</div>
                    </div>

                    <div class="form-image" style="max-width: 250px;">
                        <img v-if="this.image" :src="imageUrl" alt="" style="width: 100%;">
                    </div>

                </div>
                <div class="card-footer">
                    <button v-if="this.$route.name === 'products-create'" type="submit" class="btn btn-primary"
                            @click="createProduct()">Create
                    </button>
                    <button v-if="this.$route.name === 'products-update'" type="submit" class="btn btn-primary"
                            @click="updateProduct()">Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>


import {required, maxLength, numeric} from 'vuelidate/lib/validators'
import axios from "axios";

export default {
    data() {
        return {
            name: '',
            price: '',
            categories: '',
            category_id: '',
            brands: '',
            brand_id: '',
            description: '',
            status: 0,
            image: {},
            imageUrl: null,
        }
    },
    validations: {
        name: {
            required
        },
        category_id: {
            required
        },
        brand_id: {
            required
        },
        price: {
            required,
            numeric,
        },
        description: {
            required,
            maxLength: maxLength(1000)
        },
        image: {
            required
        },
    },
    methods: {
        getBrandsAndCategories() {
            axios.get('/api/products/create')
                .then(res => {
                    this.categories = res.data.categories
                    this.brands = res.data.brands
                })
        },
        getImage(event) {
            this.image = {
                name: event.target.files[0].name,
                data: event.target.files[0]
            };
            this.imageUrl = URL.createObjectURL(this.image.data)
        },
        createProduct() {

            if (this.$v.$invalid) {
                this.$v.$touch()
                return;
            }

            let formData = new FormData();

            formData.append('name', this.name);
            formData.append('price', this.price);
            formData.append('category_id', this.category_id);
            formData.append('brand_id', this.brand_id);
            formData.append('description', this.description);
            formData.append('status', this.status);
            formData.append('image', this.image.data, this.image.name);

            axios.post("/api/products", formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }
            );

            this.$router.push({name: 'products'})
            alertify.success(`Product ${this.name} Created`);
        },
        getProduct() {
            if (this.$route.name === 'products-update'){
                axios.get("/api/products/" + this.$route.params['id'] + "/edit")
                    .then(res => {
                        this.name = res.data.name
                        this.category_id = res.data.category_id
                        this.brand_id = res.data.brand_id
                        this.price = res.data.price
                        this.description = res.data.description
                        this.status = res.data.status
                        this.image = res.data.image
                        this.imageUrl = '/storage/' + res.data.image
                    })
            }
        },
        updateProduct() {

            if (this.$v.$invalid) {
                this.$v.$touch()
                return;
            }

            let formData = new FormData();

            formData.append('_method', 'put');
            formData.append('name', this.name);
            formData.append('price', this.price);
            formData.append('category_id', this.category_id);
            formData.append('brand_id', this.brand_id);
            formData.append('description', this.description);
            formData.append('status', this.status);
            if (this.image.data){
                formData.append('image', this.image.data, this.image.name);
            }else {
                formData.append('image', this.image)
            }

            axios.post("/api/products/" + this.$route.params['id'], formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }
            );
            this.$router.push({name: 'products'})
            alertify.success(`Product ${this.name} Updated`);
        },
    },
    mounted() {
        this.getBrandsAndCategories();
        this.getProduct();
    },

}
</script>

<style scoped>

</style>
