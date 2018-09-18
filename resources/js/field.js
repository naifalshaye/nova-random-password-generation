Nova.booting((Vue, router) => {
    Vue.component('index-generate-password', require('./components/IndexField'));
    Vue.component('detail-generate-password', require('./components/DetailField'));
    Vue.component('form-generate-password', require('./components/FormField'));
})
