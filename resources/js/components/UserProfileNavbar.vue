<template>
         <div class="navbar">
             <router-view></router-view>
            <Menu mode="horizontal" :theme="theme1" active-name="1">
                <MenuItem name="1">
                <router-link to="/" exact>
                    <div class="brand-title">
                        <h3>YOUTH</h3>
                        <h3 class="orange">CREATOR.</h3>
                    </div>
                </router-link>
                </MenuItem>
                <div class="mobile-menu">
                      <Dropdown trigger="click" style="margin-left: 20px">
                                <a href="javascript:void(0)">
                                     <Icon class="dash--icon"  type="md-menu" />
                                </a>
                                <DropdownMenu slot="list">
                                    <DropdownItem><Icon type="md-create" /> Edit</DropdownItem>
                                    <DropdownItem style="color: #ed4014"><Icon type="ios-trash" /> Delete</DropdownItem>
                                </DropdownMenu>
                      </Dropdown>
                </div>
                <div class="submenu">
                    <Submenu name="2">
                        <template slot="title">
                            <Icon type="ios-contact" />
                        Account
                        </template>
                        <MenuGroup title="Account Setttings">
                        <MenuItem name="3-1"> <button @click="userprofilemodal = true"> Account Profile</button></MenuItem>
                        <MenuItem name="3-2"><button @click="userprofilesettings = true">Account Settings</button></MenuItem>
                        </MenuGroup>
                        <MenuGroup title="Logout">
                            <MenuItem name="3-4"><button v-on:click="logout">Logout</button></MenuItem>
                        </MenuGroup>
                    </Submenu>
                    <!-- <router-link to="/dashboard">
                        <MenuItem name="3">
                            <Icon type="md-list-box" />
                            Posts
                        </MenuItem>
                    </router-link> -->
                    <MenuItem name="4">
                        <Icon type="ios-people" />
                        Friends
                    </MenuItem>
                    <MenuItem name="4">
                        <Icon type="md-chatboxes" />
                        Messages
                    </MenuItem>
                </div>
            </Menu>

        <!-- User Profile Modal -->
         <Modal
            v-model="userprofilemodal"
            title="User Profile"
            :mask-closable="false"
            :closable="true"
            :fullscreen="true"
        >

             <div class="profile">
            <div class="profile--area">
                <div class="profile--name">
                    <h3>{{ $store.state.profile.name }}</h3>
                </div>
                <div class="description--title">
                    <h4>The world is my runway</h4>
                </div>
                <div class="description--user">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit
                        anim id est laborum.
                    </p>
                    <SocialLinks />
                </div>
            </div>
            <div class="profile--img">
                <img src="../../assets/8.png" alt="profile image" />
            </div>
        </div>

            <div slot="footer">
                <button @click="userprofilemodal = false">Close</button>
                <!-- <button
                    class="add-btn"
                    @click="addComment"
                    :disabled="isAdding"
                    :loading="isAdding"
                >
                    {{ isAdding ? "Adding..." : "Add Comment" }}
                </button> -->
            </div>
        </Modal>

            <!-- User Profile Settings Modal -->
         <Modal
            v-model="userprofilesettings"
            title="User Profile Settings"
            :mask-closable="false"
            :closable="true"
            :draggable="true"
        >
            <div class="profilebody">
                <Input v-model="$store.state.profile.name" type="text" picture_src="mail-outline.svg" placeholder="Enter Email address" />
                <Input type="text" picture_src="earth-outline.svg" placeholder="Profile Title" />
                <br>
                <textarea
                    placeholder="Enter User Description"
                />
                 <Input type="url" picture_src="facebook.svg" placeholder="Add facebook Url Link" />
                 <Input type="url" picture_src="twitter.svg" placeholder="Add twitter Url Link" />
                 <Input type="url" picture_src="instagram.svg" placeholder="Add Instagram Url Link" />
                 <Input type="url" picture_src="whatsapp.svg" placeholder="Add Whatsapp Url Link" />
                 <Input type="url" picture_src="snapchat.svg" placeholder="Add SnapChat Url Link" />
                 <Input type="url" picture_src="reddit.svg" placeholder="Add Reddit Url Link" />
            </div>

            <div slot="footer">
                <button @click="userprofilesettings = false">Close</button>
                <button
                    class="add-btn"
                    @click="updateProfile"
                    :disabled="isAdding"
                    :loading="isAdding"
                >
                    {{ isAdding ? "Adding..." : "Update Profile" }}
                </button>
            </div>
        </Modal>
         </div>
</template>

<script>
import * as auth from '../auth_services';
import Axios from 'axios'
import SocialLinks from "./SocialLinks";
import Input from "./Input";
export default {
    name: "UserProfileNavbar",
    data () {
            return {
                theme1: 'light',
                userprofilemodal: false,
                userprofilesettings: false,
                isAdding: false,
            }
        },
    components:{
        SocialLinks,
        Input,
    },


    methods:{

        logout: async function(){
            auth.logout();
             this.$router.push('/login');
        },

        async updateProfile(){

        },
    }
}
</script>

<style scope>

.navbar{
    z-index: 999;
}

.brand-title h3{
   font-family: 'Fenotype',sans-serif !important;
   display: inline-block;
}

.orange{
    color:#EC6110;
    animation: hue-rotate 10s linear infinite;
}


button{
    border:none;
    background-color: transparent;
    color:#962e2e;
}

.submenu{
    display: flex;
}

.mobile-menu{
    display: none;
}

.mobile-menu{
    position: absolute;
    top:-5px;
    left:110%;
}

.dash--icon{
    border-radius: 2px;
     padding:10px;
     box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
}

button:focus{
    border:none;
    outline: none;
}

.profile--name h3 {
    font-family: "Fenotype", sans-serif !important;
    font-size: 4vw;
    color: #fff;
}

.description--title {
    margin-top: 15px;
    margin-bottom: 15px;
}

.description--title h4 {
    font-size: 24px;
    color:#fff;
}

.description--user p {
    font-size: 18px;
    max-width: 30vw;
    color:#fff;
}

.profile--area {
    padding: 40px;
    flex-grow: 1;
}

.profile {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    flex-wrap: wrap;
}

.profile--img {
    padding: 50px;
    flex-grow: 2;
}

.profile--img img {
    width: 600px;
    border-bottom-right-radius: 50px;
    border-top-left-radius: 50px;
    transition: 0.9s;
}

.profile--img img:hover {
    filter: grayscale(80%);
}

.profilebody{
    text-align: center;
    overflow-y: scroll;
    height: 700px;
}

 ::-webkit-scrollbar {
  width: 4px;
}

::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey;
  border-radius: 10px;
}

 ::-webkit-scrollbar-thumb {
  background: #a0344f;
  border-radius: 10px;
}


.add-btn {
    background-color:#a0344f;
    margin-bottom: 10px;
    padding: 12px 28px;
    font-size: 11px;
    color: #fff;
    text-transform: uppercase;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1),
        0px 1px 3px 0px rgba(0, 0, 0, 0.08);
}

textarea{
    width: 67%;
    resize: none;
    overflow-y: scroll;
    height: 100px;
    padding: 10px !important;
    border: 1px solid #ccc !important;
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

@media only screen
and (max-width : 420px) {

    .submenu{
        display: none;
    }

    .mobile-menu{
        display: block;
    }


}
</style>
