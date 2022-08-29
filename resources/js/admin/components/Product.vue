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
                        <input type="text" class="form-control" :class="{'is-invalid': $v.name.$error,'is-valid': !$v.name.$invalid}" v-model="name"
                               id="name" name="name" placeholder="Enter name">
                        <div class="invalid-feedback" v-if="$v.name.required">Name field is required</div>
                    </div>

                    <div class="form-group w-25">
                        <label for="Slug">Slug</label>
                        <input type="text" class="form-control" v-model="slug"
                               id="slug" name="slug" placeholder="Enter slug">
                    </div>


                    <div class="form-group w-25">
                        <label for="Name">Select Category</label>
                        <select @change="onChangeCategory" v-model="category_id" id="category_id"
                                class="form-control product-category-select">
                            <option value="" disabled selected>Select Category</option>
                            <template v-for="category in categories">
                                <option :value="category.id">{{ category.id + ' ' + category.name }}</option>
                            </template>
                        </select>
                    </div>


                    <div class="form-group w-25">
                        <label for="Name">Select Brand</label>
                        <select @change="onChangeBrand" v-model="brand_id" id="brand_id"
                                class="form-control product-brand-select">
                            <option value="" disabled selected>Select Brand</option>
                            <template v-for="brand in brands">
                                <option :value="brand.id">{{ brand.id + ' ' + brand.name }}</option>
                            </template>
                        </select>
                    </div>

                    <div class="form-group w-25">
                        <label for="CategoryTitle">Price</label>
                        <input type="number" class="form-control" v-model.number="price"
                               id="price" name="price" placeholder="Enter price" min="0">
                    </div>

                    <div class="form-group w-25">
                        <label for="CategoryTitle">Description</label>
                        <textarea class="form-control" v-model="description">
                        </textarea>
                    </div>

                    <div class="form-group w-25">
                        <label for="CategoryTitle">Status</label>
                        <input type="checkbox" class="form-check" v-model="status" :true-value="1" :false-value="0">
                    </div>

                    <div class="form-group w-25">
                        <label for="CategoryTitle">Select Imgae</label>
                        <input type="file" accept="image/*" class="form-control-file"
                               @change="getImage">
                    </div>

                    <div class="form-image">
                        <img v-if="this.image" :src="imageUrl" alt="">
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" @click="createProduct()">Submit</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>


import {required, minLength, numeric} from 'vuelidate/lib/validators'

export default {
    data() {
        return {
            name: '',
            slug: '',
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
    methods: {
        getBrandsAndCategories() {
            axios.get('/api/products/create')
                .then(res => {
                    this.categories = res.data.categories
                    this.brands = res.data.brands
                })
        },
        onChangeCategory(event) {
            console.log(event.target.value, this.category_id);
        },
        onChangeBrand(event) {
            console.log(event.target.value, this.brand_id);
        },
        getImage(event) {
            this.image = {
                name: event.target.files[0].name,
                data: event.target.files[0]
            };
            this.imageUrl = URL.createObjectURL(this.image.data)
        },
        createProduct() {
            console.log(this.status)

            let formData = new FormData();

            formData.append('name', this.name);
            formData.append('slug', this.slug);
            formData.append('price', this.price);
            formData.append('category_id', this.category_id);
            formData.append('brand_id', this.brand_id);
            formData.append('description', this.description);
            formData.append('status', this.status);
            formData.append('image', this.image.data, this.image.name);

            axios.post("/api/products", formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    }
                }
            );
        }

    },
    validations: {
        name: {
            required
        }
    },
    mounted() {
        this.getBrandsAndCategories();
    },

}
</script>

<style scoped>

</style>
