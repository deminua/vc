
<template>
  <tr>
    <td>
      <input type="text" class="form-control" v-model="editForm.name" v-if="edit">
      <span class="cursor" v-on:click="editUser" @mouseover="show = !show" @mouseleave="show = false" v-else>
        {{ user.name }}
        <span v-bind:class="[editPencil]" v-show="show"></span>
      </span>

    </td>
    <td>
      <input type="text" class="form-control" v-model="editForm.email" v-if="edit">
        <span v-else>{{ user.email }}</span>
    </td>
    <td>
      <button v-on:click="editUser" type="button" class="btn btn-success" v-if="!edit">Edit</button>
      <button v-on:click="updateUser(user, editForm)" type="button" class="btn btn-primary" v-if="edit">Update</button>
      <button v-on:click="cancelEdit" type="button" class="btn btn-default" v-if="edit">Cancel</button>
      <button v-on:click="$emit('deleteuser', user)" type="button" class="btn btn-danger" v-if="!edit">Delete</button>
    </td>
  </tr>
</template>


<script>
export default {
    name: 'ProfileUser',
    props: ['user'],
    data(){
      return {
        edit: false,
        editForm: {
          name: '',
          email: ''
        },
        editPencil: 'glyphicon glyphicon-pencil',
        show: false,

      }
    },
    methods: {
      editUser(){
        this.edit = true;
        this.editForm.name = this.user.name;
        this.editForm.email = this.user.email;
      },
      cancelEdit(){
        this.edit = false;
        this.editForm.name = '';
        this.editForm.email = '';
        this.show = false;

      },
      updateUser(oldUser, newUser){
        this.$http.patch('/users/'+oldUser.id, newUser).then(response => {
          this.$emit('update-user');
          this.cancelEdit();
          //console.log(response.data);
        })
      }
    }

}
</script>


<style media="screen">
  .cursor {
    cursor: pointer;
  }
</style>
