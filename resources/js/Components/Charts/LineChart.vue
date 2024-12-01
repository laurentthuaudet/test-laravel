<template>
    <canvas ref="canvas"></canvas>
</template>
<script setup>
    import { ref, onMounted, watch } from 'vue';
    import { Chart } from 'chart.js/auto';

    const props = defineProps({
        datasets: {
            type: Array,
            required: true,
        },
        labels: {
            type: Array,
            required: true,
        },
        options: {
            type: Object,
            default: () => ({}),
        },
    });

    const canvas = ref(null);
    let chartInstance = null;

    const renderChart = () => {
        if (chartInstance) {
            chartInstance.destroy();
        }

        chartInstance = new Chart(canvas.value.getContext('2d'), {
            type: 'line',
            data: {
                labels: props.labels,
                datasets: props.datasets,
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                ...props.options,
            },
        });
    };

    onMounted(() => {
        renderChart();
    });

    watch(
        () => [props.datasets, props.labels],
        () => {
            renderChart();
        }
    );
</script>
