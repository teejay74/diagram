<template>
    <div style="height:600px;width: 600px; display: flex;flex-direction:column;">
        {{ test }}
        <vue3-chart-js
            :id="doughnutChart.id"
            :type="doughnutChart.type"
            :data="doughnutChart.data"

        ></vue3-chart-js>
    </div>
</template>

<script>
    import Vue3ChartJs from '@j-t-mcc/vue3-chartjs'

    export default {
        name: 'Diagram',
        components: {
            Vue3ChartJs,
        },
        setup () {
            const doughnutChart = {
                id: 'doughnut',
                type: 'line',
                data: {
                    labels: ['01/01/2021', '01/02/2021', '01/03/2021', '01/04/2021'],
                    datasets: [
                        {
                            backgroundColor: [
                                '#41B883',
                                '#E46651',
                                '#00D8FF',
                                '#DD1B16'
                            ],
                            data: [40, 20, 80, 10]
                        }
                    ]
                }
            }
            const test = '123'


            return {
                doughnutChart, test
            }
        },
    }
</script>

<style scoped>

</style>
