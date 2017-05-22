
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.use(require('vue-resource'))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('v1', require('./components/V1.vue'));

Vue.component('v2', {
  props: ['todo2'],
  template: '<li>{{ todo2.text }}</li>'
})


// создание корневого экземпляра
const x2 = new Vue({
  el: '#x2',

	  data: {
	    tweets: [],
	    resource_url: 'http://vc.dev/users',
	    loading: false,
	  },
	  methods: {
	  	onScroll:function(event) {
	  		var wrapper = event.target,
	  		list = wrapper.firstElementChild

	  		var scrollTop = wrapper.scrollTop,
	  			wrapperHeight = wrapper.offsetHeight,
	  			listHeight = list.offsetHeight

	  		var diffHeight = listHeight - wrapperHeight

	  		if(diffHeight <= scrollTop && !this.loading){
	  			this.load()
	  		}
	  	},
	  	load: function(){
	  		this.loading = true
	  		this.$http.get(this.resource_url).then(function(response){
	  			var json = response.data,
	  				tweets = json.data

	  				this.tweets = this.tweets.concat(tweets)
	  				this.resource_url = json.next_page_url
	  				this.loading = false
	  		}, function(error) {
	  			//console.log(error)
	  			this.loading = false
	  		})
	  	}
	  },
	  created: function() {
	  	this.load()
	  }
})




const app1 = new Vue({
    el: '#app1',

  data: {
    message: 'Hello Vue!',
    groceryList: [
      { id: 0, text: 'Овощи' },
      { id: 1, text: 'Сыр' },
      { id: 2, text: 'Что там ещё люди едят?' }
    ],
    forcompV1: [
      { id: 0, text: 'Запись 1 для компонента v1' },
      { id: 1, text: 'Запись 2 для компонента v1' },
      { id: 2, text: 'Запись 3 для компонента v1' }
    ],
  },

});

