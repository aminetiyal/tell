<template>
  <router-link :to="{name:'posts.show', params: {post: post.slug}}">
    <div class="py-3">
      <div
        class="flex max-w-3xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-1"
      >
        <div
          class="w-1/3 bg-cover"
          :style="{'background-image': 'url(' + post.image + ')'}"
        ></div>
        <div class="w-2/3 p-4">
          <h1 class="text-gray-900 font-bold text-2xl">{{post.title}}</h1>
          <p class="mt-2 text-gray-600 text-base">{{post.excerpt}}</p>
          <div class="flex item-center mt-2">
            <p class="mt-2 text-gray-600 text-sm">Published At: {{post.published_at}}</p>
          </div>
        </div>
      </div>
    </div>
  </router-link>
</template>

<script>
export default {
  props: ["post"],
  methods: {
    stripTags(text) {
      return text.replace(/(<([^>]+)>)/gi, "");
    }
  },
  computed: {
    postBody() {
      let body = this.stripTags(this.post.body);
      return body.length > 100 ? body.substring(0, 100) + "..." : body;
    }
  }
};
</script>
