<template>
    <div @mouseover="show = true" @mouseleave="show = false" class="mb-1">
        <img
            :src="property.image_thumbnail"
            :alt="property.image_thumbnail"
            class="img-fluid"
        />
        <h4 class="property-card-title">
            {{ property.address }}, {{ property.county }}<br />
            {{ property.country }}
        </h4>

        <div class="property-card-buttons" v-if="show">
            <a
                :href="`/properties/${property.id}/edit`"
                class="btn btn-sm btn-primary"
                ><i class="bx bx-pen"></i
            ></a>
            <button @click="Delete(property.id)" class="btn btn-sm btn-danger">
                <i class="bx bx-trash"></i>
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: ["property"],
    data() {
        return {
            show: false,
        };
    },
    methods: {
        async Delete(id) {
            await axios.delete("/properties/" + id).then((response) => {
                alert(response.data.message);
                setTimeout(() => {
                    window.location.href = "http://127.0.0.1:8000/properties";
                }, 1500);
            });
        },
    },
};
</script>

<style lang="scss">
.property {
    &-card {
        text-decoration: none;
        position: relative;
        color: #333;
        padding-bottom: 2rem;
        .img-fluid {
            width: 100%;
            object-fit: contain;
        }

        &-title {
            font-size: 1rem;
            padding: 1rem 0rem;
            padding: 1rem;
        }

        &-buttons {
            position: absolute;
            bottom: 0rem;
            left: 0;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem;
        }
    }
}
</style>
