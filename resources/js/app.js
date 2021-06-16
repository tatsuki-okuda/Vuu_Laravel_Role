require('./bootstrap');

// Import modules...
import { createApp, h } from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { createI18n } from 'vue-i18n';
// import CKEditor from '@ckeditor/ckeditor5-vue';
// require('@ckeditor/ckeditor5-build-classic/build/translations/ja');


const el = document.getElementById('app');


const i18n = createI18n({
    locale: 'ja',
    messages: {
        ja : require('./../lang/ja.json'),  // resources/lang/ja.json を参照
    },
});
  
  
const app = createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}`).default,
        }),
})

app.mixin({ methods: { route } })
// app.use( CKEditor )
app.use(InertiaPlugin)
app.use(i18n)
app.mount(el);

InertiaProgress.init({ color: '#4B5563' });