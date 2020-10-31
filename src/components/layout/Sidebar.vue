<template>
  <div>
    <aside class="sidebar">
      <a class="brand">
        <i class="fa fa-align-left"></i>
      </a>
      <nav class="navigation">
        <a href="/home" :class="{ 'active' : urlPath === 'home' || urlPath === '' }"><v-icon color="white" aria-hidden="false">home</v-icon></a>
        <a href="/statistics" :class="{ 'active' : urlPath === 'statistics' }"><v-icon color="white" aria-hidden="false">bar_chart</v-icon></a>
        <a href="#" :class="{ 'active' : urlPath === '#' }"><v-icon color="white" aria-hidden="false">apartment</v-icon></a>
        <a href="#" :class="{ 'active' : urlPath === '#' }"><v-icon color="white" aria-hidden="false">payment</v-icon></a>
        <a href="#" :class="{ 'active' : urlPath === '#' }"><v-icon color="white" aria-hidden="false">attach_money</v-icon></a>
        <a href="#" :class="{ 'active' : urlPath === '#' }"><v-icon color="white" aria-hidden="false">local_shipping</v-icon></a>
        <a href="#" :class="{ 'active' : urlPath === '#' }"><v-icon color="white" aria-hidden="false">widgets</v-icon></a>
        <a href="#" :class="{ 'active' : urlPath === '#' }"><i class="fa fa-truck"></i></a>
        <a href="#" :class="{ 'active' : urlPath === '#' }"><i class="fa fa-archive"></i></a>
        <a href="#" :class="{ 'active' : urlPath === '#' }"><v-icon color="white" aria-hidden="false">settings</v-icon></a>
      </nav>
    </aside>
  </div>
</template>
<script>
  export default {
    data () {
      return {
        menu: null,
        urlPath : this.$route.path.replace('/', '')
      }
    }
  }
</script>
