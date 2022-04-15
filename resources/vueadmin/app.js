import axios from "axios";
import { store } from './store/index';

axios
    .get("api/v1/admin/users/login_user")
    .then(function (response) {
        store.user = response.data
    })
    .catch(function (error) { })
    .then(function () {
        import('./afterSetupApp')
    });