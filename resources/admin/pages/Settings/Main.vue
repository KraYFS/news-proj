<template>
    <div class="page-body">
        <div class="container-fluid">
            <div class="row row-cards">
                <div class="col-12">
                    <div id="alert"></div>
                    <form class="card card-md" @submit.prevent="saveSettings">
                        <div class="card-header">
                            <h4 class="card-title">Настройки</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Токен бота</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Токен бота" autocomplete="off"
                                           name="token" :value="token"/>
                                </div>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label required">Ссылка на группу</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Введите ссылку на группу" autocomplete="off"
                                           name="group" :value="group"/>
                                </div>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label required">Язык сайта</label>
                                <div>
                                    <select name="lang" class="form-select" v-model="lang">
                                        <option v-for="item in languageItems" :key="item" :value="item.id" :selected="lang">{{ item.name }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <button class="btn btn-primary ms-auto">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SettingsService from "../../services/settings.service";
import {Field, Form} from "vee-validate";
import {alert} from "../../services/libs/alert";

export default {
    name: "Main",
    components: {
        Form,
        Field,
    },
    data() {
        return {
            token: "",
            group: "",
            lang: 0,
            languageItems: {},
            headerProps: [{
                breadcrumb: true,
                textBreadcrumb: 'Настройки',
                nameRoute: 'settings',
            }]
        }
    },
    mounted() {
        this.$emit('changeHeaderData', this.headerProps);

        SettingsService.getSettings().then((resp) => {
            for (let i in resp.data.config){
                this[resp.data.config[i].key] = resp.data.config[i].value;
            }
            this.languageItems = resp.data.language;
        }).catch((error) => {

        });
    },

    methods: {
        saveSettings(data){
            SettingsService.setSettings(data.target).then((resp) => {
                alert('Настройки сохранены', 'success')
            }).catch((error) => {
                alert('Ошибка при сохранение', 'danger')
            });
        }
    }
}
</script>
