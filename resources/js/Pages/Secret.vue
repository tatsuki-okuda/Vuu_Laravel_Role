<template>
  <app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           秘密
        </h2>
    </template>
     <template #default>
        <div class="p-8">
         <p>ほら、秘密が見れた</p>
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