<template>
<div>
  <div class="chart">
    <BarChart
      :data="data"
      label-rotate
      zoom
      theme="westeros"

     />
  </div>
</div>
</template>

<script>
export default {
  name: "BarLabelRotate",
  data() {
    return {

    //   colors:['#fc9621'],

      data: [
        {
          name: "PopularMessages",
          data: [
            { label: '2014', value: 9 },
            { label: '2015', value: 16 },
            { label: '2016', value: 15 },
            { label: '2017', value: 18 },
            { label: '2018', value: 20 },
            { label: '2019', value: 5 },
            { label: '2020', value: 9 },
          ]
         },
        {
          name: "ActiveMessages",
          data: [
            { label: '2014', value: 2 },
            { label: '2015', value: 10 },
            { label: '2016', value: 15 },
            { label: '2017', value: 58 },
            { label: '2018', value: 20 },
            { label: '2019', value: 15 },
            { label: '2020', value: 19 },
          ]
        },
        {
          name: "DeletedMessages",
          data: [
            { label: '2014', value: 82 },
            { label: '2015', value: 50 },
            { label: '2016', value: 35 },
            { label: '2017', value: 58 },
            { label: '2018', value: 20 },
            { label: '2019', value: 45 },
            { label: '2020', value: 19 },
          ]
        },
      ]
    };
  }
};
</script>

<style scoped>
.chart {
  width: 100%;
  height: 70vh;
}
</style>
