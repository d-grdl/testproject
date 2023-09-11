import { createWebHistory, createRouter } from 'vue-router';
import HousesIndex from "./components/HousesIndex.vue";

const routes = [
    {
        path: "/",
        component: HousesIndex,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
})

export default router;
