<template>
    <h2>Test Diagram</h2>
    <div style="max-width: 600px">
        <div style="width: 500px">
            <vue3-chart-js
                ref="chartRef"
                v-bind="{ ...doughnutChart }"

            />
        </div>
    </div>
</template>

<script>
    import { ref, onMounted  } from "vue";
    import Vue3ChartJs from "@j-t-mcc/vue3-chartjs";

    export default {
        name: "App",
        components: {
            Vue3ChartJs,
        },
        setup() {

            const chartRef = ref(null);

            const doughnutChart = {
                type: "line",
                data: {
                    labels: [],
                    datasets: [
                        {
                            backgroundColor: [],
                            data: [],
                        },
                    ],
                },
                options: {
                    cutout: "10%",
                    plugins: {},
                },
            };
            const getData = () => {
                axios.get('/api/data-get').then(response => {
                    console.log(response.data)
                    response.data.forEach(el => {
                        doughnutChart.data.datasets[0].data.push(el.value)
                        doughnutChart.data.datasets[0].backgroundColor.push("#" + Math.floor(Math.random() * 16777215).toString(16))
                        doughnutChart.data.labels.push(el.date)
                    })
                    chartRef.value.update(750);

                })
            }
            onMounted(getData)

            return {
                doughnutChart,

                chartRef,
            };
        },
    };
</script>
