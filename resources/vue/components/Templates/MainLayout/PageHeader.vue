<template>
  <div class="bg-white shadow">
    <div
      class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 lg:flex lg:items-center lg:justify-between"
    >
      <div class="flex-1 min-w-0">
        <h2
          class="text-2xl leading-7 font-bold tracking-tight text-gray-900 sm:text-3xl sm:leading-9"
        >{{title}}</h2>
        <div
          class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap"
          :class="{'hidden': hasSlot.page_description}"
        >
          <slot name="page_description"></slot>
        </div>
      </div>
      <div class="mt-4 flex lg:flex-shrink-0 lg:mt-0" :class="{'hidden': hasSlot.page_buttons}">
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
      return {
        page_buttons: !this.$slots.page_buttons,
        page_description: !this.$slots.page_description
      };
    }
  }
};
</script>
