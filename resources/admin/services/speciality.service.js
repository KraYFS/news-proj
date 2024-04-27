import axios from 'axios';
import authHeader from './auth-header';
import {formData} from "./libs/formData";

class SpecialityService {

    createdSpeciality(data) {
        return axios
            .post('/admin/speciality/created', data, {
                headers: authHeader()
            });
    }

    getSpeciality(pageNum) {
        return axios
            .get('/admin/speciality/get', {
                headers: authHeader(),
                params: {
                    page: pageNum
                }
            });
    }

    setStatus(data) {
        return axios
            .post('/admin/speciality/setStatus', data, {
                headers: authHeader()
            });
    }
}

export default new SpecialityService();
