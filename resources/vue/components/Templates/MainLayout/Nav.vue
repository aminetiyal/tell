<template>
  <nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <div class="flex-shrink-0 flex flex-row items-center">
            <router-link :to="{name:'posts.index'}" v-if="nav.logo">
              <img class="h-8 w-8" :src="nav.logo" alt />
            </router-link>

            <router-link :to="{name:'posts.index'}" v-if="nav.title"
              class="ml-2 uppercase text-lg tracking-widest font-bold text-gray-50"
            >{{nav.title}}</router-link>
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline">
              <router-link :to="{name:'posts.index'}" exact active-class="bg-gray-900 text-white"
                class="px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">
              Home</router-link>
              <router-link
                :to="{name:'posts.create'}"
                exact
                v-if="isAuth"
                class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
                active-class="bg-gray-900 text-white"
              >New</router-link>
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <div class="ml-3 relative cursor-pointer">
              <div class="flex items-center">
                <a
                  href="/login"
                  class="px-3 py-2 rounded-md text-sm font-medium text-gray-300"
                  v-if="!isAuth && false"
                >Login</a>
                <div
                  @click="navbarOpen = !navbarOpen"
                  class="px-3 py-2 rounded-md text-sm font-medium text-gray-300"
                  v-if="isAuth"
                >{{user.name}}</div>
              </div>
              <div
                v-if="navbarOpen && isAuth"
                class="z-10 origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg"
              >
                <div class="py-1 rounded-md bg-white shadow-xs">
                  <a
                    href="#"
                    @click="logout"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                  >Sign out</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <button
            @click="navbarOpen = !navbarOpen"
            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white"
          >
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path
                v-bind:class="{'hidden': navbarOpen, 'inline-flex': !navbarOpen }"
                stroke-linecap="round     "
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
              />
              <path
                v-bind:class="{'hidden': !navbarOpen, 'inline-flex': navbarOpen }"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
              />
            </svg>
          </button>
        </div>
      </div>
    </div>
    <div v-bind:class="{'block': navbarOpen, 'hidden': !navbarOpen}" class="md:hidden">
      <div class="px-2 pt-2 pb-3 sm:px-3">
        <router-link
          :to="{name:'posts.index'}"
          exact
          active-class="text-white bg-gray-900"
          class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
        >Home</router-link>
        <router-link
          v-if="isAuth"
          :to="{name:'posts.create'}"
          exact
          active-class="text-white bg-gray-900"
          class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
        >New</router-link>
      </div>
      <div class="pt-4 pb-3 border-t border-gray-700">
        <div class="px-2" v-if="isAuth">
           <div class="ml-3">
            <div class="text-base font-medium leading-none text-white">{{user.name}}</div>
          </div>
        </div>
        <div class="px-2">
          <a
            v-if="!isAuth && false"
            href="/login"
            class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
          >Login</a>
          <a
            v-if="isAuth"
            href="#"
            class="btn mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
            @click="logout"
          >Sign out</a>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  data: function() {
    return {
      navbarOpen: false
    };
  },
  methods: {
    logout: function() {
      this.$store.dispatch("logout");
    }
  },
  computed: {
    user() {
      return this.$store.getters.getUser || "null";
    },
    nav() {
        const title = window.Laravel.nav.title ?? false;
        const logo = window.Laravel.nav.logo ?? false;
        return {
            title: title,
            logo: logo
        }
    }
  }
};
</script>
