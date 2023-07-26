import "./bootstrap";
import "../css/app.css";
import "../sass/app.scss";
import Chart from './components/Chart.vue';
import "@protonemedia/laravel-splade/dist/style.css";
import Time from './components/Axios.vue';
import { createApp } from "vue/dist/vue.esm-bundler.js";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";

const el = document.getElementById("app");

createApp({
    render: renderSpladeApp({ el })
})
    .use(SpladePlugin, {
        "max_keep_alive": 10,
        "transform_anchors": false,
        "progress_bar": true
    })
    .component('chart',Chart)
    .component('timeCo',Time)
    .mount(el);
