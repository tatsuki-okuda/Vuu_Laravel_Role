<template>
  <app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           照会画面
        </h2>
    </template>
    <template #default>
        <div class="p-8">
         <p>なんでも見せるよ！何が見たい？</p>
        </div>
    </template>
  </app-layout>
</template>



<script>
import AppLayout from '@/Layouts/AppLayout';

export default {
  components: {
      AppLayout
  },
}
</script>