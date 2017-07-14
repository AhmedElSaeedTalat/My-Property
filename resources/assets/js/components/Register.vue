<template>
	<div>
		<Nina></Nina>
		<div class="Reg">
			<div class="insideReg">
              <div class="wrap">
                 <h2 class="h2A">Welcome to My Property</h2>
                  <h2 class="h2A cll">Here you will find all about Properties</h2>
               </div>
               <div class="regForm3">
	               	<div class="v">
	               		<h3 class="h2A xiy">Register</h3>
	               	</div>
	               	<form  @submit.prevent="xx">
	               	<slot></slot>
	               		<input type="text" class="inputs" v-model="user"  placeholder="user name..." name="user" required>
	               		<input type="email" class="inputs" v-model="Email"  placeholder="Email..." name="email" required>
	               		<input type="password" class="inputs" v-model="password" placeholder="Password..." name="password" required>
	               		<input type="password" class="inputs" v-model="password_confirmation" placeholder="Confirm Password..." name="password_confirmation" required>
	               		<input type="submit" value="Sign-up"  class="Sign-up"><a href="/MyProperty#/sign" class="anAccount">Have an account already</a>
	               	</form>
               </div>
               <div v-for="errors in error" class="wr"><p v-for="err in errors" class="error">{{err}}</p></div>
			</div>
		</div>
		<Ultimate></Ultimate>
	</div>
</template>

<script>
	export default{
        data(){
        	return{
        		user:"",
        		Email:"",
        		password:"",
        		password_confirmation:"",
                   error:{}
        	}
        },
           mounted(){
         axios.get("lols")
        .then(response => {
          if(response.status==200){
             window.location.href="/MyProperty#/welcome";
          }
        } );
    
        },
        methods:{
        	xx(){
              axios.post("/Register",{
              	user:this.user,
              	Email:this.Email,
              	password:this.password,
              	password_confirmation:this.password_confirmation
              })
              .then(response => {
              	if(response.status == 200){
                    window.location.href="/MyProperty#/Welcome";
              	}
              })
              .catch(error => this.error = error.response.data );
        	}
        }
	}
</script>

<style>
	.Reg{
		background-image: url("http://localhost:8000/Images/Houses/rr.jpg");
        height: 550px;
        width: 100%;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        border:3px #031320 solid ;
	}
	.insideReg{
		width: 100%;
		height: 100%;
		background: linear-gradient(rgba(42,56,66,0.5),rgba(121,146,105,0.5));
	}
    .h2A{
           color: white;
           font-size: 20px;

    }
    .wrap{
       padding-top: 10px;
    padding-left: 200px;
}
.cll{

    margin-left: 35px;
}
.regForm3{
	    height: 311px;
    width: 300px;
    background: white;
    margin-left: 470px;
    margin-top: 50px;
    border-radius: 4px;
}
.v{
	height: 40px;
    background: #031320;
}
.xiy{
	    text-align: center;
        padding-top: 10px;
}
.inputs{
	    margin-top: 20px;
    margin-left: 20px;
    width: 80%;
    padding: 5px 5px;
    border-radius: 4px;
}
.Sign-up{
	    background: #031320;
    color: white;
    /* border-radius: 4px; */
    height: 30px;
    margin-top: 10px;
    margin-left: 20px;
}
.anAccount{
	font-size: 14px;
    margin-left: 5px;
    color: grey;
    border-bottom: 1px grey solid;
    cursor: pointer;
}
.error{
	    min-height: 25px;
    width: 53%;
    padding-left: 10px;
    background: #2a3842;
    color: white;
    padding-top: 2px;
}
.wr{
    margin-left: 600px;
}
</style>