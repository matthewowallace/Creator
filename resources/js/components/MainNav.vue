<template>
    <div>
    <div class="nav-section">
      <div class="wrapper">
            <router-view></router-view>
            <!-- OVERLAY
            =============================== -->
            <div class="overlay first">
                <div class="admin-overlay">
                    <h3 data-text="YOUTHCREATOR">YOUTHCREATOR</h3>
                </div>
            </div>
            <!-- <div class="overlay second">th</div>
            <div class="overlay third">CREATOR</div> -->

            <!-- NAVBAR
            =============================== -->
            <nav class="navbar">
            <div class="brand-title menu">
                 <!-- <button type="button" uk-toggle="target: #offcanvas-push">
                    <Icon type="ios-menu" size="22" />
                </button> -->
                <h3>YOUTH</h3>
                <h3 class="orange">CREATOR.</h3>
            </div>

            <router-link to="/login" exact>
                 <div class="lang account"><a>Signin - Create Account</a></div>
            </router-link>
            <div class="lang">eng</div>
            <div class="search">
                <!-- <ion-icon name="ios-search"></ion-icon> -->
            </div>
            </nav>


            <!-- <div id="offcanvas-push" uk-offcanvas="mode:reveal; overlay: true">
              <div class="uk-offcanvas-bar">

                  <button class="uk-offcanvas-close" type="button" uk-close></button>

                  <div class="brand-logo">
                    <h3>YOUTH</h3>
                    <h3 class="orange">CREATOR.</h3>
                </div>

                  <p class="info-text">Young Creators  expects to captivate the interest of young upcoming artiste and creators who are seeking an opportunity to join the Media and Entertainment Economy, interact with senior experts who share the same interest and produce quality content together</p>
                  <div class="nav-menu">
                     <h3><Icon type="md-locate" size="22"/> NAVIGATION</h3>
                      <ul>
                        <router-link to="/admin">
                         <li>
                           <a><Icon type="ios-arrow-forward" size="20"/>Explore Our Concepts </a>
                         </li>
                        </router-link>
                        <router-link to="/dashboard">
                         <li>
                             <a><Icon type="ios-arrow-forward" size="20"/> Contact Us </a>
                        </li>
                        </router-link>
                         <li>
                             <a><Icon type="ios-arrow-forward" size="20"/> Service </a>
                        </li>
                        <div class="mobile--login">
                            <router-link to="/auth/login">
                                <li>
                                    <a><Icon type="ios-arrow-forward" size="20"/> Login </a>
                                </li>
                             </router-link>
                             <router-link to="/auth/registration">
                                <li>
                                    <a><Icon type="ios-arrow-forward" size="20"/> Registration </a>
                                </li>
                             </router-link>
                        </div>
                      </ul>
                  </div>
                  <div class="nav-menu">
                     <h3><Icon type="md-information-circle" size="22"/> Terms & Policy</h3>
                      <ul>
                         <li class="term">
                             <a  href="#modal-example" uk-toggle><Icon type="ios-arrow-forward" size="20"/> Terms & Conditions </a>
                         </li>
                         <li class="term">
                             <a><Icon type="ios-arrow-forward" size="20"/> Policy </a>
                        </li>
                      </ul>
                  </div>
                   <div class="nav-menu m">
                     <p>Copyright @ 2020</p>
                  </div>
              </div>
          </div> -->


            <div class="motivation">
                <Motivation />
            </div>

            <!-- TEXT
            =============================== -->

            <div class="Subheader-Text">
             <div>
                <p class="subtitle">
                  Developing Youthful Expertise
                </p>
             </div>
             <router-link to="/aboutus">
                 <div class="getstarted">
                     <a>Learn More</a>
                </div>
            </router-link>
            </div>

            <!-- SPONSOR
            =============================== -->
            <div class="sponsor">
            <!-- <img src="./images/sponsor-logo.png" alt=""> -->
                <button type="button" uk-toggle="target: #offcanvas-push">
                    FOR DESIGNERS & ARTISTE
                </button>
            </div>

            <!-- DISTORTION
            =============================== -->
            <!-- <div class="distortion"></div> -->
        </div>
    </div>
    </div>
</template>

<script>

import Slider from '../components/slider'
import Motivation from '../components/motivation'
export default {

   components :{
         Slider,
         Motivation,
      },

  mounted: function(){
     TweenMax.to('.first', 1.5, {
              delay: 2,
              top: "-100%",
              ease: Expo.easeInOut
            });

     TweenMax.to('.second', 1.5, {
              delay: .7,
              top: "-100%",
              ease: Expo.easeInOut
            });
      TweenMax.to('.third', 1.5, {
              delay: .9,
              top: "-100%",
              ease: Expo.easeInOut
            });

      TweenMax.from(".slider", 1.5, {
              delay: 2,
              opacity:0,
              x: "-200",
              ease: Expo.easeInOut
        });

      // NAVBAR
      TweenMax.staggerFrom(".navbar div", 1.5, {
              delay: 1.5,
              opacity: 0,
              y: "20",
              ease: Expo.easeInOut
            }, 0.08);

            // MEDIA
     TweenMax.staggerFrom(".media ul li", 1.5, {
              delay: 1.5,
              opacity: 0,
              x: "-20",
              ease: Expo.easeInOut
            }, 0.08);

            // TEXT
     TweenMax.from(".Header-Text h1", 1.5, {
              delay: 1.5,
              opacity:0,
              y: "100%",
              ease: Expo.easeInOut
            });

     TweenMax.from(".text h3 .hidetext", 1.5, {
              delay: 1.2,
              y: "100%",
              ease: Expo.easeInOut
            });

    TweenMax.from(".text h3 .hidetext", 1.5, {
              delay: 1.2,
              y: "100%",
              ease: Expo.easeInOut
            });

     TweenMax.from(".text p .hidetext", 1.5, {
              delay: 1.3,
              y: "100%",
              ease: Expo.easeInOut
            });

     TweenMax.from(".text h2", 1.5, {
              delay: 1.5,
              opacity: 0,
              x: "-10000",
              ease: Expo.easeInOut
            });

            // SPONSOR
     TweenMax.from(".sponsor img", 1.5, {
              delay: 1.5,
              opacity: 0,
              y: "20",
              ease: Expo.easeInOut
            });

     TweenMax.from(".sponsor p", 1.5, {
              delay: 1.6,
              opacity: 0,
              y: "20",
              ease: Expo.easeInOut
            });

            // DISTORTION
     TweenMax.from(".distortion", 1.5, {
              delay: 2,
              opacity: 0,
              y: "20",
              ease: Expo.easeInOut
            });
  },

}
</script>

<style scoped>

.info-text{
    line-height: 1.5rem;
}

.terms{
      font-family: 'Fenotype',sans-serif !important;
      text-transform: uppercase;
}

.brand-title h3{
   font-family: 'Fenotype',sans-serif !important;
   display: inline-block;
}

.orange{
    color:#EC6110;
    animation: hue-rotate 10s linear infinite;
}


@font-face {
    font-family: Fenotype;
    src: url('../../assets/fonts/FenotypeBlack.otf') format("opentype");
}

.Subheader-Text{
    position: absolute;
    top:62%;
    left:50%;
    transform: translate(-50%);
    text-align: center;
}

.subtitle{
    max-width: 500px;
    font-size: 1.2vw;
    font-weight: bold;
    color:#000;
}

/* .overflow-img{
    height: 100%;
    width: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    background-image: url('../../assets/3d.png');
    padding: 350px 350px;
    transition: 8s ease-in-out;
}

.overflow-img:hover{
    transform: scale(7.0);
   background-position: 0% 90%;
} */


@-webkit-keyframes slide {
    0% { background-position: 0 0;}
    90% { background-position: 0px 4000px; }
    100% { background-position: 0 0;}
}

.nav-section{
    background-image: url('../../assets/Mslider.jpg');
    background-size:cover;
    height: 100vh;
    -webkit-animation: slide 45s linear infinite;
}

/* .uk-offcanvas-overlay::before {
    content: "";
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: #000;
    opacity: 0.6;
    filter:invert(10%);
} */

blockquote::before {
  content: open-quote;
}
blockquote::after {
  content: close-quote;
}
blockquote {
  quotes: "“" "”" "‘" "’";
  color: #686868;
  font-size: 14px;
}

/* Nav Menu
=========================== */

.uk-offcanvas-bar h3{
    text-align: left;
    margin-top: 25px;
    font-size: 18px;
    text-transform: uppercase;
}

.brand-logo {
   text-align: left;
   margin-bottom: 30px;
}


.brand-logo h3{
    font-family: 'Fenotype',sans-serif !important;
   display: inline-block;
   font-size: 30px;
}

.uk-offcanvas-bar p{
    text-align: left;
}



.nav-menu{
    margin-top: 70px;
    justify-content: left;
    align-content: left;
}



.nav-menu ul{
    display: block;
}

.nav-menu ul li{
    margin-top: 25px;
    text-align: left;
    font-size: 12px;
}


.nav-menu ul li a:hover{
     color:#EC6110;
     margin-left: 20px;
}

.nav-menu .term{
    text-align: left;
}


/* Menu
=========================== */

.menu {
  position: relative;
  display: inline-block;
}

.menu button{
    padding:4px 6px;
    margin-left: 10px;
    transition: 0.04s;
}

.menu button:hover{
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    color:#EC6110;
}

.menu button:focus{
    outline: none;
}




hr{
    margin: 4px 15px;
    opacity: 0.6;
}

button{
    background-color: transparent;
    box-shadow: none;
    border:none;
}

.menu button:hover{

}

.nav-section{
  width: 100%;
  /* height: 100vh; */
  color:#686868;
}

ul {
  list-style: none;
}

/* NAVBAR
=========================== */
.navbar {
  display: flex;
  justify-content: space-between;
  height: 80px;
  align-items: center;
}

.navbar > div {
  padding: 0 30px;
  font-size: 20px;
}

.navbar .menu {
  margin-right: auto;
}

.navbar .lang {
  font-size: 10px;
  font-weight: 600;
  text-transform: uppercase;
}

.account{
    padding:12px;
    background-color: #303030;
    color:#fff;
    transition: 0.09s;
}

.account:hover{
  background-color: #fff;
  border:1px solid #303030;
  color:#303030;
}

/* SOCIAL MEDIA
=========================== */
.media ul {
  position: absolute;
  bottom: 250px;
  left: -140px;
  transform: rotate(-90deg);
}

.media ul li {
  font-size: 10px;
  font-weight: 600;
  letter-spacing: 2px;
  display: inline-block;
  padding: 0 30px;
}


/* TEXT
=========================== */
.text {
  position: absolute;
  top: 200px;
  left: 100px;
  transform: rotate(-90deg);
}

.subtext{
  transform: rotate(90deg);
  margin-left: 15px;
}


.text p {
  width: 200px;
  font-size: 12px;
  margin-top: 30px;
  font-weight: 500;
  position: relative;
  height: 210px;
}
.text p .hidetext {
  position: absolute;
}

/* slider */

.getstarted{
    position: relative;
    margin-top: 40px;
    z-index: 1;
    transition: 1s ease-in-out;
}

.getstarted a{
    padding: 10px 55px;
    border:1px solid #452c63;
    transition: 1s ease-in-out;
    animation: hue-rotate 10s linear infinite;
    font-family: 'Poppins' !important;
    font-size: 14px;
    font-weight: bold;
    color: #303030;
    box-shadow: 0px 18px 40px -12px #30303069 ;
}

.getstarted a:hover{
    padding: 10px 55px;
    background-color: #452c63;
    animation: hue-rotate 10s linear infinite;
    color:#fff !important;
}

.getstarted:hover{
    transform: translateY(-10px);
}

/* SPONSOR
=========================== */
.sponsor {
  position: absolute;
  left:20%;
  top:47%;
  /* transform: rotate(-270deg); */
  text-align: center;
}

.sponsor button {
  margin-top: 20px;
  font-size: 14px;
  font-family: 'Poppins' !important;
  text-transform: uppercase;
  font-weight: 700;
  color: #000;
  transform: rotate(0deg);
  background-color: transparent;
  padding: 15px;
}

.sponsor button:focus{
    background-color: #EC6110;
    animation: hue-rotate 10s linear infinite;
    outline: none;
}


/* DISTORTION
=========================== */
.distortion {
  width: 580px;
  height: 720px;
  position: absolute;
  right: 300px;
  bottom: 0;
}

/* OVERLAY
=========================== */
.overlay {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0%;
  z-index: 99;
}

.first {
    /* background: #fff; */
    backdrop-filter: blur(20px);
}

.admin-overlay h3{
    position: absolute;
    top:35%;
    left:50%;
    transform: translateX(-50%);
    font-family: 'Fenotype',sans-serif !important;
    font-weight: bold;
    font-size: 15rem;
    text-transform: uppercase;
    color: transparent;
    -webkit-text-stroke: 0.3vw #000;
}

h3{
    position: relative;
}


.admin-overlay h3::before{
   content: attr(data-text);
   position:absolute;
   top:0;
   left: 0;
   width: 0%;
   height: 100%;
   color:#000;
    -webkit-text-stroke: 0vw #fff;
    border-right: 10px solid #000;
    overflow: hidden;
    animation: animate 3s infinite ease;
}


@keyframes animate{
    0%,50%,100%
    {
        width: 0;
    }
    70%,90%
    {
        width: 100%;
    }
}

.admin-overlay{
    position: relative;
    height: 100%;
}

.second {
  background:#452c63;
  left: 33.3%;
}

.third {
  background: #452c63;
  left: 66.6%;
}

a{
    transition: 0.6s ease-in-out;
}

.media a:hover{
    color: #452c63;
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

/* Off Canvas
=========================== */

.uk-offcanvas-bar{
    background-color: #1b1c1e;
    /* animation: hue-rotate 10s linear infinite; */
    /* background: rgb(2,0,36);
   background: radial-gradient(circle, rgba(2,0,36,1) 0%, rgb(0, 186, 232) 0%, rgba(87, 3, 136, 0.781) 100%);
   animation: hue-rotate 10s linear infinite; */
}

.mobile--login{
    display: none;
}


/* Smartphones (portrait) ----------- */
@media only screen
and (max-width : 420px) {

    .navbar{
      background-color: #fff;
      height: 60px;
    }

    .navbar > div {
        padding: 0 0px;
        font-size: 20px;
    }

    .sponsor{
        display: none;
    }

    .search{
        display: none;
    }

    .lang{
        display: none;
    }


    .brand-title{
        margin-top: 8px;
        position: absolute;
        top:8%;
        left:17%;

    }

    .getstarted a{
    padding: 10px 25px;
    border:1px solid #452c63;
    transition: 1s ease-in-out;
    animation: hue-rotate 10s linear infinite;
    font-family: 'Poppins' !important;
    font-size: 12px;
    font-weight: bold;
    text-transform: uppercase;
    color: #303030;
    box-shadow: 0px 18px 40px -12px #30303069 ;
}

    .subtitle{
        max-width: 500px;
        font-size: 5vw;
        color: #303030;
    }

    .admin-overlay h3{
        position: absolute;
        top:45%;
        left:50%;
        transform: translateX(-50%);
        font-family: 'Fenotype',sans-serif !important;
        font-weight: bold;
        font-size: 3rem;
        text-transform: uppercase;
        color: transparent;
        -webkit-text-stroke: 0.3vw #000;
    }

    .mobile--login{
        display: block;
    }


}

/* Desktops and laptops ----------- */
@media only screen
and (max-width : 1366px) {

        .admin-overlay h3{
        position: absolute;
        top:35%;
        left:50%;
        transform: translateX(-50%);
        font-family: 'Fenotype',sans-serif !important;
        font-weight: bold;
        font-size: 10rem;
        text-transform: uppercase;
        color: transparent;
        -webkit-text-stroke: 0.3vw #000;
    }

        .getstarted a{
        padding: 10px 25px;
        border:1px solid #452c63;
        transition: 1s ease-in-out;
        animation: hue-rotate 10s linear infinite;
        font-family: 'Poppins' !important;
        font-size: 10px;
        font-weight: bold;
        text-transform: uppercase;
        color: #303030;
        box-shadow: 0px 18px 40px -12px #30303069 ;
    }

    .sponsor {
        position: absolute;
        left:10%;
        top:45%;
        /* transform: rotate(-270deg); */
        text-align: center;
        }

    .account{
    padding: 11px;
    background-color: #303030;
    color: #fff;
    transition: 0.09s;
    }

    .navbar .lang{
    font-size: 9px;
    font-weight: 600;
    text-transform: uppercase;
    }

    .sponsor button {
        margin-top: 20px;
        font-size: 12px;
        font-family: 'Poppins' !important;
        text-transform: uppercase;
        font-weight: 700;
        color: #000;
        transform: rotate(0deg);
        background-color: transparent;
        padding: 15px;
        }

}
</style>
