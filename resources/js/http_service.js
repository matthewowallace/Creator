import axios from 'axios';
import store from './store';
import * as auth from './auth_services';

export function http(){
    return axios.create({
        baseURL: store.state.apiURL,
        headers:{
            Authorization: 'Bearer'+auth.getAccessToken(),
        }
    });
}

export function httpFile(){
    return axios.create({
        baseURL: store.state.apiURL,
        header: {
            Authorization: 'Bearer '+auth.getAccessToken(),
            'Content-Type': 'multipart/form-data'
        }
    });
}
