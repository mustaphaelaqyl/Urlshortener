require('./bootstrap');
import { createApp, h,Vue } from 'vue';

import { createInertiaApp } from '@inertiajs/vue3'

createInertiaApp({
    title: title => `${title} - URL Shortener`,
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
       createApp({ render: () => h(App, props) })
        .use(plugin)
        .mixin({methods:{route}})
        .mount(el)
    },
})