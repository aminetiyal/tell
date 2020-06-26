<template>
  <div class="flex -mx-1">
    <ShareNetwork
      class="mx-1 rounded-md px-2 flex bg-blue-600 cursor-pointer hover:bg-blue-700 active:bg-blue-600 text-sm text-white font-semibold leading-tight shadow-md focus:outline-none"
      network="twitter"
      :url="currentUrl"
      :title="post.title"
      :description="post.excerpt"
      :hashtags="hashtags"
    >
      <font-awesome-icon
        :icon="['fab', 'twitter']"
        size="lg"
        class="fill-curent text-white m-2 sm:m-0 sm:my-auto sm:mr-2"
      />
      <p class="my-2 hidden sm:block">twitter</p>
    </ShareNetwork>

    <ShareNetwork
      class="mx-1 rounded-md px-2 flex bg-blue-700 cursor-pointer hover:bg-blue-800 active:bg-blue-700 text-sm text-white font-semibold leading-tight shadow-md focus:outline-none"
      network="facebook"
      :url="currentUrl"
      :title="post.title"
      :description="post.excerpt"
      :hashtags="hashtags"
    >
      <font-awesome-icon
        :icon="['fab', 'facebook']"
        size="lg"
        class="fill-curent text-white m-2 sm:m-0 sm:my-auto sm:mr-2"
      />
      <p class="my-2 hidden sm:block">facebook</p>
    </ShareNetwork>
  </div>
</template>

<script>
export default {
  props: ["post"],
  data() {
    return {};
  },
  computed: {
    hashtags() {
      return this.post.tags.map(tag => tag.name).join(",");
    },
    currentUrl() {
      return window.location.href;
    }
  },
  metaInfo() {
    return {
      meta: [
        // Twitter Card
        { name: "twitter:card", content: "summary" },
        { name: "twitter:title", content: this.post.title },
        { name: "twitter:description", content: this.post.excerpt },
        {
          name: "twitter:image",
          content: window.location.origin + this.post.image
        },
        // Facebook OpenGraph
        { property: "og:url", content: this.currentUrl },
        { property: "og:type", content: "article" },
        { property: "og:title", content: this.post.title },
        { property: "og:description", content: this.post.excerpt },
        {
          property: "og:image",
          content: window.location.origin + this.post.image
        }
      ]
    };
  }
};
</script>
