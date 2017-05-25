<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (!auth()->guest())<meta name="api_token" content="{{ auth()->user()->api_token }}">@endif

<script type="text/javascript">
<?php
    $security['csrfToken'] = csrf_token();
    if(!auth()->guest()) { $security['api_token'] = auth()->user()->api_token; }

?>
    window.Laravel = <?php echo json_encode($security); ?>
</script>


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>

<style type="text/css">
    .dragdisable {
        /*
    -webkit-filter: blur(5px);
    -moz-filter: blur(5px);
    filter: blur(5px);
    */
    /*
    opacity: 0.5;
    background-color: #000;
    width:100%;
    height: 100%;
    display: block;
    position: fixed;
    z-index: -1;
    */

    }

    .dragdisable {
        
        z-index:999; display: block; height: 100%; width:100%; position: fixed;
        background-color: #000;
        opacity: 0.8;
    }



/*    .dragdisable .upload-action {
        position: fixed;
        left:20px;
        right:20px;
        top:20px;
        bottom: 20px;
    }*/

    /*
    .dragdisable .dz-message {
        width:300px;
    }

    @dragleave="dragleave"  @dragover="dragover"
    */
</style>

    <div id="app" @dragover.prevent="dragover">

    <div @dragleave.prevent="dragleave" v-bind:class="{ dragdisable: isNoActive }"></div>

    	<div class="container">
		    <div class="row">
		        <div class="col-md-12">

            <h1>Drag and Drop files uploader</h1>
                        
                        <vclip2></vclip2>
                    
                </div>


                <div class="col-md-6">
                    sdfasdf
                </div>
                <div class="col-md-6">
                    sdfasdf
                </div>

		    </div>
		</div>

    
    </div>


    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
