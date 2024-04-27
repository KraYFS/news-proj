<template>
    <div class="page-body">
        <div class="container-fluid">
            <div class="row row-cards">
                <div class="col-12">
                    <div id="alert"></div>
                    <form class="card card-md" @submit.prevent="createdArticles">
                        <div class="card-header">
                            <h4 class="card-title">Создание новость</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6">

                                    <div class="mb-3">
                                        <label class="form-label">Ссылка на источник</label>
                                        <input type="text"
                                               class="form-control"
                                               name="resource"
                                               placeholder="Введите ссылку на источник"/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Количество просмотров</label>
                                        <input type="number"
                                               class="form-control"
                                               name="views"
                                               value="0"
                                               placeholder="Введите количество просмотров"/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Дата публикации</label>
                                        <input type="datetime-local"
                                               class="form-control"
                                               name="public_at"
                                               v-model="initialDate"/>
                                    </div>
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
                                                            <label class="form-label required">Название новости
                                                                {{ item.name.toUpperCase() }}</label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   :name="'name[' + item.value +']'"
                                                                   placeholder="Введите название"/>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Текст
                                                            {{ item.value.toUpperCase() }}</label>
                                                        <editor
                                                            api-key="szn6ulwrfsbhq7o2atiy1prelw2j30577a8fypibf93kwiok"
                                                            :name="'text[' + item.value +']'"
                                                            :id="item.value"
                                                            tag-name="textarea"
                                                            :init="{
                                                                height: 700,
                                                            }"
                                                            @change="saveContent"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label">Авторы</label>
                                        <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column ">
                                            <label class="form-selectgroup-item flex-fill" v-for="(item, index) in employeesItem">
                                                <input type="checkbox" name="creators[]" :value="item.id" class="form-selectgroup-input" >
                                                <div class="form-selectgroup-label d-flex align-items-center p-3">
                                                    <div class="me-3">
                                                        <span class="form-selectgroup-check"></span>
                                                    </div>
                                                    <div class="form-selectgroup-label-content d-flex align-items-center">
                                                        <span class="avatar me-3" :style="{ backgroundImage: 'url(' + item.photo + ')' }"></span>
                                                        <div>
                                                            <div class="font-weight-medium">{{ item.last_name }} {{ item.first_name }}</div>
                                                            <div class="text-muted">{{ item.special }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Статус</label>
                                        <div>
                                            <select name="status" class="form-select">
                                                <option value="1">Активная</option>
                                                <option value="0">Не активная</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Фото</label>
                                        <span class="form-label-description"></span>
                                        <input
                                            ref="input"
                                            type="file"
                                            name="photo"
                                            class="form-control"
                                            v-bind:class="{'is-invalid': this.error.photo}"
                                            accept="image/*"
                                            @focus="hideError"
                                            @change="selectPhoto"/>
                                        <div class="invalid-feedback"> {{ this.error.text.photo }}</div>
                                    </div>
                                    <div class="mb-3" v-bind:class="{ 'd-none' : uploadImage === false}">
                                        <label class="form-label">Фото</label>
                                        <div class="row g-2">
                                            <div class="col-12 col-sm-12">
                                                <img :src="uploadImageFile" class="form-imagecheck-image" alt=""
                                                     style="opacity: 100;">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <button class="btn btn-primary ms-auto">Создать</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
         tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Test</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <vue-cropper
                        ref="cropper"
                        :src="uploadImageFile"
                        :aspectRatio="2.13"
                        alt="Source Image">
                    </vue-cropper>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary ms-auto" data-bs-dismiss="modal" @click="cropPhoto">
                        Сохранить
                    </button>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
import VueCropper from 'vue-cropperjs';
import {Modal} from 'bootstrap';
import ArticlesService from "../../services/articles.service";
import {alert} from "../../services/libs/alert";
import UtilitiesService from "../../services/utilities.service";

import * as bootstrap from 'bootstrap';
import 'cropperjs/dist/cropper.css';
import moment from "moment/min/moment-with-locales";
import Editor from '@tinymce/tinymce-vue'

export default {
    name: "newsCreated",
    components: {
        VueCropper,
        'editor': Editor
    },
    data() {
        return {
            headerProps: [{
                breadcrumb: true,
                textBreadcrumb: 'Создание новости',
                nameRoute: 'articles_created',
            }],
            openCrop: false,
            savePhoto: null,
            uploadImage: false,
            uploadImageFile: '',
            langItem: [],
            employeesItem: [],

            error: {
                text: {
                    photo: null,
                },
                photo: false,
            },
            saveContents: {},
            initialDate: moment().format('YYYY-MM-DDThh:mm')
        }
    },
    mounted() {
        this.$emit('changeHeaderData', this.headerProps);

        UtilitiesService.getData().then((res) => {
            this.langItem = res.data.result.language;
            this.employeesItem = res.data.result.employees;

            for (let i in res.data.result.language) {
                this.saveContents[res.data.result.language[i].value] = null;
            }
        });
    },
    methods: {
        saveContent(data){
            this.saveContents[data.target.id] = data.level.content;
        },
        createdArticles(data) {
            let params = new FormData(data.target);

            for (let i in this.saveContents) {
                params.set('text[' + i + ']', this.saveContents[i])
            }

            ArticlesService.createdArticles(params).then((res) => {
                alert('Новость создана', 'success')

                setTimeout(() => {
                    this.$router.push("/admin/articles/main");
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

        selectPhoto(event) {
            let file = event.target.files;
            let reader = new FileReader();

            reader.onload = (e) => {
                this.uploadImage = false;
                this.uploadImageFile = e.target.result;

                this.$refs.cropper.replace(e.target.result)

                new bootstrap.Modal(document.getElementById('exampleModalToggle')).show();
            };
            reader.readAsDataURL(file[0]);
        },

        cropPhoto() {
            this.uploadImageFile = this.$refs.cropper.getCroppedCanvas().toDataURL('image/jpeg');
            this.$refs.cropper.getCroppedCanvas().toBlob((blob) => {
                this.savePhoto = blob;
            }, 'image/jpeg', 1)

            new bootstrap.Modal(document.getElementById('exampleModalToggle')).hide();

            this.uploadImage = true;
        },


        hideError(el) {
            if (this.error[el.target.name] !== undefined) {
                this.error[el.target.name] = false;
            }
        },
    }
}
</script>
