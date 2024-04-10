import { createRouter, createWebHistory } from "vue-router";
const AdminDashboardLayout = () => import('../layouts/AdminDashboard.vue' /* webpackChunkName: "resource/js/components/layouts/dashboard" */)
const router = createRouter({
    history: createWebHistory("/"),
    routes: [
        {
            path: "/",
            component: AdminDashboardLayout,
            children: [
                {
                    path: "/home",
                    name: "home",
                    component: () => import("../views/Home.vue"),
                    meta: { title: "Home" },
                },
            ],
        },
    ],
});

export default router;
