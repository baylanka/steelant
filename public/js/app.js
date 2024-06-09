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
    let params;
    if(typeof data === 'object' ){
         params = $.param(data);
    }else{
         params = data;
    }

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
                }else if (jqXHR.status === 423) {
                    console.log('Requested page status. [422]');
                    if (jqXHR.hasOwnProperty('responseJSON')) {
                        msg += JSON.stringify(jqXHR.responseJSON);
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
    hideDuration: "2000",
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
    $('#overlay').removeClass('d-none');
    $('.spinner-area').html(`
            <div class="spinner-border text-primary" role="status"
                 style="position: fixed; top: 50%; right: 50%; z-index: 2000; width: 4rem; height: 4rem; border-width: 0.5em;">
              <span class="visually-hidden">Loading...</span>
            </div>
                `);
}
// spinner disble
let spinnerDisable = ()=>{
    $('#overlay').addClass('d-none');
    $('.spinner-area').html("");
}

let isConfirmToProcess = (description, alert_type='warning', title = 'Are you sure!',confirm_btn = 'Confirm',cancel_btn = 'Cancel')=>{
    return new Promise((resolve, reject)=>{

        let swalObj = {
            title: title,
            html: description,
            showCancelButton: true,
            showLoaderOnConfirm: true,
            confirmButtonColor: '#1d357c',
            cancelButtonColor: '#8f9093',
            confirmButtonText: confirm_btn,
            cancelButtonText: cancel_btn,
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-danger ml-1',
            buttonsStyling: true,
        };

        if(alert_type == "favourite"){
            swalObj.iconHtml = '<img src="'+getBaseUrl()+'/public/themes/user/img/star.png" height="80" class="mb-3"/>';
            swalObj.customClass =  {
                icon: 'no-border'
            };
        }else{
            swalObj.icon = alert_type;
        }

        Swal.fire(swalObj)
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
    return new Promise(resolve => {
        let image = element[0]['files']

        if (image && image[0]) {
            const reader = new FileReader();
            reader.onload = ev => {
                resolve(ev.target.result)
            }
            reader.readAsDataURL(image[0])
        }

    });
}

async function getFileType(element){
    return new Promise((resolve, reject)=>{
        let file = element.prop('files')[0];
        // Check if file is selected
        if (file) {
            resolve(file.type.split('/')[0]);
        }else{
            resolve('');
        }
    });
}

const toSnakeCase = (str = '') => {
    const strArr = str.split(' ');
    const snakeArr = strArr.reduce((acc, val) => {
        return acc.concat(val.toLowerCase());
    }, []);
    return snakeArr.join('_');
};


