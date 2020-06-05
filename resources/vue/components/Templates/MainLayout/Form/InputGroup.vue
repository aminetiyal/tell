<template>
  <div class="mt-6">
    <label class="block text-base leading-5 font-medium" :class="labelClass">{{label}}</label>
    <div class="mt-1 relative rounded-md shadow-sm" :class="inputClass">
      <slot></slot>
    </div>
    <div v-if="errors">
      <p class="mt-2 text-sm leading-5 text-red-600" v-for="(error, i) in errors" :key="i">{{error}}</p>
    </div>
  </div>
</template>

<script>
export default {
  props: ["label", "errors"],
  data: function() {
    return {};
  },
  computed: {
    inputClass: function() {
      return {
        "border": this.errors && this.errors.length > 0,
        "border-red-600": this.errors && this.errors.length > 0
      };
    },
    labelClass: function() {
      return {
        "text-gray-700": !this.errors,
        "text-red-600": this.errors && this.errors.length > 0
      };
    },
  }
};
</script>
