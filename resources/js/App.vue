<template>
    <router-link :to="'/admin'">Админка</router-link>
    <br />
    <router-link :to="'/'" >Клиент</router-link>
    <br />
    <router-view></router-view>
</template>

<script>
    import Client from "./views/Client";
    export default {
        name: 'App'
    }

</script>

<style scoped>

</style>
