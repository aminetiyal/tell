<template>
  <Main :title="'Edit: '+ $route.params.post" v-if="!loading">
    <template v-slot:page_buttons>
      <div class="inline-flex rounded-md shadow">
        <router-link
          :to="{ name: 'posts.show', params: { post: $route.params.post }}"
          class="inline-flex items-center justify-center px-5 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-indigo-600 bg-white hover:bg-blue-200 hover:text-indigo-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out"
        >Cancel</router-link>
      </div>
      <div class="ml-3 inline-flex rounded-md shadow">
        <button
          @click="draft"
          class="inline-flex items-center justify-center px-5 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-indigo-600 bg-blue-100 hover:bg-blue-200 hover:text-indigo-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out"
        >Draft</button>
      </div>
      <div class="ml-3 inline-flex rounded-md shadow">
        <button
          @click="publish"
          class="inline-flex items-center justify-center px-5 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out"
        >Publish</button>
      </div>
    </template>

    <div class="flex flex-wrap">
      <InputGroup label="Title" :errors="errors.title" class="w-full sm:w-1/2 px-1">
        <input
          type="text"
          v-model="post.title"
          class="form-input block w-full sm:text-sm sm:leading-5"
        />
      </InputGroup>

      <InputGroup label="Slug" :errors="errors.slug" class="w-full sm:w-1/2 px-1">
        <input
          type="text"
          v-model="post.slug"
          class="form-input block w-full sm:text-sm sm:leading-5"
        />
      </InputGroup>
    </div>

    <InputGroup label="Tags" :errors="errors.tags" class="px-1">
      <div class="form-input mt-1 p-0">
        <multiselect
          class="rounded-md shadow-sm"
          v-model="post.tags"
          :options="tags"
          :multiple="true"
          label="name"
          track-by="name"
          :preselect-first="true"
        ></multiselect>
      </div>
    </InputGroup>

    <InputGroup label="Image" :errors="errors.image" class="w-full md:w-3/4 lg:w-1/2 px-1">
      <file-pond
        name="image"
        ref="pond"
        label-idle="Select an image"
        accepted-file-types="image/jpeg, image/png"
        v-bind:files="post.image"
        :server="pondServer"
        v-on:removefile="deleteImage"
        class="form-input block w-full sm:text-sm sm:leading-5 p-0 pt-4"
        style="background-color: #f1f0ef;"
      />
    </InputGroup>

    <InputGroup label="Excerpt" :errors="errors.excerpt" class="px-1">
      <textarea v-model="post.excerpt" class="form-input block w-full sm:text-sm sm:leading-5"></textarea>
    </InputGroup>

    <InputGroup label="Publish Date" :errors="errors.published_at" class="px-1">
      <datetime
        type="datetime"
        v-model="published_at"
        input-class="form-input block w-full sm:text-sm sm:leading-5"
      ></datetime>
    </InputGroup>

    <InputGroup label="Body" :errors="errors.body" class="px-1">
      <div class="form-input p-0">
        <Editor v-model="post.body"></Editor>
      </div>
    </InputGroup>
  </Main>
</template>

<script>
import Main from "../../components/Templates/MainLayout/Main";
import Editor from "../../components/Utilities/Editor";
import postService from "../../services/PostService";
import tagService from "../../services/TagService";

export default {
  components: {
    Main,
    Editor
  },
  data() {
    return {
      loading: true,
      uploadMode: null,
      errors: {},
      post: {
        title: "",
        slug: "",
        tags: [],
        image: "",
        published_at: "",
        excerpt: "",
        body: "",
        published: false
      },
      tags: []
    };
  },
  methods: {
    deleteImage() {
      this.uploadMode = true;
      console.log("todo");
      // todo
      console.log(this.$refs.pond);
    },
    getPost() {
      postService.show(this.$route.params.post).then(({ data }) => {
        this.post = data.data;
        this.loading = false;
      });
    },

    update() {
      postService
        .update(this.$route.params.post, this.post)
        .then(({ data }) => {
          this.$router.push({
            name: "posts.show",
            params: { post: data.data.slug }
          });
        })
        .catch(({ response }) => {
          this.errors = response.data.errors;
        });
    },

    publish() {
      this.post.published = true;
      this.update();
    },

    draft() {
      this.post.published = false;
      this.update();
    },

    getTags() {
      tagService
        .index()
        .then(({ data }) => {
          this.tags = data.data;
        })
        .catch(({ response }) => {
          console.log(response.data.errors);
        });
    }
  },
  watch: {
    "post.slug"(val) {
      this.post.slug = this.slugify(this.post.slug);
    }
  },
  computed: {
    published_at: {
      get() {
        return new Date(this.post.published_at).toISOString();
      },
      set(val) {
        this.post.published_at = val;
      }
    },

    pondServer() {
      return {
        url: window.Laravel.routes["api.tell.images.store"],
        headers: {
          "X-XSRF-TOKEN": this.readCookie("XSRF-TOKEN")
        },
        withCredentials: true,
        process: this.uploadMode
      };
    }
  },
  mounted() {
    this.getPost();
    this.getTags();
  }
};
</script>
