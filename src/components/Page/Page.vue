<template>
  <div>
    <div class="wiki-hero">
    <div class="bb8" @click='toggle = !toggle'></div>
    <div v-if='toggle'><img src="/wp-content/themes/guillotine/dist/img/bb8.gif" style="width:200px;position:absolute;right:50px;bottom:-6px;"></div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <template v-if="allPagesLoaded">
              <h1>{{ pageContent.title.rendered }}</h1>
            </template>
            <Loader v-else/>
          </div>
        </div>
      </div>
    </div>
    <div v-html="pageContent.content.rendered"></div>
  </div>
</template>

<script>
import Loader from "../partials/Loader.vue";
import { mapGetters } from "vuex";

export default {
  computed: {
    ...mapGetters({
      page: "page",
      allPagesLoaded: "allPagesLoaded"
    }),

    pageContent() {
      return this.page(this.$route.params.pageSlug);
    }
  },
  data () {
   return {
     toggle: false
   }
  },

  components: {
    Loader
  }
};
</script>
