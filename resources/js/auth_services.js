import {http, httpFile} from './http_service'

export function register(user){
    return http().post('/auth/register', user);
}

export function login(user){
    return http().post('./auth/login',user)
    .then(response =>{
        if(response.status ===200){
            localStorage.set('larave-vue-spa-token',JSON.stringify(response.data));
            setToken(response.data)
        }
    });
}

function setToken(user){
    localStorage.setItem('larave-vue-spa-token',JSON.stringify(data));
}

export function isloggedIn(user){
    const token = localStorage.getItem('larvae-vue-spa-token');
    return token != null;
}
