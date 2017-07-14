<template>
	<div>
		<div class="pol">
			<!-- <img src="images/slider/Houses[0].image" alt="" height="250px" width="1300px" /> -->
			<div > <img :src=" 'images/slider/' + Houses[next].image" alt="" class="imageSlider"   /></div>
			<!-- <div ></div>
			<div v-for="house in Houses">{{Houses['0'].image}}</div> -->
		</div>
	</div>
</template>

<script>
	export default{
   data(){
   	return{
   		Houses:[],
   		next:0,
   		timer:null,
   		
   	}
   },
   
mounted(){
    	axios.get("/xx")
    	.then(response => this.Houses = response.data);
    	this.timerr();
    } ,
    updated(){
   if(this.Houses.length < this.next ){
  	 	this.Clearing();
 }
},
    methods:{
    	nextt(){
    	return	this.next +=1;
    	},
    	prev(){
    	return	this.next -=1;
    	},
    timerr(){
    	    this.timer =	setInterval(this.nextt,3000);


    },
    Clearing(){
    		clearInterval(this.timer);
    		this.next=0;
    		this.timer=null;
    	
    }
    }  
	
}
</script>

<style>
.pol{
  transform:translate(0px,-2px);
}
.imageSlider{
  height:250px;
   width:100%;
}
</style>