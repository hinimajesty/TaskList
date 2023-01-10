import './bootstrap';
import Vue from 'vue';
import App from './components/App.vue';
import VModal from 'vue-js-modal';


new Vue(App);

Vue.use(VModal, {
    dialog: true,
    dynamicDefaults: {
        draggable: true
    }
});
