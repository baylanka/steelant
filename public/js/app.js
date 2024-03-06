const getBaseUrl = ()=>{
    let baseUrl = $('meta[name="base-url"]').attr('content');
    if(baseUrl.substring(baseUrl.length) !== '/'){
        return baseUrl.slice(0,-1);
    }

    return baseUrl;
};

let isEmpty = str => {
    return (!str || str.length === 0 || str === '' || str.length === 0 || typeof str === undefined || str === null);
};

let makeAjaxCall = (url, data = {}, method = 'POST') => {
    const params = $.param(data);
    return new Promise(function (resolve, reject) {
        $.ajax({
            type: method,
            url: url,
            dataType: 'json',
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            enctype: 'application/x-www-form-urlencoded',
            processData: false,
            data: params,
            success: function (data) {
                resolve(data);
            },
            error: function (jqXHR, exception) {
                let msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.Verify Network.';
                    console.log('Not connect.Verify Network.');
                } else if (jqXHR.status === 404) {
                    console.log('Requested page not found. [404]');
                    msg = 'Requested page not found';
                } else if (jqXHR.status === 422) {
                    console.log('Requested page status. [422]');
                    if (jqXHR.hasOwnProperty('responseJSON')) {
                        msg += jqXHR.responseJSON.message;
                        let errors = jqXHR.responseJSON.hasOwnProperty('errors') ? jqXHR.responseJSON.errors : null;
                        if (!isEmpty(errors)) {
                            let i = 0;
                            for (let key in errors) {
                                if (errors.hasOwnProperty(key)) {
                                    msg += "<br/>&#9734;&nbsp;" + errors[key];
                                }
                                i++;
                            }
                        }
                    }
                } else if (jqXHR.status === 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                    // location.reload();
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else if (jqXHR.responseJSON.hasOwnProperty('message')
                    && jqXHR.responseJSON.message === 'CSRF token mismatch.') {
                    console.log('CSRF token mismatched, page is reloaded');
                    location.reload();
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                reject(msg);
            },
        });
    });
};
let makePostFileRequest = (formObject, extra = {}) => {
    let formData = (!extra.hasOwnProperty('data') || extra.data == null)
        ? new FormData(formObject[0])  : extra.data;

    let url = (!extra.hasOwnProperty('url') || extra.url === null)
        ? formObject.attr('action') : extra.url;



    return new Promise(function (resolve, reject) {
        $.ajax({
            type: "POST",
            url: url,
            cache: false,
            processData: false,
            async: true,
            encType: 'multipart/form-data',
            dataType: 'json',
            contentType: false,
            data: formData,
            success: function (data) {
                resolve(data);
            },
            error: function (jqXHR, exception) {
                let msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.Verify Network.';
                    console.log('Not connect.Verify Network.');
                } else if (jqXHR.status === 404) {
                    console.log('Requested page not found. [404]');
                    msg = 'Requested page not found';
                } else if (jqXHR.status === 422) {
                    console.log('Requested page status. [422]');
                    if (jqXHR.hasOwnProperty('responseJSON')) {
                        msg += jqXHR.responseJSON.message;
                        let errors = jqXHR.responseJSON.hasOwnProperty('errors') ? jqXHR.responseJSON.errors : null;
                        if (!isEmpty(errors)) {
                            let i = 0;
                            for (let key in errors) {
                                if (errors.hasOwnProperty(key)) {
                                    msg += "<br/>&#9734;&nbsp;" + errors[key];
                                }
                                i++;
                            }
                        }
                    }
                } else if (jqXHR.status === 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                    // location.reload();
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else if (jqXHR.responseJSON.hasOwnProperty('message')
                    && jqXHR.responseJSON.message === 'CSRF token mismatch.') {
                    console.log('CSRF token mismatched, page is reloaded');
                    location.reload();
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                reject(msg);
            },
        });
    });
}

toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: false,
    progressBar: false,
    positionClass: "toast-top-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
};

let toast = {
    'success': function (msg) {
        toastr.success(msg);
    },
    'info': function (msg) {
        toastr.info(msg);
    },
    'error': function (msg) {
        toastr.error(msg);
    },
    'warning': function (msg) {
        toastr.warning(msg);
    }
};

let loadModal = (modalId, url) => {
    return new Promise(function (resolve, reject) {
        url = `${getBaseUrl()}/${url}`;
        $('#' + modalId).load(url, function (response, status, xhr) {
            let newModal;
            if (status !== 'error') {
                newModal = new bootstrap.Modal('#' + modalId);
                newModal.show();
            } else {
                reject(status);
            }
            resolve(newModal);
        });
    });
};

let loadButton = (btn, loadingText = 'Submitting...') => {
    btn.attr('disabled', true);
    btn.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ' + loadingText);
}

let resetButton = (btn, originalText = 'Submit') => {
    btn.attr('disabled', false);
    btn.html(originalText);
};

let getDate = time => {
    let d = new Date(time);
    let year = d.getFullYear(),
        month = Number(d.getMonth()) + 1,
        date = d.getDate();
    month = month < 10 ? `0${month}` : month;
    date = date < 10 ? `0${date}` : date;
    return year + '-' + month + '-' + date;
};


let validateFile = (identifier, extentions = null) => {
    return new Promise((resolve, reject) => {
        let fileName = $(identifier).val();
        if (!fileName || 0 === fileName.length) resolve(true);
        if (!(new RegExp('(' + extentions.join('|').replace(/\./g, '\\.') + ')$')).test(fileName)) {
            reject("File not accepted (it seems not an image)");
        } else {
            resolve(true);
        }
    });
}

// spinner Enable
let spinnerEnabled = ()=>{
    $('#overlay').removeClass('hide-element');
    $('.spinner-area').html(`
                 <p style="color:white;position: fixed;top:45vh;left:50%; font-size: 50px;opacity: 0.5;z-index: 1001;"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></p>
                `)
}
// spinner disble
let spinnerDisable = ()=>{
    $('#overlay').addClass('hide-element');
    $('.spinner-area').html("");
}

let isConfirmToProcess = (description, alert_type='warning', title = 'Are you sure!')=>{
    return new Promise((resolve, reject)=>{
        Swal.fire({
            title: title,
            html: description,
            icon: alert_type,
            showCancelButton: true,
            showLoaderOnConfirm: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-danger ml-1',
            buttonsStyling: true,
        })
            .then(async function (result) {
                if (result.value) {
                    resolve(true);
                }else{
                    resolve(false);
                }
            })
    });
}
async function imageToBase64(element) {
    let image = element[0]['files']

    if (image && image[0]) {
        const reader = new FileReader();

        return new Promise(resolve => {
            reader.onload = ev => {
                resolve(ev.target.result)
            }
            reader.readAsDataURL(image[0])
        })
    }
}

const toSnakeCase = (str = '') => {
    const strArr = str.split(' ');
    const snakeArr = strArr.reduce((acc, val) => {
        return acc.concat(val.toLowerCase());
    }, []);
    return snakeArr.join('_');
};


