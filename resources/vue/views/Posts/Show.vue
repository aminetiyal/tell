<template>
  <Main :title="post.title" v-if="!loading">
    <template v-slot:page_buttons v-if="isAuth">
      <div class="inline-flex rounded-md shadow">
        <router-link
          :to="{ name: 'posts.edit', params: { post: $route.params.post }}"
          class="inline-flex items-center justify-center px-5 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out"
        >Edit</router-link>
      </div>
    </template>

    <template v-slot:page_description>
      <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mr-6">
        <font-awesome-icon icon="clock" full-width class="text-gray-400 mr-2" />
        {{published_at}}
      </div>
      <div
        class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mr-6"
        v-if="post.tags.length !== 0"
      >
        <font-awesome-icon icon="tags" full-width class="text-gray-400 mr-1" />
        <div class="flex flex-wrap items-center -ml-1">
          <div class="px-1" v-for="tag in post.tags" :key="tag.id">
            <router-link
              :to="{name:'tags.posts', params: {tag: tag.name}}"
              class="inline-block bg-gray-200 text-gray-800 text-xs px-2 rounded-full uppercase font-semibold tracking-wide hover:bg-gray-300 hover:text-gray-900"
            >{{tag.name}}</router-link>
          </div>
        </div>
      </div>
    </template>
    <div v-html="post.body" class="post">
      <pre>
            <code></code>
            </pre>
    </div>
    <div class="mt-4">
      <SocialButtons :post="post"></SocialButtons>
    </div>
  </Main>
</template>

<script>
import Main from "../../components/Templates/MainLayout/Main";
import SocialButtons from "../../components/Utilities/SocialButtons";
import postService from "../../services/PostService";

export default {
  components: {
    Main,
    SocialButtons
  },
  data() {
    return {
      loading: true,
      post: {}
    };
  },
  methods: {
    getPost() {
      postService
        .show(this.$route.params.post)
        .then(response => {
          this.post = response.data.data;
          this.loading = false;
        })
        .catch(error => {
          this.$router.push({ name: "posts.index" });
          swal({
            title: "Post Not Found !",
            icon: "error",
            timer: 3000
          });
        });
    }
  },
  computed: {
    published_at() {
      const options = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric"
      };

      return new Date(this.post.published_at).toLocaleDateString(
        "en-us",
        options
      );
    }
  },
  mounted() {
    this.getPost();
  }
};
</script>
