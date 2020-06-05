<template>
  <Main title="Create Post">
    <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
  </Main>
</template>

<script>
import Main from "../../components/Templates/MainLayout/Main";

export default {
  components: {
    Main
  },
  data() {
    return {
      editor: BalloonEditor,
      editorData: `<p>Content of the editor.</p>`,
      editorConfig: {
        toolbar: {
          items: [
            "heading",
            "|",
            "bold",
            "italic",
            "link",
            "bulletedList",
            "numberedList",
            "|",
            "alignment",
            "indent",
            "outdent",
            "|",
            "code",
            "codeBlock",
            "imageUpload",
            "blockQuote",
            "insertTable",
            "|",
            "undo",
            "redo",
            "|",
            "fontColor",
            "fontBackgroundColor",
            "highlight",
            "fontSize"
          ]
        },
        language: "en",
        image: {
          toolbar: [
            "imageTextAlternative",
            "imageStyle:full",
            "imageStyle:side"
          ]
        },
        table: {
          contentToolbar: ["tableColumn", "tableRow", "mergeTableCells"]
        },
        licenseKey: ""
      }
    };
  },
  methods: {
    //
  },
  mounted() {}
};
</script>