<template>
	<div>
		<candidates-panel v-for="(category,index) in categories" v-bind:category="category" :key="category.id"></candidates-panel>
	</div>
</template>
<script>
	import CandidatesPanel from './partials/CandidatesPanel.vue';
	export default{
		props:['category'],
		
		components:{
			CandidatesPanel
		},

		mounted() {
			var context = this;
			axios.get('get-candidates')
			.then(function(response){
				/**
				 * [categories]
				 * @type array
				 */
				context.categories = response.data;
			})
			.catch(function(error){

			})
		},
		data(){
			return {
				categories: [],
				notVoted: true
			}
		},
	}
</script>
<style></style>