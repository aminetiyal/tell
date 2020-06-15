<template>
  <Main title="Posts">
    <PostSearch v-model="search"></PostSearch>
    <PostCard v-for="(post, $index) in filtredPosts" :post="post" :key="$index" />
    <infinite-loading :identifier="search" @infinite="getPosts">
      <div slot="no-more">{{infiniteLoading.noMore}}</div>
      <div slot="no-results">{{infiniteLoading.noResult}}</div>
    </infinite-loading>
  </Main>
</template>

<script>
import Main from "../../components/Templates/MainLayout/Main";
import PostCard from "../../components/Posts/Card";
import PostSearch from "../../components/Posts/Search";
import postService from "../../services/PostService";
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
    getPosts($state) {
      postService.index(this.page, this.search).then(({ data }) => {
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
    filtredPosts() {
      return this.uniqueArrayOfObjects(this.posts, (item, duplicatedItem) => item.slug == duplicatedItem.slug);
    },
    infiniteLoading() {
        const noMore = window.Laravel.infiniteLoading.noMore ?? false;
        const noResult = window.Laravel.infiniteLoading.noResult ?? false;
        return {
            noMore: noMore,
            noResult: noResult
        }
    }
  },
  watch: {
    search() {
      this.page = 1;
      this.posts = [];
    }
  }
};
</script>
