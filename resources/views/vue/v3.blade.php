@extends('vue.index')

@section('content')



<div id="app3">

<v3
 v-for="item in users"
 v-bind:listusers="item"
 v-bind:key="item.id"
 ></v3>

</div>

@endsection