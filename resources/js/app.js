// window.axios = require("axios");
// window.req = axios.create({
//     baseURL: "/"
// });
require('./bootstrap');
import Vue from 'vue';
import App from './components/App.vue';
import router from './router';
import { gsap, TweenMax } from "gsap";
import { ExpoScaleEase, RoughEase, SlowMo } from "gsap/EasePack";
import { Draggable } from "gsap/Draggable";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { BarChart,LineChart, PieChart} from 'dr-vue-echarts'
import ViewUI from 'view-design';
import 'view-design/dist/styles/iview.css';
import common from '../js/common';
import store  from '../js/store';
Vue.mixin(common);
Vue.use(BarChart);
Vue.use(LineChart);
Vue.use(PieChart);
Vue.use(ViewUI);

import Vuex from 'vuex';
Vue.use(Vuex);

gsap.registerPlugin(Draggable, ScrollToPlugin, ScrollTrigger, ExpoScaleEase, RoughEase, SlowMo);

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


window.Vue = require('vue');



const app = new Vue({
    el: '#app',
    router,
    store,
    render: home => home(App)
});


