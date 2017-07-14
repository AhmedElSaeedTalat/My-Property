<template>
	<div>

		<div :class="Okay" v-show="lola" >
        
        <div class="rs"></div>
        <p class="parrafo">{{Propery.houseName}}</p>
         <p class="parrafo1">Offered for: &nbsp; {{Propery.type}}</p>
                 <p style="font-size=10px" class="oo"> Recent Descounts</p>
                 <div class="PO">            
                 <router-link :to="{name:'details', params:{id:Propery.id}}">
                      <span class="link" > Check Property </span>
                 </router-link>
                 </div>                         
          </div> 
		
	</div>
</template>

<script>
	export default{
     props:["Propery"],
   
     computed:{
     	Okay(){
     		return{
             
     		 theMain: true,
     		}

     	},
     
     	lola(){
     let info = this.$store.state.id;

            if(info==this.Propery.id){
     		return true;
     	}
     	else{
     		return false;
     	}
     },
     soso(){
     	return this.$store.state.x + "px";
     },
     nina(){
     	return this.$store.state.y + "px";
     }
     },
     methods:{
      check(){
        this.$store.commit("passProperty",{Id:this.Propery.id,Object:this.Propery});
        window.location.href="/MyProperty#/details";
      }
     }
	}
</script>

<style>
	.theMain{
       height: 220px;
       width: 220px;
       background: rgba(238,238,238,0.8);
       position: absolute;
       z-index: 5;
       border-radius: 4px;
       top:95px;
       left:120px;
	}
	.parrafo1{
		font-size:12px;
		margin-top:10px;
		margin-left:10px;

	}
	.parrafo{
		font-size:20px;
		margin-top:10px;
		margin-left:5px;
	}
	.rs{
		background: #031523;
        height:10px;
	}
	.link{
margin-left: 35px;
text-decoration: none;
color:white;
cursor: pointer;

	}
  .link:visited{
    color: white;
  }
	.oo{
		margin-bottom: 30px;
		margin-left: 20px;
		margin-top:30px;
	}
	.PO{
		height: 20px;
      width: 150px;
      margin-left: 	35px;
      background: #031523;

	}
</style>