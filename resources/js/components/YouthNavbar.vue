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
                <!-- <MenuItem name="2">
                    <Icon type="ios-people" />
                    Sign in
                </MenuItem> -->
                <Submenu name="3">
                    <template slot="title">
                        <Icon type="ios-stats" />
                       Account
                    </template>
                    <MenuGroup title="Register/Sign-in">
                    <router-link to="/login"> <MenuItem name="3-1">Sign in</MenuItem></router-link>
                    <router-link to="/registration"><MenuItem name="3-2">Create an Account</MenuItem></router-link>
                        <!-- <MenuItem name="3-3">时段分析</MenuItem> -->
                    </MenuGroup>
                    <!-- <MenuGroup title="留存">
                        <MenuItem name="3-4">用户留存</MenuItem>
                        <MenuItem name="3-5">流失用户</MenuItem>
                    </MenuGroup> -->
                </Submenu>
                <!-- <MenuItem name="4">
                    <Icon type="ios-construct" />
                    综合设置
                </MenuItem> -->
            </Menu>
         </div>
</template>

<script>
export default {
    name: "YouthNavbar",
    data () {
            return {
                theme1: 'light'
            }
        }
}
</script>

<style scope>


.brand-title h3{
   font-family: 'Fenotype',sans-serif !important;
   display: inline-block;
}

.orange{
    color:#EC6110;
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

</style>
