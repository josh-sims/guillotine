<template>
  <div class="container">
    <div class="mt-5 mb-5">
      <h3>Welcome!</h3>
      <div class="alert alert-primary">
        Please schedule your weekly releases for Thursday. Weekly catch-up on Monday.
      </div>
      <div class="alert alert-warning">
        IT Blackout <a href="http://wiki.realpage.com/display/TES/2018+IT+Blackout+Calendar" target="_blank">Calendar</a>.
      </div>
      <hr />
      <p><b>Reminder to people providing images for us, below image sizes for realpage.com:</b></p>

      <p>Unless transparency needed, image format should be .jpg</p>

      <p>Thumb: 320 x 180 (Card Style)<br />
      Large: 640 x 360 ( Page Images with content )<br />
      X-Large: 1280 x 720 ( Brightcove Video Poster)</p>

      <p>Run your images through TinyPNG to optimize them.</p>
      <hr />
      <p><b>To create Contact Sales link:</b></p>

      <code>&lt;a href="#" data-contact-form="true" rel="nofollow"&gt;Contact Sales&lt;/a&gt;</code>
      <p>NO url needed in href, include data-contact-form="true" and script will add proper href url.</p>

      <!-- <recent-posts-widget limit="10">Recent Posts</recent-posts-widget> -->
      <!-- <pages-widget limit="5">Pages</pages-widget> -->
    </div>
  </div>
</template>

<script>
import RecentPostsWidget from "./widgets/RecentPosts.vue";
import PagesWidget from "./widgets/Pages.vue";

export default {
  components: {
    RecentPostsWidget,
    PagesWidget
  }
};
</script>
