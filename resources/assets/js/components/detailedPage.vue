<template>
	<div >
		<Nina></Nina>
	<h1 class="heading" v-for="lb in Property">{{lb.houseName}}</h1>
	<div class="container kk">
    		<div class="row ">
        			<div class="col-5 IMAGES">
              				<div class="col-lg-1 font12">{{Image1}}</div>
              				<div class="col-lg-1 font11" @click="toVideo">{{Video1}}</div>
              				<!-- <div class="col-lg-1"></div> -->
              				<div class="col-lg-1 font1" @click="toMap">{{Map1}}</div>
        			</div>
        			<div class="col-2"></div>
        			<div class="col-1 phh"><img src=" /Images/detailed/logoHouse.png " alt=""  height="30px" width="30px" /></div>
        			<div class="col-2 column" @click="share"><h2 class="otherHeading">Share Property</h2></div>
    			</div>
			<div class="row">
      				<div class="col-5 xv" >
      					   <img v-if="Image1 == 'Image' " v-for="lb in Property" class="xvc" :src=" '/Images/Houses/' + lb.image" alt="" >
                   <maps v-if="Image1 == 'Map' "></maps>
                  
<!--                      <img v-if="Image1 == 'Map' " class="xvc" src=" Images/Houses/Map.png" alt=""     height="269px">
 -->                    <experience v-if="Image1 == 'Video'" :sara="videoChange" id="rr"></experience>
      				</div>
              <div class="col-2"></div>
              <div class="col-4 xv" style="width: 365px; height: 173px;"> 
              <div class="row" style="z-index:-1">
                      <div class="col-lg-8">
                          <h2 class="thisIs">Residential House</h2>
                      </div>
               </div>
               <div class="row">
                   <div class="col-4 fofa1" v-for="lb in Property"><p  class="momo2" v-for="r in lb['desc']" >{{r.numberBed }} </p>Bedrooms</div>
                   <div class="col-1"></div>
                   <div class="col-4 fofa1" v-for="lb in Property"><p  class="momo2" v-for="r in lb['desc']" >{{r.numberBath }} </p>
                   Bathrooms</div>
               </div>
               <div class="row">
                   <div class="col-4 fofa1" v-for="lb in Property"><p  class="momo2" v-for="r in lb['desc']" >{{r.numberLiving }} </p>Livingrooms</div>
               </div>
               <div class="row">
                   <div class="col-12 ss1"></div>
               </div>
                <div class="row agents">
                  <h3 class="ffff">Agents</h3>
                </div>
                    <div class="row xv vx">
                        <div class="col-lg-4"><img src="Images/detailed/agent.png" alt="" height="100px" width="100px"></div>
                        <div class="col-lg-6"><p style="color:white">Name: Marie Johanson </p><p style="color:white">Email: Marie@yahoo.com</p></div>

                    </div>
                    <div class="row">
                   <div class="col-lg-12 ss1"></div>
               </div>
               <div class="row agents">
                  <h3 class="ffff">Now is the time</h3>
                </div>
                <div class="row">
                  <h3 style="margin-left: 37px;">Inquire about it now</h3>
                </div>
                <div class="row xv" style="     height: 279px; width: 294px;margin-left: 19px;">
                  <input type="text" class="inquire" placeholder="Name"><br/>
                  <input type="text" class="inquire" placeholder="Email"><br/>
                  <input type="text" class="inquire1" placeholder="Message"><br/>

                </div>
                <div class="row agents1">
                  <h3 class="hh">Enquire now</h3>
                </div>
              </div>
				</div>
				<div class="row">
				<div class="col-lg-5 xv" v-if="Image1 == 'Image'">
					<div v-for="lb in Property" class="mainAS" v-if="Image1 == 'Image'"><div v-for="r in lb['desc']" class="ooo col-lg-4" ><img  :src="'/Images/detailed/' + r.images" alt="" class="lk"> </div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-5 ss1"></div>
		</div>
		<div class="row">
			<div class="col-lg-5 xv marrio" v-for="lb in Property" ><p class="ahmedpar" v-for="r in lb['desc']"> {{r.Description}}</p></div>
		</div>
		<div class="row">
			<div class="col-lg-5 ss1"></div>
		</div>
    <div class="row">
      <div class="col-lg-2 "><img src="Images/detailed/Feature.jpg" alt=""  class="features"></div>
    </div>
    <div class="row xv" style="width:493px;">
        <div class="col-lg-6 ">
            <span class="poiw">Heating</span><img src="Images/detailed/flame.png" alt="" height="20px" width="20px" />
             <p class="poiw" style="text-indent:10px;margin-top:10px">good Quality based heating System</p>
             <p class="poiw">Other Services</p>
             <p class="poiw" style="text-indent:10px;margin-top:10px">Available Internet Service</p>
           
        </div>
         <div class="col-lg-6 ">
            <span style="color:white">Security</span><img src="Images/detailed/sec.png" alt="" height="20px" width="20px" />  
            <p  style="color:white;text-indent:10px;    margin-top: 12px;">Securtiy Alarm</p>
        </div>
    </div>
	</div>
    <Ultimate class="addMargin"></Ultimate>

	</div>
</template>

<script>
	export default{
		data(){
			return {
        Property:[],
        Image1:"Image",
        Video1:"Video",
        Map1:"Map",
         videoChange:"11"
			}
		},
		computed:{
            lolo(){
            	return this.$store.state.Object;
            },

		},
       mounted(){
       	axios.post("/clicked",{
       		id: this.$route.params.id,
       	})
       	.then(response => this.Property = response.data);
  // y.load();

   },
   methods:{
    toMap(){

        if(this.Map1=="Map"){
             this.Image1="Map";
             this.Map1="Video";
             this.Video1="Image"
        }
        else if(this.Map1=="Image"){
          this.Image1="Image";
          this.Map1="Map";
          this.Video1="Video";
        }
         else if(this.Map1=="Video"){
             this.Image1="Video";
             this.Video1="Image";
             this.Map1="Map";
         }
         if(this.Image1=="Video"){
         this.videoChange = 1;
         }
    },
      toVideo(){

           if(this.Video1=="Map"){
             this.Image1="Map";
             this.Map="Video";
        }
        else if(this.Video1=="Image"){
          this.Image1="Image";
          this.Map1="Map";
          this.Video1="Video";
        }
         else if(this.Video1=="Video"){
             this.Image1="Video";
             this.Video1="Image";
             this.Map1="Map";
         }
          if(this.Image1=="Video"){
         this.videoChange = 1;


         }
    },
 
    share(){
      axios.post("/share",{
        user:this.$store.state.user[3],
        id:this.Property[0].id,
        house:this.Property[0].houseName,
      })
    .then(response =>this.$store.commit('ahmed',response.data));
    },

   }
	}
</script>

<style>
input[type='range']::slider-thumb{
  appearance:none;
  background: red;
cursor: pointer;

}
.addMargin{
  margin-top: 200px
}
.poiw{
      margin-left: 43px;
    color: white;
}
.features{
      height: 36px;
    width: 96px;
}
.hh{
      color: white;
    margin-top: 7px;
    text-align: center;
    font-size: 13px;
}
.inquire{
  margin-top: 36px;
    margin-left: 22px;
    width: 80%;
    padding: 5px 5px;
    border-radius: 4px;
}
.inquire1{
  margin-top: 36px;
    margin-left: 22px;
    width: 80%;
    padding: 25px 11px;
    border-radius: 4px;
}
.vx{
  margin-top:20px;
}
.ffff{
      color: white;
    margin-top: 10px;
    text-align: center;
    font-size: 15px;
}
.agents{
  background: #062236;
      height: 30px;
      margin-top: 15px;
          height: 38px;

}
.agents1{
 background: #062236;
    height: 25px;
    margin-top: 5px;;
    width: 295px;
    margin-left: 20px;
}
.momo2{
  display: inline;
}
.fofa1{
  color:white;
  display: inline;
}
.marrio{
	margin-top: 20px;
}
.ahmedpar{
	color:white;
	text-indent: 25px;
}
.ss1{
	    border-bottom: 1px solid #19659a;
   
    margin-top: -7px;
}
.phh{   
 width: 49px;
     margin-top: -12px;
     margin-left: -10px;
}
.xv{
	background: #19659a;
}
	.heading{
		font-size: 20px;
		margin-left: 38px;
    margin-top: 40px;
    width: 134px;
	}
   .IMAGES{
   	background: #19659a;
   	padding-top: 1px;
    padding-left: initial;
   }
   .font12{
   	color:white;
   	background:#19659a;
   	    width: 71px;
        cursor: pointer;
   }
    .font11{
   	color:white;
   	background:#1e76b4;
   	width: 67px;
    cursor: pointer;
   }
   .font1{
   	background: #2385c9;
    color:white;
    width: 67px;
    cursor: pointer;
   }
   .xvc{
   	    height: 172px;
    width: 460px;
    margin-top: -29px;
   }
   .kk{
   	margin-left: 96px;
   }
   .lk{
       height: 100px;
    width: 144px;
    border: 1px solid #031320;
   }
   .ooo{
   	   	display: inline-block;

   }
   .mainAs{
   	    margin-top: -34px;
    margin-left: -15px;
   }
   .otherHeading{
   	font-size: 14px;
    margin-top: 0px;
    background: #062236;
    color: white;
   }
   .column{
   	    background: #062236;
    border-radius: 4px;
    height: 41px;
    width: 326px;
    cursor: pointer;
   }
   .thisIs{
        color: white;
    font-size: 18px;
    margin-top: -6px;
   }

</style>