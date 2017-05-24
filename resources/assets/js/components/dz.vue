<style>
    @import url("https://fonts.googleapis.com/icon?family=Material+Icons");
    @import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
</style>

<template>


  <div id="upload">


    <p>Welcome to <h1>xxx</h1> your Vue.js app!</p>
 
    <dropzone id="myVueDropzone" url="/post" v-on:vdropzone-success="showSuccess">
        <!-- Optional parameters if any! -->
        <input type="text" name="token" value="xxx">


    </dropzone>
 
  </div>

</template>
 
<script>
  import Dropzone from 'vue2-dropzone'
 
  export default {
   // name: 'UploadFile',
    components: {
      Dropzone,
    },

    props: ['message'],


    methods: {
      'showSuccess': function (file) {
        console.log('A file was successfully uploaded')
      },
    },


  }


  console.log(Laravel.csrfToken);
</script>