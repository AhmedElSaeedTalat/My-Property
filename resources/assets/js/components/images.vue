<template>
	<div>
		<!-- <div class="container-fluid"> -->
			<div class="row imageWidth"  >
				<div class="co-12 cl">
				<div class="toInline" v-for="image in images" @mouseover="check" >
				<div @mouseover="checkI(image)" >
				<img :src=" 'images/Houses/' + image.image" alt="" height="200px" width="250px" class="mainImages"/>
				</div>
				<p class="soso">{{image.Description}}</p>
				 <Description :Propery="image"></Description>
				</div>
				</div>

			</div>
		<!-- </div> -->
	</div>
</template>
<script>
	export default{
       data(){
       	return{
       		images:[]
       	}
       },
       mounted(){
       	axios.get("/yy")
       	.then(response => this.images = response.data);
       },
       methods:{
       	check(event){
       		this.$store.commit('xY',{x:event.clientX,y:event.clientY});
       	},
       	checkI(image){
       	this.$store.commit('id',image.id);

       	}
       }
	}
</script>
<style>
body{
	/*position: relative;*/
}
.cl{
  /*position: relative;*/
}
	.toInline{
		display: inline-block;
        width: 267px;
        position: relative;
        /*overflow: hidden;*/
	}
	.mainImages{
		margin:15px;
		z-index: -1;
	}
   p.soso{
   	margin-left: 14px;
   	margin-top: -12px;
   	background: #145582;
    color:white;
    font-style: italic;
    text-indent: 10px;
   }
   .ff{
   	    position: absolute;
   	    top:519px;
   	    left:352px;    
         background: brown;
         height: 10px;
   }
   .imageWidth{
    margin-left: 15px; 
   }
</style>