<template>
  <Main :title="post.title">
    <template v-slot:page_buttons v-if="isAuth">
        <div class="inline-flex rounded-md shadow">
          <router-link
            :to="{ name: 'posts.edit', params: { post: $route.params.post }}"
            class="inline-flex items-center justify-center px-5 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out"
          >Edit</router-link>
        </div>
    </template>
    <div v-html="post.body"></div>
  </Main>
</template>

<script>
import Main from "../../components/Templates/MainLayout/Main";
import postService from "../../services/PostService";

export default {
  components: {
    Main
  },
  data() {
    return {
      post: {}
    };
  },
  methods: {
    getPost() {
      postService.show(this.$route.params.post).then(response => {
        this.post = response.data.data;
      });
    }
  },
  mounted() {
    this.getPost();
  }
};
</script>