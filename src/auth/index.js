import baseApi from '@/baseApi'
import router from '@/router'
import store from '@/store'

const LOGIN_URL = '/login';
const LOGOUT_URL = '/logout';
const REG_URL = '/register';

export default ({
    userDefault: {
        id: '',
        name: '',
        email: '',
        role: '',
        token: ''
    },

    logIn(cred, redirect) {
        baseApi().post(LOGIN_URL, cred).then((response) => {
            if (!response.data.error) {
                store.dispatch('SET_AUTH_USER', response.data.user.user);
                store.dispatch('SET_TOKEN', response.data.user.token);
                store.dispatch('SET_AUTH', true);
                localStorage.setItem('token', response.data.user.token.value);
                router.push(redirect);
            }
            console.log(response.data);

        });
    },
    Register(cred, redirect) {
        baseApi().post(REG_URL, cred).then((response) => {

            console.log(response.data);
            router.push(redirect);

        });
    },

    LogOut() {
        baseApi().post(LOGOUT_URL).then((response) => {
            if (!response.data.error) {
                this.clear();
                router.push('/');
            }
        });
    },

    async AuthCheck(cred) {
        await baseApi().get('/user', cred).then((response) => {
            store.dispatch('SET_AUTH_USER', response.data.user.user);
            store.dispatch('SET_TOKEN', response.data.user.token);
            store.dispatch('SET_AUTH', true);
            localStorage.setItem('token', response.data.user.token.value);
        })
    },
    clear() {
        store.dispatch('SET_AUTH_USER', this.userDefault);
        store.dispatch('SET_TOKEN', '');
        store.dispatch('SET_AUTH', false);
        localStorage.removeItem('token');
    }

});
