<template>
    <div class="wrapper">
          <!-- OVERLAY
            =============================== -->
         <div class="overlay first-1"></div>
         <div class="overlay second-1"></div>
         <div class="overlay third-1"></div>

        <div class="login">
              <router-link to="/" exact>
                    <div class="mobile-title">
                        <h3>YOUTH</h3>
                        <h3 class="orange">CREATOR.</h3>
                    </div>
                 </router-link>
            <div class="login-info">
                 <router-link to="/" exact>
                    <div class="brand-title">
                        <h3>YOUTH</h3>
                        <h3 class="orange">CREATOR.</h3>
                    </div>
                 </router-link>
                <div class="info">
                    <div class="connected">
                         <h3 class="info-1">LET GET:</h3>
                         <h3 class="info-2 orange-2">CONNECTED</h3>
                    </div>
                    <h3 class="info-3">ACROSS THE ISLAND</h3>
                    <div class="line"></div>
                    <p>Social media is the ultimate equaliser. It guves a voice and a platform to anyone willing to engage.
                         <router-link to="/aboutus">
                             <a>Learn more >></a>
                         </router-link>
                    </p>

                    <img  src="../../assets/1.png" alt="aboutus icon">
                    <img  src="../../assets/2.png" alt="aboutus icon">
                    <img  src="../../assets/3.png" alt="aboutus icon">
                </div>
            </div>
            <div class="login-form">
                <div class="sign--form">
                    <h3 class="sign-header">Login</h3>
                    <!-- <div class="line"></div> -->
                    <p class="sign-para">Sign in to continue to our application</p>
                    <Loginform />
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import Loginform  from '../components/loginform'
import YouthNavbar from '../components/YouthNavbar'
export default {

    components:{
        Loginform,
        YouthNavbar,
    },

     mounted: function(){
            TweenMax.to(".first-1", 1.5, {
              delay: .5,
              left: "-100%",
              ease: Expo.easeInOut
            });

            TweenMax.to(".second-1", 1.5, {
              delay: .7,
              left: "-100%",
              ease: Expo.easeInOut
            });

            TweenMax.to(".third-1", 1.5, {
              delay: .9,
              left: "-100%",
              ease: Expo.easeInOut
            });

            TweenMax.from(".info-1", 1.5, {
              delay: 1.5,
              x: "-100%",
              ease: Expo.easeInOut
            });

            TweenMax.from(".info-2", 1.5, {
              delay: 1.7,
              x: "-100%",
              ease: Expo.easeInOut
            });

             TweenMax.from(".info-3", 1.5, {
              delay: 2,
              x: "-100%",
              ease: Expo.easeInOut
            });

              TweenMax.from(".info p", 1.5, {
              delay: 2,
              opacity:0,
              y: "50",
              ease: Expo.easeInOut
            });

              TweenMax.staggerFrom(".info img", 1.5, {
              delay: 2,
              opacity: 0,
              y: "50",
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

    .brand-title{
    position: absolute;
    top:2%;
    left:4%;
   }

   .mobile-title h3{
    font-family: 'Fenotype',sans-serif !important;
    display: inline-block;
   }

    .mobile-title{
        display: none;
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

    .orange{
        color:#EC6110;
        animation: hue-rotate 10s linear infinite;
    }

    h3{
        font-family: 'Fenotype' !important;
    }

     img:hover{
       transition: 2s;
       filter: grayscale(80%);
    }

    .login{
        display: flex;
        flex-wrap: wrap;
    }
    .login-info{
        display: flex;
        flex-basis: 70%;
        flex-grow: 2;
        position: relative;
    }

    .login-form{
        display: flex;
        flex-basis: 30%;
        flex-grow: 1;
        padding: 70px;
        /* background-image: url('../../../assets/paint.png');
         background-size:cover;
         background-repeat: no-repeat; */
    }

    .info{
        margin: 60px;
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
        margin-bottom: -40px;
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
        background: rgb(2,0,36);
        background: radial-gradient(circle,  rgba(0,0,232,1) 0%, rgba(2, 51, 26, 0.781) 100%);
    }

    .second-1 {
        background: rgb(2,0,36);
        background: radial-gradient(circle,  rgba(0,0,232,1) 0%, rgba(2, 51, 26, 0.781) 100%);
        left: 33.3%;
    }

    .third-1 {
        background: rgb(2,0,36);
        background: radial-gradient(circle,  rgba(0,0,232,1) 0%, rgba(2, 51, 26, 0.781) 100%);
        left: 66.6%;
    }

    .brand-logo{
        max-width: 50px;
        position: absolute;
        top: 3%;
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

    .login-info{
        display: flex;
        flex-basis: 60%;
        flex-grow: 2;
        position: relative;
    }

    .info img{
        max-width: 207px;
        margin-right: 2px;
        margin-top: 15px;
    }

    .info-3{
        font-size: 52px;
        color: #303030;
        margin-bottom: 10px;
    }

    .info-1{
        font-size: 30px;
        color: #303030;
        margin-top: 30px;
    }

    .sign-header{
        flex-basis: 100%;
        text-align: center;
        font-size: 38px;
        color: #303030;
        margin: 0 45px;
        margin-top: 30%;
        text-transform: uppercase;
    }

        .sign-para{
        flex-basis: 100%;
        text-align: center;
        font-size: 13px;
        color: #686868;
        margin-top: 10px;
        margin-bottom: -40px;
    }

    .login-form{
        display: flex;
        flex-basis: 30%;
        flex-grow: 1;
        padding: 20px;
    }

    .info-2{
        font-size: 30px;
    }

}

/* Smartphones (portrait) ----------- */
@media only screen
and (max-width : 420px) {

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
        font-size: 50px;
        color: #303030;
        margin: 0 45px;
        margin-top: 0%;
        text-transform: uppercase;

    }

     .mobile-title{
        display: flex;
        margin-left: 60%;
        margin-top: 20px;
         margin-bottom: 20px;
     }

}

</style>
