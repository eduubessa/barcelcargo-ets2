<script src="../../../babel.config.js"></script>
<template>
  <div>
    <header class="header-page">
      <h1># Eventos</h1>
    </header>
    <div class="container-fluid">
      <section class="next-events card">
        <h1>Próximos eventos</h1>
        <h3>Os próximos cinco eventos da empresa</h3>
        <div class="row">
          <article class="event" v-for="(event, index) in events" :key="index">
            <div class="bg-image" :style="`background-image: url('${event.photo}');`"></div>
          </article>
        </div>
      </section>
    </div>
  </div>
</template>
<script>
import BalanceTotal from '@/components/layout/partials/Balance'
import Calendar from '@/components/layout/partials/Calendar'

export default {
  components: {
    Calendar,
    BalanceTotal
  },
  data() {
    return {
      events: {
        type: Object,
        default: null
      }
    }
  },
  methods: {
  },
  mounted() {
    Vue.axios.get('http://barcelcargo.code:7711/api/events').then((response) => {
      if (response.status == 200 && response.data != null) {
        this.events = response.data.events;
      }
    }).catch((err) => {
      if (err) throw err;
    });
  }
}
</script>
