<template>
  <canvas ref="canvas"></canvas>
</template>

<script>
  import { ref, onMounted, watch } from 'vue';
  import { Chart } from 'chart.js/auto';

  export default {
    name: 'PieChart',
    props: {
      data: {
        type: Array,
        required: true,
      },
      labels: {
        type: Array,
        required: true,
      },
    },
    setup(props) {
      const canvas = ref(null);
      let chartInstance = null;

      const renderChart = () => {
        if (chartInstance) {
          chartInstance.destroy();
        }
        chartInstance = new Chart(canvas.value.getContext('2d'), {
          type: 'pie',
          data: {
            datasets: [
              {
                data: props.data,
                backgroundColor: [
                  '#FF6384',
                  '#36A2EB',
                  '#FFCE56',
                  '#4BC0C0',
                  '#9966FF',
                  '#FF9F40',
                  '#4D5360',
                ],
              },
            ],
            labels: props.labels,
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
          },
        });
      };

      onMounted(() => {
        renderChart();
      });

      watch(
        () => [props.data, props.labels],
        () => {
          renderChart();
        }
      );

      return {
        canvas,
      };
    },
  };
</script>

<style scoped>
  canvas {
    width: 100%;
    height: 400px !important;
  }
</style>