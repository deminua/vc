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
    <div id="app">
    	<div class="container">
		    <div class="row">
		        <div class="col-md-12">
                    <div class="uploader">
                        <vclip></vclip>
                    </div>
                </div>
		    </div>
		</div>

    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
