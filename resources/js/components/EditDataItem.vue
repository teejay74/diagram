<template>
    <li>{{ item.date }}</li>
    <input type="number" v-model="dataForm.value" @change="editItem(dataForm)">
    <div class="btn-del" @click="deleteItem(dataForm)">x</div>
</template>

<script>

    export default {
        name: "EditDataItem",
        props: ['item'],
        emits: ['delete-item'],
        setup(prop, { emit }) {
            const dataForm = prop.item
            const editItem = (el) => {
                axios.post('/api/edit-diagram', el).then(response => {
                    console.log(response.data)
                })
            }
            const deleteItem = (el) => {
                axios.post('/api/delete-item', el).then(response => {
                    console.log(response.data)
                    emit('delete-item')
                })

            }
            return { dataForm, editItem, deleteItem }
        }
    }
</script>

<style scoped>
    input {
        margin: 0 10px;
        width: 50px;
    }
    .btn-del {
        cursor: pointer;
    }
</style>
