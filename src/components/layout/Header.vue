<template>
  <div>
    <Header class="header">
      <section class="search">
        <v-text-field form="search" id="search" placeholder="Search"></v-text-field>
      </section>
      <section class="actions">
        <v-icon color="#fff">mdi-comment</v-icon>
        <v-icon color="#fff">mdi-bell</v-icon>
        <v-icon color="#fff">mdi-cog</v-icon>
      </section>
      <section class="account">
        <div class="account-avatar">
          <img src="https://scontent-mad1-1.xx.fbcdn.net/v/t1.0-9/51047906_2803261356352462_3332049140203913216_n.jpg?_nc_cat=108&ccb=2&_nc_sid=09cbfe&_nc_ohc=gE_1WHzf0BMAX9I-v97&_nc_ht=scontent-mad1-1.xx&oh=e6ea143ce79f60d3d07db078e3631c77&oe=5FB9E440" alt="">
        </div>
        <div class="account-user">
          <h3>Eduardo Bessa</h3>
          <small>Administrador</small>
        </div>
        <div class="account-menu">
          <i class="fa fa-chevron-down"></i>
        </div>
      </section>
    </Header>
  </div>
</template>
