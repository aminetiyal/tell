<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
      <div>
        <img class="mx-auto h-12 w-auto" :src="nav.logo" :alt="nav.title" />
        <h2
          class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900"
        >Sign in to your account</h2>
      </div>
      <form class="mt-8" @submit="login">
        <input type="hidden" name="remember" value="true" />
        <div class="rounded-md shadow-sm">
          <div>
            <input
              v-model="email"
              aria-label="Email address"
              name="email"
              type="email"
              required
              v-bind:class="[errors ? 'border-red-400' : 'border-gray-300']"
              class="appearance-none rounded-none relative block w-full px-3 py-2 border placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"
              placeholder="Email address"
            />
          </div>
          <div class="-mt-px">
            <input
              v-model="password"
              aria-label="Password"
              name="password"
              type="password"
              required
              v-bind:class="[errors ? 'border-red-400' : 'border-gray-300']"
              class="appearance-none rounded-none relative block w-full px-3 py-2 border placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"
              placeholder="Password"
            />
          </div>
        </div>
        <p class="mt-2 text-sm leading-5 text-red-600" v-if="errors">{{errors}}</p>

        <div class="mt-6 flex items-center justify-between">
          <div class="flex items-center">
            <input
              v-model="remember"
              name="remember"
              id="remember"
              type="checkbox"
              class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
            />
            <label for="remember" class="ml-2 block text-sm leading-5 text-gray-900">Remember me</label>
          </div>

          <div class="text-sm leading-5">
            <a
              href="#"
              class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150"
            >Forgot your password?</a>
          </div>
        </div>

        <div class="mt-6">
          <button
            @click="login"
            type="submit"
            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out"
          >
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <svg
                class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400 transition ease-in-out duration-150"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                  clip-rule="evenodd"
                />
              </svg>
            </span>
            Sign in
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  components: {},
  data() {
    return {
      email: null,
      password: null,
      remember: false
    };
  },
  methods: {
    login() {
      this.$store.dispatch("login", {
        email: this.email,
        password: this.password
      });

      this.password = null;
    }
  },
  computed: {
    errors() {
      return this.$store.getters.getErrors?.email[0];
    },
    nav() {
      const title = window.Laravel.nav.title ?? false;
      const logo = window.Laravel.nav.logo ?? false;
      return {
        title: title,
        logo: logo
      };
    }
  },
  mounted() {}
};
</script>
