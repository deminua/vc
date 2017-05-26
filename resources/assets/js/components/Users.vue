<template lang="html">
    <div>

      <form v-on:submit.prevent="createUser" method="POST">
        <div v-bind:class="{'form-group': true, 'has-error': errors.name}">
          <label>Name:</label>
          <input type="text" v-model="user.name" class="form-control">
          <span class="help-block" v-for="error in errors.name">{{ error }}</span>
        </div>
          <div v-bind:class="{'form-group': true, 'has-error': errors.email}">
            <label>Email:</label>
          <input type="email" v-model="user.email" class="form-control">
          <span class="help-block" v-for="error in errors.email">{{ error }}</span>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Create New User</button>
        </div>
      </form>

      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Имя</th>
            <th>E-mail</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <ProfileUser v-for="user in users" :key="users.id" :user="user"
            v-on:deleteuser="deleteUser"
            v-on:update-user="fetchUsers"
            >
          </ProfileUser>


        </tbody>

        <tfoot>
          <tr>
            <td colspan="3" class="text-center">
                <button v-if="pages.prev_page_url" v-on:click="fetchPrevUsers" type="button" class="btn btn-default">Prev</button>
                <button v-if="pages.next_page_url" v-on:click="fetchNextUsers" type="button" class="btn btn-default">Next</button>
            </td>
          </tr>
        </tfoot>

      </table>



    </div>
</template>

<script>
//import User from './components/User.vue';
//Vue.component('user', require('./components/User.vue'))
import ProfileUser from './User.vue';


export default {
  name: 'Users',
    data(){
      return {
        users: [],
        errors: [],
        pages: [],
        user: {
          name: '',
          email: '',
        }
      }
    },
    components: { ProfileUser },
    created(){
      this.fetchUsers();
    },
    methods:{
      fetchUsers(){
        this.$http.get('/users').then(response => {

          //or Use "no paginate"
          //this.users = response.data.users;

          this.users = response.data.users.data;
          delete response.data.users.data;

          this.pages = response.data.users;
        })
      },

      fetchNextUsers(){
        this.$http.get(this.pages.next_page_url)
        .then(response => {
          this.users = response.data.users.data;
          delete response.data.users.data;
          this.pages = response.data.users;
        })
      },


      fetchPrevUsers(){
        this.$http.get(this.pages.prev_page_url)
        .then(response => {
          this.users = response.data.users.data;
          delete response.data.users.data;
          this.pages = response.data.users;
        })
      },

      createUser(){
        this.$http.post('/users', this.user).then(response =>{
          this.users.push(response.data.user);
          this.user = {name: '', email: ''};
          console.log(response.data);
        }, response => {
          this.errors = response.data;
        });
      },
      deleteUser(user){
        this.$http.delete('/users/' + user.id).then(response => {
          let index = this.users.indexOf(user);
          this.users.splice(index, 1);
          console.log(response.data);
        });
      }
    }
  }
</script>
