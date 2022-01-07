<template>
    <form method="post" accept-charset="utf-8">
            <input
                type="number"
                name="meaning"
                required>
            <input type="date">

        <div>
            <input type="submit" value="Добавить значение" >
        </div>
    </form>
</template>

<script>
    export default {
        name: "AddDataDiagram"
    }
</script>

<style scoped>

</style>
