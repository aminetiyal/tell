<template>
  <Main :title="post.title">
    {{post}}
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
      postService.show(this.$route.params.post)
      .then(response => {
        this.post = response.data.data
      })
    }
  },
  mounted() {
    this.getPost();
  }
};
</script>