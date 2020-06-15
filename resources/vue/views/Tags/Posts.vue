<template>
  <Main :title="'Tag : '+ tag">
    <PostSearch v-model="search" class="-mt-3"></PostSearch>
    <PostCard v-for="(post, $index) in posts" :post="post" :key="$index" />
    <infinite-loading :identifier="search" @infinite="getPosts">
      <div slot="no-more">{{infiniteLoading.noMore}}</div>
      <div slot="no-results">{{infiniteLoading.noResults}}</div>
    </infinite-loading>
  </Main>
</template>

<script>
import Main from "../../components/Templates/MainLayout/Main";
import PostCard from "../../components/Posts/Card";
import PostSearch from "../../components/Posts/Search";
import tagService from "../../services/TagService";
import InfiniteLoading from "vue-infinite-loading";

export default {
  components: {
    InfiniteLoading,
    Main,
    PostCard,
    PostSearch
  },
  data() {
    return {
      posts: [],
      meta: {},
      page: 1,
      search: ""
    };
  },
  methods: {
    getPosts($state = null) {
      tagService.posts(this.tag, this.page, this.search).then(({ data }) => {
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
    },
    infiniteLoading() {
      const noMore = window.Laravel.infiniteLoading.noMore ?? false;
      const noResults = window.Laravel.infiniteLoading.noResults ?? false;
      return {
        noMore: noMore,
        noResults: noResults
      };
    }
  },
  watch: {
    tag() {
      this.page = 1;
      this.posts = [];
    },
    search() {
      this.page = 1;
      this.posts = [];
    }
  },
  mounted() {
    this.posts = [];
  }
};
</script>
