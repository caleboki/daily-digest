<template>
    <div
      class="fixed inset-0 flex items-center justify-center z-50"
      @click.self="$emit('close')"
      @keyup.esc="$emit('close')"
    >
      <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md relative">
        <button
          @click="$emit('close')"
          class="absolute top-2 right-2 text-gray-700 hover:text-gray-900"
        >
          &times;
        </button>
        <h3 class="text-lg font-medium text-gray-900 mb-4">Select News Preferences</h3>
        <div v-for="category in categories" :key="category">
          <input type="checkbox" :value="category" v-model="selectedPreferences" class="mr-2">
          {{ category }}
        </div>
        <button @click="savePreferences" class="mt-4 bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
          Save Preferences
        </button>
      </div>
    </div>
</template>

  <script setup>
  import { ref } from 'vue';

  const categories = ['World News', 'Technology', 'Health'];
  const selectedPreferences = ref([]);

  const savePreferences = () => {
    // Save the selected preferences to the backend
  };
  </script>
