
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Event = new Vue();
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('voting-panel', require('./components/VotingPanel.vue'));
Vue.component('candidates-panel', require('./components/partials/CandidatesPanel.vue'));
Vue.component('result-list', require('./components/ResultList.vue'));
Vue.component('category-filter-bar', require('./components/partials/CategoryFilterBar.vue'))
Vue.component('tab', {
	data() {
		return {
			isActive: false
		}
	},

	created() {
		var context = this;
		Event.$on('result-is-set', function(){
			context.isActive = true;
		});
	}
})
const app = new Vue({
    el: '#app'
});
