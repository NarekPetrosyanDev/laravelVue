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
                </div>
                <div class="card-footer">
                    <button v-if="this.$route.name === 'brands-create'" type="submit" class="btn btn-primary"
                            @click="createBrand()">Create
                    </button>
                    <button v-if="this.$route.name === 'brands-update'" type="submit" class="btn btn-primary"
                            @click="updateBrand()">Save
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
        }
    },
    validations: {
        name: {
            required
        },
    },
    methods: {
        createBrand() {
            if (this.$v.$invalid) {
                this.$v.$touch()
                return;
            }

            let formData = new FormData();

            formData.append('name', this.name);

            axios.post("/api/brands", formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }
            );

            this.$router.push({name: 'brands'})
            alertify.success(`Brand ${this.name} Created`);
        },
        getBrand() {
            if (this.$route.name === 'brands-update'){
                axios.get("/api/brands/" + this.$route.params['id'] + "/edit")
                    .then(res => {

                    })
            }
        },
        updateBrand() {

            if (this.$v.$invalid) {
                this.$v.$touch()
                return;
            }

            let formData = new FormData();

            formData.append('_method', 'put');
            formData.append('name', this.name);

            axios.post("/api/brands/" + this.$route.params['id'], formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }
            );
            this.$router.push({name: 'brands'})
            alertify.success(`Brand ${this.name} Updated`);
        },
    },
    mounted() {
        this.getBrand();
    },

}
</script>

<style scoped>

</style>
