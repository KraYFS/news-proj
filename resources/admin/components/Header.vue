<template>
    <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark" v-if="this.currentUser">
        <div class="container-fluid">
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark">
                <RouterLink :to="{name: 'request_main'}">
                    Admin
                </RouterLink>
            </h1>
            <div class="navbar-nav flex-row d-lg-none">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                       aria-label="Open user menu" aria-expanded="false">
                        <div></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="" class="dropdown-item">Выход</a>
                    </div>
                </div>
            </div>
            <div class="navbar-collapse collapse" id="sidebar-menu" style="">
                <ul class="navbar-nav pt-lg-3 p-3">
                    <li class="nav-item">
                        <RouterLink :to="{name: 'articles_main'}" class="nav-link" active-class="active">
                                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-article" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                                                                <path d="M7 8h10"></path>
                                                                <path d="M7 12h10"></path>
                                                                <path d="M7 16h10"></path>
                                                            </svg>
                                                        </span>
                            <span class="nav-link-title">
                                Новости
                            </span>
                        </RouterLink>
                    </li>

                    <li class="nav-item">
                        <RouterLink :to="{name: 'request_main'}" class="nav-link" active-class="active">
                                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-notes" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M5 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path>
                                                                <path d="M9 7l6 0"></path>
                                                                <path d="M9 11l6 0"></path>
                                                                <path d="M9 15l4 0"></path>
                                                            </svg>
                                                        </span>
                            <span class="nav-link-title">
                                Заявки
                            </span>
                        </RouterLink>
                    </li>
                    <li class="nav-item">
                        <RouterLink :to="{name: 'speciality_main'}" class="nav-link" active-class="active">
                                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                 width="24" height="24" viewBox="0 0 24 24"
                                                                 stroke-width="2" stroke="currentColor" fill="none"
                                                                 stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                </path>
                                                                <polyline points="9 11 12 14 20 6"></polyline>
                                                                <path
                                                                    d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9"></path>
                                                            </svg>
                                                        </span>
                            <span class="nav-link-title">
                                Специальности
                            </span>
                        </RouterLink>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown"
                           data-bs-auto-close="false" role="button" aria-expanded="true">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="icon icon-tabler icon-tabler-brand-codepen" width="24" height="24"
                                     viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 15l9 6l9 -6l-9 -6l-9 6"></path>
                                    <path d="M3 9l9 6l9 -6l-9 -6l-9 6"></path>
                                    <path d="M3 9l0 6"></path>
                                    <path d="M21 9l0 6"></path>
                                    <path d="M12 3l0 6"></path>
                                    <path d="M12 15l0 6"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Сотрудники
                            </span>
                        </a>
                        <div class="dropdown-menu show">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <RouterLink :to="{name: 'employees_main'}" class="dropdown-item" active-class="active">
                                        Список сотрудников
                                    </RouterLink>
                                </div>
                            </div>
                        </div>
                    </li>


                    <li class="nav-item">
                        <RouterLink :to="{name: 'settings'}" class="nav-link" active-class="active">
                                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 class="icon icon-tabler icon-tabler-settings"
                                                                 width="24" height="24" viewBox="0 0 24 24"
                                                                 stroke-width="1.75" stroke="currentColor" fill="none"
                                                                 stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                      fill="none"></path>
                                                                <path
                                                                    d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                                                                <path
                                                                    d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                                            </svg>
                                                        </span>
                            <span class="nav-link-title">
                                    Настройки
                                </span>
                        </RouterLink>
                    </li>


                </ul>
            </div>
        </div>
    </aside>

    <header class="navbar navbar-expand-md navbar-light d-none d-lg-flex d-print-none" v-if="this.currentUser">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-nav flex-row order-md-last">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                       aria-label="Open user menu">
                        <div class="d-none d-xl-block ps-2">
                            <div> USER</div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a @click.prevent="logOut" class="dropdown-item cursor-pointer">Выход</a>
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="page-header d-print-none" v-if="headersPropses[0].breadcrumb">
                    <div class="row align-items-center">
                        <div class="col" style="margin: 0 10px;">
                            <h2 class="page-title">
                                {{ headersPropses[0].textBreadcrumb }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
import AuthService from "../services/auth.service";

export default {
    data() {
        return {
            registerUser: false
        }
    },
    props: {
        headersPropses: {
            type: Array
        }
    },
    computed: {
        currentUser() {
            return this.$store.state.auth.user;
        },
    },

    mounted() {

        if (this.$store.state.auth.user) {
            AuthService.getSession().then((resp) => {
                if (resp.session === false) {
                    this.logOut();
                }
            }).catch((error) => {
                this.logOut();
            });
        }
    },
    methods: {
        logOut() {
            this.$store.dispatch('auth/logout');
            this.$router.push('/admin/login');
        }
    }
}

</script>
