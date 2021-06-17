<template>
  <app-layout>
    <template #header>
        <Header></Header>
    </template>

    <template #default>
      <div class="container my-24">
        <table lass="table-fixed">
          <thead class="">
            <tr class="bg-purple-300">
              <th scope="col" class="border px-4 py-2">#</th>
              <th scope="col" class="border px-4 py-2">Title</th>
              <th scope="col" class="border px-4 py-2">Content</th>
              <th scope="col" class="border px-4 py-2">Person In Charge</th>
              <th scope="col" class="border px-4 py-2">Show</th>
              <th scope="col" class="border px-4 py-2">Edit</th>
              <th scope="col" class="border px-4 py-2">Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(task, index) in tasks" :key="index" class="bg-gray-200">
              <th scope="row" class="border px-4 py-2 bg-gray-200">{{ task.id }}</th>
              <td class="border px-4 py-2">{{ task.title }}</td>
              <td class="border px-4 py-2" v-html:="task.content"></td>
              <td class="border px-4 py-2">{{ task.person_in_charge }}</td>
              <!-- 後々各コンポーネントを実装したらリンク先を設定 -->
              <td class="border px-4 py-2">
                <inertia-link :href="route('task.show', task.id.toString()) " class="bg-blue-500 hover:bg-blue-700 border border-solid rounded-md p-3 text-white font-bold">
                    Show
                </inertia-link>
              </td>
              <td class="border px-4 py-2">
                <inertia-link :href="route('task.edit', task.id.toString()) " class="bg-green-500 hover:bg-green-700 border border-solid rounded-md p-3 text-white font-bold">
                    Edit
                </inertia-link>
              </td>
              <td class="border px-4 py-2">
                  <button v-on:click="deleteTask(task.id)" class="bg-red-500 hover:bg-red-700 border border-solid rounded-md p-3 text-white font-bold">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </template>
  </app-layout>
</template>



<script>
import AppLayout from '@/Layouts/AppLayout';
import Header from '@/Pages/Task/Header';

export default {
  props: ['tasks'],
  components: {
      AppLayout,
      Header
  },
  
  data() {
      return {
      form: this.$inertia.form(
          {
              _method: "DELETE",
          }
      ),
      };
  },
  methods:{
      deleteTask(id){
          alert('削除しますか？');
          this.form.post(route("task.destroy", id), {
              preserveScroll: true,
          });
      }
  }
}
</script>