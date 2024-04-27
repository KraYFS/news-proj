<template>
    <div class="row row-cards">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="subheader">Пользователей</div>
                    <div class="h3 m-0">2</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Main",
    data() {
        return {
            headerProps: [{
                breadcrumb: true,
                textBreadcrumb: 'Главная',
                nameRoute: 'main',
            }]
        }
    },
    mounted() {
        this.$emit('changeHeaderData', this.headerProps);
    }
}
</script>

<style scoped>

</style>
