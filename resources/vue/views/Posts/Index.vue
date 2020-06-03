<template>
  <Main title="Posts">
    <PostCard v-for="post in posts" :key="post.id" :post="post"/>
  </Main>
</template>

<script>
import Main from "../../components/Templates/MainLayout/Main";
import PostCard from "../../components/Posts/Card";
import postService from "../../services/PostService";


export default {
  components: {
    Main,
    PostCard
  },
  data() {
    return {
      posts: []
    };
  },
  methods: {
    getPosts() {
      postService.index()
      .then(response => {
        this.posts = response.data.data
      })
    }
  },
  mounted() {
    this.getPosts();
  }
};
</script>