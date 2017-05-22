<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Component V1</div>

                    <div class="panel-body">
                        <li>{{ todo.text }}</li>

<!--
						<ul>
						
						  <v2
						      v-for="item in todo"
						      v-bind:todo="item"
						      v-bind:key="item.id">
						      ></v2>
						</ul>
 -->


                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
	  props: ['todo']
	}
</script>
