<script src="../../../babel.config.js"></script>
<template>
  <div>
    <header class="header-page">
      <h1># Estatísticas</h1>
    </header>
    <div class="container">
      <section class="cards">
        <div class="card">
          <h1>Olá,<br> {{ user.name }}</h1>
          <h3>{{ user.role.description }}</h3>
          <section class="columns">
            <div class="column">
              <h4>Entregas</h4>
              <h1>{{ user.all_cargo_count }}</h1>
            </div>
            <div class="column">
              <h4>Kilometros</h4>
              <h1>{{ numberToStringFormat(user.all_cargo_sum_kms) }}</h1>
            </div>
            <div class="column">
              <h4>Lucro (€)</h4>
              <h1>{{ numberToStringFormat(user.all_cargo_sum_cargo_value_finally) }}</h1>
            </div>
          </section>
        </div>
        <div class="card">
          <h1>Lucro Mensal - EUR</h1>
          <h3>Últimos 3 meses</h3>
          <div class="bitcoin-price">
            <line-chart
                :suffix="numberToStringFormat(user.all_cargo_sum_cargo_value_finally, true)"
                :colors="['#e84393', '#666']"
                :grid="false"
                :curve="false"
                :discrete="true"
                :data="monthly_profit"
                height="130px">
            </line-chart>
          </div>
        </div>
        <div class="card">
          <h1>Despesas mensais - EUR</h1>
          <h3>Últimos 3 meses</h3>
          <div class="bitcoin-price">
            <line-chart
                :suffix="numberToStringFormat(user.all_cargo_sum_cargo_value_finally, true)"
                :colors="['#3AC1E6', '#666']"
                :grid="false"
                :curve="false"
                :discrete="true"
                :data="monthly_expenses"
                height="130px">
            </line-chart>
          </div>
        </div>
        <div class="card">
          <BalanceTotal :total="user.bank.balance.toString()"></BalanceTotal>
        </div>
      </section>
      <section class="last-works-calendar">
        <section class="last-works card">
          <h1>Entregas</h1>
          <h3>Últimos 6 entregas</h3>
          <div class="table">
            <table style="width:100%" border="0">
              <thead>
              <tr>
                <th>#</th>
                <th>Material</th>
                <th>Carga</th>
                <th>Descarga</th>
                <th>Kms Pecorridos</th>
                <th>Data de carga</th>
                <th>Data de decarga</th>
                <th>Estado</th>
              </tr>
              </thead>
              <tbody v-if="user.cargo.length > 0">
              <tr v-for="(cargo, index) in user.cargo" :key="index">
                <td>{{ index+1 }}</td>
                <td>{{ cargo.material }}</td>
                <td>{{ cargo.location_from }}</td>
                <td>{{ cargo.location_to}}</td>
                <td>{{ cargo.kms }}</td>
                <td>{{ dateToStringFormat(cargo.created_at) }}</td>
                <td>{{ dateToStringFormat(cargo.updated_at) }}</td>
                <td v-if="cargo.status == 'cargo_excellent'" class="status-success"><i class="fa fa-circle"></i></td>
                <td v-else-if="cargo.status == 'cargo_satisfactory'" class="status-warning"><i class="fa fa-circle"></i></td>
                <td v-else-if="cargo.status == 'cargo_late'" class="status-warning"><i class="fa fa-circle"></i></td>
                <td v-else-if="cargo.status == 'cargo_very_late'" class="status-danger"><i class="fa fa-circle"></i></td>
                <td v-else-if="cargo.status == 'cargo_damaged'" class="status-danger"><i class="fa fa-circle"></i></td>
                <td v-else-if="cargo.status == 'cargo_cancelled'" class="status_white"><i class="fa fa-circle"></i></td>
              </tr>
              </tbody>
            </table>
          </div>
        </section>
        <section class="calendar card">
          <h1>Calendário</h1>
          <h3>Calendário com os próximos eventos</h3>
        </section>
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
      user: {
        type: Object,
        default: null
      },
      monthly_profit: {
        type: Object,
        default: null
      },
      monthly_expenses: {
        type: Object,
        default: null
      }
    }
  },
  methods: {
    numberToStringFormat(number, onlysuffix = false){
      let SI_SYMBOL = ["", "k", "M", "G", "T", "P", "E"];
      var tier = Math.log10(Math.abs(number)) / 3 | 0;
      if(tier === 0) return number;
      var suffix = " " + SI_SYMBOL[tier];
      var scale = Math.pow(10, tier * 3);
      var scaled = number / scale;

      if(onlysuffix === true) return suffix;
      return scaled.toFixed(1) + suffix;
    },
    fetchMonthlyProfit () {
      this.monthly_profit = {
        'Novembro': 0,
        'Dezembro': 0,
        'Janeiro': new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(this.user.all_cargo_sum_cargo_value_finally)
      };

      this.monthly_expenses = {
        'Novembro': 0,
        'Dezembro': 0,
        'Janeiro': new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(this.user.all_cargo_sum_cargo_value_finally)
      };
    },
    dateToStringFormat (date){
      let todayDate = new Date(Date.now());
      let cargoDate = new Date(date);
      let dateDifferenceDays = Math.ceil(Math.abs(cargoDate - todayDate) / (1000 * 60 * 60 * 24));

      switch (dateDifferenceDays){
        case 1 : return `Hoje, ${cargoDate.getHours()}:${cargoDate.getMinutes()}`;
        case 2 : return `Ontem, ${cargoDate.getHours()}:${cargoDate.getMinutes()}`; break;
        case 3 : return `Anteontem, ${cargoDate.getHours()}:${cargoDate.getMinutes()}`; break;
        case 7  : return `Há uma semana`; break;
        case 15 : return `Há duas semanas`; break;
        case 30 || 31 : return `Há um mês`; break;
        default : return `Há ${dateDifferenceDays} dias atrás`;
      }
    }
  },
  mounted() {
    Vue.axios.get('http://barcelcargo.code:7711/api/user/developer/resume').then((response) => {
      if (response.status == 200 && response.data != null) {
        this.user = response.data;
        this.fetchMonthlyProfit()
      }
    }).catch((err) => {
      if (err) throw err;
    });
  }
}
</script>
