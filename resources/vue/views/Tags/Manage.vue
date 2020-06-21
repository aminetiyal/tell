<template>
  <Main title="Tags Management">
    <div class="my-10">
      <div class="bg-white rounded-md border border-gray-200">
        <div class="relative rounded-t-md shadow-sm border-b border-gray-200">
          <input
            name="search"
            type="text"
            v-model="search"
            class="form-input border-none block w-full pl-3 pr-9 text-sm leading-5 font-medium text-gray-900"
            placeholder="Search"
          />
          <div class="absolute inset-y-0 right-0 px-3 flex items-center pointer-events-none">
            <font-awesome-icon icon="search" class="text-gray-500 sm:text-sm sm:leading-5">$</font-awesome-icon>
          </div>
        </div>
        <div class="max-h-80 overflow-y-scroll" v-if="tags.length !== 0">
          <div
            v-for="(tag,index) in tags"
            :key="tag.id"
            :class="[ index !== tags.length -1 ? 'border-b border-gray-200' : '']"
            class="px-3 py-1 flex justify-between"
          >
            <div>
              <router-link
                :to="{name:'tags.posts', params:{tag:tag.slug}}"
                class="text-sm leading-5 font-medium text-gray-900 hover:underline"
              >{{tag.name}}</router-link>
              <div
                class="text-xs leading-5 text-gray-500 hover:text-gray-700"
              >Posts count: {{tag.posts_count}}</div>
            </div>
            <div class="text-sm flex items-center justify-between -mr-1">
              <a href="#" class="mx-1 text-indigo-600 hover:text-indigo-900">Edit</a>
              <a href="#" class="mx-1 text-red-600 hover:text-red-900">Delete</a>
            </div>
          </div>
        </div>
        <div v-else>
          <div class="px-3 py-1 text-center">
            <p class="text-sm leading-5 font-medium text-gray-900">No tags found</p>
            <div
              class="text-xs leading-5 text-gray-500 cursor-pointer hover:text-gray-700 hover:underline"
            >
              Do you want to add
              <b>{{search}}</b> to your tags ?
            </div>
          </div>
        </div>
      </div>
    </div>
  </Main>
</template>

<script>
import Main from "../../components/Templates/MainLayout/Main";
import Editor from "../../components/Utilities/Editor";
import tagService from "../../services/TagService";

export default {
  components: {
    Main,
    Editor
  },
  data() {
    return {
      errors: {},
      tag: {
        name: "",
        slug: ""
      },
      tags: [],
      search: "sdfqs"
    };
  },
  methods: {
    // save() {
    //   tagService
    //     .store(this.tag)
    //     .then(({ data }) => {
    //       this.$router.push({
    //         name: "posts.show",
    //         params: { post: data.data.slug }
    //       });
    //     })
    //     .catch(({ response }) => {
    //       console.log(response.data.errors);
    //       this.errors = response.data.errors;
    //     });
    // },
    // publish() {
    //   this.post.published = true;
    //   this.save();
    // },
    // draft() {
    //   this.post.published = false;
    //   this.save();
    // },
    getTags() {
      tagService
        .index(this.search)
        .then(({ data }) => {
          this.tags = data.data;
        })
        .catch(({ response }) => {
          console.log(response.data.errors);
        });
    }
  },
  watch: {
    search() {
      this.getTags();
    }
    //"post.title"(val) {
    //  this.post.slug = this.slugify(this.post.title);
    //}
  },
  computed: {},
  mounted() {
    this.getTags();
  }
};
</script>
