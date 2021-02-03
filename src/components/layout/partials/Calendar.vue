<template>
  <div>
    <v-calendar
      ref="calendar"
      v-model="focus"
      color="#3AC1E6"
      :now="today"
      :dark="true"
    ></v-calendar>
  </div>
</template>
<script>
export default {
  data () {
    return {
      focus: new Date().toISOString().substr(0, 10),
      today: new Date().toISOString().substr(0, 10)
    }
  }
}
</script>
