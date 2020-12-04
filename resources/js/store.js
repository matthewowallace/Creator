import Vue from 'vue';
import Vuex from 'vuex';
import * as auth from './auth_services';
Vue.use(Vuex)

export default new Vuex.Store({
    state : {

        isLoggedIn: null,
        apiURL: 'http://localhost:8000/api',
        serverPath: 'http://localhost:8000',
        profile:{},

        deleteModalObj : {
            showDeleteModal: false,
            deleteUrl : '',
            data : null,
            deletingIndex: -1,
            isDeleted : false,
            token: localStorage.getItem('auth') || '',

        },
        user: false,
        userPermission: null
    },
    getters: {

        getDeleteModalObj(state){
            return state.deleteModalObj
        },

        getUserPermission(state){
            return state.userPermission
        },
    },

    mutations: {

        setDeleteModal(state, data){
            const deleteModalObj = {
                showDeleteModal: false,
                deleteUrl : '',
                data : null,
                deletingIndex: -1,
                isDeleted : data,
            }
            state.deleteModalObj = deleteModalObj
        },
        setDataModalObj(state, data){
            state.deleteModalObj = data
        },
        setUpdateUser(state, data){
            state.user = data
        },
        setUserPermission(state, data){
            state.userPermission = data
        },

        updateUser(state, data){
            state.user = data
        },

        setToken(state,token){
            localStorage.setItem('auth',token);
            state.token = token;
        },
        clearToken(state){
            localStorage.removeItem('auth');
            state.token = '';
        },

        authenticate(state, payload){
            state.isLoggedIn = auth.isLoggedIn();
            if(state.isLoggedIn){
                state.profile = payload;
            }else{
                state.profile ={};
            }
        }

    },



    actions :{
        authenticate(context, payload){
            context.commit('authenticate', payload);
        }
    }


})
