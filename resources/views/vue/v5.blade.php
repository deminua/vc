@extends('vue.index')

@section('content')

<select v-model="selected">
  <option v-for="option in options" v-bind:value="option.value">
    @{{ option.text }}
  </option>
</select>
<span>Выбрано: @{{ selected }}</span>

<hr>

<!-- `picked` получает строковое значение "a" при клике -->
<input type="radio" v-model="picked" value="a">
<!-- `toggle` может иметь значение true или false -->
<input type="checkbox" v-model="toggle" v-bind:true-value="a" v-bind:false-value="b">
<!-- `selected` при выборе становится равным строке "abc" -->
<select v-model="selected">
  <option value="abc">ABC</option>
</select>



@endsection