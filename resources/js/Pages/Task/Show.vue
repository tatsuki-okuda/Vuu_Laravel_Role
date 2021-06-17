<template>
  <app-layout>
    <template #header>
        <Header></Header>
    </template>

    <template #default>
      <div>
          <form class="grid grid-cols-1 gap-6 m-16">
              <div class="">
                  <label for="id" class="text-gray-700 text-2xl mb-3 block">ID</label>
                  <input type="text" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                        readonly id="id"
                        v-model="task.id"
                  >
              </div>
              <div class="">
                  <label for="title" class="text-gray-700 text-2xl mb-3 block">Title</label>
                  <input type="text" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                        readonly id="title"
                        v-model="task.title"
                  >
              </div>
              <div class="">
                  <label for="content" class="text-gray-700 text-2xl mb-3 block">Content</label>
                  <input type="text" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                        readonly 
                        id="content"
                        v-model="task.content"
                  >
              </div>
              <div class="">
                  <label for="person-in-charge" class="text-gray-700 text-2xl mb-3 block">Person In Charge</label>
                  <input type="text" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                        readonly id="person-in-charge"
                        v-model="task.person_in_charge"
                  >
              </div>
          </form>
      </div>
    </template>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout';
import Header from '@/Pages/Task/Header';

export default {
  props: ['task'],
  components: {
      AppLayout,
      Header
  },
}
</script>