<template>

</template>

<script>
export default {
    data() {
        return {
            filters: {
                nameQuery: null,
                bedroomsNumber: 4,
                bathroomsNumber: null,
                storeysNumber: null,
                garagesNumber: null,
                priceFrom: null,
                priceTo: null,
                orderBy: null,
                asc: true,
            },
            housesList: [],
        }
    },
    methods: {
        getData(params) {
            window.axios.get('/api/houses', {params: params}).then((res) => {
                this.housesList = res.data;
            })
        }
    },
    mounted() {
        this.getData(this.filters);
    }
}
</script>
