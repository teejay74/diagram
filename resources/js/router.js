import { createRouter, createWebHistory } from "vue-router";
import Admin from "./views/Admin"
import Client from "./views/Client";


const routes = [
    { path: '/', component: Client },
    { path: '/admin', component: Admin },
]

export default createRouter({
    history: createWebHistory(),
    routes
})

