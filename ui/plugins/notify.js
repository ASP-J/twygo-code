import Toast, { useToast } from 'vue-toastification';
import 'vue-toastification/dist/index.css';

export default defineNuxtPlugin((NuxtApp) => {
    NuxtApp.vueApp.use(Toast);
    const toast = useToast();
    NuxtApp.provide('notify', (type = 'success', text = '', options = {}) => {
        options = {
            hideProgressBar: true,
            ...options,
        };
        return toast[type](text, options);
    });
});