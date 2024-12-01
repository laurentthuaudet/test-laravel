<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import { ref, computed } from 'vue';
    import PieChart from '@/Components/Charts/PieChart.vue';

    const props = defineProps({
        stocks: {
            type: Array,
            required: true,
            default: () => [],
        },
    });
    console.log(props.stocks);
    const stocks = ref(props.stocks.map(stock => ({ ...stock, selected: true })));

    const selectedStocks = computed(() => {
        return stocks.value.filter(stock => stock.selected);
    });

    const chartData = computed(() => {
        return selectedStocks.value.map(stock => stock.quantity * stock.price);
    });

    const chartLabels = computed(() => {
        return selectedStocks.value.map(stock => stock.name);
    });
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>
        <h1 class="text-2xl font-bold mb-4">Mon Portefeuille d'Actions</h1>
        <div v-if="!stocks.length">Pas de données</div>
        <div v-if="stocks.length">
            <table class="table-auto w-full mb-6">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Sélectionner</th>
                        <th class="px-4 py-2">Nom</th>
                        <th class="px-4 py-2">Symbole</th>
                        <th class="px-4 py-2">Quantité</th>
                        <th class="px-4 py-2">Prix</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="stock in stocks" :key="stock.id">
                        <td class="border px-4 py-2 text-center">
                            <input type="checkbox" v-model="stock.selected" @change="updateChart">
                        </td>
                        <td class="border px-4 py-2">{{ stock.name }}</td>
                        <td class="border px-4 py-2">{{ stock.symbol }}</td>
                        <td class="border px-4 py-2">{{ stock.quantity }}</td>
                        <td class="border px-4 py-2">{{ stock.price }}</td>
                    </tr>
                </tbody>
            </table>
            <PieChart :data="chartData" :labels="chartLabels" />
        </div>
    </AuthenticatedLayout>
</template>
