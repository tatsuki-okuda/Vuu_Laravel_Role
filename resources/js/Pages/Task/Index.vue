<template>
  <app-layout>
    <template #header>
        <Header></Header>
    </template>

    <template #default>
      <div class="container">
        <table class="table table-hover">
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Content</th>
              <th scope="col">Person In Charge</th>
              <th scope="col">Show</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(task, index) in tasks" :key="index">
              <th scope="row">{{ task.id }}</th>
              <td>{{ task.title }}</td>
              <td>{{ task.content }}</td>
              <td>{{ task.person_in_charge }}</td>
              <!-- 後々各コンポーネントを実装したらリンク先を設定 -->
              <td>
                <!-- <router-link v-bind:to="{name: 'task.show', params: { taskId: task.id.toString() }}">
                  <button class="btn btn-primary">Show</button>
                </router-link> -->

                <!-- <inertia-link :href="route('task.show')">
                    <button class="btn btn-primary">Show</button>
                </inertia-link> -->
              </td>
              <td>
                <!-- <inertia-link :href="route('task.edit')">
                    <button class="btn btn-success">Edit</button>
                </inertia-link> -->

                <!-- <router-link v-bind:to="{name: 'task.edit', params: { taskId: task.id.toString() }}">
                  <button class="btn btn-success">Edit</button>
                </router-link> -->
              </td>
              <td>
                  <button class="btn btn-danger" v-on:click="deleteTask(task.id)">Delete</button>
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
}
</script>