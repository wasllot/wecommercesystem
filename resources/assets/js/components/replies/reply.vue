<template>
		<div class="row px-1">
		    <div class="col-md-1 text-center">

		        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" width="60" class="img img-rounded img-fluid p-1"/>		        
		    </div>
		    <div class="col-md-9 my-auto pt-3">
		        <h5 class="float-left">{{reply.reply}}</h5>
<!-- 		        <p>
		            <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
		       </p> -->
		    </div>
		    <div class="col-md-2 my-auto mx-auto">
		        <p class="text-secondary">{{reply.created_at}}</p>
		    </div>
		</div>

</template>
<script>
	export default {
		props: ['reply']
	}
</script>