<template>
  <app-layout>
    <template #header>
        <Header></Header>
    </template>

    <template #default>
      <div>
          <form class="grid grid-cols-1 gap-6 m-16" @submit.prevent="submit">
              <!-- <div class="">
                  <label for="id" class="text-gray-700 text-2xl mb-3 block">ID</label>
                  <input type="text" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                        readonly id="id"
                        v-model="task.id"
                  >
              </div> -->
              <div class="">
                  <label for="title" class="text-gray-700 text-2xl mb-3 block">Title</label>
                  <input type="text" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                        v-model="form.title"
                  >
              </div>
              <div class="">
                  <label for="content" class="text-gray-700 text-2xl mb-3 block">Content</label>
                  <!-- <input type="text" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                        readonly 
                        id="content"
                        v-model="task.content"
                  > -->
                  <div>
                      <ckeditor
                          :editor="editor"
                          v-model="form.content"
                          :config="editorConfig"
                      ></ckeditor>
                  </div>
              </div>
              <div class="">
                  <label for="person-in-charge" class="text-gray-700 text-2xl mb-3 block">Person In Charge</label>
                  <input type="text" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                        v-model="form.person_in_charge"
                  >
              </div>
              
              <button type="submit" class="bg-blue-500 hover:bg-blue-700 border border-solid rounded-md p-3 text-white font-bold">作成</button>
          </form>
      </div>
    </template>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout';
import Header from '@/Pages/Task/Header';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export default {
  props: ['task'],
  components: {
      AppLayout,
      Header,
      ClassicEditor
  },
  data() {
      return {
        form: this.$inertia.form(
            {
              _method: "POST",
              title: "",
              content: "",
              person_in_charge: ""
            },
            {
              bag: "taskCreate",
              resetOnSuccess: false,
            }
        ),
        editor: ClassicEditor,
        editorConfig: {
            language: 'ja'
        }
      };
    },
    methods:{
      submit(){
        console.log(this.task);
        this.form.post(route("task.store"));
      }
    }
}
</script>