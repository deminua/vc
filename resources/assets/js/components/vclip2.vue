<template>
<!--
class="dropzone" id="dropzone"
-->
  <vue-clip
	:on-sending="sending"
	:options="options"
	:on-drop="drop"
	:on-drag-enter="dragging"
	:on-drag-leave="stoppedDragging
  ">
    <template slot="clip-uploader-action" scope="params">
      <div v-bind:class="{'is-dragging': params.dragging}" class="upload-action">
        <div class="dz-message"><h2> Click or Drag and Drop files here upload </h2></div>
      </div>
    </template>

    <template slot="clip-uploader-body" scope="props">
    <div class="uploader-files">
    	<div class="uploader-file col-md-3" v-for="file in props.files">
    		<div class="file-avatar">
    			<img v-bind:src="file.dataUrl" alt="">
    		</div>

    		<div class="file-details">
    			<div class="file-name">
    				{{ file.name }} <b>{{ file.status }}</b>
    			</div>
    		</div>

    		<div class="file-progress" v-if="file.status !== 'error' && file.status !== 'success'">
    			<div class="progress-indicator" v-bind:style="{width: file.progress + '%'}"></div>
    		</div>

    		<div class="file-meta" v-else>
    			<span class="file-size">{{ file.size }}</span>
    			<span class="file-status">{{ file.status }}</span>
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
          url: '/post',

		  acceptedFiles: {
		    extensions: ['image/*'],
		    message: 'You are uploading an invalid file'
		  },

          //paramName: 'file'
        },
        files: []
      }
    },

    methods: {
      sending (file, xhr, formData) {
        formData.append('_token', Laravel.csrfToken)
      },
      drop () {
        console.log('drop');
      },
      stoppedDragging () {
        console.log('stoppedDragging');
      },
      dragging () {
        console.log('dragging');
      }
    }

  }


        var dropzoneId = "dropzone";

/*        window.addEventListener("dragenter", function(e) {
          if (e.target.id != dropzoneId) {
            e.preventDefault();
            e.dataTransfer.effectAllowed = "none";
            e.dataTransfer.dropEffect = "none";
          }
        }, false);*/

        window.addEventListener("dragover", function(e) {
          if (e.target.id != dropzoneId) {
            e.preventDefault();
            e.dataTransfer.effectAllowed = "none";
            e.dataTransfer.dropEffect = "none";
          }
        });

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

[draggable] {
    -moz-user-select: none;
    -khtml-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    /* Required to make elements draggable in old WebKit */
    -khtml-user-drag: element;
    -webkit-user-drag: element;
}


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


	.uploader * {
		box-sizing: border-box;
	}

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

  .upload-action.is-dragging {
    background: green;
  }

	.uploader-files {
		padding: 20px;
	}
	.file-progress {
		background: #ccc;
		height:20px;
	}
	.file-progress .progress-indicator {
		background: blue;
		height:20px;
	}
</style>