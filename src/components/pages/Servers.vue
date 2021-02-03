<template>
  <div>
    <header class="header-page">
      <h1># Servidores</h1>
    </header>
    <div class="container">
      <section class="last-works-calendar">
        <section class="last-works card">
          <h1>Euro Truck Simulator 2</h1>
          <h3>Servidores no Truckers MP de Euro Truck Simulator 2</h3>
          <div class="table">
            <table style="width:100%" border="0">
              <thead>
              <tr>
                <th>#</th>
                <th>Cidade</th>
                <th>IP</th>
                <th>Players</th>
                <th>Players em Espera</th>
                <th>Máximo de Players</th>
                <th>Promods</th>
                <th>Limite de velocidade</th>
                <th>Estado</th>
              </tr>
              </thead>
              <tbody>
              <tr v-for="(server, index) in servers" :key="index">
                <td v-if="server.game === 'ETS2'">{{ index+1 }}</td>
                <td v-if="server.game === 'ETS2'">{{ server.name }}</td>
                <td v-if="server.game === 'ETS2'">{{ server.ip }}</td>
                <td v-if="server.game === 'ETS2'">{{ server.players }}</td>
                <td v-if="server.game === 'ETS2'">{{ server.queue }}</td>
                <td v-if="server.game === 'ETS2'">{{ server.maxplayers }}</td>
                <td v-if="server.game === 'ETS2' && server.promods === true">Sim</td>
                <td v-if="server.game === 'ETS2' && server.promods === false">Não</td>
                <td v-if="server.game === 'ETS2' && server.speedlimiter === 1">110kmh / 68 mph</td>
                <td v-if="server.game === 'ETS2' && server.speedlimiter === 0">Sem limite</td>
                <td v-if="server.online === true && server.game === 'ETS2'" class="status-success"><i class="fa fa-circle"></i></td>
                <td v-if="server.online === false && server.game === 'ETS2'" class="status-success"><i class="fa fa-circle"></i></td>
              </tr>
              </tbody>
            </table>
          </div>
        </section>
        <section class="employers-online card">
          <h1>Empregados Online</h1>
          <h3>Empregados da BarcelCargo em trabalho</h3>
          <table style="width:100%" border="0">
            <thead>
            <tr>
              <th>#</th>
              <th>Nome</th>
              <th>Online</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(server, index) in servers" :key="index" @click="toProfile('eduubessa')">
              <td v-if="server.game === 'ETS2'">{{ index+1 }}</td>
              <td v-if="server.game === 'ETS2'">Eduardo Bessa</td>
              <td v-if="server.online === true && server.game === 'ETS2'" class="status-success"><i class="fa fa-circle"></i></td>
              <td v-if="server.online === false && server.game === 'ETS2'" class="status-success"><i class="fa fa-circle"></i></td>
            </tr>
            </tbody>
          </table>
        </section>
      </section>
      <section class="last-works-calendar">
        <section class="last-works card">
          <h1>American Truck Simulator</h1>
          <h3>Servidores no Truckers MP de American Truck Simulator</h3>
          <div class="table">
            <table style="width:100%" border="0">
              <thead>
              <tr>
                <th>#</th>
                <th>Cidade</th>
                <th>IP</th>
                <th>Players</th>
                <th>Players em Espera</th>
                <th>Máximo de Players</th>
                <th>Promods</th>
                <th>Limite de Velocidade</th>
                <th>Estado</th>
              </tr>
              </thead>
              <tbody>
              <tr v-for="(server, index) in servers" :key="index">
                <td v-if="server.game === 'ATS'">{{ index+1 }}</td>
                <td v-if="server.game === 'ATS'">{{ server.name }}</td>
                <td v-if="server.game === 'ATS'">{{ server.ip }}</td>
                <td v-if="server.game === 'ATS'">{{ server.players }}</td>
                <td v-if="server.game === 'ATS'">{{ server.queue }}</td>
                <td v-if="server.game === 'ATS'">{{ server.maxplayers }}</td>
                <td v-if="server.game === 'ATS' && server.promods === true">Sim</td>
                <td v-if="server.game === 'ATS' && server.promods === false">Não</td>
                <td v-if="server.game === 'ATS' && server.speedlimiter === 1">129kmh / 80 mph</td>
                <td v-if="server.game === 'ATS' && server.speedlimiter === 0">Sem limite</td>
                <td v-if="server.online === true && server.game === 'ATS'" class="status-success"><i class="fa fa-circle"></i></td>
                <td v-if="server.online === false && server.game === 'ATS'" class="status-danger"><i class="fa fa-circle"></i></td>
              </tr>
              </tbody>
            </table>
          </div>
        </section>
        <section class="employers-online card">
          <h1>Empregados Online</h1>
          <h3>Empregados da BarcelCargo em trabalho no ATS</h3>
        </section>
      </section>
    </div>
  </div>
</template>
<script>
export default {
  data(){
    return {
      servers : null,
      servers_search: null
    }
  },
  methods: {
    citiesSearch : function () {
      console.log(this.search_city);
      return this.cities.filter((city) => {
        console.log(city.realName.toLowerCase());
        return city.realName;
      });
    },
    toProfile : function(nickname) {
      window.location.href = "/profile/" + nickname;
    }
  },
  mounted() {
    this.$http.get('https://api.truckersmp.com/v2/servers')
        .then((response) => {
          this.servers = response.data.response;
        }).catch((err) => {
      console.error(err);
    });
  }
}
</script>
<style lang="scss">
.cards {
  margin-top: 20px;
  width: 100%;
  height: auto;
  justify-content: center;
  grid-gap: 2%;
  grid-template-columns: 30% 30% 30% 30%;
  grid-template-rows: auto;
  display: grid;
}

.card {
  cursor: pointer;
  padding: 22px;
  width: 100%;
  height: auto;
  border-radius: 8px;
  background: rgb(27, 28, 31);
  background: linear-gradient(152deg, rgba(27, 28, 31, 1) 50%, rgba(23, 23, 26, 1) 50%);
}

.card h1 {
  font-size: 1.4em;
  line-height: 30px;
}

.card h3 {
  color: #5B5B5B;
  margin-top: 5px;
  margin-bottom: 13px;
  font-size: 1.1em;
  font-weight: normal;
  font-family: "Roboto", sans-serif;
}

.columns {
  grid-gap: 5%;
  grid-template-columns: 30% 30% 30%;
  grid-template-rows: auto;
  display: grid;
}

.column {
  width: 100%;
  height: 80px;
}

.column h4 {
  font-family: "PT Sans", sans-serif;
  font-weight: bold;
  color: #717172;
  text-align: center;
}

.column h1 {
  margin-top: 10px;
  font-size: 1.6em;
  font-weight: bold;
  line-height: 40px;
  text-align: center;
}

.servers {
  margin-top: 20px;
  width: 100%;
  height: auto;
  justify-content: center;
  grid-gap: 2%;
  grid-template-columns: 90% 30%;
  grid-template-rows: auto;
  display: grid;
}

.servers-list {
  cursor: pointer;
  padding: 12px 22px;
  width: 100%;
  height: auto;
  border-radius: 8px;
  background: rgb(27, 28, 31);
  background: linear-gradient(152deg, rgba(27, 28, 31, 1) 50%, rgba(23, 23, 26, 1) 50%);
}.cards {
  margin-top: 20px;
  width: 100%;
  height: auto;
  justify-content: center;
  grid-gap: 2%;
  grid-template-columns: 30% 30% 30% 30%;
  grid-template-rows: auto;
  display: grid;
}

.card {
  cursor: pointer;
  padding: 22px;
  width: 100%;
  height: auto;
  border-radius: 8px;
  background: rgb(27, 28, 31);
  background: linear-gradient(152deg, rgba(27, 28, 31, 1) 50%, rgba(23, 23, 26, 1) 50%);
}

.card h1 {
  font-size: 1.4em;
  line-height: 30px;
}

.card h3 {
  color: #5B5B5B;
  margin-top: 5px;
  margin-bottom: 13px;
  font-size: 1.1em;
  font-weight: normal;
  font-family: "Roboto", sans-serif;
}

.columns {
  grid-gap: 5%;
  grid-template-columns: 30% 30% 30%;
  grid-template-rows: auto;
  display: grid;
}

.column {
  width: 100%;
  height: 80px;
}

.column h4 {
  font-family: "PT Sans", sans-serif;
  font-weight: bold;
  color: #717172;
  text-align: center;
}

.column h1 {
  margin-top: 10px;
  font-size: 1.6em;
  font-weight: bold;
  line-height: 40px;
  text-align: center;
}

.servers {
  margin-top: 20px;
  width: 100%;
  height: auto;
  justify-content: center;
  grid-gap: 2%;
  grid-template-columns: 90% 30%;
  grid-template-rows: auto;
  display: grid;
}

.servers-list {
  cursor: pointer;
  padding: 12px 22px;
  width: 100%;
  height: auto;
  border-radius: 8px;
  background: rgb(27, 28, 31);
  background: linear-gradient(152deg, rgba(27, 28, 31, 1) 50%, rgba(23, 23, 26, 1) 50%);
}
</style>
