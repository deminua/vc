
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//import VueWebsocket from "vue-websocket";

window.Vue = require('vue');
Vue.use(require('vue-resource'));

import VueClip from 'vue-clip';
Vue.use(VueClip);

Vue.component('vclip', require('./components/vclip.vue'));
Vue.component('vclip2', require('./components/vclip2.vue'));

//Vue.use(VueClip);

const app = new Vue({
	el: '#app',
	//template: '<App/>',
	//components: { vclip }
})

//Vue.use(VueWebsocket, "ws://localhost:5001").

//import VueWebsocket from "vue-websocket";
//Vue.use(VueWebsocket);
//Vue.use(VueWebsocket, "ws://localhost:5001").

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
/*
Vue.component('example', require('./components/Example.vue'));
Vue.component('v1', require('./components/V1.vue'));
*/
//Vue.component('v3', require('./components/V3.vue'));


//Vue.http.headers.common['_token'] = Laravel.csrf_token;

//Vue.http.headers.post['X-CSRF-TOKEN'] = Laravel.csrfToken;

//import Dropzone from 'vue2-dropzone';

//Vue.component('v4', './components/V4.vue');

//Vue.component('dz', require('./components/dz.vue'));

/*
const app = new Vue({
  el: '#app',
  data: {
    selected: 'A',
    options: [
      { text: 'One', value: 'A' },
      { text: 'Two', value: 'B' },
      { text: 'Three', value: 'C' }
    ],
    toggle: 'a',
    picked: 'b',
  },
})*/



//app.$refs.myUniqueID.acceptedFileTypes('image/*');

//app.$refs.myVueDropzone.setOption('headers', {'X-CSRF-TOKEN': Laravel.csrfToken});


//Vue.component('v4', require('./components/v1.vue');

//vm.$refs.myUniqueID.processQueue();

/*

Vue.component('v2', {
  props: ['todo2'],
  template: '<li>{{ todo2.text }}</li>'
})

Vue.component('v3', {
  props: ['csrf_token'],
  template: '<li>{{ listusers.id }} | <b>{{ listusers.name }}</b></li>'
})

const app3 = new Vue({
    el: '#app3',

	  data: {
	    users: [],
	    resource_url: '/api/v1/user?api_token='+Laravel.api_token,
	    loading: false,
	  },
	  methods: {
	  	load: function(){
	  		this.loading = true
	  		this.$http.get(this.resource_url).then(function(response){

	  			this.users = response.data;
	  				this.loading = false
	  		}, function(error) {
	  			this.loading = false
	  		})
	  	}
	  },
	  created: function() {
	  	this.load()
	  }
})



// создание корневого экземпляра
//const x2 = new Vue({
new Vue({
  //el: '#x2',

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

*/