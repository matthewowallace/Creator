import Vue from 'vue';
import Router from 'vue-router';
import Login from './layout/Login.vue';
import MainNav from './components/MainNav.vue';
import Registration from './layout/Registration.vue';
import Dashboard from './layout/Dashboard.vue';
import Admin from './layout/Admin.vue';
import TagTable from './components/TagTable.vue';
import PostData from './components/Postdata.vue';
import UserStatus from './components/UserStatus.vue';
import Category from './components/Category.vue';
import AboutUs from './components/AboutUs.vue';
import Role from './components/Role.vue';
import UserProfile from './components/UserProfile.vue';
import AccountSettings from './components/AccountSettings.vue';
import * as  auth from './auth_services';
import Forgot from './layout/Forgot.vue';
import ForgotPasswordRequest from './layout/ForgotPasswordRequest.vue';

Vue.use(Router);

const routes =[

    {
        path: '/login',
        name: 'Login',
        component: Login,
        beforeEnter(to, from, next){
            if(!auth.isLoggedIn()){
                next();
            }else{
                next('/dashboard');
            }
        }
    },
    {
        path: '/aboutus',
        name: 'AboutUs',
        component: AboutUs
    },

    {
        path: '/registration',
        name: 'Registration',
        component: Registration
    },
    {
        path: '/',
        name: 'LandPage',
        component: MainNav,
    },

    {
        path: '/dashboard',
        name: 'Dashboard',
        component: Dashboard,
        beforeEnter(to, from, next){
            if(!auth.isLoggedIn()){
                next('/login');
            }else{
                next();
            }
        }
    },
    {
        path: '/userprofile',
        name: 'userProfile',
        component: () => import('./components/UserProfile.vue'),
    },
    {
        path: '/admin',
        name: 'Admin',
        component: Admin,
        beforeEnter(to, from, next){
            if(!auth.isLoggedIn()){
                next('/login');
            }else{
                next();
            }
        }
    },
    {
        path: '/category',
        name: 'Category',
        component: Category
    },
    {
        path: '/tagtable',
        name: 'Tagtable',
        component: TagTable
    },
    {
        path: '/postdata',
        name: 'PostData',
        component: PostData
    },
    {
        path: '/userstatus',
        name: 'UserStatus',
        component: UserStatus
    },
    {
        path: '/role',
        name: 'Role',
        component: Role
    },
    {
        path: '/accountsettings',
        name: 'AccountSettings',
        component: AccountSettings
    },
    {
        path: '/forgot',
        name: 'Forgot',
        component: Forgot,
        beforeEnter(to, from, next){
            if(!auth.isLoggedIn()){
                next();
            }else{
                next('/login');
            }
        }
    },
    {
        path: '/forgotpasswordrequest/:email',
        name: 'ForgotPasswordRequest',
        component: ForgotPasswordRequest,
        beforeEnter(to, from, next){
            if(!auth.isLoggedIn()){
                next();
            }else{
                next('/login');
            }
        }
    },

]

const router = new Router({
    routes: routes,
    mode:'history',
    linkActiveClass: 'active'
});

export default router;
