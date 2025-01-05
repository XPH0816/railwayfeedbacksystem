import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}
