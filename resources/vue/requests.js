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
            console.error(error);
        });
    }
}