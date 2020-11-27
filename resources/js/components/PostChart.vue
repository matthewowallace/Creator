<template>
  <div>
    <div class="chart">
      <PieChart
        :data="data"
        pie-style="donut"
        label-position="center"
        legend
        theme="westeros"
      />
    </div>
  </div>
</template>

<script>
export default {
  name: "PieDonut",
  data() {
    return {

      colors:['#EC6110','#303030'],
      data: [
        {
          name: "Designers",
          value: 50,
          colors: '#303030'
        },
        {
          name: "Artiste",
          value: 35
        },
        {
          name: "Contributers",
          value: 100
        }
      ]
    };
  }
};
</script>
<style scoped>
.chart {
  width: 100%;
  height: 300px;
}
</style>
