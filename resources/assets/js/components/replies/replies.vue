<template>	
<div>
	<div v-for="reply in replies"> 
	
			<reply :reply=reply></reply>
		
	</div>
</div>
</div>
</template>
<script>
import reply from './reply'

	export default {
		components: {reply},
		props: ['product', 'question'],
		data() {
			return {
				errors: {},
				messages: {},
				replies: {}
			}
		},
		created(){

			this.getReplies()
		},
		methods: {
			getReplies(){
				axios
					.get(`/${this.product.slug}/${this.product.id}/question/reply/${this.question.id}`)
					.then(res => this.replies = res.data.data)
					.catch(err => console.log(error.response.data))
			}

		}
	}
</script>