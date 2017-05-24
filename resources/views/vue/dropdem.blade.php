@extends('layouts.app')

@section('content')

<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">


<script type="text/javascript">
		var dropzoneId = "dropzone";

		window.addEventListener("dragenter", function(e) {
		  if (e.target.id != dropzoneId) {
		    e.preventDefault();
		    e.dataTransfer.effectAllowed = "none";
		    e.dataTransfer.dropEffect = "none";
		  }
		}, false);

		window.addEventListener("dragover", function(e) {
		  if (e.target.id != dropzoneId) {
		    e.preventDefault();
		    e.dataTransfer.effectAllowed = "none";
		    e.dataTransfer.dropEffect = "none";
		  }
		});

		window.addEventListener("drop", function(e) {
		  if (e.target.id != dropzoneId) {
		    e.preventDefault();
		    e.dataTransfer.effectAllowed = "none";
		    e.dataTransfer.dropEffect = "none";
		    alert('123');
		  }
		});
</script>

<div class="container">
	<div class="row">
		<form action="/upload-target" class="dropzone" id="dropzone"></form>
		<div class="bg-primary">...</div>
		<div class="bg-success">...</div>
		<div class="bg-info">...</div>
		<div class="bg-warning">...</div>
		<div class="bg-danger">...</div>  
	</div>
</div>

@endsection