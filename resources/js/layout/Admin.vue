<template>
      <div class="wrapper">
          <router-view></router-view>

                <!-- OVERLAY
            =============================== -->
            <div class="overlay first">
                <div class="admin-overlay">
                    <h3>administrator</h3>
                </div>
            </div>
            <!-- <div class="overlay second"></div>
            <div class="overlay third"></div> -->

          <div class="layout">
        <Layout>
            <Header>
                <Menu mode="horizontal">
                    <div class="layout-logo">
                         <div class="brand-logo">
                        <h3 class="black">YOUTH</h3>
                        <h3 class="orange">CREATOR.</h3>
                        </div>
                    </div>
                    <div class="layout-nav">
                         <MenuItem name="1">
                            <router-link to="/userstatus" >
                            <div>
                                <router-link to="/admin" >
                                    <div>
                                        <Icon type="md-analytics"></Icon>
                                        <a>Dashboard</a>
                                    </div>
                                </router-link>
                            </div>
                            </router-link>
                        </MenuItem>
                        <MenuItem name="2">
                            <router-link to="/userstatus" >
                            <div>
                                <Icon type="ios-people"></Icon>
                                <a>User Status</a>
                            </div>
                            </router-link>
                        </MenuItem>
                        <MenuItem name="3">
                            <router-link to="/postdata" >
                                <div>
                                <Icon type="ios-keypad"></Icon>
                                <a>Category Table</a>
                                </div>
                            </router-link>
                        </MenuItem>
                        <MenuItem name="4">
                             <router-link to="/tagtable">
                            <div>
                            <Icon type="ios-analytics"></Icon>
                            <a>Tag Table</a>
                            </div>
                            </router-link>
                        </MenuItem>
                          <Submenu name="2">
                                <template slot="title">
                                    <Icon type="ios-contact" />
                                </template>
                                <MenuGroup title="Account Setttings">
                                <router-link to="/userprofile"> <MenuItem name="3-1">Account Profile</MenuItem></router-link>
                                <MenuItem name="3-2">Account Settings</MenuItem>
                                </MenuGroup>
                                <MenuGroup title="Logout">
                                    <MenuItem name="3-4" @click="logout">Logout</MenuItem>
                                </MenuGroup>
                        </Submenu>
                    </div>
                </Menu>
            </Header>
            <Layout>
                <div class="management">
                 <Sider hide-trigger :style="{background: 'transparent'}">
                    <Menu active-name="1-2" theme="light" width="auto" :open-names="['1']">
                        <Submenu name="1">
                            <template slot="title">
                                <Icon type="ios-navigate"></Icon>
                                Role Managment
                            </template>
                            <router-link to="/role">
                                  <MenuItem name="1-1">Roles</MenuItem>
                            </router-link>
                        </Submenu>
                    </Menu>
                </Sider>
                </div>
                <Layout :style="{padding: '24px 24px 24px'}">
                    <Content :style="{padding: '24px', minHeight: '280px'}">
                            <div id="Admin--Dashboard" class="tabcontent">
                                <div class="status--section">
                                    <div class="status--1">
                                        <h3>Users</h3>
                                        <Userchart />
                                    </div>
                                    <div class="status--1">
                                        <h3>Posts</h3>
                                        <PostChart/>
                                    </div>
                                    <div class="status--1">
                                        <h3>Scenarios</h3>
                                        <ScenarioChart/>
                                    </div>
                                </div>
                                <div  class="dash--section">
                                    <div class="layout--1">
                                        <h3>Message</h3>
                                        <AreaChart/>
                                    </div>
                                </div>
                            </div>
                    </Content>
                </Layout>
            </Layout>
        </Layout>
    </div>
</div>
</template>

<script>
import Userchart from '../components/Userchart'
import AreaChart from '../components/Areachart'
import PostChart from '../components/Postchart'
import ScenarioChart from '../components/Scenariochart'
import UserAccountTable from '../components/UserAccountTable'
import PostActivityTable from '../components/PostActivityTable'
import Tags from '../components/Tags'
import ManageUser from '../components/ManageUsers'


export default {

   components :{
        Userchart,
        AreaChart,
        PostChart,
        ScenarioChart,
        UserAccountTable,
        PostActivityTable,
        Tags,
        ManageUser,
      },


    props:['user','app'],

        data:() => {
            return{
                isLoggedIn : false,
                user: "",
            }
            },

    methods: {

            logout(){
            axios.post('/api/logout', {token : this.$store.state.token})
            .then( res => {
                this.$store.commit('cleartToken');
                this.$router.push('/');
            })
          },
        },

    mounted: function(){
        TweenMax.to('.first', 1.5, {
                delay: 3,
                top: "-100%",
                opacity: 0,
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
        TweenMax.from(".dash--section", 1.5, {
                delay: 1.5,
                opacity:0,
                y: "100%",
                ease: Expo.easeInOut
                });
        TweenMax.staggerFrom(".status--1", 2, {
                delay: 1.2,
                y: "100%",
                ease: Expo.easeInOut
                }, 0.10);

        TweenMax.from(".Title--section", 2, {
                delay: 1,
                y: "100%",
                opacity:0,
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

          axios.get('api/user').then((res)=>{
            this.user = res.data
        })
    },

    created(){
        this.$store.commit('updateUser', this.user)
    }

}
</script>

<style scoped>

.management{
    margin-top: 20px;
}

.ivu-menu-light {
    background: transparent;
}

.ivu-layout-header {
    background:none;
    padding: 0 0px !important;
    height: 64px;
    line-height: 64px;
}

.wrapper{
    height: 100vh;
    overflow: scroll;
    overflow-x: hidden;
}

.wrapper::-webkit-scrollbar-track {
  border: none;
  padding: 2px 0;
  background-color: #c5c5c5;
}

.wrapper::-webkit-scrollbar {
  width: 7px;
}

.wrapper::-webkit-scrollbar-thumb {
  border-radius: 0px;
  box-shadow: inset 0 0 6px rgba(0,0,0,.3);
  background-color:#516b91;
}

.icon-btn{
    margin-top: -1px;
    margin-right: 2px;
}

.icon-btn2{
    margin-right: 10px;
    padding-top: 3px;
}

.tabcontent{
    padding: 50px;
    padding-top: 0px;
}

.Title--section h3{
    font-family: 'Fenotype',sans-serif !important;
    text-align: left;
    font-size: 4em;
    margin-left: 10px;
    text-transform: uppercase;
}

.Title--section{
     padding:7px;
}

.status--section{
    padding:7px;
    display: flex;
    flex-direction:row;
    justify-content:space-around;
    flex-wrap: wrap;
}

.status--1{
    min-width: 300px;
    width: 300px;
    padding: 40px;
    order:1;
    flex-grow:1;
    margin: 10px;
    background-color: #fff;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
}

.dash--section{
    padding:7px;
    display: flex;
    flex-direction:row;
    justify-content:space-around;
    flex-wrap: wrap;
}

.layout--1{
    margin:10px;
    padding: 40px;
    order:1;
    flex-grow:1;
    flex-shrink: 1;
    background-color: #fff;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
}

.layout--2{
    margin:10px;
    padding: 10px;
    order:2;
    flex-grow:3;
    background-color: #fff;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
}

.layout--3{
    background-color: #fff;
    margin:10px;
    padding: 10px;
    order:3;
    flex-grow:1;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
}




.brand-logo {
   margin-top: 0px;
   text-align: left;
   margin-bottom: 10px;
   margin-left: 25px;
}

h3{
    font-family: 'Fenotype',sans-serif !important;
   font-size: 24px;
   text-transform: uppercase;
}

.brand-logo h3{
    font-family: 'Fenotype',sans-serif !important;
   display: inline-block;
   font-size: 30px;
}



.black{
     color: #303030;
}

.orange{
    color:#516b91;
    animation: hue-rotate 10s linear infinite;
}


/* Menu
=========================== */

.menu {
  position: relative;
  display: inline-block;
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






.layout{
    border: 1px solid #d7dde4;
    background: #f5f7f9;
    position: relative;
    border-radius: 4px;
    overflow: hidden;
}
.layout-logo{
    float: left;
    position: relative;
    top: 0px;
    left: 20px;
}
.layout-nav{
    width: 620px;
    margin: 0 auto;
    margin-right: 20px;
}


/* OVERLAY
=========================== */
.overlay {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0%;
  z-index: 999;
   /* animation: hue-rotate 10s linear infinite; */
}

.first {
 background-color:#70cffc65;
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
}

.admin-overlay{
    position: relative;
    height: 100%;
}

/* .second {
  background:rgba(0, 0, 0, 0.678);
  left: 33.3%;
}

.third {
  background:rgba(0, 0, 0, 0.678);
  left: 66.6%;
} */

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


/* Smartphones (landscape) ----------- */
@media only screen
and (max-width : 400px) {

.status--1{
    min-width: 300px;
    width: 300px;
    padding: 20px;
    order:1;
    flex-grow:1;
    margin: 10px;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
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
    }

}


</style>
