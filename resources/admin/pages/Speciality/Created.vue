<template>
    <div class="page-body">
        <div class="container-fluid">
            <div class="row row-cards">
                <div class="col-12">
                    <div id="alert"></div>
                    <form class="card card-md" @submit.prevent="createdSpeciality">
                        <div class="card-header">
                            <h4 class="card-title">Создание специальности</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                                            <li v-for="(item, index) in langItem" class="nav-item">
                                                <a :href="'#lang-'+ item.value "
                                                   class="nav-link"
                                                   v-bind:class="{ 'active' : index === 0}"
                                                   data-bs-toggle="tab">{{ item.name }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <br/>
                                    <div class="tab-content">
                                        <div v-for="(item, index) in langItem" class="row tab-pane"
                                             v-bind:class="{ 'active show' : index === 0}"
                                             :id="'lang-' +  item.value">
                                            <div class="col-xl-12">
                                                <div class="row">
                                                    <div class="col-md-6 col-xl-12">
                                                        <div class="mb-3">
                                                            <label class="form-label required">Название
                                                                {{ item.name.toUpperCase() }}</label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   :name="'name[' + item.value +']'"
                                                                   required
                                                                   placeholder="Введите название"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label">Статус</label>
                                        <div>
                                            <select name="status" class="form-select">
                                                <option value="1">Активная</option>
                                                <option value="0">Не активная</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <button class="btn btn-primary ms-auto">Создать специальность</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {alert} from "../../services/libs/alert";
import UtilitiesService from "../../services/utilities.service";
import SpecialityService from "../../services/speciality.service";

export default {
    name: "Category",
    data() {
        return {
            headerProps: [{
                breadcrumb: true,
                textBreadcrumb: 'Создание специальности',
                nameRoute: 'speciality_created',
            }],
            openCrop: false,
            savePhoto: null,
            uploadImage: false,
            uploadImageFile: '',
            langItem: [],
            error: {
                text: {
                    slug: null,
                },
                slug: false,
            }
        }
    },
    mounted() {
        this.$emit('changeHeaderData', this.headerProps);

        UtilitiesService.getData().then((res) => {
            this.langItem = res.data.result.language;
        });
    },
    methods: {
        createdSpeciality(data) {
            let params = new FormData(data.target);

            SpecialityService.createdSpeciality(params).then((res) => {
                alert('Специальность создана', 'success')

                setTimeout(() => {
                    this.$router.push("/admin/speciality/main");
                }, 2000);

            }).catch((error) => {
                if (error.response.data && error.response.data.errors) {
                    for (let i in error.response.data.errors) {
                        let text = error.response.data.errors[i][0];

                        if (this.error[i] !== undefined) {
                            this.error[i] = true;
                            this.error.text[i] = text;
                        }
                    }
                }
            });
        },

        hideError(el) {
            if (this.error[el.target.name] !== undefined) {
                this.error[el.target.name] = false;
            }
        },
    }
}
</script>
