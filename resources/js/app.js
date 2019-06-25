

try {
window.Popper = require('popper.js').default;
window.$ = window.jQuery = require('jquery');
require('./bootstrap');
require( 'datatables.net' );
require( 'datatables.net-editor' );
require("jszip");
require( "pdfmake" );

require( 'datatables.net-bs4' );
require( 'datatables.net-buttons' );
require( 'datatables.net-buttons-bs4' );
require( 'datatables.net-buttons/js/buttons.colVis.js' );
require( 'datatables.net-buttons/js/buttons.flash.js' );
require( 'datatables.net-buttons/js/buttons.html5.js' );
require( 'datatables.net-buttons/js/buttons.print.js' );
require( 'datatables.net-colreorder-bs4' );
require( 'datatables.net-fixedcolumns-bs4' );

require( 'datatables.net-keytable-bs4' );
require( 'datatables.net-responsive-bs4' );
require( 'datatables.net-rowreorder-bs4' );
require( 'datatables.net-scroller-bs4' );

require( 'datatables.net-rowgroup-bs4' );
require( 'datatables.net-select' );
require( 'datatables.net-select-bs4' );
require('sweetalert')

$('.datepicker').datepicker();

} catch (e) {}

/*
require( 'jquery' );
require( 'jszip' );
require( 'pdfmake' );
require( 'datatables.net' )();
require( 'datatables.net-bs4' )();
require( 'datatables.net-autofill-bs4' )();
require( 'datatables.net-buttons-bs4' )();
require( 'datatables.net-buttons/js/buttons.colVis.js' )();
require( 'datatables.net-buttons/js/buttons.flash.js' )();
require( 'datatables.net-buttons/js/buttons.html5.js' )();
require( 'datatables.net-buttons/js/buttons.print.js' )();
require( 'datatables.net-colreorder-bs4' )();
require( 'datatables.net-fixedcolumns-bs4' )();
require( 'datatables.net-fixedheader-bs4' )();
require( 'datatables.net-keytable-bs4' )();
require( 'datatables.net-responsive-bs4' )();
require( 'datatables.net-rowgroup-bs4' )();
require( 'datatables.net-rowreorder-bs4' )();
require( 'datatables.net-scroller-bs4' )();
require( 'datatables.net-select-bs4' )();


require('datatables.net-se/js/dataTables.semanticui.min.js');
require('datatables.net-buttons-se/js/buttons.semanticui.min.js');
require('datatables.net-editor-se/js/editor.semanticui.min.js');
require('datatables.net-select-se/js/select.semanticui.min.js');
require('datatables.net-scroller-se/js/scroller.semanticui.min.js');
require('datatables.net-rowreorder-se/js/rowreorder.semanticui.min.js');
require('datatables.net-rowgroup-se/js/rowgroup.semanticui.min.js');
require('datatables.net-fixedheader-se/js/fixedheader.semanticui.min.js');
*/
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


//window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('home', require('./components/Home.vue'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.


const app = new Vue({
    el: '#app'
});
 */