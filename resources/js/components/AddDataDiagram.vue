<template>
    <form method="post" accept-charset="utf-8">
        <input
            type="number"
            name="meaning"
            required>
        <input type="date">

        <div>
            <input type="submit" value="Добавить значение" @click.prevent="dataSave">
        </div>
        <div>
            <input type="submit" value="Тест" @click.prevent="testGet">
        </div>
    </form>
</template>

<script>




    export default {
        name: "AddDataDiagram",
        setup() {
            function dataSave() {
                axios.post('/api/save-diagram','123').then(response => {
                    console.log(response.data)
                }).catch(error => console.error(error));

            }

            function testGet() {
                axios.get('api/test-api').then(response => {
                 console.log(response.data)
               }).catch(error => console.error(error));

            }
            return {dataSave, testGet}
        }
    }

</script>

<style scoped>

</style>
