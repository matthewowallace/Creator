import axios from 'axios';
import store from './store';

export function http(){
    return axios.create({
        baseURL: store.state.apiURL
    });
}

export function httpFile(){
    return axios.create({
        baseURL: store.state.apiURL,
        header: {
            'Content-Type': 'multipart/form-data'
        }
    });
}
