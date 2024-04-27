<template>
    <div class="row row-cards">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Список специальностей</h3>
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="ms-auto text-muted">
                                <RouterLink :to="{name: 'speciality_created'}" class="btn btn-primary d-sm-inline-block">
                                    Создать специальность
                                </RouterLink>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Slug</th>
                            <th>Имя</th>
                            <th>Статус</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in specialityItem">
                            <td>
                                {{ item.id }}
                            </td>
                            <td>
                                {{ item.slug }}
                            </td>
                            <td>
                                {{ item.name }}
                            </td>
                            <td>
                                <template v-if="item.active === 0">
                                    <span class="badge bg-danger me-1"></span> Не активная
                                </template>
                                <template v-else>
                                    <span class="badge bg-success me-1"></span> Активная
                                </template>
                            </td>

                            <td class="text-nowrap text-muted">
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
                                    <div class="dropdown-item cursor-pointer" data-status-id="0" v-if="item.active === 1">
                                        Черновик
                                    </div>
                                    <div class="dropdown-item cursor-pointer" data-status-id="1" v-if="item.active === 0">
                                        Активный
                                    </div>
                                </div>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex align-items-center" v-if="totalItems >= 1">
                    <div class="pagination m-0 ms-auto">
                        <paginate
                            :page-count="totalItems"
                            :click-handler="getCategory"
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
import SpecialityService from "../../services/speciality.service";
import Paginate from 'vuejs-paginate-next';
import {formData} from "../../services/libs/formData";

export default {
    name: "codes",
    components: {
        paginate: Paginate,
    },
    data() {
        return {
            specialityItem: [],
            totalItems: 0,
            headerProps: [{
                breadcrumb: true,
                textBreadcrumb: 'Список специальностей',
                nameRoute: 'users',
            }],
            initialDate: new Date().toISOString().substr(0, 10)
        }
    },
    mounted() {
        this.$emit('changeHeaderData', this.headerProps);

        this.getCategory(1);
    },
    methods: {
        getDate(date){
            return moment(date).locale(window.navigator.language).format('L h:mm')
        },
        getCategory(pageNum){
            SpecialityService.getSpeciality(pageNum).then((resp) => {
                this.specialityItem = resp.data.items;

                if(pageNum === 1){
                    this.totalItems = resp.data.pagination.total / 20;
                }

            }).catch((error) => {});
        },

        status(event) {
            let itemId = parseInt(event.currentTarget.dataset.id);
            let statusId = parseInt(event.target.dataset.statusId);

            SpecialityService.setStatus(formData({
                id: itemId,
                status: statusId,
            })).then((resp) => {
                let item = this.specialityItem.findIndex(x => x.id === itemId);

                this.specialityItem[item].active = statusId;
            }).catch((error) => {

            });
        },
    }
}
</script>
