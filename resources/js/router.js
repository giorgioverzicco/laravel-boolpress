import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import HomePage from "./pages/HomePage";
import AboutPage from "./pages/AboutPage";
import PostPage from "./pages/PostPage";
const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: HomePage
        },
        {
            path: "/about-us",
            name: "about",
            component: AboutPage
        },
        {
            path: "/posts/:slug",
            name: "post",
            component: PostPage,
        },
    ]
});

export default router;
