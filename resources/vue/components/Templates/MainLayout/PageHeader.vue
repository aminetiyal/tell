<template>
  <div class="bg-white shadow">
    <div
      class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 lg:flex lg:items-center lg:justify-between"
    >
      <h2
        class="text-3xl leading-9 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10"
      >{{title}}</h2>
      <div class="mt-8 flex lg:flex-shrink-0 lg:mt-0" :class="{'hidden': hasSlot}">
        <slot name="page_buttons"></slot>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      default: "Page",
      required: true
    }
  },
  data: function() {
    return {};
  },
  computed: {
    hasSlot() {
      return !this.$slots.page_buttons
    }
  }
};
</script>
