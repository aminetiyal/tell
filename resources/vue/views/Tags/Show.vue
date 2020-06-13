<template>
  <Main :title="'Tag : '+ tag">
    <PostCard v-for="(post, $index) in posts" :post="post" :key="$index" />
    <infinite-loading :identifier="tag" @infinite="getPosts">
      <!--<div slot="spinner">Loading {{meta.from}} from {{meta.total}}</div>-->
      <!--<div slot="no-more">No more stores, {{meta.total}} in total</div>-->
      <!--<div slot="no-results">No results</div>-->
    </infinite-loading>
  </Main>
</template>

<script>
import Main from "../../components/Templates/MainLayout/Main";
import PostCard from "../../components/Posts/Card";
import tagService from "../../services/TagService";
import InfiniteLoading from "vue-infinite-loading";

export default {
  components: {
    InfiniteLoading,
    Main,
    PostCard
  },
  data() {
    return {
      posts: [],
      meta: {},
      page: 1
    };
  },
  methods: {
    getPosts($state = null) {
      tagService.posts(this.tag, this.page, "").then(({ data }) => {
        console.log("getPosts -> data", data);

        if (data.data.length) {
          this.meta = data.meta;
          this.page += 1;
          this.posts.push(...data.data);
          $state.loaded();
        } else {
          $state.complete();
        }
      });
    }
  },
  computed: {
    tag() {
      const tag = this.$route.params.tag;
      return tag;
    }
  },
  watch: {
    tag() {
      this.page = 1;
      this.posts = [];
    }
  },
  mounted() {
    this.posts = [];
  }
};
</script>