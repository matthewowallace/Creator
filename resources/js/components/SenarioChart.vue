<template>
  <div class="chart">
    <LineChart
      :data="data"
      smooth
      zoom
      theme="westeros"

    />
  </div>
</template>

<script>
export default {
  name: "LineBase",
  data() {
    return {
      data: [
          {
          name: "inActive",
          data: [
            { label: "2014", value: 0 },
            { label: "2015", value: 100 },
            { label: "2016", value: 140000 },
            { label: "2017", value: 12000 },
            { label: "2018", value: 18000 },
            { label: "2019", value: 20000 }
          ]
        },
        {
          name: "Active",
          data: [
            { label: "2014", value: 2000 },
            { label: "2015", value: 3000 },
            { label: "2016", value: 6000 },
            { label: "2017", value: 400000 },
            { label: "2018", value: 800 },
            { label: "2019", value: 60000 }
          ]
        },
            {
          name: "Deleted",
          data: [
            { label: "2014", value: 10 },
            { label: "2015", value: 200 },
            { label: "2016", value: 400 },
            { label: "2017", value: 4000 },
            { label: "2018", value: 1000 },
            { label: "2019", value: 3000 }
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
