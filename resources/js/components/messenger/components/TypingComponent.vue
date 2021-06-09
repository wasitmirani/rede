<template>
  <div>

                                <div class="flex lg:items-center" v-show="istyping">
                                    <div class="w-14 h-14 rounded-full relative flex-shrink-0">
                                        <img src="assets/images/avatars/avatar-1.jpg" alt="" class="absolute h-full rounded-full w-full">
                                    </div>
                                    <div class="text-gray-700 py-2 px-3 rounded bg-gray-100 relative h-full lg:ml-5 ml-2 lg:mr-20 dark:bg-gray-700 dark:text-white">

                                        <div class="flex space-x-0.5 my-2 animate-pulse">
                                            <div class="w-2 h-2 rounded-full bg-gray-400"></div>
                                            <div class="w-2 h-2 rounded-full bg-gray-300"></div>
                                            <div class="w-2 h-2 rounded-full bg-gray-300"></div>
                                        </div>
                                        <div class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-700"></div>
                                    </div>
                                </div>
  </div>
</template>

<script>
export default {
props:['istyping']
}
</script>

<style>

</style>
