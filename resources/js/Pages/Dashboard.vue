<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PreferenceModal from './PreferenceModal.vue';

import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import axios from 'axios';

const preferences = ref([]);
const showPreferenceModal = ref(false);


const fetchPreferences = async () => {
    try {
        const response = await axios.get('/api/preferences');
        preferences.value = response.data;
    } catch (error) {
        console.error('Error fetching preferences:', error);
    }
};

onMounted(fetchPreferences);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-2xl font-semibold text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-6 md:py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <p class="text-gray-700 mb-4">You're logged in!</p>
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Your News Preferences:</h3>
                    <ul class="list-disc pl-5 mb-4">
                        <li v-for="preference in preferences" :key="preference" class="text-gray-600 mb-2">{{ preference }}</li>
                    </ul>
                    <!-- <button class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Modify Preferences
                    </button> -->
                    <button @click="showPreferenceModal = true" class="mt-4 bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Modify Preferences
                    </button>
                    <PreferenceModal v-if="showPreferenceModal" @close="showPreferenceModal = false" />

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
