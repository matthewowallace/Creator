<template>
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
                    <router-link to="/userstatus">
                        <div>
                            <router-link to="/admin">
                                <div>
                                    <Icon type="md-analytics"></Icon>
                                    <a>Dashboard</a>
                                </div>
                            </router-link>
                        </div>
                    </router-link>
                </MenuItem>
                <MenuItem name="2">
                    <router-link to="/userstatus">
                        <div>
                            <Icon type="ios-people"></Icon>
                            <a>User Status</a>
                        </div>
                    </router-link>
                </MenuItem>
                <MenuItem name="3">
                    <router-link to="/postdata">
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
                <MenuItem name="5">
                    <Dropdown>
                        <button>
                            <Icon type="ios-contact" size="24" />
                            <Icon type="ios-arrow-down"></Icon>
                        </button>
                        <DropdownMenu slot="list">
                            <router-link to="/" exact>
                                <DropdownItem v-on:click="logout">Signout</DropdownItem>
                            </router-link>
                            <DropdownItem>Account Settings</DropdownItem>
                        </DropdownMenu>
                    </Dropdown>
                </MenuItem>
            </div>
        </Menu>
    </Header>
</template>
<script>
import * as auth from "../auth_services";
export default {
    methods: {
        logout: async function() {
            auth.logout();
            this.$router.push("/login");
        }
    }
};
</script>
<style scoped>

.layout-nav{
    width: 620px;
    margin: 0 auto;
    margin-right: 20px;
}

.layout-logo{
    float: left;
    position: relative;
    top: 0px;
    left: 20px;
}

.brand-logo {
   margin-top: 10px;
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



</style>
