<template>
    <div>
        <div v-if="loading">
             <div class="overlay first">
                 <div class="admin-overlay">
                    <h3>Loading...</h3>
                </div>
            </div>
        </div>
      <div class="wrapper" v-else>
            <!-- OVERLAY
            =============================== -->
            <div class="overlay first">
                 <div class="admin-overlay">
                    <h3>USERDASHBOARD</h3>
                </div>
            </div>

            <!-- <router-link to="/" exact>
            <div class="brand-title">
                <h3>YOUTH</h3>
                <h3 class="orange">CREATOR.</h3>
            </div>
            </router-link> -->


            <!-- NAVBAR
            =============================== -->
            <nav class="navbar">
            <div class="menu">
                 <UserProfileNavbar />
            </div>
            <div  class="lang account-2">
                 <Icon class="dash--icon" type="ios-notifications" size="22" />
            </div>

            <div class="lang account-2">
                 <button>SENARIO</button>
            </div>
             <div class="lang account">
                 <button>POST</button>
            </div>
            </nav>

            <div class="profile">
                <div class="profile--area">
                    <div class="contributors">
                        <TopContributors />
                    </div>
                    <div class="profile--name">
                        <h3>Senario Area</h3>
                    </div>
                    <div class="senario-area">
                        <div class="post-card">
                            <div class="user-img">
                                <img  src="../../../assets/8.png" alt="profile image">
                            </div>
                            <div class="fab">
                              <!-- <button>
                                <Icon type="md-more" size="22"/>
                              </button> -->
                             <Dropdown trigger="click" style="margin-left: 20px">
                                <a href="javascript:void(0)">
                                    <Icon type="md-more" size="22"/>
                                </a>
                                <DropdownMenu slot="list">
                                    <DropdownItem><Icon type="md-create" /> Edit</DropdownItem>
                                    <DropdownItem style="color: #ed4014"><Icon type="ios-trash" /> Delete</DropdownItem>
                                </DropdownMenu>
                            </Dropdown>
                            </div>
                            <div class="user-info">
                                <h5>John Brown</h5>
                                <h5>10h</h5>
                            </div>
                            <div class="post-title">
                              <h4>Design a hand cart</h4>
                            </div>
                             <hr>
                             <div class="post-description">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>
                            </div>
                             <hr>
                        </div>
                        <div class="senario-card">
                            <div class="user-img">
                                <img  src="../../../assets/8.png" alt="profile image">
                            </div>
                             <div class="fab">
                              <!-- <button>
                                <Icon type="md-more" size="22"/>
                              </button> -->
                             <Dropdown trigger="click" style="margin-left: 20px">
                                <a href="javascript:void(0)">
                                    <Icon type="md-more" size="22"/>
                                </a>
                                <DropdownMenu slot="list">
                                    <DropdownItem><Icon type="md-create" /> Edit</DropdownItem>
                                    <DropdownItem style="color: #ed4014"><Icon type="ios-trash" /> Delete</DropdownItem>
                                </DropdownMenu>
                            </Dropdown>
                            </div>
                            <div class="senario-info">
                                <h5>John Brown</h5>
                                <h5>10h</h5>
                            </div>
                            <div class="senario-title">
                              <h4>Design a hand cart</h4>
                            </div>
                            <hr>
                             <div class="senario-description">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>
                            </div>
                             <hr>
                        </div>
                    </div>
                </div>
                <div class="profile--img">

                </div>
             </div>
        </div>
    </div>
</template>

<script>
import Axios from 'axios';
import UserProfileNavbar from "../components/UserProfileNavbar"
import TopContributors from "../components/TopContributors"
export default {

    data() {
        return {
            user: null,
            visible: false,
            isLogging: true,
        }
    },

    mounted() {
        axios.get('/api/user').then((res)=>{
            this.user = res.data
        });

        if(this.$store.state.token != ''){
        axios.post('/api/checkToken', {token : this.$store.state.token})
            .then(res =>{
                this.loading = false;
            })
            .catch(err => {
                this.loading = false;
                this.$store.commit('clearToken')
                this.$router.push('/loading')
            })


        }else{
            this.loading = false,
            this.$router.push('/login');
        }

    },

    components: {
        UserProfileNavbar,
        TopContributors,
    },

   methods: {
       handleOpen () {
                this.visible = true;
            },
            handleClose () {
                this.visible = false;
       }
    },

  mounted: function(){
     TweenMax.to('.first', 1.5, {
              delay: .5,
              top: "-100%",
              opacity:0,
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

    .contributors{
        margin: 10px 0px;
        z-index: -90;
    }

    .user-info h5{
        margin-left: 10px;
        font-size: 12px;
        color: #3451a0;
    }
    .user-info h5:first-child{
        font-weight: bold;
    }

     .senario-info h5{
        margin-left: 10px;
        font-size: 12px;
        color: #fff;
    }
    .senario-info h5:first-child{
        font-weight: bold;
    }

    .user-img img{
        width: 55px;
        border-radius: 15%;
        position: absolute;
        top:-20px;
        left: -20px;
        border: 6px solid #fff;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    }

    .fab{
        position: absolute;
        top:10px;
        left: 85%;
    }

    .fab button{
        color:#303030;
    }

    .senario-card{
        margin: 10px;
        margin-left: 0px;
        padding: 30px;
        width: 30%;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
        transition: 0.9s;
        background-color: #3451a0;
        border-top-left-radius: 30px;
        border-bottom-right-radius: 30px;
        min-width: 300px;
        position: relative;
    }

    .senario-card:hover{
        transform: translateY(-10px);

    }

    .post-card{
        margin: 10px;
        margin-left: 0px;
        padding: 30px;
        width: 30%;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
        transition: 0.9s;
        border-top-left-radius: 30px;
        border-bottom-right-radius: 30px;
        min-width: 300px;
        position: relative;
    }

    .post-card:hover{
        transform: translateY(-10px);

    }

    .profile--name h3{
       font-family: 'Poppins',sans-serif !important;
       font-size: 14px;
       margin-left: 15px;
       color: #303030;
       margin-bottom: 40px;
    }

    .senario-title{
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .senario-title h4{
        font-size: 24px;
        color:#fff;
        font-weight: bold;
         font-family: 'Poppins',sans-serif;
    }

    .post-description p{
        padding: 10px;
        font-size: 14px ;
        max-width: 30vw;
    }

    .post-title{
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .post-title h4{
        font-family: 'Poppins',sans-serif;
        font-size: 24px;
        font-weight: bold;
    }

    .senario-description p{
         padding: 10px;
        font-size: 14px ;
        max-width: 30vw;
        color:#fff;
    }

    .profile--area{
        padding:30px;
        flex-grow: 2;
        max-width: 80%;
    }

    .senario-area{
        padding: 10px;
        display: flex;
        justify-content: space-around;
        flex-direction:row;
        flex-wrap: wrap;
    }

    .profile{
        display: flex;
        flex-direction:row;
        justify-content:space-around;
        flex-wrap: wrap;
    }

    .profile--img{
        padding: 50px;
        background-color: #EC6110;
        flex-grow: 1;
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

.dash-area{
    padding:7px;
    display: flex;
    flex-direction:row;
    justify-content:space-around;
    flex-wrap: wrap;
}


.account--icon1 button:focus{
    background-color: #EC6110;
    outline: none;
    color:#fff;
}

.dash--section{
    padding:7px;
    display: flex;
    flex-direction:row;
    justify-content:space-around;
    flex-wrap: wrap;
}


.dash--icon{
    border-radius: 2px;
     padding:10px;
     box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
}


.dash--icon:hover{
    color: #EC6110;
}

.account button{
    padding:14px 40px;
    color:#fff;
    transition: 0.4s;
    border-radius: 2px;
    background-color: #303030;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
}

.account button:hover{
    background-color: #fff;
    color:#303030;
}

.account button:focus{
     box-shadow: none;
     outline: none;
     background-color: rgb(237, 237, 238);
     color: #303030;
     box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
}

.account-2 button{
    padding:14px 40px;
    color:#fff;
    transition: 0.4s;
    border-radius: 2px;
    background-color: #3451a0;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
}

.account-2 button:hover{
    background-color: #fff;
    color:#3451a0;
}

.account-2 button:focus{
     box-shadow: none;
     outline: none;
     background-color: #fff;
     color:#3451a0;
     box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
}


.orange{
    color:#EC6110;
    animation: hue-rotate 10s linear infinite;
}

/* Menu
=========================== */

.menu {
  position: relative;
  display: inline-block;
}



button{
    background-color: transparent;
    box-shadow: none;
    border:none;
}


.nav-section{
  width: 100%;
  /* height: 100vh; */
  overflow: hidden;
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
  padding: 0 10px;
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


/* OVERLAY
=========================== */
.overlay {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0%;
  z-index: 99;
   animation: hue-rotate 10s linear infinite;
}

.first {
 background-color: rgba(255, 255, 255, 0.479);
}

.admin-overlay h3{
    position: absolute;
    top:50%;
    left:50%;
    transform: translateX(-50%);
    font-family: 'Fenotype',sans-serif !important;
    font-weight: bold;
    font-size: 15rem;
    text-transform: uppercase;
}

.admin-overlay{
    position: relative;
    height: 100%;
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


.menu img{
    width: 40px;
    padding: 7px;
    border-radius: 2px;
    padding:10px;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    transition: 0.04s;
}

.menu img:hover{
    background-color: rgb(233, 233, 233);
    box-shadow: none;
}

@media only screen
and (max-width : 420px) {
  .tabcontent{
    margin-top: 30px;
    padding: 0px;
    padding-top: 0px;
}

.admin-overlay h3{
    position: absolute;
    top:50%;
    left:50%;
    transform: translateX(-50%);
    font-family: 'Fenotype',sans-serif !important;
    font-weight: bold;
    font-size: 3rem;
    text-transform: uppercase;
}

  .post-description p{
        padding: 10px;
        font-size: 14px ;
        max-width: 300px;
    }

      .senario-description p{
        padding: 10px;
        font-size: 14px ;
        max-width: 300px;
    }

    .user-img img{
        width: 55px;
        border-radius: 15%;
        position: absolute;
        top:-20px;
        left: -0px;
        border: 6px solid #fff;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    }

       .user-info h5{
        margin-left: 40px;
        font-size: 12px;
        color: #3451a0;
    }


       .senario-info h5{
        margin-left: 40px;
        font-size: 12px;
        color: #fff;
    }

     .fab{
        position: absolute;
        top:10px;
        left: 75%;
    }

    .lang {
        display: none;
    }


    .profile--name h3{
       font-family: 'Poppins',sans-serif !important;
       font-size: 24px;
       margin-top:20px;
       text-align: center;
       color: #303030;
       margin-bottom: 40px;
    }


}



</style>
