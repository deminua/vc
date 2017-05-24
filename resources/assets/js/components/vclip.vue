<template>
  <vue-clip :on-sending="sending" :options="options">
    <template slot="clip-uploader-action">
      <div>
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
      }
    }

  }

</script>

<style>

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