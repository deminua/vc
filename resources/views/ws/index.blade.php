<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>

<input id="inputtext" name="text">
<button>Send Hello</button>

        <script type="text/javascript">
        	
        	var sock = new WebSocket("ws://localhost:5001");
        	sock.onopen = function(event){
        		/*
        		setTimeout(function(){

        			sock.send("Hey there");
        		}, 1000);
        		*/

        	};
        	sock.onmessage = function(event){
        		console.log(event.data);
        	};

        	document.querySelector('button').onclick = function(){
        		text = document.getElementById('inputtext').value;
        		sock.send(text);
        	};
        </script>


</body>
</html>
