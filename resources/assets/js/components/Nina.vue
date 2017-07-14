  <template>
          <div class="Head" >
            <div class="row">
            <div class="col-sm-1"></div>
                <div class="col-sm-1 ofLogo">
                  <a href="/MyProperty#/MyProperty"><img src="images/header/logo.png" alt="MyProperty" height="40px" width="60px"></a>
                </div>
                <div class="col-sm-3"></div>
                 <div class="col-sm-1"><a href="3">Help</a></div>
                 <div class="col-sm-1"><a href="3">Contacts</a></div>
                 <div class="col-sm-2" v-if="user.length >0" style="    width: 151px;">
                      <div class="Notifications">Notifications &nbsp; <!-- <span class="counter" @mouseover="girl">{{newNotification}}</span> -->
                      <span @click ="radio " class="glyphicon glyphicon-triangle-bottom pq" aria-hidden="true"></span>
                         <div class="inNotifications" v-show="showN"><p v-for="notify in Notifications " class="wrodsN">{{notify.data}} 
                        <br> <span class="span12">{{format(notify.created_at)}}</span></p>
                         
                         </div>
                      </div>
                  </div>

                  <div class="col-sm-1" v-if="user"><a href="/MyProperty#/welcome">hi {{user[0]}}</a><span class="glyphicon glyphicon-triangle-bottom pq" aria-hidden="true" @click="getOP"></span><div class="sign-out" @click="logout" v-show="sign">Sign-out</div></div>
                 <div class="col-sm-1" v-else><a href="/MyProperty#/Login">Login</a><span class="glyphicon glyphicon-triangle-bottom pq" aria-hidden="true" @click="getOP"></span><div class="sign-out"  v-show="sign"><a href="/MyProperty#/Login">Sign-up</a>
                 <a href="/MyProperty#/Sign">Sign-in</a>
                 </div></div>
            </div>
             <div class="row ">
            <div class="col-sm-5"></div>
                <div class="col-sm-1">
                  <a href="#"  >Home</a>
                </div>
                 <div class="col-sm-1">
                  <a href="#"  >News</a>
                </div>
                <div class="col-sm-1 xxx">
                  <div class="gigii" >Locations
                 
                 <!-- <li v-for="locations in info">{{locations.Location}}</li> -->
                <div class="mary22 "><div v-for="location in Locations" class="col-lg-4">
                <span @click="searchHeading(location)" class="spanHover">{{location.Location}}</span>
                </div>
                </div>
                </div>
                </div>
                 <div class="col-sm-1 c" >
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
                 <div class="col-sm-1">
                  <a href="#" >Properties</a>
                </div>
            </div>
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
            showN:false

        }
       },
        computed:{
           Notifications(){
               return this.$store.state.Notifications1;
           },

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
            }
          })
        },
         getOP(){
            this.sign = !this.sign;
        },
        searchHeading(location){
          this.$store.commit('checkLocation',location.Location);
            axios.post("/Search",{
            Search: this.$store.state.Locations
          })
          .then(response => {this.$store.commit('addSearch',response.data)}) ;
          window.location.href="/MyProperty#/Search";

        },
    
        passValue(){
this.$store.commit('checkLocation',this.location);
        axios.post("/Search",{
            Search: this.$store.state.Locations
          })
          .then(response => {this.$store.commit('addSearch',response.data)})        }
       }
    }
</script>
