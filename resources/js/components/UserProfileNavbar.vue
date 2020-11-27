<template>
         <div class="navbar">
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
                        <router-link to="/userprofile"> <MenuItem name="3-1">Account Profile</MenuItem></router-link>
                        <MenuItem name="3-2">Account Settings</MenuItem>
                        </MenuGroup>
                        <MenuGroup title="Logout">
                            <MenuItem name="3-4"><button @click="logout">Logout</button></MenuItem>
                        </MenuGroup>
                    </Submenu>
                    <router-link to="/dashboard">
                        <MenuItem name="3">
                            <Icon type="md-list-box" />
                            Posts
                        </MenuItem>
                    </router-link>
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
         </div>
</template>

<script>
import Axios from 'axios'
export default {
    name: "UserProfileNavbar",
    data () {
            return {
                theme1: 'light'
            }
        },
    methods:{

        logout(){
            axios.post('/api/logout', {token : this.$store.state.token})
            .then( res => {
                this.$store.commit('cleartToken');
                this.$router.push('/login');
            })

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
