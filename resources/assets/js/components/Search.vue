<template>
	<div>
		<myHead></myHead>
		<div class="coloredArea">
		<!-- 	<div class="col-1"></div> -->
			<div class="searchText">Search Results
             
			</div>
		</div>
		<div class="" v-if="newValues.length>0">
		<div class="b" >Results found {{newValues.length}}</div>
		</div>
		<div class="" v-else>
		<div class=" b" >no results found</div>
		</div>
		
			<!-- <div class="col-1"></div> -->
				<!-- <div > -->
				    <div class="u"  >
				    <div class="makeit" v-for="search in newValues" @mouseover.self= "checkI(search)"> 
					<img :src=' "Images/Houses/" + search.image' alt=""   width="200px" height="200px" class="xz" />
                     <p class="parse">{{search.Description}}</p>

                     <Description :Propery="search"></Description>


</div>
<div class="pos">
              	<div class="ii"><p class="sosa" @click="showfilt">Select Category</p></div>
              	<div v-show="filteration"> 
              	 	<div class="qq"><p class="sosa" @click="filter1">   For Sale</p></div>
              	 	 	<div class="qi"><p class="sosa" @click="filter2">for Rent</p></div>
              	 	 	
             	</div>
              </div>
 </div>
  
				<div id="mmm" class="Mola" > More results</div>
		
	</div>
</template>

<script>
   export default{
   	data(){
   		return{
   			filteration:false,
   			newValues:[],
   			addedValues:[],

   		}
   	},
   	computed :{
   		Searched:{
   		get(){

   	  return	 "x";
   	  // .filter( xx =>{
   	  // 	return xx.houseName == "name";
   	  // })
          
   		         }}
   	},
   	
// watch:{
// 	Searched(){var y = document.getElementById("mmm");
//       var g =this;
//    		var e = scrollMonitor.create(y);
//    		e.enterViewport(()=>{
//    			g.done()
//    		});}
// },
   	methods:{
   		showfilt(){
   			this.filteration = !this.filteration;
   		},
   		done(){
           if(this.newValues.length < this.addedValues.length){
           	let moreVlaues = this.addedValues.slice(this.newValues.length,this.newValues.length+8);
             moreVlaues.map(moreVlaues => this.newValues.push(moreVlaues) );
           }

   		},
   		filter1(xx){
   		         // this.$emit('lolo');
          //       axios.post("/Crazy",{
          //   Search: this.$store.state.Locations
          // })
          // .then(response => )
          // this.filteration=false;
         
        
   			
   		},
   		filter2(xx){
   		         // this.$emit('lolo');
                axios.post("/Crazy2",{
            Search: this.$store.state.Locations
          })
          .then(response => {this.$store.commit('addSearch',response.data)})
                    this.filteration=false;

      },
       	checkI(search){
       	this.$store.commit('id',search.id);

       	}
   	},
   	mounted(){
   		   axios.post("/Search",{
            Search: this.$route.params.lugar
          })
   		   .then(response => {this.newValues = response.data.slice(0,8)
            this.addedValues = response.data

   		   });
         		var g = this;
   		var y = document.getElementById("mmm");
   
   		var e = scrollMonitor.create(y);
   		e.enterViewport(()=>{
   			g.done()
   		});
     window.onhashchange=()=>{
     	 axios.post("/Search",{
            Search: this.$route.params.lugar
          })
   		   .then(response => {this.newValues = response.data.slice(0,8)
            this.addedValues = response.data

   		   });
     }
   	},

   
 }
</script>


<style>
	.coloredArea{
		background: #031523;
		height: 35px;
		margin-top: 25px;
		width: 40%;
		margin-left:50px;
		border-radius: 4px;
	}
	.searchText{
			margin-top: -10px;
			color:white;
		    width: 150px;
		    padding-left: 20px;
    		padding-top: 5px;
	}
	.makeit{
		display: inline-block;
	     position: relative;

	
	}
	.xz{
         margin-bottom:30px;
         margin-right: 10px
	}
	.textOfSearched{
		color:white;
		background: #145582;
	    width: 200px;
        margin-top: -33px;
	}
	.u{
		margin-left: 50px;
   	 margin-top: 20px;
   	  width: 1000px;
       position: relative;
	}
	.b{
		    margin-left: 85px;
   		    margin-top: 20px;
	}
	.pos{
		position: absolute;
		top: -96px;
    	left: 503px;
	 
	}
	.ii{
		background: #145582;
		color: white;
		height: 33px;
		width: 155px;
		text-align:center;
		cursor: pointer;
	}
	.qq{
			    background: #19659a;
    color: white;
    padding-left: 51px;
    padding-bottom: 7px;
}
		



	.qq:hover {
      cursor: pointer;
	}
	.qi{
			background:#145582;
		color: white;
		height: 32px;
		width: 155px;
		text-align:center;
		margin-top: -16px;
		

	}
	.qi:hover {
		cursor: pointer;
	}
	.sosa{
		padding-top: 8px;
	}
	.Mola{
		background: #031523;
		color: white;
		width: 148px;
		
		margin-left: 420px;
         height: 25px;
         border-radius: 4px;
         padding-top: 4px;
         padding-left: 35px;
	}
	.parse{
		width: 200px;
    background: #145582;
    color: white;
    margin-top: -30px;
	}
</style>