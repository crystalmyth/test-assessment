<template>
    <div>
        <div
            class="container d-flex align-items-center justify-content-between"
        >
            <h2>Properties</h2>
            <a href="/properties/create" class="btn btn-primary"
                >Add Property</a
            >
        </div>
        <div class="property-container container">
            <a
                v-for="(property, index) in properties.data"
                :key="`property-card-${index}`"
                class="property-card shadow"
                href="#"
            >
                <property-card :property="property" />
            </a>
        </div>
        <div class="container">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <!-- Previous -->
                    <li class="page-item">
                        <a
                            class="page-link"
                            :href="`?page=${properties.current_page - 1}`"
                            aria-label="Previous"
                        >
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item" v-if="properties.current_page >= 2">
                        <a
                            class="page-link"
                            :href="`?page=${properties.current_page - 1}`"
                            >{{ properties.current_page - 1 }}</a
                        >
                    </li>
                    <li class="page-item active" v-else>
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item" v-if="properties.current_page !== 1">
                        <a class="page-link active" href="#">{{
                            properties.current_page
                        }}</a>
                    </li>
                    <li class="page-item" v-else>
                        <a class="page-link" href="/properties?page=2">2</a>
                    </li>
                    <li class="page-item">
                        <a
                            class="page-link"
                            :href="`?page=${properties.current_page + 1}`"
                            v-if="properties.current_page !== 1"
                            >{{ properties.current_page + 1 }}</a
                        >
                        <a class="page-link" :href="`?page=3`" v-else>3</a>
                    </li>
                    <li class="page-item">
                        <a
                            class="page-link"
                            :href="`?page=${properties.current_page + 1}`"
                            aria-label="Next"
                        >
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
export default {
    props: ["properties"],
};
</script>

<style lang="scss">
.property {
    &-container {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 1.5rem;

        @media only screen and (max-width: 600px) {
            grid-template-columns: repeat(1, 1fr);
        }
    }
}
</style>
