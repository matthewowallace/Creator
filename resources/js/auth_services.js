import {http, httpFile} from './http_service'

export function register(user){
    return http().post('/auth/register', user);
}

export function login(user){
    return http().post('/auth/login',user)
    .then(response => {
        if(response.status === 200){
            setToken(response.data);
        }
        return response.data;
    });
}

function setToken(user){
    localStorage.setItem('larave-vue-spa-token', JSON.stringify(user));
}

export function isLoggedIn(){
    const token = localStorage.getItem('larvae-vue-spa-token');
    return token != null;
}
