import { createRouter, createWebHistory } from "vue-router";
import Homeview from "../views/Homeview.vue";
import Postview from "../views/Postview.vue";
import AddPostview from "../views/AddPostview.vue";
import AllPostsview from "../views/AllPostsview.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: Homeview
    },
    {
      path: "/post/:id",
      name: "post",
      component: Postview
    },
    {
      path: "/addpost/",
      name: "addpost",
      component: AddPostview
    },
    {
      path: "/allposts/",
      name: "allposts",
      component: AllPostsview
    }
  ],
});

export default router;
