<template>
  <v-app>
    <div class="d-flex align-stretch">
      <!-- Sidebar -->
      <Sidebar></Sidebar>
      <!-- Sidebar -->

      <!-- Main -->
      <main class="main">
        <Header></Header>
        <router-view></router-view>
      </main>
      <!-- Main -->

    </div>
  </v-app>
</template>

<script>

import Sidebar from '@/components/layout/Sidebar';
import Header from '@/components/layout/Header';

export default {
  name: 'App',

  components: {
    Sidebar,
    Header
  },

  data: () => ({
    //
  }),
};
</script>
