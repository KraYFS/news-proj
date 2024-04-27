import {
    createRouter,
    createWebHistory
} from "vue-router";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: "/admin/login",
            name: "login",
            component: () => import("../pages/Login.vue"),
        },
        {
            path: "/admin/request/main",
            name: "request_main",
            component: () => import("../pages/Request/Main.vue"),
        },
        {
            path: "/admin/employees/main",
            name: "employees_main",
            component: () => import("../pages/Employees/Main.vue"),
        },
        {
            path: "/admin/employees/created",
            name: "employees_created",
            component: () => import("../pages/Employees/Created.vue"),
        },
        {
            path: "/admin/speciality/main",
            name: "speciality_main",
            component: () => import("../pages/Speciality/Main.vue"),
        },
        {
            path: "/admin/articles/created",
            name: "articles_created",
            component: () => import("../pages/Articles/Created.vue"),
        },
        {
            path: "/admin/articles/edit/:id",
            name: "articles_edit",
            component: () => import("../pages/Articles/Edit.vue"),
        },
        {
            path: "/admin/articles/main",
            name: "articles_main",
            component: () => import("../pages/Articles/Main.vue"),
        },
        {
            path: "/admin/speciality/created",
            name: "speciality_created",
            component: () => import("../pages/Speciality/Created.vue"),
        },
        {
            path: "/admin/settings",
            name: "settings",
            component: () => import("../pages/Settings/Main.vue"),
        },
        {
            path: '/:pathMatch(.*)*',
            component: () => import("../pages/Error/Error-404.vue"),
        },
    ],
});


router.beforeEach((to, from, next) => {
  const publicPages = ['/admin/login'];
  const authRequired = !publicPages.includes(to.path);
  const loggedIn = localStorage.getItem('admin');

  if (authRequired && !loggedIn) {
      next('/admin/login');
  } else {
      next();
  }
});

export default router;
