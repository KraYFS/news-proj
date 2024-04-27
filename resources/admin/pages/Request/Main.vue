<template>
    <div class="row row-cards">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Список заявок</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Фамилия Имя</th>
                            <th>Email</th>
                            <th>Телефон</th>
                            <th>Область</th>
                            <th>Город</th>
                            <th>Специальность</th>
                            <th>Дата создания</th>
                            <th>Статус</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr v-for="item in requestItem" :data-category-id="item.id">
                            <td>
                                {{ item.id }}
                            </td>
                            <td>
                                <div class="d-flex py-1 align-items-center">
                                        <span class="avatar me-2"
                                              :style="{ backgroundImage: 'url(' + item.photo + ')' }"
                                        ></span>
                                    <div class="flex-fill">
                                        {{ item.last_name }}  {{ item.first_name }}
                                        <div class="text-muted">
                                            <span class="text-reset">{{ item.surname }}</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ item.email }}
                            </td>
                            <td>
                                {{ item.phone }}
                            </td>
                            <td>
                                {{ item.region }}
                            </td>
                            <td>
                                {{ item.city }}
                            </td>
                            <td>
                                {{ item.speciality }}
                            </td>
                            <td>
                                <template v-if="item.status === 0">
                                    <span class="badge bg-danger me-1"></span> Просмотренная
                                </template>
                                <template v-else>
                                    <span class="badge bg-success me-1"></span> Новая
                                </template>
                            </td>
                            <td>
                                {{ getDate(item.public_at) }}
                            </td>

                            <td class="text-nowrap text-muted">

                                <div v-if="item.status === 1">

                                <span class="text-muted cursor-pointer"
                                      data-bs-toggle="dropdown"
                                      data-bs-placement="bottom"
                                      data-bs-original-title="Статус">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M7 6a7.75 7.75 0 1 0 10 0"/>
                                        <line x1="12" y1="4" x2="12" y2="12"/>
                                    </svg>
                                </span>
                                <div class="dropdown-menu dropdown-menu-end" @click="status" :data-id="item.id">
                                    <div class="dropdown-item cursor-pointer" data-status-id="0" v-if="item.status === 1">
                                       Просмотренная
                                    </div>
                                </div></div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex align-items-center" v-if="totalItems >= 1">
                    <div class="pagination m-0 ms-auto">
                        <paginate
                            :page-count="totalItems"
                            :click-handler="get"
                            :prev-text="'&lsaquo;'"
                            :next-text="'&rsaquo;'"
                            :container-class="'pagination'"
                        >
                        </paginate>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment/min/moment-with-locales";
import RequestService from "../../services/request.service";
import Paginate from 'vuejs-paginate-next';
import {formData} from "../../services/libs/formData";
import EmployeesService from "../../services/employees.service";

export default {
    name: "codes",
    components: {
        paginate: Paginate,
    },
    data() {
        return {
            requestItem: [],
            totalItems: 0,
            headerProps: [{
                breadcrumb: true,
                textBreadcrumb: 'Заявки',
                nameRoute: 'users',
            }],
            initialDate: new Date().toISOString().substr(0, 10)
        }
    },
    mounted() {
        this.$emit('changeHeaderData', this.headerProps);

        this.get(1);
    },
    methods: {
        getDate(date){
            return moment(date).locale(window.navigator.language).format('L h:mm')
        },
        get(pageNum){
            RequestService.get(pageNum).then((resp) => {
                this.requestItem = resp.data.items;

                if(pageNum === 1){
                    this.totalItems = resp.data.pagination.total / 20;
                }
            }).catch((error) => {});
        },

        status(event) {
            let itemId = parseInt(event.currentTarget.dataset.id);
            let statusId = parseInt(event.target.dataset.statusId);

            RequestService.setStatus(formData({
                id: itemId,
                status: statusId,
            })).then((resp) => {
                let item = this.requestItem.findIndex(x => x.id === itemId);
                this.requestItem[item].status = statusId;
            }).catch((error) => {});
        },
    }
}
</script>
