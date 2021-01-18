<template>
  <div>
    <h1>Conta Corrente</h1>
    <h3>Saldo da minha conta corrente</h3>
    <h1 class="big-number">{{ total }}<br></h1>
    <h2 class="text-right">EUR</h2>
  </div>
</template>
<script>
export default {
  name: 'Balance',
  props: {
    total: {
      type: String
    }
  }
};
</script>