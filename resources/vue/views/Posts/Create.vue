<template>
  <Main title="Create Post">
    <template v-slot:page_buttons>
      
      <div class="inline-flex rounded-md shadow">
        <button @click="draft" class="inline-flex items-center justify-center px-5 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-100 hover:text-indigo-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
          Draft
        </button>
      </div>
      <div class="ml-3 inline-flex rounded-md shadow">
        <button @click="publish" class="inline-flex items-center justify-center px-5 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
          Publish
        </button>
      </div>
    </template>

    <div>
      <label class="block text-base leading-5 font-medium text-gray-700">Title</label>
      <div class="mt-1 relative rounded-md shadow-sm">
        <input
          type="text"
          v-model="post.title"
          class="form-input block w-full sm:text-sm sm:leading-5"
        />
      </div>
    </div>

    <div class="mt-6">
      <label class="block text-base leading-5 font-medium text-gray-700">Slug</label>
      <div class="mt-1 relative rounded-md shadow-sm">
        <input
          type="text"
          v-model="post.slug"
          class="form-input block w-full sm:text-sm sm:leading-5"
        />
      </div>
    </div>

    <div class="mt-6">
      <label class="block text-base leading-5 font-medium text-gray-700">Tags</label>
      <multiselect
        class="mt-1 rounded-md shadow-sm"
        v-model="post.tags"
        :options="tags"
        :multiple="true"
        label="name"
        track-by="name"
        :preselect-first="true"
      ></multiselect>
    </div>

    <div class="mt-6">
      <label class="block text-base leading-5 font-medium text-gray-700">Image</label>
      <div class="mt-1 flex items-center bg-grey-300">
        <label
          class="w-50 flex flex-col items-center px-4 py-4 bg-white text-blue-500 rounded-lg shadow-lg tracking-wide uppercase border border-blue-500 cursor-pointer hover:bg-blue-500 hover:text-white"
        >
          <svg
            class="w-8 h-8"
            fill="currentColor"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
          >
            <path
              d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"
            />
          </svg>
          <span class="mt-2 text-sm leading-normal">Select an image</span>
          <input type="file" class="hidden" />
        </label>
      </div>
    </div>

    <div class="mt-6">
      <label class="block text-base leading-5 font-medium text-gray-700">Excerpt</label>
      <div class="mt-1 relative rounded-md shadow-sm">
        <textarea v-model="post.excerpt" class="form-input block w-full sm:text-sm sm:leading-5"></textarea>
      </div>
    </div>

    <div class="mt-6">
      <label class="block text-base leading-5 font-medium text-gray-700">Publish Date</label>
      <div class="mt-1 relative rounded-md shadow-sm">
        <input
          type="datetime-local"
          v-model="post.published_at"
          class="form-input block w-full sm:text-sm sm:leading-5"
        />
      </div>
    </div>

    <div class="mt-6">
      <label class="block text-base leading-5 font-medium text-gray-700">Body</label>
      <ckeditor
        :editor="editor.type"
        v-model="post.body"
        :config="editor.config"
        class="bg-white mt-1 relative rounded-md shadow-sm"
      ></ckeditor>
    </div>
  </Main>
</template>

<script>
import Main from "../../components/Templates/MainLayout/Main";
import postService from "../../services/PostService";

export default {
  components: {
    Main
  },
  data() {
    return {
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
      tags: [
        { name: "Vue.js", language: "JavaScript" },
        { name: "Adonis", language: "JavaScript" },
        { name: "Rails", language: "Ruby" },
        { name: "Sinatra", language: "Ruby" },
        { name: "Laravel", language: "PHP" },
        { name: "Phoenix", language: "Elixir" }
      ],
      editor: {
        type: BalloonEditor,
        config: {
          toolbar: {
            items: [
              "heading","|",
              "bold","italic","link","bulletedList","numberedList","|",
              "alignment","indent","outdent","|",
              "code","codeBlock","imageUpload","blockQuote","insertTable","|",
              "undo","redo","|","fontColor","fontBackgroundColor","highlight","fontSize"
              ]
          },
          language: "en",
          image: {
            toolbar: ["imageTextAlternative","imageStyle:full","imageStyle:side"]
          },
          table: {
            contentToolbar: ["tableColumn", "tableRow", "mergeTableCells"]
          },
          licenseKey: ""
        }
      }
    };
  },
  methods: {
    save() {
      postService.store(this.post)
      .then(response => {
        console.log(response.data.data);
      })
    },
    publish() {
      this.post.published = true;
      this.save();
    },
    draft() {
      this.post.published = false;
      this.save();
    }
  },
  watch: {
    "post.title"(val) {
      this.post.slug = this.slugify(this.post.title);
    }
  },
  mounted() {}
};
</script>