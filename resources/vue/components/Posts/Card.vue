<template>
  <router-link :to="{name:'posts.show', params: {post: post.slug}}">
    <div class="py-3">
      <div
        class="flex max-w-3xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-1"
      >
        <div class="w-1/3 bg-cover" :style="{'background-image': 'url(' + post.image + ')'}"></div>
        <div class="w-2/3 p-4">
          <h1 class="text-gray-900 font-bold text-2xl">{{post.title}}</h1>
          <p class="mt-2 text-gray-600 text-base">{{post.excerpt}}</p>
          <div class="flex gap-1 items-baseline mt-2 -mx-1">
            <div class="px-1" v-for="tag in post.tags" :key="tag.id">
              <span
              class="inline-block bg-teal-200 text-teal-800 text-xs px-2 rounded-full uppercase font-semibold tracking-wide"
            >{{tag.name}}</span>
            </div>
          </div>
          <div class="flex item-center mt-2">
            <p class="text-gray-600 text-sm">Published At: {{post.published_at}}</p>
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
