<template>
  <app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           更新画面
        </h2>
    </template>
     <template #default>
        <div class="p-8">
         <p>やばい値は書き換えるよ。何を変えたい？</p>
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