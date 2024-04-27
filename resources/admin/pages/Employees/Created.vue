<template>
    <div class="page-body">
        <div class="container-fluid">
            <div class="row row-cards">
                <div class="col-12">
                    <div id="alert"></div>
                    <form class="card card-md" @submit.prevent="createdEmployees">
                        <div class="card-header">
                            <h4 class="card-title">Создание репортера</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label">Специальность</label>
                                        <div>
                                            <select name="speciality" class="form-select">
                                                <option v-for="(item, index) in specialityItem" :value=item.id>
                                                    {{ item.name }}
                                                </option>
                                            </select>
                                        </div>
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
                                                            <label class="form-label required">Фамилия
                                                                {{ item.name.toUpperCase() }}</label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   :name="'last_name[' + item.value +']'"
                                                                   required
                                                                   placeholder="Введите фамилию"/>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-xl-12">
                                                        <div class="mb-3">
                                                            <label class="form-label required">Имя
                                                                {{ item.name.toUpperCase() }}</label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   :name="'first_name[' + item.value +']'"
                                                                   required
                                                                   placeholder="Введите имя"/>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6 col-xl-12">
                                                        <div class="mb-3">
                                                            <label class="form-label required">Отчество
                                                                {{ item.name.toUpperCase() }}</label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   :name="'surname[' + item.value +']'"
                                                                   placeholder="Введите отчество"/>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Описание
                                                            {{ item.value.toUpperCase() }}</label>
                                                        <textarea rows="5" class="form-control"
                                                                  placeholder="Введите описание"
                                                                  :name="'description[' + item.value +']'"></textarea>
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


                                    <div class="mb-3">
                                        <label class="form-label">Фото репортера</label>
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
                        :aspectRatio="3/3"
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
import EmployeesService from "../../services/employees.service";
import {alert} from "../../services/libs/alert";
import UtilitiesService from "../../services/utilities.service";

import * as bootstrap from 'bootstrap';
import 'cropperjs/dist/cropper.css';
export default {
    name: "Category",
    components: {
        VueCropper
    },
    data() {
        return {
            headerProps: [{
                breadcrumb: true,
                textBreadcrumb: 'Создание репортера',
                nameRoute: 'employees_created',
            }],
            openCrop: false,
            savePhoto: null,
            uploadImage: false,
            uploadImageFile: '',
            langItem: [],
            specialityItem: [],

            error: {
                text: {
                    photo: null,
                },
                photo: false,
            }
        }
    },
    mounted() {
        this.$emit('changeHeaderData', this.headerProps);


        UtilitiesService.getData().then((res) => {
            this.langItem = res.data.result.language;
            this.specialityItem = res.data.result.speciality;
        });

    },
    methods: {
        createdEmployees(data) {
            let params = new FormData(data.target);

            EmployeesService.createdEmployees(params).then((res) => {
                alert('Сотрудник создан создана', 'success')

                setTimeout(() => {
                    this.$router.push("/admin/employees/main");
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
