<template>
  <form class="form-1" @submit.prevent="login" action="/" method="post" novalidate="true">
         <Input v-model="user.email"  type="email" picture_src="person-circle-outline.svg" placeholder="Enter Email address" />
         <div class="errors"  v-if="errors.email"><p>{{errors.email[0]}}</p></div>
         <PasswordInput v-model="user.password" placeholder="Enter your Password" :maxlength="30" />
          <div class="errors" v-if="errors.password"><p>{{errors.password[0]}}</p></div>
        <div class="forgot">
            <router-link to="/forgot">
             <a>Forgot Password ?</a>
            </router-link>
        </div>

        <div class="login-btn" v-if="isLogging">
            <button type="submit" value="Submit" :disable="this.isLogging" :loading="isLogging">Signin</button>
        </div>
         <div class="login-btn-2" v-else>
             <button>
                 <div><h4>Loading</h4></div>
                 <div class="animation"><lottie-player src="https://assets8.lottiefiles.com/packages/lf20_vIuhQq.json"  background="transparent"  speed="1"  style="width: 80px; height: 80px;"  loop  autoplay></lottie-player></div>
             </button>
        </div>
        <div class="Signup">
             <p>Dont have an account
                <router-link to="/registration">
                    <a>Sign up</a>
                </router-link>
            </p>
        </div>
  </form>
</template>

<script>
import * as auth from '../auth_services';
import Axios from 'axios';
import Input from './Input';
import PasswordInput from './PasswordInput.vue';
export default {

    name: "loginform",
    components : {
        Input,
        PasswordInput,
    },
    data:()=> {
        return {
            user:{
                password: '',
                email: '',
            },
             errors: {},
             isLogging: true,
        }
    },

    methods: {

        async login(){
                try{
                    const response = await auth.login(this.user);
                    this.$router.push('/dashboard');
                    this.error = {};
                } catch (error){
                     console.log(''+error);
                  switch(error.response.status){
                      case 422:
                          this.error(error.response.data.message);
                          break;
                      case 401:
                           this.info(error.response.data.message, "Unauthorized");
                           break;
                      case 500:
                           this.swr(error.response.data.message);
                           break;
                      default:
                           this.info(error.response.data.message, "Something went wrong");
                           break;

                  }
                }


                this.isLogging =  false;
        },


    },



}
</script>

<style scoped>

    .errors p{
        color:red;
        font-size: 14px;
        display: inline-block;
    }

    .animation{
        position: absolute;
        top:-45%;
        left:55%;
    }

    .login-btn-2 div{
        display: inline-block;
        justify-content: center;
        align-items: center;
    }

    .login-btn-2 button h4{
       color:  #fff;
       font-weight: 500;
       font-size: 12px;
    }

    .login-btn-2 button{
       padding: 10px 40px;
       width: 60%;
       background-color:#303030;
       transition: 1s ease-in-out;
       color:  #fff;
       font-weight: 500;
       border-radius: 6px;
    }


    .login-btn-2{
        position: relative;
    }

    .form-1{
        flex-basis: 100%;
        text-align: center;
        margin-top: 60px;
    }

    .login-btn button{
       padding: 10px 40px;
       width: 60%;
       background-color:#303030;
       transition: 1s ease-in-out;
       color:  #fff;
       font-weight: 500;
       border-radius: 6px;
    }

    .login-btn button:hover{
        letter-spacing: 2px;
        transform: translateY(-3px);
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    }

    .forgot{
        margin: 25px 0;
        margin-left: 30%;
    }

    .forgot a{
        color: #686868;
    }

    .Signup{
         margin-top:30%;
         color: #a73a3a;
         margin-bottom: 20px;
    }
    .Signup p{
        color:#686868;
    }
    .Signup p a{
        color: #a73a3a;
        font-size: 20px;
    }

    .info-1{
        font-size: 40px;
        color: #303030;
        margin-top: 30px;
    }
    .info-2{
        font-size: 40px;
    }

    .info-3{
        font-size: 75px;
        color: #303030;
        margin-bottom: 10px;
    }

    .info img{
        max-width: 350px;
        margin-right: 2px;
        margin-top: 15px;
    }

    .info p{
        max-width: 300px;
    }

    .line{
        padding:5px 30px;
        background-color: #303030;
        width: 15%;
        margin-left: 2px;
         margin-bottom: 35px;
    }

    .info a{
        color: #a73a3a;
        font-weight: bold;
        font-size: 15px;
        transition: 1s;
    }

    .info a:hover{
        letter-spacing: 1px;
    }

    .overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0%;
        z-index: 99;
        animation: hue-rotate 10s linear infinite;
    }

    .first-1 {
        background:#df4968;
    }

    .second-1 {
        background:#df4968;
        left: 33.3%;
    }

    .third-1 {
        background: #df4968;
        left: 66.6%;
    }

    .brand-logo{
        max-width: 50px;
        position: absolute;
        top: 3%;
        left: 7%;
        animation: hue-rotate 10s linear infinite;
    }

    @keyframes hue-rotate {
      from {
        -webkit-filter: hue-rotate(0);
        -moz-filter: hue-rotate(0);
        -ms-filter: hue-rotate(0);
        filter: hue-rotate(0);
      }
      to {
        -webkit-filter: hue-rotate(360deg);
        -moz-filter: hue-rotate(360deg);
        -ms-filter: hue-rotate(360deg);
        filter: hue-rotate(360deg);
      }
}

/* Desktops and laptops ----------- */
@media only screen
and (min-width : 1224px) {



}

</style>
