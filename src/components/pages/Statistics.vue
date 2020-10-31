<template>
  <div>
    <header class="header-page">
      <h1># Estatísticas</h1>
    </header>
    <div class="container">
      <section class="cards">
        <div class="card">
          <h1>Olá,<br> Eduardo Bessa</h1>
          <h3>Motorista Experiente</h3>
          <section class="columns">
            <div class="column">
              <h4>Entregas</h4>
              <h1>284</h1>
            </div>
            <div class="column">
              <h4>Kilometros</h4>
              <h1>973K</h1>
            </div>
            <div class="column">
              <h4>Lucro (€)</h4>
              <h1>273K</h1>
            </div>
          </section>
        </div>
        <div class="card">
          <h1>Lucro Mensal - EUR</h1>
          <h3>Últimos 3 meses</h3>
          <div class="bitcoin-price">
            <line-chart :colors="['#e84393', '#666']"
                        :curve="false"
                        :data="[['2020-03-31', 622], ['2020-04-30', 800], ['2020-05-31', 600]]"
                        :grid="false"
                        height="130px"></line-chart>
          </div>
        </div>
        <div class="card">
          <h1>Despesas mensais - EUR</h1>
          <h3>Últimos 3 meses</h3>
          <div class="bitcoin-price">
            <line-chart :colors="['#3AC1E6', '#666']"
                        :curve="false"
                        :data="[['2020-01-31', 14], ['2020-02-28', 10], ['2020-03-31', 25]]"
                        :grid="false"
                        height="130px">
            </line-chart>
          </div>
        </div>
        <div class="card">
          <BalanceTotal></BalanceTotal>
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
                <th>Data de carga</th>
                <th>Data de decarga</th>
                <th>Estado</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>1</td>
                <td>Empilhadores</td>
                <td>Paris, France</td>
                <td>Plymouth, United Kingdom</td>
                <td>Hoje, 10:30</td>
                <td>Hoje, 15:50</td>
                <td class="status-success"><i class="fa fa-circle"></i></td>
              </tr>
              <tr>
                <td>2</td>
                <td>Carros</td>
                <td>Paris, FR</td>
                <td>Plymouth, UK</td>
                <td>Ontem, 10:30</td>
                <td>Ontem, 15:50</td>
                <td class="status-warning"><i class="fa fa-circle"></i></td>
              </tr>
              <tr>
                <td>3</td>
                <td>Carros</td>
                <td>Paris, FR</td>
                <td>Plymouth, UK</td>
                <td>Ontem, 10:30</td>
                <td>Ontem, 15:50</td>
                <td class="status-success"><i class="fa fa-circle"></i></td>
              </tr>
              <tr>
                <td>4</td>
                <td>Carros</td>
                <td>Paris, FR</td>
                <td>Plymouth, UK</td>
                <td>Ontem, 10:30</td>
                <td>Ontem, 15:50</td>
                <td class="status-success"><i class="fa fa-circle"></i></td>
              </tr>
              <tr>
                <td>5</td>
                <td>Carros</td>
                <td>Paris, FR</td>
                <td>Plymouth, UK</td>
                <td>Ontem, 10:30</td>
                <td>Ontem, 15:50</td>
                <td class="status-danger"><i class="fa fa-circle"></i></td>
              </tr>
              <tr>
                <td>6</td>
                <td>Carros</td>
                <td>Paris, FR</td>
                <td>Plymouth, UK</td>
                <td>Ontem, 10:30</td>
                <td>Ontem, 15:50</td>
                <td class="status-success"><i class="fa fa-circle"></i></td>
              </tr>
              </tbody>
            </table>
          </div>
        </section>
        <section class="calendar card">
          <h1>Calendário</h1>
          <h3>Calendário com os próximos eventos</h3>
          <div class="calendar">
            <Calendar></Calendar>
          </div>
        </section>
      </section>
    </div>
  </div>
</template>
<script>
  import BalanceTotal from '@/components/layout/partials/BalanceTotal'
  import Calendar from '@/components/layout/partials/Calendar'

  export default {
    components: {
      Calendar,
      BalanceTotal
    },
    data() {
      return {}
    }
  }
</script>
