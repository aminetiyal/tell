<template>
  <router-link :to="{name:'posts.show', params: {post: post.slug}}">
    <div class="py-3">
      <div
        class="flex max-w-3xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-1
        border border-gray-300"
      >
        <div class="w-1/3 bg-cover" :style="{'background-image': 'url(' + post.image + ')'}"></div>
        <div class="w-2/3 p-4">
          <h1 class="text-gray-900 font-bold text-2xl">{{post.title}}</h1>
          <p class="mt-2 text-gray-600 text-base">{{post.excerpt}}</p>
          <div class="flex flex-wrap gap-1 items-baseline -mx-1">
            <div class="flex px-1" v-for="tag in post.tags" :key="tag.id">
              <router-link :to="{name:'tags.posts', params: {tag: tag.name}}"
                class="inline-block bg-teal-200 text-teal-800 text-xs mt-2 px-2 rounded-full uppercase font-semibold tracking-wide hover:bg-teal-300 hover:text-teal-900"
              >{{tag.name}}</router-link>
            </div>
          </div>
          <div class="flex item-center mt-2">
            <p class="text-gray-600 text-sm">
              <font-awesome-icon icon="clock" class="text-gray-400"/>
              <timeago :datetime="new Date(post.published_at)" :auto-update="60"></timeago>
              - {{readingTime(post.body)}}
            </p>
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
