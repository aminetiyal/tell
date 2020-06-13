<template>
  <div class="py-3">
    <div class="relative max-w-xl mx-auto bg-white shadow-lg rounded-lg">
      <input
        v-model="input"
        class="form-input block w-full pl-2 pr-9 sm:text-sm sm:leading-5"
        placeholder="Search"
        type="text"
      />
      <div class="absolute inset-y-0 right-0">
        <span
          class="flex items-center h-full py-0 px-3 border-transparent text-gray-500 sm:text-sm sm:leading-5"
        >
          <font-awesome-icon icon="search" class="pr-0" />
        </span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["value"],
  computed: {
    input: {
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
