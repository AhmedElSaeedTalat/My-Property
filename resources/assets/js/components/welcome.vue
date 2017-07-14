<template>
	<div>
<myHead></myHead>
<div class="row">
	<div class="col-lg-2"></div>

		<div v-if="user[3]==0" class="col-lg-2 imageFile"></div>
				<div v-else class="col-lg-2" v-for="users in user[4]"><img :src=" 'storage/' + users['images'] "alt="" height="190px" width="180px"><!-- {{ users['images']}} --></div>

		 <div class="col-lg-2 "></div>
	    <div class="col-lg-2 class4">
	    	<p>Name: &nbsp; {{user[0]}}</p>
	    	<p>Date Of Birth: &nbsp; {{format(user[2])}}</p>
	    	<p >Email: &nbsp;<span class="span10" > {{user[1]}} </span></p>
	    	<p class="class5" @click="showDev">Edit</p>
	    </div>
	    <div class="col-lg-2 clor" v-show="form">
	    	<div class="uv"><p class="parInside">Edit changes</p></div>
	    	<div>
	    	<input type="text"  class="inputs1" placeholder="user name" v-model="users">
                 <input type="date"  class="inputs1" placeholder="Date Of Birth" v-model="DateOfBirth">
                 <input type="email"  class="inputs1" placeholder="Email" v-model="Email">
                 <p class="edit" @click="postt">edit</p>
	    	</div>
	    </div>

</div>
<div class="row">
	<form action="MyProperty#/welcome" method="post" enctype="multipart/form-data" >
       <!-- <input type="hidden" name="_token" :value="csrf"> -->
		<div class="col-lg-2"></div>
		<div class="col-lg-2 class3"><label for="file" class="poi">update Image</label><input type="file" name="file" id="file" class="imageUpload" onchange="this.form.submit()"><!-- <input type="submit" value="upload" class="upload" id="sub"> --></div>
		<slot></slot>
	</form>
</div>



<!-- 		<button @click="logout">sign out</button>
 -->	</div>
</template>
<script>
     export default{
     	data(){
     		return{
               user:"",
               div:false,
               form:false,
               file:"",
               users:"",
               DateOfBirth:"",
               Email:"",
               day:moment()
               // csrf:""
     		}
     	},
     	mounted(){
     		axios.get("lols")
     		.then(response => this.user = response.data );
     		// this.csrf=window.laravel.csrfToken;
     		console.log(this.day);
     	},
     	updated(){
     		axios.get("lols")
     		.then(response => this.user = response.data );
     		// this.csrf=window.laravel.csrfToken;
     		
     	},
     	methods:{
     		postt(){
              axios.post("/updateData",{
              	user:this.users,
              	DateOfBirth:this.DateOfBirth,
              	Email:this.Email
              })
     		},
     		format(raw){
               return moment(raw).format("YYYY/MM/D");
     		},

     		 getOP(){
     		
            this.sign = !this.sign;
        },
        logout(){
          axios.post("/out")
          .then(response => {
            if(response.status==200){
              window.location.href="/MyProperty#";
            }
          })
        },
     		showDev(){
               this.form =!this.form;
     		}
     	}
     }
</script>
<style>
	.imageUpload{
		opacity: 0;
	}
	.imageFile{
		    background-color: black;
            height: 190px;
            margin-top: 10px;
            width: 180px;

	}
	.poi{
		transform: translate(10px,30px);
		background: #083254;
		color:white;
		width: 110px;
        padding-left: 6px;
         cursor: pointer;
	}
	.class3{
		    margin-top: -35px;
   		    margin-left: 90px;
	}
	.class4{
		margin-top: 50px;
	}
	.class5{
		margin-left: 160px;
	    font-size: 12px;
	    color: #006680;
	    border-bottom: 1px #006680 solid;
	    width: 30px;
	    cursor: pointer;
	}
	.clor{
    width: 200px;
    margin-left: 10px;
    border-radius: 4px;
    background: white;
	}
	.parInside{
	    color: white;
    font-size: 13px;
    padding-top: 3px;
    padding-left: 10px;
	}
	.inputs1{
		border:none;
		border-bottom: 1px solid grey;
		outline: none;
	}
	.uv{
		    background: #031320;
	}
	.edit{
	 width: 61px;
    height: 25px;
    background: #031320;
    color: white;
    margin-top: 10px;
    padding-left: 14px;
    padding-top: 2px;
	}
	.upload{
		background: #031320;
    margin-left: 150px;
	}
	.span10{
		color:blue;
		border-bottom:1px solid blue;
		font-size:11px;
	}
</style>