import './bootstrap';
import '../css/app.css';

import {createApp, h} from 'vue';
import {createInertiaApp} from '@inertiajs/inertia-vue3';
import {InertiaProgress} from '@inertiajs/progress';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {ZiggyVue} from '../../vendor/tightenco/ziggy/dist/vue.m';
import VueApexCharts from "vue3-apexcharts"
import 'v-calendar/dist/style.css';
import VCalendar from 'v-calendar';
/* Set up using Vue 3 */

/* import the fontawesome core */
import {library} from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'

/* import specific icons */
import {
    faUserSecret,
    faCoins,
    faChartLine,
    faBan,
    faUpLong,
    faArrowTrendDown,
    faArrowTrendUp,
    faBolt,
    faBullseye,
    faClipboard,
    faTrophy
} from '@fortawesome/free-solid-svg-icons'

/* add icons to the library */
library.add(faUserSecret, faCoins, faChartLine, faBan, faUpLong, faArrowTrendDown, faArrowTrendUp, faBolt, faBullseye, faClipboard, faTrophy)



const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'K UI';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({el, app, props, plugin}) {
        return createApp({render: () => h(app, props)})
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(VueApexCharts)
            .use(VCalendar)
            .component('font-awesome-icon', FontAwesomeIcon)
            .mount(el);
    },
});

InertiaProgress.init({color: '#9333EA'});
