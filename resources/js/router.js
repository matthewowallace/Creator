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

Vue.use(Router);

const routes =[

    {
        path: '/',
        name: 'LandPage',
        component: MainNav
    },
    {
        path: '/aboutus',
        name: 'AboutUs',
        component: AboutUs
    },
    {
        path: '/userprofile',
        name: 'UserProfile',
        component: UserProfile
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
        path: '/login',
        name: 'Login',
        component: Login
    },

    {
        path: '/registration',
        name: 'Registration',
        component: Registration
    },

    {
        path: '/dashboard',
        name: 'Dashboard',
        component: Dashboard,
        beforeEnter: requireAuth,
    },

    {
        path: '/admin',
        name: 'Admin',
        component: Admin,
        beforeEnter: requireAuth,

    },

    // {
    //     path: '/forgot',
    //     name: 'Forgot',
    //     component: Forgot
    // },
    {
        path: '/role',
        name: 'Role',
        component: Role
    },
]

const router = new Router({
    routes: routes,
    mode:'history',
    linkActiveClass: 'active'
});

function requireAuth (to, from, next) {
    let AuthCheck = window.AuthCheck;
    if (AuthCheck === "0") {
        next({
            path: '/login',
        })
    } else {
        next()
    }
}

export default router;
