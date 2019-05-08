/**
 * Created by oppen on 17/05/18.
 */

let instance = axios.create({
    baseURL: "http://localhost/fullcodesgsm/index.php/home/getData/",
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
    },
});


instance.interceptors.response.use(function (response) {
        return response;
    },
    function (error) {

        return Promise.reject(error);

    });
