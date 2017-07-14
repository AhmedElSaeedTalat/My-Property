<template>
    <div>
             <!--  Logo Header  -->
        <div class="Head" >
            <div class="row">
            <div class="col-1"></div>
                <div class="col-1 ofLogo">
                  <a href="/MyProperty#/MyProperty"><img src="images/header/logo.png" alt="MyProperty" height="40px" width="60px"></a>
                </div>
                <div class="col-lg-4"></div>
                 <div class="col-lg-1"><a href="3">Contacts</a></div>
                  <div class="col-lg-1"><a href="3">help</a></div>

                  <div class="col-lg-1" v-if="user"><a href="/MyProperty#/welcome">hi {{user[0]}}</a><span class="glyphicon glyphicon-triangle-bottom pq" aria-hidden="true" @click="getOP"></span><div class="sign-out" @click="logout" v-show="sign">Sign-out</div></div>
                 <div class="col-lg-1" v-else><a href="/MyProperty#/Login">Login</a><span class="glyphicon glyphicon-triangle-bottom pq" aria-hidden="true" @click="getOP"></span><div class="sign-out"  v-show="sign"><a href="/MyProperty#/Login">Sign-up</a>
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
          
            <input type="submit" value="Search" class="search2" @click="passValue"></div>
            <!-- </form> -->
         </div>
        <!--  <div class="row">
             <div class="col-4"></div> -->
             

         </div>
        <!-- </div> -->

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
            Locations:[]
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
         logout(){
          axios.post("/out")
          .then(response => {
            if(response.status==200){
             this.user="";
            }
          })
        },
         getOP(){
            this.sign = !this.sign;
        },
    searchHeading(location){
          window.location.href="/MyProperty#/Search/" + location.Location;

       // location.reload();
        },
    
        passValue(){
           window.location.href="/MyProperty#/Search/"+this.location;
           // location.reload();
        }
       }
    }
</script>
<style>
  .search2{
    background: #145582;
    color: white;
    width: 100px;
    margin-top: 85px;
    margin-left: -209px;
    height: 27px;
  }
</style>