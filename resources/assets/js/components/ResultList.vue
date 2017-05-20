<template>
	<div class="container">
	<category-filter-bar></category-filter-bar>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
				<table class="table">
			    	<thead class="thead-inverse">
				      <tr>
				        <th>#</th>
				        <th>Name</th>
				        <th>Total Votes</th>
				      </tr>
			    	</thead>
				    <tbody>
				      <tr v-for="(results, index) in categoryResults" :key="index">
				        <td>{{ index+1 }}</td>
				        <td>{{ results.candidate.name }}</td>
				        <td>{{ results.total_votes }}</td>
				      </tr>
				    </tbody>
  			</table>
        </div>
    </div>
</div>
</template>
<script>
	import CategoryFilterBar from './partials/CategoryFilterBar.vue'
	export default {
		components:[
			CategoryFilterBar
		],

		mounted() {
			var context = this;
			axios.post('/results', {
				category_id: 1
			})
			.then(function(response){
				context.categoryResults = response.data;
			});
		},

		created() {
			var context = this;
			Event.$on('category-selected', function(categoryId){
				console.log(categoryId);
				axios.post('/results', {
					category_id: categoryId
				})
				.then(function(response){
					context.categoryResults = response.data;
				});
			});
			Event.$emit('result-is-set');
		},

		data() {
			return {
				categoryResults: [],
				tabSelected:false
			}
		},

		methods: {

		}


	}
</script>
<style>
	.table{
		margin-top:40px;
	}
</style>