<template>
  <Main :title="'Edit: '+ $route.params.post">
    <template v-slot:page_buttons>
      <div class="inline-flex rounded-md shadow">
        <router-link :to="{ name: 'posts.show', params: { post: $route.params.post }}"
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

    <InputGroup label="Title" :errors="errors.title">
      <input
        type="text"
        v-model="post.title"
        class="form-input block w-full sm:text-sm sm:leading-5"
      />
    </InputGroup>

    <InputGroup label="Slug" :errors="errors.slug">
      <input
        type="text"
        v-model="post.slug"
        class="form-input block w-full sm:text-sm sm:leading-5"
      />
    </InputGroup>

    <InputGroup label="Tags" :errors="errors.tags">
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

    <InputGroup label="Image" :errors="errors.image" class="w-48">
      <label
        class="w-48 flex flex-col items-center px-4 py-4 bg-white text-blue-500 rounded-lg shadow-lg tracking-wide uppercase border border-blue-500 cursor-pointer hover:bg-blue-500 hover:text-white"
      >
        <font-awesome-icon icon="cloud-upload-alt" size="lg" class="h-8 w-8" />
        <span class="mt-2 text-sm leading-normal">Select an image</span>
        <input type="file" class="hidden" @change="onFileChanged"/>
      </label>
    </InputGroup>

    <InputGroup label="Excerpt" :errors="errors.excerpt">
      <textarea v-model="post.excerpt" class="form-input block w-full sm:text-sm sm:leading-5"></textarea>
    </InputGroup>

    <InputGroup label="Publish Date" :errors="errors.published_at">
      <!-- TODO: fix input datetime format -->
      <input
        type="datetime-local"
        v-model="post.published_at"
        class="form-input block w-full sm:text-sm sm:leading-5"
      />
    </InputGroup>

    <InputGroup label="Body" :errors="errors.body">
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
    Main
  },
  data() {
    return {
      slug: '',
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
    getPost() {
      postService.show(this.$route.params.post)
      .then(({ data }) => {
        this.post = data.data
      })
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
    },
    onFileChanged(event) {
      const image = event.target.files[0];
      const formData = new FormData();
      formData.append("image", image, image.name);
      axios.post(Laravel.routes['api.tell.images.store'], formData)
      .then(res => {
        this.post.image = res.data.url;
      })
      .catch(err => alert(err));
    }
  },
  watch: {
    "post.slug"(val) {
      this.post.slug = this.slugify(this.post.slug);
    }
  },
  mounted() {
    this.getPost();
    this.getTags();
  }
};
</script>