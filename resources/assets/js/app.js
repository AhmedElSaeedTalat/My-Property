
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'Vuex';
window.scrollMonitor = require('scrollMonitor');
import vueRouter from 'vue-router';
window.vueRouter = require('vue-router'); 
import moment from 'moment-timezone';
 window.moment = require('moment');
 moment.tz.setDefault("utc");
import video from 'video.js';
window.video= require('video.js');
window.Laravel = [
    {'csrfToken': "csrf_token()"},
];
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const Main =   Vue.component('of', require('./components/Example.vue'));
const xx= Vue.component('Slider', require('./components/Slider.vue'));
Vue.component('Cont', require('./components/Content.vue'));
Vue.component('images', require('./components/images.vue'));
Vue.component('foot', require('./components/footer.vue'));
Vue.component('Ultimate', require('./components/Ultimate.vue'));
Vue.component('Description', require('./components/Description.vue'));
let Search = Vue.component('Search', require('./components/Search.vue'));
Vue.component('myHead', require('./components/myHead.vue'));
let Re= Vue.component('Register', require('./components/Register.vue'));
Vue.component('Nina', require('./components/Nina.vue'));
let welcome= Vue.component('welcome', require('./components/welcome'));
const Lo=Vue.component('Login', require('./components/Login.vue'));
const suzy=Vue.component('detailedPage', require('./components/detailedPage.vue'));
const romur=Vue.component('experience', require('./components/experience.vue'));
const romur1=Vue.component('experience1', require('./components/experience1.vue'));
const maps=Vue.component('maps', require('./components/maps.vue'));
import VueGoogleMap from 'vue2-google-maps';
window.VueGoogleMap = require('vue2-google-maps');
import VueVideoPlayer from 'vue-video-player';
import turbo from 'turbolinks';
window.turbo=require('turbolinks');
import vueResource from 'vue-resource';
Vue.use(vueResource);
// Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');
// const map= new VueGoogleMap({ 
//  load: {
//     key: 'AIzaSyBsrmPSrd760dGpVBThzMRRDq8_QklloG8',
//     v: '3.26',                // Google Maps API version 
//     // libraries: 'places',   // If you want to use places input 
//   }
// });
Vue.use(Vuex);
Vue.use(vueRouter);
Vue.use(turbo);
const router = new vueRouter({
   routes:[
      {path:"/MyProperty",component:Main,name:"Home"},
      {path:"/Search/:lugar",component:Search,name:"Search"},
      {path:"/Login",component:Re,name:"Login"},
      {path:"/welcome",component:welcome,name:"welcome"},
      {path:"/sign",component:Lo,name:"sign"},
      {path:"/details/:id",component:suzy,name:"details"},
     {path:"/experience",component:romur,name:"experience"},
          {path:"/experience1",component:romur1,name:"experience1"},
          {path:"/maps",component:maps,name:"maps"},

      {path:"*",redirect:{name:"Home"} }  
   ]
});
const store = new Vuex.Store({
state:{
   Houses:[],
   x:0,
   y:0,
   lola:false,
   block:false,
   agencyBlock:false,
   id:"",
   Locations:"",
   Searched:[],
   Searched1:[],
   lam:"",
   user:"",
   confirmId:"",
   Object:[],
   Notifications1:"",
   counter:"",
    arrayLength1:"",
       arrayLength2:"",
       somethingNew:""

},
mutations:{
	xY(state,payload){
        state.x= payload.x;
        state.y=payload.y
	},
	changeLola(state,payload){
        state.lola= payload;
        
	},
	id(state,payload){
		state.id=payload;
	},
  checkLocation(state,payload){
    state.Locations=payload;
  },

passProperty(state,payload){
      state.confirmId = payload.Id;
      state.Object = payload.Object;
},
ahmed(state,payload){
      state.Notifications1.push(payload[0]);
},
girl(state,payload){
  state.counter=payload;
},
removeCouter(state,payload){
  state.arrayLength1 = state.arrayLength1 +payload;
},
somethingNew(state,payload){
  state.somethingNew = payload
}
},
actions:{
	Lola(context,payload){
		if(context.state.lola == false){
        context.commit('changeLola',payload);
    }else{
    	context.state.lola=false;
    }
	}
},

});

const app = window.app = new Vue({
    el: '#app',
    // computed:{
    //     Notification(){
    //       return this.$store.state.Notifications1.length;
    //     }
    // },

    store,
    router,
    // map,
    beforeMount(){
    	axios.get("/xx")
    	.then(response => this.$store.state.Houses = response.data);
      axios.get("/lols")
      .then(response => this.$store.state.user=response.data);
         axios.get("/Notifications")
        .then(response =>{this.$store.state.Notifications1 = response.data
           this.$store.state.arrayLength1 =  response.data.length
                   });
        setInterval(()=>{
          axios.get("/Notifications")
        .then(response =>{this.$store.state.Notifications1 = response.data
                          this.$store.state.arrayLength2 =  response.data.length
                          if(this.$store.state.arrayLength2 !== this.$store.state.arrayLength1){
                            this.$store.state.counter = "1";
                          }
        })


        },3000);
       
    },
  // updated(){
  //   setInterval(   axios.get("/Notifications")
  //       .then(response =>this.$store.state.Notifications1 = response.data),3000);
  // }
  // render(createElement){
  //   return createElement(
  //        'div',
  //        {'attrs':{id:'app'}},
  //        [
  //       createElement('router-view')
  //        ]
  //     );
  // }
});
           // addEventListener("timeupdate",this.checkProgress(),false);

