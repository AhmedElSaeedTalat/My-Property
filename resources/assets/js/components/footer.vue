<template>
	<div>
		<div class="xy" @mouseover="some">
			<div class="colorInside" >
				<div class="row">
					<div class="col-1"></div>
					<div class="col-3"  >
			            <transition name="new"  :duration="{ enter: 500, leave: 800 }">
							   <div class="xx" v-show="fade">
								<h2 >Magic Prices</h2>
				                <h2 class="rr">Economic Prices</h2>
						       </div>
						</transition>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default{
      data(){
      	return{
      		fade:false
      	}
      },
      mounted(){
      	
      },
      methods:{
      	some(){

      	    return     this.fade = !this.fade;
      		}
      }
	}
</script>
<style>
	.xy{
		background-image: url("http://localhost:8000/images/Houses/venue.jpg");
		width:100%;
		 height:150px;
		 overflow: hidden;
		  background-position: center bottom; 
          background-size: cover;
		  background-repeat: no-repeat;
		  margin-bottom: 35px;
		  margin-top:42px;
	}
	.colorInside{
		background:rgba(6,34,55,0.6);
        height: 100%;

	}
	.colorInside .rr{
		margin-left:30px;
	}

	.new-enter-active{
		 animation:soso .9s ;
	}
	@keyframes soso{
		0%{
           opacity: 0.9;
			}
			5%{
				opacity:0 
			}
		100%{
			transform: rotate(360deg);
		}	
				}


</style>