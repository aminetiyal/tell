<template>
  <Main title="Create Post">
    <template v-slot:page_buttons>
      <div class="inline-flex rounded-md shadow">
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

    <InputGroup label="Image" :errors="errors.image" class="px-1 w-48">
      <label
        class="w-48 flex flex-col items-center px-4 py-4 bg-white text-blue-500 rounded-lg shadow-lg tracking-wide uppercase border border-blue-500 cursor-pointer hover:bg-blue-500 hover:text-white"
      >
        <font-awesome-icon icon="cloud-upload-alt" size="lg" class="h-8 w-8" />
        <span class="mt-2 text-sm leading-normal">Select an image</span>
        <input type="file" class="hidden" @change="onFileChanged" />
      </label>
    </InputGroup>

    <InputGroup label="Excerpt" :errors="errors.excerpt" class="px-1">
      <textarea v-model="post.excerpt" class="form-input block w-full sm:text-sm sm:leading-5"></textarea>
    </InputGroup>

    <InputGroup label="Publish Date" :errors="errors.published_at" class="px-1">
      <datetime
        type="datetime"
        v-model="post.published_at"
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
      errors: {},
      post: {
        title: "",
        slug: "",
        tags: [],
        image: "",
        published_at: (new Date()).toISOString(),
        excerpt: "",
        body: "",
        published: false
      },
      tags: []
    };
  },
  methods: {
    save() {
      postService
        .store(this.post)
        .then(({ data }) => {
          this.$router.push({
            name: "posts.show",
            params: { post: data.data.slug }
          });
        })
        .catch(({ response }) => {
          console.log(response.data.errors);
          this.errors = response.data.errors;
        });
    },
    publish() {
      this.post.published = true;
      this.save();
    },
    draft() {
      this.post.published = false;
      this.save();
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
      axios
        .post(Laravel.routes["api.tell.images.store"], formData)
        .then(res => {
          this.post.image = res.data.url;
        })
        .catch(err => alert(err));
    }
  },
  watch: {
    "post.title"(val) {
      this.post.slug = this.slugify(this.post.title);
    }
  },
  mounted() {
    this.getTags();
  }
};
</script>