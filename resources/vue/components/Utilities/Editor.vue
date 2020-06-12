<template>
  <ckeditor :editor="type" v-model="data" :config="config"></ckeditor>
</template>

<script>
import CKEditorAdapterPlugin from "../../services/CkEditorHttp";

export default {
  props: ["value"],
  data() {
    return {
      type: this.type === "baloon" ? BallonEditor : ClassicEditor,
      config: {
        extraPlugins: [CKEditorAdapterPlugin],
        toolbar: {
          items: [
            "heading",
            "|",
            "undo",
            "redo",
            "|",
            "bold",
            "italic",
            "underline",
            "strikethrough",
            "|",
            "alignment",
            "indent",
            "outdent",
            "|",
            "codeBlock",
            "code",
            "blockQuote",
            "link",
            "imageUpload",
            "mediaEmbed",
            "insertTable",
            "|",
            "numberedList",
            "bulletedList",
            "|",
            "fontFamily",
            "fontBackgroundColor",
            "fontColor",
            "fontSize",
            "highlight",
            "|",
            "specialCharacters",
            "|"
          ]
        },
        language: "en",
        mediaEmbed: {
          previewsInData: true
        },
        image: {
          toolbar: [
            "imageTextAlternative",
            "imageStyle:full",
            "imageStyle:side"
          ]
        },
        table: {
          contentToolbar: [
            "tableColumn",
            "tableRow",
            "mergeTableCells",
            "tableCellProperties",
            "tableProperties"
          ]
        },
        licenseKey: ""
      }
    };
  },
  computed: {
    data: {
      get() {
        return this.value;
      },
      set(val) {
        this.$emit("input", val);
      }
    }
  }
};
</script>
