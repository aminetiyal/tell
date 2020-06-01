<template>
  <router-link to="/posts/post-test">
    <div class="py-3">
      <div
        class="flex max-w-3xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-1"
      >
        <div
          class="w-1/3 bg-cover"
          style="background-image: url('https://images.unsplash.com/photo-1494726161322-5360d4d0eeae?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80')"
        ></div>
        <div class="w-2/3 p-4">
          <h1 class="text-gray-900 font-bold text-2xl">post title</h1>
          <p class="mt-2 text-gray-600 text-base">
              Lorem ipsum dolor sit amet consectetur adipisicing elit In odit exercitationem fuga id nam quia
              </p>
          <div class="flex item-center mt-2">
              <p class="mt-2 text-gray-600 text-sm">Published At: 2020-20-15</p>
          </div>
        </div>
      </div>
    </div>
  </router-link>
</template>

<script>
export default {};
</script>
