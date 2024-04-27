import axios from 'axios';
import authHeader from './auth-header';
import {formData} from "./libs/formData";

class RequestService {

    get(pageNum) {
        return axios
            .get('/admin/request/get', {
                headers: authHeader(),
                params: {
                    page: pageNum
                }
            });
    }

    setStatus(data) {
        return axios
            .post('/admin/request/setStatus', data, {
                headers: authHeader()
            });
    }
}

export default new RequestService();
