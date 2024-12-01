<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { ref, computed } from 'vue';
    import StackedBarChart from '@/Components/Charts/StackedBarChart.vue';

    const props = defineProps({
        assets: {
            type: Array,
            required: true,
            default: () => [],
        },
    });

    const assets = ref(props.assets.map(asset => ({ ...asset })));
    
    const labels = computed(() => {
        // Supposons que toutes les actions ont les mêmes dates
        return assets.value[0].historicalData.map((data) => data.date);
    });

    const datasets = computed(() => {
        return assets.value.map((stock) => ({
            label: stock.name,
            data: stock.historicalData.map((data) => data.value),
            backgroundColor: stock.backgroundColor,
        }));
    });
</script>

<template>
    <AuthenticatedLayout>
        <div>
            <StackedBarChart :datasets="datasets" :labels="labels" />
        </div>
    </AuthenticatedLayout>
</template>