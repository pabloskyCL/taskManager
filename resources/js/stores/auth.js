import axios from "axios";
import { defineStore } from "pinia";

export const useAuthStore = defineStore('auth', {
    state: () => ({ authUser: null, authToken: null, authError: null }),
    getters: {
        user: (state) => state.authUser,
        token: (state) => state.authToken,
        error: (state) => state.authError,
    },
    actions: {
        async getToken() {
            await axios.get('/sanctum/csrf-cookie');
        },
        async login(form) {
            await this.getToken();
            await axios.post('/api/login', form).then(
                (res) => {
                    this.authToken = res.data.authorization.token;
                    this.authUser = res.data.user;
                    this.router.push('/');
                }
            ).catch((errors) => {
                let desc = '';
                errors.response.data.errors.map(
                    (e) => {
                        desc = desc + ' ' + e
                    }
                )
                this.authError = desc;

            })
        },
        async register(form) {
            await this.getToken();
            await axios.post('/api/register', form).then(
                (res) => {
                    this.router.push('/login');
                }
            ).catch((errors) => {
                let desc = '';
                errors.response.data.errors.map((e) => {
                    desc = desc + ' ' + e;
                })
                this.authError = desc;
            })
        },
        async logout() {
            await axios.get('/api/logout', this.authToken);
            this.authToken = null;
            this.authUser = null;
            this.authError = null;
            this.router.push('/login');
        },
    },
    persist: true
});