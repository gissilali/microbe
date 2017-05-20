<template>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<ul class="nav nav-pills">
		  		<tab inline-template v-for="(category,index) in categories" :key="index">
		  			<li class="active" @click="onSelectCategory(category.id)"><a href="#">{{ category.name }}</a></li>
		  		</tab>
			</ul>
		</div>
	</div>
</template>
<script>
	export default {
		mounted() {
			var context = this;
			console.log(this.$children)
			axios.get('get-candidates')
			.then(function(response){
				context.categories = response.data;
			})
		},

		data() {
			return {
				categories: {}
			}
		},

		methods: {
			onSelectCategory(categoryId) {
				Event.$emit('category-selected', categoryId);
			},

			scammmer(){
				alert('spam');
			}
		}
	}
</script>
<style>
</style>