<template>
   <main>
       <div>
        <!-- <MainNav /> -->
       <!-- <getStarted /> -->
       <router-view></router-view>
       </div>
   </main>
</template>

<script>

import MainNav from './MainNav';
import * as auth from '../auth_services';
export default {

      name: 'app',
      data() {
          return {
              user:null,
              loading: false,
              initiated: false,
          };
      },

      name:"App",

      components :{
         MainNav,
      },

    beforeCreate: async function(){
        try{
            if(auth.isLoggedIn()){
                const response = await auth.getProfile();
                this.$store.dispatch('authenticate', response.data);
            }
        }catch(error){
            auth.logout();
        }
    }

}
</script>

<style>

    #app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 0px;

}
  html, body{
    background-color:#FFF;
    padding: 0;
    margin: 0;
  }

html {
  --scrollbarBG: #CFD8DC;
  --thumbBG: #90A4AE;
  scroll-behavior: smooth;
}

body::-webkit-scrollbar {
  width: 3px;
}
body::-webkit-scrollbar:hover{
  width: 10px;
}
body {
  scrollbar-width: thin;
  scrollbar-color: var(--thumbBG) var(--scrollbarBG);
}
body::-webkit-scrollbar-track {
  background: var(--scrollbarBG);
  background-color: #ccc;
}
body::-webkit-scrollbar-thumb {
  background-color: var(--thumbBG) ;
  background-color: #303030;
  border-radius: 0px;
  border: 0px solid var(--scrollbarBG);
}

.VueCarousel-inner {
    display: flex;
    flex-direction: row;
    backface-visibility: hidden;
    height: 300px !important;
}

::placeholder{
    color:#686868;
}

.ivu-rate {
    display: inline-block;
    margin: 10px 10px !important;
    padding: 0;
    font-size: 20px;
    vertical-align: middle;
    font-weight: 400;
    font-style: normal;
}


    a:hover{
        text-decoration: none !important;
        list-style: none !important;
        color:#EC6110 !important;
    }

.input-form img{
        position: absolute;
        top: 45%;
        left: 80%;
        max-width: 25px;
    }

.input-form{
    position: relative;
 }

.custom-field {
  position: relative;
  font-size: 14px;
  padding-top: 20px;
  margin-bottom: 5px;
}

.custom-field input {
  border: none;
  -webkit-appearance: none;
  -ms-appearance: none;
  -moz-appearance: none;
  appearance: none;
  background: transparent;
  padding: 15px 40px;
  border-radius: 3px;
  width: 300px;
  outline: none;
  font-size: 14px;
    /* box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08); */
}

.custom-field .placeholder {
  position: absolute;
  left: 12px;
  top: calc(50% + 10px);
  transform: translateY(-50%);
  color: #222;
  font-weight: bold;
  font-family: 'Nunito',sans-serif;
  transition:
    top 0.3s ease,
    color 0.3s ease,
    font-size 0.3s ease;
}

.custom-field input:valid + .placeholder,
.custom-field input:focus + .placeholder {
  top: 10px;
  font-size: 10px;
  color: #222;
}


    /* THREE */
    .custom-field.three {
    --draw-duration: 0.1s;
    --draw-color: #222;
    --draw-line-width: 2px;
    --draw-easing: linear;
    }

    .custom-field.three .border {
    width: 100%;
    height: calc(100% - 20px);
    position: absolute;
    left: 0;
    top: 20px;
    transform: none;
    display: flex;
    align-items: center;
    padding-left: 12px;
    border-radius: 3px;
    }

    .custom-field.three .border::after,
    .custom-field.three .border::before {
    content: "";
    width: 0;
    height: 0;
    display: inline-block;
    position: absolute;
    border-radius: 3px;
    }

    .custom-field.three .border::before {
    left: 0;
    bottom: 0;
    border-right: 0px solid var(--draw-color);
    border-bottom: 0px solid var(--draw-color);
    transition:
        border 0s linear calc(var(--draw-duration) * 4),
        height var(--draw-duration) var(--draw-easing) calc(var(--draw-duration) * 2),
        width var(--draw-duration) var(--draw-easing) calc(var(--draw-duration) * 3);
    }

    .custom-field.three .border::after {
    right: 0;
    top: 0;
    border-left: 0px solid var(--draw-color);
    border-top: 0px solid var(--draw-color);
    transition:
        border 0s linear calc(var(--draw-duration) * 2),
        height var(--draw-duration) var(--draw-easing),
        width var(--draw-duration) var(--draw-easing) var(--draw-duration);
    }

    .custom-field.three input:focus ~ .border::before,
    .custom-field.three input:valid ~ .border::before,
    .custom-field.three input:focus ~ .border::after,
    .custom-field.three input:valid ~ .border::after {
    width: 100%;
    height: 100%;
    border-width: var(--draw-line-width);
    }

    .custom-field.three input:valid ~ .border::before,
    .custom-field.three input:focus ~ .border::before {
    transition-delay: 0s, var(--draw-duration), 0s;
    }

    .custom-field.three input:valid ~ .border::after,
    .custom-field.three input:focus ~ .border::after {
    transition-delay:
        calc(var(--draw-duration) * 2),
        calc(var(--draw-duration) * 3),
        calc(var(--draw-duration) * 2);
    }


    .menu button:focus{
        outline: none;
    }

    .router-link-exact-active.active{
        color:tomato !important;
    }

    .ivu-menu-light.ivu-menu-horizontal .ivu-menu-item-active, .ivu-menu-light.ivu-menu-horizontal .ivu-menu-item:hover, .ivu-menu-light.ivu-menu-horizontal .ivu-menu-submenu-active, .ivu-menu-light.ivu-menu-horizontal .ivu-menu-submenu:hover {
        color: #516b91 !important;
        border-bottom: none  !important;
    }

    .ivu-menu-light.ivu-menu-horizontal .ivu-menu-item-active, .ivu-menu-light.ivu-menu-horizontal .ivu-menu-item:hover, .ivu-menu-light.ivu-menu-horizontal .ivu-menu-submenu-active, .ivu-menu-light.ivu-menu-horizontal .ivu-menu-submenu:hover {
        color: #000;
        border-bottom: none !important;
    }

    .ivu-modal-content {
        position: relative;
        background-color: transparent !important;
        border: 0;
        border-radius: 0px !important;
        background-clip: padding-box;
        -webkit-box-shadow: 0 4px 12px rgba(0,0,0,.15);
        box-shadow: 0 4px 12px rgba(0,0,0,.15);
        backdrop-filter: blur(20px);
    }

    .ivu-modal-header {
        border-bottom: 1px solid #e8eaec;
        padding: 14px 16px;
        line-height: 1;
        font-family: 'Fenotype',sans-serif !important;
        text-transform: uppercase;
    }

    .ivu-modal-header p, .ivu-modal-header-inner {
        display: inline-block;
        width: 100%;
        height: 30px !important;
        line-height: 20px;
        font-size: 18px !important;
        color: #4d4d4d !important;
        font-weight: 500;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .ivu-input {
        display: inline-block;
        width: 100%;
        height: 42px !important;
        line-height: 1.5;
        padding: 8px 7px !important;
        font-size: 14px;
        border: 1px solid #dcdee2;
        border-radius: 0px !important;
        color: #fff !important;
        background-color: transparent !important;
        background-image: none;
        position: relative;
        cursor: text;
        margin-bottom: 20px;
        -webkit-transition: border .2s ease-in-out,background .2s ease-in-out,-webkit-box-shadow .2s ease-in-out;
        transition: border .2s ease-in-out,background .2s ease-in-out,-webkit-box-shadow .2s ease-in-out;
        transition: border .2s ease-in-out,background .2s ease-in-out,box-shadow .2s ease-in-out;
        transition: border .2s ease-in-out,background .2s ease-in-out,box-shadow .2s ease-in-out,-webkit-box-shadow .2s ease-in-out;
    }

    .ivu-upload-drag {
    background: transparent !important;
    border: 1px dashed #dcdee2;
    border-radius: 4px;
    text-align: center;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    transition: border-color .2s ease;
}

.ivu-upload-drag p{
   color:#fff !important;
}

    .ivu-modal-body {
        padding: 36px !important;
        font-size: 14px;
        line-height: 1.5;
    }

     .ivu-select-single .ivu-select-selection {
        height: 41px !important;
        position: relative;
    }

    .ivu-notice-notice{
        background-color: #303030ea !important;
        color:#fff !important;
    }

    .ivu-notice-desc {
        font-size: 10px !important;
        color: #fff !important;
        text-align: justify;
         font-family: 'Poppins' !important;
        line-height: 1.5;
    }

    .ivu-notice-notice-content{
         color:#fff !important;
    }

    .ivu-notice-title {
        font-size: 20px;
        font-family: 'Poppins' !important;
        font-weight:bold;
        line-height: 19px;
        color: #fff !important;
        padding-right: 10px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .VueCarousel-slide {
        flex-basis: auto !important;
        flex-grow: 0;
        flex-shrink: 0;
        user-select: none;
        backface-visibility: hidden;
        -webkit-touch-callout: none;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        outline: none;
    }

    .VueCarousel-pagination[data-v-438fd353] {
        width: 100%;
        text-align: center;
        display: none !important;
    }



    /* Desktops and laptops ----------- */
@media only screen
and (max-width : 1224px) {

    .custom-field input {
        border: none;
        -webkit-appearance: none;
        -ms-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background: #fff;
        padding: 12px 23px;
        border-radius: 3px;
        width: 251px;
        outline: none;
        font-size: 16px;
        /* box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08); */
    }

}





</style>
