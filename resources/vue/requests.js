export default {
    adsPaginationRequest: (adsPerPage, currentPage, callback) => {
        axios({
            method: 'post',
            url: 'ads/' + adsPerPage,
            data: {
                page: currentPage
            }
        }).then(response => {
            callback(response, this);
        }).catch(error => {
            App.displayInformationAlert('adsPaginationRequestError', error);
        });
    },
    
    signUpRequest: (data, callback) => {
        axios.post('/users/sign-up', data).then(response => {
            callback(response);
        }).catch(error => {
            App.displayInformationAlert('signUpRequestError', error);
        });
    },

    signInRequest: (data, callback) => {
        axios.post('/users/sign-in', data).then(response => {
            callback(response);
        }).catch(error => {
            App.displayInformationAlert('signInRequestError', error);
        });
    },

    loginRequest: (callback) => {
        axios.post('/user/login').then(response => {
            callback(response);
        }).catch(error => {
            App.displayInformationAlert('loginRequestError', error);
        });
    },

    adCreateRequest: (data, callback) => {
        axios.post('/ad/create', data, { 
            'content-type': 'multipart/form-data' 
        }).then(response => {
            callback(response);
        }).catch(error => {
            console.error(error);

            App.displayInformationAlert('adCreateRequestError', error);
        });
    },

    userEditRequest: (data, callback) => {
        axios.post('/user/edit', data).then(response => {
            callback(response);
        }).catch(error => {
            console.error(error);

            App.displayInformationAlert('adCreateRequestError', error);
        });
    }
}