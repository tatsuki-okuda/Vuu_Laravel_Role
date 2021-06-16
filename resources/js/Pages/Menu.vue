<template>
  <app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Blog
        </h2>
    </template>
     <template #default>
        <div class="p-8">
          <p>こんにちは {{ user.name }}さん</p>
          <inertia-link :href="route('input.show')" class="ml-4 text-sm text-gray-700 underline text-3xl">
              照会処理
          </inertia-link>
          <inertia-link v-if=" user.access_auth != '0' " :href="route('input.edit')" class="ml-4 text-sm text-gray-700 underline text-3xl">
              更新処理
          </inertia-link>
          <inertia-link v-if=" user.access_auth === '9' " :href="route('secret')" class="ml-4 text-sm text-gray-700 underline text-3xl">
              秘密
          </inertia-link>
        </div>
    </template>
  </app-layout>
</template>


<script>
import AppLayout from '@/Layouts/AppLayout';

export default {
  props: ['user'],
  components: {
      AppLayout
  },
}
</script>