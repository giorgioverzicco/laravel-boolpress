import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import HomePage from "./pages/HomePage";
import AboutPage from "./pages/AboutPage";
import PostPage from "./pages/PostPage";
import CategoriesPage from "./pages/CategoriesPage";
import CategoryPage from "./pages/CategoryPage";
const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: HomePage,
        },
        {
            path: "/about-us",
            name: "about",
            component: AboutPage,
        },
        {
            path: "/posts/:slug",
            name: "post",
            component: PostPage,
        },
        {
            path: "/categories",
            name: "categories",
            component: CategoriesPage,
        },
        {
            path: "/categories/:slug",
            name: "category",
            component: CategoryPage,
        },
    ],
});

export default router;
