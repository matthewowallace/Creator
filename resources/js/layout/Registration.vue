<template>
   <div class="wrapper">
          <!-- OVERLAY
            =============================== -->
         <div class="overlay first-1"></div>
         <div class="overlay second-1"></div>
         <div class="overlay third-1"></div>

        <router-link to="/" exact>
             <div class="brand-title">
                        <h3>YOUTH</h3>
                        <h3 class="orange">CREATOR.</h3>
              </div>
        </router-link>
        <div class="register">
                 <router-link to="/" exact>
                    <div class="mobile-title">
                        <h3>YOUTH</h3>
                        <h3 class="orange">CREATOR.</h3>
                    </div>
                 </router-link>
                <div class="register-form">
                <div class="sign--form">
                    <h3 class="sign-header">Registration</h3>
                    <!-- <div class="line"></div> -->
                    <p class="sign-para">Create an account to continue to our application</p>
                    <form class="form-1" @submit.prevent="register" action="/" method="post" novalidate="true">

                      <Input v-model="username" type="text" picture_src="mail-outline.svg" placeholder="Enter your Username" :errors="inputerror.username" />
                        <Input v-model="registeremail"  type="email" picture_src="person-circle-outline.svg" placeholder="Enter Email address" :errors="inputerror.registeremail" />
                           <PasswordInput v-model="password" placeholder="Enter your Password" :maxlength="30" :errors="inputerror.password"/>
                          <!-- <Input v-model="password_confirmation" type="password" picture_src="eye-outline.svg" placeholder="Enter your Password" :errors="inputerror.password_confirmation" /> -->
                        <br>
                       <div class="login-btn" v-if="isLogging">
                            <button type="submit" value="Submit" :disable="this.isLogging" :loading="isLogging">Register</button>
                        </div>
                        <div class="login-btn-2" v-else>
                            <button>
                                <div><h4>Creating...</h4></div>
                                <div class="animation"><lottie-player src="https://assets8.lottiefiles.com/packages/lf20_vIuhQq.json"  background="transparent"  speed="1"  style="width: 80px; height: 80px;"  loop  autoplay></lottie-player></div>
                            </button>
                        </div>
                         <div class="SignIn">
                        <p>Already have an account
                             <router-link to="/login">
                                  <a>Sign In</a>
                             </router-link>
                        </p></div>
                    </form>
                </div>
            </div>

            <div class="login-info">
                <div class="info">
                    <div class="connected">
                         <h3 class="info-1">LET GET:</h3>
                         <h3 class="info-2 orange-2">CONNECTED</h3>
                    </div>
                    <h3 class="info-3">Building a Strong Community</h3>
                    <div class="line"></div>
                    <p>Social media is the ultimate equaliser. It guves a voice and a platform to anyone willing to engage.
                          <router-link to="/aboutus">
                             <a>Learn more >></a>
                         </router-link>
                    </p>
                    <img  src="../../assets/4.jpg" alt="aboutus icon">
                    <img  src="../../assets/6.jpg" alt="aboutus icon">
                    <img  src="../../assets/5.jpg" alt="aboutus icon">
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import Input from "../components/Input"
import YouthNavbar from '../components/YouthNavbar'
import PasswordInput from '../components/PasswordInput'
export default {

   components:{
        Input,
        YouthNavbar,
        PasswordInput,
    },

     data: ()=> {
        return {
            password_confirmation: "",
            password: "",
            username: "",
            registeremail: "",
            inputerror: {},
            isLogging: true,
        }
    },
    methods: {
            async register(){
                this.inputerror = {};
                if(!this.username.trim()) this.inputerror.username = "Username  is required";
                if(!this.registeremail.trim()) this.inputerror.registeremail = "Email  is required";
                if(!this.password.trim()) this.inputerror.password = "Password  is required";
                // if(!this.password_confirmation.trim()) this.inputerror.password_confirmation = "Password  is required";
                this.isLogging =  false;

                if(Object.keys(this.inputerror).length) return;

                const data = {
                    username: this.username,
                    email: this.registeremail,
                    password: this.password,
                    // password_confirmation: this.password_confirmation,
                }

                    this.isLogging =  true;
                    const res = await this.callApi('post', 'api/register', data)
                    if(res.status===200){
                        this.success(res.data.msg)
                        this.isLogging = false
                    }else{
                        if(res.status===401){
                            this.info(res.data.msg)
                        }else if(res.status===422){
                            for(let i in res.data.errors){
                                this.error(res.data.errors[i][0])
                            }
                        }
                        else{
                            this.swr()
                        }
                        this.isLogging = false
                    }

            }
    },

  mounted: function(){
    TweenMax.to(".first-1", 1.5, {
              delay: .5,
               y:"-100%",
              ease: Expo.easeInOut
            });

            TweenMax.to(".second-1", 1.5, {
              delay: .10,
                left: "-100%",
              ease: Expo.easeInOut
            });

            TweenMax.to(".third-1", 1.5, {
              delay: .9,
              left: "-100%",
              opacity:0,
              ease: Expo.easeInOut
            });


            TweenMax.staggerFrom(".info img", 1.5, {
              delay: 2,
              opacity: 0,
              x: "60",
              ease: Expo.easeInOut
            }, 1 );
  },

}
</script>

<style scoped>

    .connected{
        margin-top: 30px;
    }

    .connected h3{
        display: inline;
    }

     h3{
        font-family: 'Fenotype' !important;
    }
    .orange{
        color:#EC6110;
        animation: hue-rotate 10s linear infinite;
    }

    .brand-title{
    position: absolute;
    top:2%;
    left:4%;
   }

    .brand-title h3{
    font-family: 'Fenotype',sans-serif !important;
    display: inline-block;
    }

    .orange-2{
          -webkit-text-fill-color: white; /* Will override color (regardless of order) */
            -webkit-text-stroke-width: 1px;
            -webkit-text-stroke-color: black;
    }

    .register{
        display: flex;
        flex-wrap: wrap;
        background-color: #fbfbfd;;
    }
    .login-info{
        display: flex;
        flex-basis: 70%;
        flex-grow: 2;
        position: relative;
    }

    .register-form{
        display: flex;
        flex-basis: 30%;
        flex-grow: 1;
        padding: 70px;
        /* background-image: url('../../../assets/paint.png');
         background-size:cover;
         background-repeat: no-repeat; */
    }

    .info{
        margin: 100px;
    }

    .sign--form{
        flex-wrap: wrap;
        flex-basis: 100%;
        border: 5px solid #303030;
    }

    .sign-header{
        flex-basis: 100%;
        text-align: center;
        font-size: 50px;
        color: #303030;
        margin: 0 45px;
        margin-top: 30%;
        text-transform: uppercase;
    }

    .sign-para{
        flex-basis: 100%;
        text-align: center;
        font-size: 16px;
        color: #686868;
        margin-top: 10px;
    }

    .form-1{
        flex-basis: 100%;
        text-align: center;
        margin-top: 60px;
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

    .SignIn{
         margin-top:30%;
         color: #a73a3a;
         margin-bottom: 20px;
    }
    .SignIn p{
        color:#686868;
    }
    .SignIn p a{
        color: #a73a3a;
        font-size: 20px;
    }

    .info-1{
        font-size: 40px;
         color: #303030;
    }
    .info-2{
        font-size: 40px;
    }

    .info-3{
        font-size: 75px;
        color: #303030;
        margin-bottom: 10px;
        text-transform: uppercase;
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
        background: rgb(2,0,36);
        background: radial-gradient(circle, rgba(2,0,36,1) 0%, rgb(232, 0, 193) 0%, rgba(2, 51, 26, 0.781) 100%);
    }

    .second-1 {
        background: rgb(2,0,36);
        background: radial-gradient(circle, rgba(2,0,36,1) 0%, rgba(0,0,232,1) 0%, rgba(2, 51, 26, 0.781) 100%);
        left: 33.3%;
    }

    .third-1 {
        background: rgb(2,0,36);
        background: radial-gradient(circle, rgba(2,0,36,1) 0%, rgb(202, 182, 2) 0%, rgba(2, 51, 26, 0.781) 100%);
        left: 66.6%;
    }

    .mobile-title h3{
    font-family: 'Fenotype',sans-serif !important;
    display: inline-block;
   }

    .mobile-title{
        display: none;
     }

    .registration{
        position: relative;
    }

    .brand-logo{
        max-width: 50px;
        position: absolute;
        top: 1%;
        left: 7%;
        animation: hue-rotate 10s linear infinite;
    }

    .navbar{
        display: none;
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
and (max-width : 1366px) {

    .register-form{
        display: flex;
        flex-basis: 30%;
        flex-grow: 1;
        padding: 20px;
    }

    .info-3{
        font-size: 52px;
        color: #303030;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .info-1{
        font-size: 30px;
        color: #303030;
    }

    .info-2{
        font-size: 30px;
    }

    .info img{
        max-width: 231px;
        margin-right: 2px;
        margin-top: 15px;
    }

    .info img{
        max-width: 185px;
        margin-right: 2px;
        margin-top: 15px;
    }

    .login-info{
        display: flex;
        flex-basis: 60%;
        flex-grow: 2;
        position: relative;
    }

    .register-form{
        display: flex;
        flex-basis: 30%;
        flex-grow: 1;
        padding: 20px;
        padding-top: 54px;
    }

    .sign-header{
        flex-basis: 100%;
        text-align: center;
        font-size: 36px;
        color: #303030;
        margin: 0 45px;
        margin-top: 17%;
        text-transform: uppercase;
    }

    .sign-para{
        flex-basis: 100%;
        text-align: center;
        font-size: 12px;
        color: #686868;
        margin-top: 10px;
    }

    .form-1{
        flex-basis: 100%;
        text-align: center;
        margin-top: 38px;
    }

}

    /* Smartphones (portrait) ----------- */
@media only screen
and (max-width : 420px) {


    .brand-title{
        display: none;
    }

    .login-info{
        display: none;
    }

       .login-form{
        display: flex;
        flex-grow: 1;
        padding: 10px;
        /* background-image: url('../../../assets/paint.png');
         background-size:cover;
         background-repeat: no-repeat; */
    }

     .sign--form{
        flex-wrap: wrap;
        flex-basis: 100%;
        border: none;
    }
    .navbar{
        display: block;
    }

    .sign-header{
        flex-basis: 100%;
        text-align: center;
        font-size: 40px;
        color: #303030;
        margin: 0 45px;
        margin-top: 0%;
        text-transform: uppercase;

    }

    .register-form[data-v-d72b8a5e] {
        display: flex;
        flex-basis: 30%;
        flex-grow: 1;
        padding: 0px;
    }

      .sign-para{
        font-size: 12px;
    }

    .mobile-title{
        display: flex;
        margin-left: 60%;
        margin-top: 20px;
        margin-bottom: 0px;
     }

}


</style>
