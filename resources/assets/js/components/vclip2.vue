<template>
<!--
class="dropzone" id="dropzone"
	:on-drop="drop"
	:on-drag-enter="dragging"
	:on-drag-leave="stoppedDragging"


  :on-init="init"
-->
  <vue-clip
	:on-sending="sending"
	:options="options"
  :on-complete="complete"
  :on-removed-file="removedFile"
  >


    <template slot="clip-uploader-action" scope="params">


      <div v-bind:class="{'is-dragging': params.dragging}" class="upload-action">
        <div class="dz-message"><h2>Нажмите или перенесите сюда фотографии</h2></div>
      </div>
    <div class="nodrag"></div>
    </template>

    <template slot="clip-uploader-body" scope="props">
    <div class="uploader-files">
    	<div class="uploader-file col-md-3" v-for="(file, index) in props.files">
    		<div class="file-avatar">
    			<img v-bind:src="file.dataUrl" v-on:click="removedFile(file, index)">
    		</div>

    		<div class="file-details">
    			<div class="file-name">
    				{{ file.name }}</b>
    			</div>
    		</div>

    		<div class="file-progress" v-if="file.status !== 'error' && file.status !== 'success'">
    			<div class="progress-indicator" v-bind:style="{width: file.progress + '%'}"></div>
    		</div>

    		<div class="file-meta" v-else>
    			<span class="file-size">{{ file.size }}</span>
    			<span class="file-status">{{ file.status }}</span>
          <span>{{ file.message }}</span>
    		</div>
    	</div>
    </div>
    </template>


  </vue-clip>
</template>

<script>
  export default {

    data () {
      return {
        options: {
          url: '/files',
          //maxFilesize: 4,
		  maxFilesize: {
		    limit: 5,
		    message: '{{ filesize }} is greater than the {{ maxFilesize }}'
		  },
          parallelUploads: 5,
          /*
		  acceptedFiles: {
		    extensions: ['image/*'],
		    message: 'You are uploading an invalid file'
		  },
		  */
		  acceptedFiles: 'images/*,image/*',
          //paramName: 'file'
        },
        files: [],
      }
    },

    methods: {

/*      init (uploader) {
        console.log('javascript uploader instance')
      },

      addedFile (file) {
        this.files.push(file)
      },*/

      sending(file, xhr, formData) {
        formData.append('_token', Laravel.csrfToken)
      },


      removedFile(file, index) {
        //var accepted = confirm('Do you really want to delete the image?');
        //console.log(file);
        //console.log(index);
console.log(this.$children);
        //this.props.files.splice(index, 1)
        //Vue.delete(this.files, file);
        //console.log(file);
        //Vue.delete(file);
        //console.log(this.$children[index]);
        //console.log(this.files);
        var formData = new FormData();
        formData.append('_token', Laravel.csrfToken);
        formData.append('delete', file.customAttributes.delete_id);
        this.$http.post('/files/delete', formData);


        //this.$delete(this.files, file);
        //this.files.$remove(file);

        // this.$http.post('/files/delete/${file.customAttributes.id}'), {
        //       _token: 'Laravel.csrfToken'
        //     }

        //   var formData = new FormData();
        //   formData.append('foo', 'bar');

        //   this.$http.post('/api', formData)

        //.post('/files/delete')
       // .post('/files/delete/'+file.customAttributes.id)
        //.append('_token', Laravel.csrfToken)
        //.then(console.log)
        //.catch(console.error)
        //.console.log(file)
      },

      // removedFile (file) {
      //   console.log(file.customAttributes);
      // },

      complete (file, status, xhr) {
        // Adding server id to be used for deleting
        // the file.
        file.addAttribute('id', JSON.parse(xhr.response).id)
        file.addAttribute('delete', JSON.parse(xhr.response).delete_id)
        file.addAttribute('name', JSON.parse(xhr.response).name)
      },



      /*
      drop () {
      },
      stoppedDragging () {
      },
      dragging () {
      }
      */
    }

  }


       // var dropzoneId = "dropzone";

/*        window.addEventListener("dragenter", function(e) {
          if (e.target.id != dropzoneId) {
            e.preventDefault();
            e.dataTransfer.effectAllowed = "none";
            e.dataTransfer.dropEffect = "none";
          }
        }, false);*/
/*
        window.addEventListener("dragover", function(e) {
          if (e.target.id != dropzoneId) {
            e.preventDefault();
            e.dataTransfer.effectAllowed = "none";
            e.dataTransfer.dropEffect = "none";
          }
        });
        */

/*        window.addEventListener("drop", function(e) {
          if (e.target.id != dropzoneId) {
            e.preventDefault();
            e.dataTransfer.effectAllowed = "none";
            e.dataTransfer.dropEffect = "none";
            alert('123');
          }
        });*/


</script>

<style>

/*[draggable] {
    -moz-user-select: none;
    -khtml-user-select: none;
    -webkit-user-select: none;
    user-select: none;

    -khtml-user-drag: element;
    -webkit-user-drag: element;
}
*/


body {
	height: 800px;
}
	.file-avatar img {
		width:64px;
	}

	.file-detail {
		width:256px;
		display: inline-block;
	}

	.uploader {
		width: 400px;
		height:550px;
		border-radius: 6px;
		box-shadow: 1px 2px 19px rgba(195,195,195,0.43);

		background-color: #666;
		font-size:18px;
		color: #fff;
	}

/*
	.uploader * {
		box-sizing: border-box;
	}*/

	.uploader-action {
		padding: 20px;
		background-color: #f1f5ff;
		cursor: pointer;
		transition: background 300ms ease;
	}



	.dz-message {
		color: #94a7c2;
		text-align: center;
		padding: 20px 40px;
		border: 3px dashed #dfe8fe;
		border-radius: 4px;
		font-size: 16px;
		cursor: pointer;

	}

	.upload-action {
		background-color: #ccc;
	}


  .upload-action.is-dragging, .upload-action:hover {
    background: #666;
        z-index: 9999;
        position: relative;
  }

    .upload-action {
        z-index: 9999;
        position: relative;
    }

	.uploader-files {
		padding: 20px;
		/*z-index: -3;*/
	}
	.uploader-file {
		/*z-index: -2;*/
	}
	.file-progress {
		background: #efefef;
    height: 4px;
    border-radius: 4px;
	}
	.file-progress .progress-indicator {
		background: green;
    height: 4px;
    border-radius: 4px;
	}


/*
	.nodrag {
		background-color: #000;
		opacity: 0.5;
		position: fixed;
		height:100%;
		width:100%;
		left:0px;
		right:0px;
		top:0px;
		bottom: 0px;
		z-index: -1;
		display: none;
	}
	*/
	
	.dragdisable .uploader-files {
		z-index: -999;
	}
    
    .dragdisable .dz-message {
		background: #ff0000;
    }

</style>