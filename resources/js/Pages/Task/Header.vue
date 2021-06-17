<template>
    <div class="container-fluid bg-dark mb-3">
        <div class="container">
            <nav class="sm:flex items-center justify-between">
                <h2 class="mr-4">Vue Laravel SPA</h2>
                <div>
                  <inertia-link :href="route('task.index')"  class="bg-blue-500 hover:bg-blue-700 border border-solid rounded-md p-3 text-white font-bold mr-4" >
                      List
                  </inertia-link>
                  <inertia-link :href="route('task.create')" class="bg-green-500 hover:bg-green-700 border border-solid rounded-md p-3 text-white font-bold">
                      ADD
                  </inertia-link>
                </div>
            </nav>
        </div>
    </div>
</template>


<script>
export default {
  
}
</script>
