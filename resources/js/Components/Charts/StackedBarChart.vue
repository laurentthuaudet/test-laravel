<template>
    <canvas ref="canvas"></canvas>
  </template>
  
  <script>
  import { ref, onMounted, watch } from 'vue';
  import { Chart } from 'chart.js/auto';
  
  export default {
    name: 'StackedBarChart',
    props: {
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
    },
    setup(props) {
      const canvas = ref(null);
      let chartInstance = null;
  
      const renderChart = () => {
        if (chartInstance) {
          chartInstance.destroy();
        }
  
        chartInstance = new Chart(canvas.value.getContext('2d'), {
          type: 'bar',
          data: {
            labels: props.labels,
            datasets: props.datasets,
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              x: {
                stacked: true,
              },
              y: {
                stacked: true,
              },
            },
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
        },
        { deep: true }
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
    height: 600px !important;
  }
  </style>
  