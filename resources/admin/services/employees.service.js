import axios from 'axios';
import authHeader from './auth-header';
import {formData} from "./libs/formData";

class EmployeesService {

    createdEmployees(data) {
        return axios
            .post('/admin/employees/created', data, {
                headers: authHeader()
            });
    }

    getEmployees(pageNum) {
        return axios
            .get('/admin/employees/get', {
                headers: authHeader(),
                params: {
                    page: pageNum
                }
            });
    }

    setStatus(data) {
        return axios
            .post('/admin/employees/setStatus', data, {
                headers: authHeader()
            });
    }
}

export default new EmployeesService();
