

require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('posts', require('./components/Posts.vue').default);

let url = window.location.href;
let pageNumber = url.split('=')[1];

const app = new Vue({
    el: '#app',
    data:{
        blog:{},
    },
    mounted(){
        axios.post('/getPost',{
            'page':pageNumber
        })
            .then(response => {
                this.blog = response.data.data

            })
            .catch(error => {
                console.log(error);
            });
    }
});
