<template>
    <div class="container">
        <h2>Edit Property</h2>
        <form action="" class="form row" @submit.prevent="save(property.id)">
            <div class="col-sm-6 form-group">
                <label for="">County</label>
                <input
                    type="text"
                    class="form-control shadow"
                    v-model="form.county"
                />
            </div>
            <div class="col-sm-6 form-group">
                <label for="">Country</label>
                <input
                    type="text"
                    class="form-control shadow"
                    v-model="form.country"
                />
            </div>
            <div class="col-sm-6 form-group">
                <label for="">Town</label>
                <input
                    type="text"
                    class="form-control shadow"
                    v-model="form.town"
                />
            </div>
            <div class="col-sm-6 form-group">
                <label for="">PostCode</label>
                <input
                    type="text"
                    class="form-control shadow"
                    v-model="form.postcode"
                />
            </div>
            <div class="col-sm-12 form-group">
                <label for="">Description</label>
                <textarea
                    name=""
                    id=""
                    cols="30"
                    rows="10"
                    class="form-control shadow"
                    v-model="form.description"
                ></textarea>
            </div>
            <div class="col-sm-12 form-group">
                <label for="">Displayed Address</label>
                <textarea
                    name=""
                    id=""
                    cols="30"
                    rows="10"
                    class="form-control shadow"
                    v-model="form.address"
                ></textarea>
            </div>
            <div class="col-sm-6 form-group">
                <label for="">Number of Bedrooms</label>
                <select
                    name=""
                    id=""
                    class="form-select shadow"
                    v-model="form.num_bedrooms"
                >
                    <option v-for="n in 10" :key="`num_bed-${n}`" :value="n">
                        {{ n }}
                    </option>
                </select>
            </div>
            <div class="col-sm-6 form-group">
                <label for="">Number of Bathrooms</label>
                <select
                    name=""
                    id=""
                    class="form-select shadow"
                    v-model="form.num_bathrooms"
                >
                    <option v-for="n in 10" :key="`num_bath-${n}`" :value="n">
                        {{ n }}
                    </option>
                </select>
            </div>
            <div class="col-sm-6 form-group">
                <label for="">Price</label>
                <input
                    type="number"
                    class="form-control shadow"
                    v-model="form.price"
                />
            </div>
            <div class="col-sm-6 form-group">
                <label for="">Type</label>
                <select
                    name=""
                    id=""
                    class="form-select shadow"
                    v-model="form.type"
                >
                    <option value="rent">Rent</option>
                    <option value="sale">Sale</option>
                </select>
            </div>
            <div class="col-sm-12 form-group">
                <label for="">Property Type</label>
                <select
                    name=""
                    id=""
                    class="form-select shadow"
                    v-model="form.property_type"
                >
                    <option
                        v-for="(prop_type, ind) in property_types"
                        :key="`property_type-${ind}`"
                        :value="form.property_type"
                    >
                        {{ prop_type.title }}
                    </option>
                </select>
            </div>
            <div class="col-sm-6 form-group">
                <label for="">Thumbnail Image</label>
                <input
                    type="url"
                    class="form-control"
                    v-model="form.image_thumbnail"
                />
                <img
                    :src="form.image_thumbnail"
                    alt=""
                    class="img-fluid image_thumbnail"
                />
            </div>
            <div class="col-sm-6 form-group">
                <label for="">Image Full</label>
                <input
                    type="url"
                    class="form-control"
                    v-model="form.image_full"
                />
                <img
                    :src="form.image_full"
                    alt=""
                    class="img-fluid image_full"
                />
            </div>
            <div class="col-sm-12">
                <button class="btn btn-primary">SAVE</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    props: ["property", "property_types"],
    data() {
        return {
            form: this.property,
        };
    },

    methods: {
        async save(id) {
            await axios.put("/properties/" + id, this.form).then((response) => {
                alert(response.data.message);
                setTimeout(() => {
                    window.location.href = "http://127.0.0.1:8000/properties";
                }, 1500);
            });
        },
    },
    watch: {
        form() {
            form.property_type = JSON.parse(form.property_type).id;
        },
    },
};
</script>

<style lang="scss">
.container {
    padding-top: 2rem;
    h2 {
        padding-bottom: 2rem;
    }

    .form {
        &-group {
            padding-bottom: 1.5rem;
            img {
                padding-top: 0.5rem;
            }

            .image_thumbnail {
                height: 100px;
                width: 100px;
                object-fit: contain;
            }

            .image_full {
                height: 100px;
                width: 400px;
                object-fit: contain;
            }
        }
    }
}
</style>
