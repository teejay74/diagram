<template>
    <h2>Добавление данных графика:</h2>
    <form method="post" accept-charset="utf-8">
        <input
            type="number"
            name="meaning"
            v-model="meaning"

            required>
        <input type="date" v-model="date">

        <div>
            <input type="submit" value="Сохранить"  @click.prevent="dataSave">
        </div>

    </form>

    <div>
        <h2>Редактор данных графика:</h2>
        <ul class="item-container">
            <EditDataItem v-for="item in dataList"
                          :item="item"
                            @delete-item="getData"
            ></EditDataItem>
        </ul>
    </div>
</template>

<script>
    import {onMounted, ref, reactive, toRef, toRefs} from 'vue';
    import EditDataItem from "./EditDataItem";
    export default {
        name: "AddDataDiagram",
        components: { EditDataItem },
        setup() {
            const meaning = ref(0)
            const date = ref('')
            const dataSave = () => {
                const formData = {
                    meaning: meaning.value,
                    date: date.value
                }
                axios.post('/api/save-diagram',formData).then(response => {
                    meaning.value = 0
                    date.value = ''
                    getData()

                }).catch(error => console.error(error));
            }
            let dataList = ref([])
            const getData = () => {
                axios.get('/api/data-get').then(response => {
                     dataList.value = response.data
                    }
                )
            }
            onMounted(getData)
            return {dataSave, meaning, date, dataList, getData }
        }



    }
</script>

<style scoped>
    .item-container {
        display: flex;
        flex-wrap: wrap;
        width: 200px;

    }
</style>
