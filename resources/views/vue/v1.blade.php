@extends('vue.index')

@section('content')

<style type="text/css">

#tweety {
    display: flex;
    justify-content: center;
    align-items: center;

}

    .list__wrapper {
        height: 300px;
        width: 400px;
        background-color: #fff;
        border: 1px #eee solid;
        overflow: scroll;
    }

    .list {
        padding: 0;
        margin: 0;
        list-style: none;
    }

.list__item {
        min-height: 85px;
        border:1px solid green;
        font-size: 12pt;
    }

/*    .list li {
        padding: 10px;
        margin: 10px;
        font-size: 18pt;
    }*/
</style>

  <!-- Создаём экземпляр компонента v1 -->
 <!-- <v1
      v-for="item in forcompV1"
      v-bind:todo="item"
      v-bind:key="item.id">
      ></v1>
-->
    <div id="x2">
        <div id="tweety">
            <div class="list__wrapper" @scroll="onScroll">
                  <ul class="list">
                        <li  class="list__item" v-for="tweet in tweets">@{{ tweet.name }}</li>
                  </ul>
            </div>
        </div>
    </div>



<div id="app1">

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">V1</div>


                        <ul>
                          <!-- Создаём вложены экземпляр компонента v2 -->
                          <v2
                              v-for="item in groceryList"
                              v-bind:todo2="item"
                              v-bind:key="item.id">
                              ></v2>
                        </ul>




            </div>
        </div>
    </div>
</div>

</div>
@endsection
