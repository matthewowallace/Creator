<template>
  <div class="chart">
    <line-chart :data="data" area
         theme="westeros"
         zoom
         smooth
    />
  </div>
</template>

<script>
export default {
  name: "LineStack",
  data() {
    return {
      data: [
        {
          name: "Active",
          data: [
            { label: "2014", value: 0 },
            { label: "2015", value: 10000 },
            { label: "2016", value: 1040000 },
            { label: "2017", value: 1200000 },
            { label: "2018", value: 1800000 },
            { label: "2019", value: 2000000 }
          ]
        },
        {
          name: "InActive",
          data: [
            { label: "2014", value: 0 },
            { label: "2015", value: 40000 },
            { label: "2016", value: 540000 },
            { label: "2017", value: 400000 },
            { label: "2018", value: 600000 },
            { label: "2019", value: 700000 }
          ]
        },
            {
          name: "Idle",
          data: [
            { label: "2014", value: 0 },
            { label: "2015", value: 20000 },
            { label: "2016", value: 40000 },
            { label: "2017", value: 400000 },
            { label: "2018", value: 300000 },
            { label: "2019", value: 100000 }
          ]
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
