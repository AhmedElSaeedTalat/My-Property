<template>
    <div>
             <!--  Logo Header  -->
        <div class="Head" >
            <div class="row">
            <div class="col-1"></div>
                <div class="col-1 ofLogo">
                  <a href="/MyProperty#/MyProperty"><img src="images/header/logo.png" alt="MyProperty" height="40px" width="60px"></a>
                </div>
                <div class="col-lg-3"></div>
                 <div class="col-lg-1"><a href="3">Help</a></div>
                 <div class="col-lg-1"><a href="3">Contacts</a></div>
                  <div class="col-lg-2" v-if="user.length >0" style="    width: 151px;">
                      <div class="Notifications">Notifications &nbsp; <span :class="xixi" @mouseover="girl">{{newNotification}}</span>
                      <span @click ="radio " class="glyphicon glyphicon-triangle-bottom pq" aria-hidden="true"></span>
                         <div class="inNotifications" v-show="showN"><p v-for="notify in Notifications " class="wrodsN">{{notify.data}} 
                        <br> <span class="span12">{{format(notify.created_at)}}</span></p>
                         
                         </div>
                      </div>
                  </div>
  
                  <div class="col-lg-1" v-if="user.length >0"><a href="/MyProperty#/welcome">hi {{user[0]}}</a> 
                  <span @click ="getOP " class="glyphicon glyphicon-triangle-bottom pq" aria-hidden="true"></span><div class="sign-out" @click="logout" v-show="sign">Sign-out</div></div>
                 <div class="col-lg-1" v-else><a href="/MyProperty#/Login">Login</a>
                  <div class="sign-out"  v-show="sign"><a href="/MyProperty#/Login">Sign-up</a>
                 <a href="/MyProperty#/Sign">Sign-in</a>
                 </div></div>
            </div>
             <div class="row ">
            <div class="col-5"></div>
                <div class="col-1">
                  <a href="#"  >Home</a>
                </div>
                 <div class="col-1">
                  <a href="#"  >News</a>
                </div>
                <div class="col-1 xxx">
                  <div class="gigii" >Locations
                 
                 <!-- <li v-for="locations in info">{{locations.Location}}</li> -->
                <div class="mary22 "><div v-for="location in Locations" class="col-lg-4">
                <span @click="searchHeading(location)" class="spanHover">{{location.Location}}</span>
                </div>
                </div>
                </div>
                </div>
                 <div class="col-1 c" >
                     <div class="lola22">
                       Agencies
                       <div class="lola40 ">
                           <div class="row">
                               <a href="#" class="col-4">agnecy1</a> 
                               <a href="#" class="col-4">agnecy1</a>
                           </div>
                           <div class="row">
                               <a href="#" class="col-4">agnecy1</a> 
                               <a href="#" class="col-4">agnecy1</a>
                           </div>
                       </div>
                     </div>
                </div>
                 <div class="col-1">
                  <a href="#" >Properties</a>
                </div>
            </div>
        </div>
             <!-- Search Engine   -->
        <div class=" Search-Engine " >
        <div class="row">
            <div class="col-3 class"  >
              <div ></div>
            </div>
            <div class="col-1"  >   
            <transition name="house" >
            <img v-show="showHouse" src="images/header/2558.png" alt="House" height="120px" width="110px" class="image">
            </transition>
            </div>
            <div class="col-2" >
            <transition name="par1">
                <p class="par11" v-show="par">MyPRoPerTy</p>
            </transition>
            </div>
            <!-- <form action="/MyProperty/Search" method="post"> -->
           
            <div class="col-2" ><input type="text" v-model="location"   class="input3" placeholder="Search" ></div>
           <router-link :to="{name:'Search',params:{lugar:location}}">
            <div class="col-2"><input type="submit" value="Search" class="search3"></div></router-link>
            <!-- </form> -->
         </div>
        <!--  <div class="row">
             <div class="col-4"></div> -->
             

         </div>
        <!-- </div> -->
<Slider></Slider>
<Cont></Cont>
<images></images>
<foot></foot>
<Ultimate></Ultimate>
       <!-- hidden divs   -->

    </div>
</template>

<script>
    export default{
       data(){
        return{
            showHouse:false,
            par:false,
            block:false,
            agencyBlock:false,
            info:[],
            location:"",
            sign:false,
            user:"",
            Locations:[],
            Notification:[],
            showN:false
        }
       },
       computed:{
           Notifications(){
               return this.$store.state.Notifications1;
           },
           newNotification(){
            return this.$store.state.counter;
           },
           xixi(){
            return {
              counter:true,
            }
           }
       },

       mounted(){
        axios.get("lols")
        .then(response => this.user = response.data );
         this.showHouse = true;
          this.par = true;
          axios.get("/yy")
        .then(response => this.info = response.data);
          axios.get("/Locations")
        .then(response => this.Locations = response.data);
        },
       methods:{
       girl(){
          this.$store.commit('girl','');
          this.showN = !this.showN;
          this.$store.commit('removeCouter',1);

       },
       radio(){
          return this.showN = !this.showN;
       },
        format(raw){
       return   moment(raw).format("MM-DD h:m");
        },
         logout(){
          axios.post("/out")
          .then(response => {
            if(response.status==200){
             this.user="";
             location.reload();
            }
          })
        },
         getOP(){
            this.sign = !this.sign;
        },
        searchHeading(location){
          window.location.href="/MyProperty#/Search/" + location.Location;

        },
    

       }
    }
</script>

<style>

.counter{
  width: 35px;
    height: 31px;
    margin-top: 10px;
    padding-top: 4px;
    color: white;
    background: #006680;
}

.span12{
  padding-left: 81px;
    font-size: 12px;
}
.wrodsN{
    color: white;
    margin-left: 10px;
    margin-top: 10px;
    border-bottom: 1px solid;
    width: 80%;
}
.inNotifications{
     position: absolute;
    min-height: 100px;
    margin-top: 1px;
    width: 193px;
    background: rgba(0,102,128,0.7);
    z-index: 6;
}

.Notifications{
   color:#1988aa;
   position: relative;
}

.Notifications:hover{
   border-bottom: 1px solid #1988aa;
   cursor: pointer;
}
.spanHover:hover{
  cursor: pointer;
  border-bottom: 1px solid #1988aa;
}
.gigii{
  color:#1d97c7;
}
.gigii:hover {
  border-bottom: 1px solid #1988aa;
  cursor: pointer;
}
.lola22{
  position: relative;
  color:#1d97c7;
}
.lola22:hover{
  border-bottom: 1px solid #1988aa;
  cursor: pointer;
}
.lola40{
  background: white;
  min-height: 100px;
  width: 100px;
  border-radius: 4px;
  width: 208px;
   display: none;
}
.lola22:hover .lola40{
  display: block;
  position: absolute;
}

.xxx{
  position: relative;
}
.gigii .mary22{
  background: white;
  min-height: 100px;
  border-radius: 4px;
    width: 241px;
  display: none;
}
.gigii:hover .mary22{
  display: block;
  position: absolute;
  z-index: 5;
 
}
.class1{
  color: black;
  text-decoration: none;    
  /*height: 10px;*/
}
    .Head{
        background:#062236;
    }
    .Search-Engine{
        border:8px solid #082d49;
        background:#062236;
        height:160px;

    }
    .image{
        transform: rotate(35deg);
    }
    .input1{
        border-radius: 4px;
              margin-top: 77px;
   /*transform: translate(-140px,-10px);*/
    padding: 5px;
        margin-left: -135px;
    }
    .house-enter-active{
        animation: houses .9s;
    }
/*.house-enter-leave{
    animation: houses .9s reverse;
}
*/


    @keyframes houses{
        0%{

           transform:  rotate(5deg);
        }
        20%{
            transform: rotate(10deg);
    }
   100%{
        transform: rotate(35deg);
    }
    
                   }
   .par11{
    margin-top:25px;
    transform: rotate(-4deg) translate(10px);
    width: 284px;
    font-size:21px;
    font-style: italic;
   }
   .par1-enter-active{
    animation: lolo .9s;
   }
   @keyframes lolo{
      0%{
        transform: rotate(-1deg);
      }
      100%{
        transform: rotate(-4deg) translate(10px);

      }
      
   }
   .search{
    background: #19659a;
    color: white;
    border: none;
    outline: none;
    border-radius: 4px;
    width:110px;
    height: 25.5px;
          margin-top: 79px;
    margin-left: -120px;
}
     /*transform: translate(-125px);*/
   


   .pp{
   margin-bottom: 5px;
    margin-top: 5px;
    margin-left: 5px;
    z-index: 5;
   
   }
   .ss {
      color:white;
      text-decoration: none;
      margin-left: 20px;

   }

   .ss:hover{
      color:black;
      text-decoration: none;
      border-bottom: 1px solid black;
      margin-left: 20px;

   }
    .kiki1{
    position: absolute;
    background: #eee;
    width: 280px;
    margin-bottom: 5px;
     top: 94px;
    border-radius: 4px;
    display: none;
   }
    .class{
      height: 120px;}
 .input3{
      margin-top: 69px;
    margin-left: -205px;
    border-radius: 4px;
 }
 .search3{
  background: #145582;
    color: white;
    width: 100px;
    margin-top: 70px;
    margin-left: -219px;
    height: 27px;
 }
</style>