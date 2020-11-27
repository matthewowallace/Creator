<template>
      <div>
        <div class="input-form">
             <label class="custom-field three">
                <input :value="value" @input="updateValue($event.target.value)" :type="type" autocomplete="on" required/>
                <span :class="{'red': !!errors}" class="placeholder">{{placeholder}}</span>
                <span class="border"></span>
                 <img :src="resolve_img_url(picture_src)" alt="user-icon">
            </label>
         </div>
          <p class="error" v-if="!!errors">{{errors}}</p>
        </div>
</template>

<script>
export default {
    name: "Input",
    props:["errors", "type", "value", "picture_src" , "placeholder"],

    methods: {
    resolve_img_url: function (path) {
      let images = require.context('../../assets/icons', false, /\.png$|\.svg$|\.jpg$/)
      return images("./"+path)
    },

    updateValue(value){
        this.$emit("input", value)
    }
  },

}
</script>

<style scoped>
    .red{
        color: red;
    }

    .error{
        font-family: 'Poppins',sans-serif;
        color:red;
    }

</style>
