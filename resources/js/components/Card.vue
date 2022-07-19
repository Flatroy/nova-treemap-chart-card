<template>
    <Card class="flex flex-col items-center justify-center p-4">
        <div class="flex items-center">
            <h3 class="text-sm font-bold leading-tight">{{ card.title }}</h3>
        </div>
        <div class="nova-treemap-chart">
            <VueApexCharts
                type="treemap"
                height="350"
                width="100%"
                :options="chartOptions"
                :series="series"
                style="margin: auto"
            ></VueApexCharts>
        </div>
    </Card>
</template>

<script>
    import VueApexCharts from 'vue3-apexcharts';

    export default {
        props: ['card'],
        components: { VueApexCharts },
        data: function () {
            return {
                series: [
                    {
                        data: [],
                    },
                ],
                chartOptions: {
                    yaxis: {
                        labels: {
                            /**
                             * Allows users to apply a custom formatter function to yaxis labels.
                             *
                             * @param { String } value - The generated value of the y-axis tick
                             * @param { index } index of the tick / currently executing iteration in yaxis labels array
                             */
                            formatter: function (value, index) {
                                //round with 2 numbers after comma
                                return (value * 100).toFixed(2) + '%';
                            },
                        },
                    },
                    tooltip: {
                        /*custom: function ({ series, seriesIndex, dataPointIndex, w }) {
                            return (
                                '<div class="arrow_box">' +
                                '<span>' +
                                w.globals.categoryLabels[dataPointIndex] +
                                (series[seriesIndex][dataPointIndex] * 100).toFixed(2) +
                                '%' +
                                '</span>' +
                                '</div>'
                            );
                        },*/
                    },
                    legend: {
                        show: false,
                    },
                    chart: {
                        width: '100%',
                        height: 350,
                        type: 'treemap',
                        toolbar: {
                            show: false,
                        },
                    },
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontSize: '12px',
                            textOverflow: 'ellipsis',
                            overflow: 'hidden',
                        },
                    },
                    plotOptions: {
                        treemap: {
                            enableShades: true,
                            shadeIntensity: 0.001,
                            colorScale: {
                                ranges: [
                                    {
                                        from: 0,
                                        to: 0.0399,
                                        color: '#542BD9',
                                    },
                                    {
                                        from: 0.04,
                                        to: 0.0499,
                                        color: '#31BACC',
                                    },
                                    {
                                        from: 0.05,
                                        to: 0.01,
                                        color: '#D92BC5',
                                    },
                                ],
                            },
                        },
                    },
                },
            };
        },
        methods: {
            updateChart() {
                let data = this.card.series;
                data = data.sort((a, b) => b.y + a.y);

                this.series = [
                    {
                        data: data,
                    },
                ];
            },
        },
        mounted() {
            this.$nextTick(() => {
                this.updateChart();
            });
        },
    };
</script>

<style>
    .nova-treemap-chart {
        width: 100%;
        padding-left: 18px;
    }
</style>
