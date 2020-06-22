<template>
  <Main title="Tags Management">
    <div class="my-10">
      <div class="bg-white rounded-md border border-gray-200">
        <div class="relative rounded-t-md shadow-sm border-b border-gray-200">
          <input
            name="search"
            type="text"
            v-model="search"
            class="form-input rounded-none rounded-t-md border-none block w-full pl-3 pr-9 text-sm sm:text-base leading-5 font-medium text-gray-900"
            placeholder="Search"
          />
          <div class="absolute inset-y-0 right-0 px-3 flex items-center pointer-events-none">
            <font-awesome-icon icon="search" class="text-gray-500 sm:text-sm sm:leading-5">$</font-awesome-icon>
          </div>
        </div>
        <div v-if="tags.length === 0">
          <div class="px-3 py-3 text-center border-b border-gray-200">
            <p class="text-sm sm:text-base leading-5 font-medium text-gray-900">No tags found</p>
          </div>
        </div>
        <div class="max-h-80 overflow-y-scroll">
          <!-- :class="[ index !== tags.length -1 ? 'border-b border-gray-200' : '']"  -->
          <div
            v-for="(tag,index) in tags"
            :key="tag.id"
            class="px-3 py-1 flex justify-between border-b border-gray-200"
          >
            <template v-if="selectedTag !== null && tag.id === selectedTag.id">
              <input
                class="form-input text-sm my-1 sm:text-lg leading-5 font-medium text-gray-900 w-full sm:w-3/4 md:w-1/2"
                v-model="selectedTag.name"
              />
              <div class="text-sm sm:text-base flex items-center justify-between -mr-1">
                <a
                  href="#"
                  class="mx-1 text-green-500 hover:text-green-700"
                  @click="update(tag)"
                >Update</a>
                <a
                  href="#"
                  class="mx-1 text-yellow-500 hover:text-yellow-700"
                  @click="cancel(tag)"
                >Cancel</a>
              </div>
            </template>
            <template v-else>
              <div>
                <router-link
                  :to="{name:'tags.posts', params:{tag:tag.slug}}"
                  class="text-sm sm:text-base leading-5 font-medium text-gray-900 hover:underline"
                >{{tag.name}}</router-link>
                <div
                  class="text-xs sm:text-sm leading-5 text-gray-500 hover:text-gray-700"
                >Posts count: {{tag.posts_count}}</div>
              </div>
              <div class="text-sm sm:text-base flex items-center justify-between -mr-1">
                <a
                  href="#"
                  class="mx-1 text-indigo-600 hover:text-indigo-900"
                  @click="edit(tag)"
                >Edit</a>
                <a
                  href="#"
                  @click="deleteTag(tag)"
                  class="mx-1 text-red-600 hover:text-red-900"
                >Delete</a>
              </div>
            </template>
          </div>
        </div>
        <div v-if="notFound">
          <div class="px-3 py-1 text-center">
            <div
              class="text-xs sm:text-sm leading-5 text-gray-500 cursor-pointer hover:text-gray-700 hover:underline"
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
      oldTag: null,
      selectedTag: null,
      tags: [],
      search: ""
    };
  },
  methods: {
    edit(tag) {
      this.oldTag = Object.assign({}, tag);
      this.selectedTag = tag;
    },
    update(tag) {
      tagService
        .update(tag.slug, this.selectedTag)
        .then(({ data }) => {
          this.$swal("Updated!", "The tag updated successfully!", "success");
          this.selectedTag = null;
          this.getTags();
        })
        .catch(({ response }) => {
          console.log(response.data.errors);
        });
    },
    deleteTag(tag) {
      swal({
        title: "Are you sure?",
        text: "All posts related to this tag will be detached !",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          tagService
            .delete(tag.slug)
            .then(({ data }) => {
              this.$swal(
                "Deleted!",
                "The tag deleted successfully!",
                "success"
              );
              this.selectedTag = null;
              this.getTags();
            })
            .catch(({ response }) => {
              console.log(response.data.errors);
            });
        }
      });
    },
    cancel(tag) {
      Object.assign(tag, this.oldTag);
      this.selectedTag = this.oldTag = null;
    },
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
  },
  watch: {
    search() {
      this.getTags();
    }
    //"post.title"(val) {
    //  this.post.slug = this.slugify(this.post.title);
    //}
  },
  computed: {
    notFound() {
      return (
        this.search !== "" && !this.tags.some(tag => tag.name === this.search)
      );
    }
  },
  mounted() {
    this.getTags();
  }
};
</script>
