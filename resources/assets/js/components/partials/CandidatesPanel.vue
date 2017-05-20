<template>
	<transition name="slide">
		<div v-if="notVoted">
		<div class="col-md-6 col-md-offset-3">
			<div class="alert" :class="{'alert-success':hasVoted.successAlert, 'alert-danger':hasVoted.failureAlert}" v-if="hasVoted.status">{{ hasVoted.message }}</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>{{ category.name }}</h3>
				</div>
				<div class="panel-body">
					<h4>Candidates</h4>
					<div class="list-group">
						<div class="list-group-item" v-for="candidate in candidates">
							<label for="candidate">
								<input type="radio" name="candidate" id="candidate" class="btn btn-primary" :value="candidate.id" v-model="selectedCandidate" @click="onSelectCandidate(candidate.name,candidate.id,category.id)"> 
								{{ candidate.name }}
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</transition>
</template>
<script>
	export default{
		props: ['category'],
		/*mounted(){
			var context = this;
			axios.get('votes-with-category')
			.then(function(response){
				console.log(response.data);
			})
			.catch(function(){

			})
		},*/
		data(){
			return {
				candidates: this.category.candidates,
				selectedCandidate: '',
				notVoted: true,
				hasVoted: {
					status: false,
					successAlert: false,
					message: '',
					failureAlert: false,
					failureMessage: ''
				}
			}
		},
		methods:{
			onSelectCandidate(candidateName,candidateId,categoryId) {
				if(confirm("do you want"+candidateName+"?")){
					this.submitVote(candidateName,candidateId,categoryId);
				}else{
					this.selectedCandidate = '';
				}
			},

			submitVote(candidateName,candidateId,categoryId) {
				var context = this;
				axios.post('/vote',{
					candidate_id: candidateId,
					category_id: categoryId
				})
				.then(function(response){
					if(response.data.voted){
						context.hasVoted.status = true;
						context.hasVoted.successAlert = true;
						context.hasVoted.message = "you have successfully voted for "+candidateName+" !";
					} else{

					}
				})
				.catch(function(error){
					console.log(error.response.data.voted);
					if(error.response.data.voted=='false'){
						context.hasVoted.status = true,
						context.hasVoted.failureAlert = true,
						context.hasVoted.message = "you have already voted in this category"
					}
				})
			},

		}
	}
</script>
<style>
	.slide-enter-active {
  transition: all .6s ease-in;
}
.slide-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-enter, .slide-leave-to
/* .slide-fade-leave-active for <2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}
</style>