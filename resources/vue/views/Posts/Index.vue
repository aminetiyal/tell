<template>
  <Main title="Posts">
    <PostCard />
    <PostCard />
    <PostCard />
  </Main>
</template>

<script>
import Main from "../../components/Templates/MainLayout/Main";
import PostCard from "../../components/Posts/Card";

export default {
  components: {
    Main,
    PostCard
  },
  data() {
    return {
      //
    };
  },
  methods: {
    //
  }
};
</script>