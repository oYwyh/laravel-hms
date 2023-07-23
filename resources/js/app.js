import "./bootstrap";
import "../sass/app.scss";
import "../css/app.css";
import "./jquery.min.js";
import "@protonemedia/laravel-splade/dist/style.css";
// Vue.component('chart', require('./components/chart.vue'));

// import Chart from 'chart.js/auto';
// window.Chart = Chart;

import { createApp } from "vue/dist/vue.esm-bundler.js";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";
import Sidebar from "./components/Sidebar.vue";
import Chart from "./components/Chart.vue";
import Chart2 from "./components/Chart2.vue";
import { Session } from 'vue-session';

const el = document.getElementById("app");

createApp({
    render: renderSpladeApp({ el })
})
    .use(SpladePlugin, {
        "max_keep_alive": 10,
        "transform_anchors": false,
        "progress_bar": true
    })
    .component("chart",Chart2)
    // .component("chart2",Chart2)
    .mount(el);

