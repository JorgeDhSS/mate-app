require('./bootstrap');

import swal from 'sweetalert';
window.Swal = swal;
window.$ = window.jQuery = require('jquery');
window.numeric = require('jquery.numeric');