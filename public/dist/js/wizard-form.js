var main_urlv3 = localStorage.getItem('base_url');
fetch(main_urlv3 + 'install/config.json').then((u) => {
    return u.json();
}).then((configData) => {
    $.ajax({
        url: 'https://lisensi.weboxbuilder.com/api/getLicenseStatus',
        type: 'POST',
        data: {
            email: configData.admin_email,
            license: configData.license_code,
        },
        success: (response) => {
            if (response.status != 200) {
                let redirect = 'auth_forceLogout';
                let type = 'danger';
                let message = response.message.replaceAll(' ', '_');
                let redirect_url = redirect + '?type=' + type + '&message=' + message;
                location.href = main_urlv3 + 'id/r/' + redirect_url;
            }
        },
        error: (error) => {
            console.log(error);
        }
    });
});

$(document).ready(function() {
    $('#landingpage-form input, #landingpage-form textarea').not([type = "submit"]).addClass('required');
    $('.not-required').removeClass('required');
});

jQuery.validator.addMethod("isValidUrl", (value, element) => {
    let temp_url = main_urlv3 + 'id/p/';
    if (value == temp_url) {
        return false;
    } else {
        return true;
    }
}, "* Url tersebut tidak tepat!");

jQuery.validator.addMethod("isExistUrl", async function(value, element) {
    let myPromise = new Promise(resolve => {
        $.ajax({
            type: "POST",
            url: main_urlv3 + 'api/checkurl?url=' + value,
            success: (result) => {
                let response = (result.message == 'true') ? false : true;
                console.log(result.message, response);
                resolve(response);
            },
            error: (result) => {
                console.log(error);
            }
        });
    });
    return await myPromise;
}, "* Url tersebut telah terpakai!");
var form = $("#landingpage-form");
form.validate({
    errorPlacement: function errorPlacement(error, element) {
        element.before(error);
    },
    rules: {
        'product-url': {
            isValidUrl: true,
            isExistUrl: true,
        }
    }
});
form.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onStepChanging: function(event, currentIndex, newIndex) {
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
    onFinishing: function(event, currentIndex) {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function(event, currentIndex) {
        console.log(event, currentIndex);
        // let submitData = {};
        // $('#landingpage-form').serializeArray().forEach((res) => {
        //     submitData[res.name] = res.value;
        // });
        let submitData = new FormData($('#landingpage-form')[0]);
        $.ajax({
            url: main_urlv3 + 'api/postNewLandingPage',
            type: 'POST',
            data: submitData,
            processData: false,
            cache: false,
            contentType: false,
            beforeSend: () => {
                console.log('loading..');
                $('#finish-button a').html('<i class="fas fa-spinner fa-spin"></i>');
            },
            success: (result) => {
                $('#finish-button a').html('Create & Publish <i class="mdi mdi-content-save"></i>');
                console.log(result);
                let redirect = 'landingpage_lists';
                let type = 'success';
                let message = 'Data_landing_page_berhasil_ditambahkan!';
                let redirect_url = redirect + '?type=' + type + '&message=' + message;
                location.href = main_urlv3 + 'id/r/' + redirect_url;
            },
            error: (error) => {
                alert('Terjadi error! Periksa kembali data yang sedang diisi.');
                $('#finish-button a').html('Create & Publish <i class="mdi mdi-content-save"></i>');
            }
        });
        // jQuery('<button>', {
        //     id: 'form-submit-button',
        //     type: 'submit',
        //     class: 'btn btn-primary',
        // }).appendTo('#landingpage-form');
        // $('#form-submit-button').click();
    },
});

function saveDraft() {
    $(document).ready(function() {
        $('#landingpage-form input, #landingpage-form textarea').not([type = "submit"]).removeClass('required');
    });
    let submitData = new FormData($('#landingpage-form')[0]);
    $.ajax({
        url: main_urlv3 + 'api/postNewLandingPage/unpublish',
        type: 'POST',
        data: submitData,
        processData: false,
        cache: false,
        contentType: false,
        beforeSend: () => {
            console.log('loading..');
            $('#saveDraft').html('<i class="fas fa-spinner fa-spin"></i>');
        },
        success: (result) => {
            $('#saveDraft').html('<i class="mdi mdi-content-save-settings"></i> Save Draft');
            console.log(result);
            let redirect = 'landingpage_lists';
            let type = 'success';
            let message = 'Data_landing_page_berhasil_ditambahkan!';
            let redirect_url = redirect + '?type=' + type + '&message=' + message;
            location.href = main_urlv3 + 'id/r/' + redirect_url;
        },
        error: (error) => {
            alert('Terjadi error! Periksa kembali data yang sedang diisi.');
            $('#saveDraft').html('<i class="mdi mdi-content-save-settings"></i> Save Draft');
        }
    });
}

//custom steps
$('[role="tablist"] li').addClass('d-inline-block col-lg-4');
$('.steps').css('max-height', '188px').css('border', '1px solid #ccc').css('overflow', 'auto');
// handle prev,next,finish button
$('[role="menu"]').children().eq(0).attr('id', 'previous-button');
$('#previous-button a').html('<i class="fas fa-chevron-circle-left"></i> Previous');
$('[role="menu"]').children().eq(1).attr('id', 'next-button');
$('#next-button a').html('Next <i class="fas fa-chevron-circle-right"></i>');
$('[role="menu"]').children().eq(2).attr('id', 'finish-button');
$('#finish-button a').html('Create & Publish <i class="mdi mdi-content-save"></i>');

$('#flash-message').click(() => {
    let url = main_urlv3 + "auth/session_destroy";
    $.ajax({
        url: url,
        method: 'get',
        success: () => {
            console.log('Notifikasi berhasil terhapus');
        },
        error: (e) => {
            console.log(url);
            console.log(e);
        }
    });
});
$('#product-url').keyup(function(e) {
    var prefix = main_urlv3 + 'id/p/';
    if (this.value.length < prefix.length) {
        this.value = prefix;
    } else if (this.value.indexOf(prefix) !== 0) {
        this.value = prefix + String.fromCharCode(e.which);
    }
});

$('.product-background-image').css('display', 'none');
$('input[name=radio-product-background]').change(() => {
    let val = $('input:radio:checked').val();
    if (val == 1) {
        $('.product-background-color').css('display', '');
        $('.product-background-image').css('display', 'none');
    } else {
        $('.product-background-color').css('display', 'none');
        $('.product-background-image').css('display', '');
    }
});


//handle price
function number_format(number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}
// $(".number-input").inputFilter((value) => {
//     return /^\d*$/.test(value); // Allow digits only, using a RegExp
// });

// subheadline detail
let addSubHeadlineDetail = (countSubHeadlineDetail) => {
    countSubHeadlineDetail = $('#multi-subheadline-detail .row').length;
    maxSubHeadlineDetail = parseInt($('#multi-subheadline-detail .row').last().attr('id').split('-').at(-1));
    let id = maxSubHeadlineDetail + 1;
    let elmSubHeadlineDetail = '' +
        `<div id="subheadline-detail-${id}" class="row">
        <div class="col-lg-6">
            <label for="product-subheadline-detail-${id}">Detail Subheadline ${id} <span class="text-danger">*</span></label>
            <div class="input-group">
                <input id="product-subheadline-detail-${id}" name="product-subheadline-detail-${(countSubHeadlineDetail + 1)}" type="text" class="input-subheadline-detail form-control form-control-lg" />
            </div>
        </div>
        <div class="col-lg-6">
            <label for="product-subheadline-detail-icon-${id}">Icon ${id} <span class="text-danger">*</span><small class="text-danger">(ukuran yang disarankan : memiliki rasio 1:1)</small></label>
            <div class="input-group">
                <input id="product-subheadline-detail-icon-${id}" name="product-subheadline-detail-icon-${(countSubHeadlineDetail + 1)}" type="file" class="input-subheadline-detail-icon form-control form-control-lg" accept="image/*">
                <div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div class="input-group-prepend">
                    <a onclick="deleteSubheadlineDetail(${id})" class="delete-subheadline-detail input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                </div>
            </div>
        </div>
    </div>`;
    $('#multi-subheadline-detail').append(elmSubHeadlineDetail);
    window.scrollTo(0, document.body.scrollHeight);
};
let deleteSubheadlineDetail = (rowId) => {
    $('#subheadline-detail-' + rowId).remove();
    $('.input-subheadline-detail').each((i, obj) => {
        obj.setAttribute('name', 'product-subheadline-detail-' + (i + 1));
    });
    $('.input-subheadline-detail-icon').each((i, obj) => {
        obj.setAttribute('name', 'product-subheadline-detail-icon-' + (i + 1));
    });
};
// feature & benefit
let addFeatureBenefit = () => {
    countFeatureBenefit = $('#multi-feature-benefit .row').length;
    maxFeatureBenefit = parseInt($('#multi-feature-benefit .row').last().attr('id').split('-').at(-1));
    let id = maxFeatureBenefit + 1;
    let elmFeatureBenefit = '' +
        `<div id="feature-benefit-${id}" class="row">
        <div class="col-lg-6">
            <label for="product-feature-benefit-${id}">Feature & Benefit ${id} <span class="text-danger">*</span></label>
            <div class="input-group">
                <input id="product-feature-benefit-${id}" name="product-feature-benefit-${(countFeatureBenefit + 1)}" type="text" class="input-feature-benefit form-control form-control-lg" />
            </div>
        </div>
        <div class="col-lg-6">
            <label for="product-feature-benefit-icon-${id}">Icon ${id} <span class="text-danger">*</span></label>
            <div class="input-group">
                <input id="product-feature-benefit-icon-${id}" name="product-feature-benefit-icon-${(countFeatureBenefit + 1)}" type="file" class="input-feature-benefit-icon form-control form-control-lg" accept="image/*">
                <div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div class="input-group-prepend">
                    <a onclick="deleteFeatureBenefit(${id})" class="delete-feature-benefit input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                </div>
            </div>
        </div>
    </div>`;
    $('#multi-feature-benefit').append(elmFeatureBenefit);
    window.scrollTo(0, document.body.scrollHeight);
};
let deleteFeatureBenefit = (rowId) => {
    $('#feature-benefit-' + rowId).remove();
    $('.input-feature-benefit').each((i, obj) => {
        obj.setAttribute('name', 'product-feature-benefit-' + (i + 1));
    });
    $('.input-feature-benefit-icon').each((i, obj) => {
        obj.setAttribute('name', 'product-feature-benefit-icon-' + (i + 1));
    });
};
// product preview
let addPreview = () => {
    countPreview = $('#multi-preview .row').length;
    maxPrevcountPreview = parseInt($('#multi-preview .row').last().attr('id').split('-').at(-1));
    let id = maxPreview + 1;
    let elmPreview = '' +
        `<div id="preview-${id}" class="row">
        <div class="col-lg-6">
            <label for="product-preview-icon-${id}">Icon ${id} <span class="text-danger">*</span></label>
            <div class="input-group">
                <input id="product-preview-icon-${id}" name="product-preview-icon-${(countPreview + 1)}" type="file" class="input-preview-icon form-control form-control-lg" accept="image/*">
            </div>
            </div>
            <div class="col-lg-6">
                <label for="product-preview-${id}">Caption ${id} <span class="text-danger">*</span></label>
                <div class="input-group">
                    <input id="product-preview-${id}" name="product-preview-${(countPreview + 1)}" type="text" class="input-preview form-control form-control-lg" />
                    <div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <div class="input-group-prepend">
                        <a onclick="deletePreview(${id})" class="delete-preview input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>`;
    $('#multi-preview').append(elmPreview);
    window.scrollTo(0, document.body.scrollHeight);
};
let deletePreview = (rowId) => {
    $('#preview-' + rowId).remove();
    $('.input-preview-icon').each((i, obj) => {
        obj.setAttribute('name', 'product-preview-icon-' + (i + 1));
    });
    $('.input-preview').each((i, obj) => {
        obj.setAttribute('name', 'product-preview-' + (i + 1));
    });
    countPreview--;
};
// pricelist
let addPricelist = () => {
    countPricelist = $('#multi-pricelist .row').length;
    maxPricelist = parseInt($('#multi-pricelist .row').last().attr('id').split('-').at(-1));
    let id = maxPricelist + 1;
    let elmPricelist = '' +
        `<div id="pricelist-${id}" class="row mb-2">
        <div class="col-lg-4">
            <label for="product-package-${id}">Nama Paket ${id} <span class="text-danger">*</span></label>
            <div class="input-group">
                <input id="product-package-${id}" name="product-package-${(countPricelist + 1)}" type="text" class="input-package form-control form-control-lg" placeholder="" />
            </div>
        </div>
        <div class="col-lg-4">
            <label for="product-price-${id}">Harga Paket ${id} <span class="text-danger">*</span></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <a class="input-group-text bg-white text-black h-100 cursor-pointer" id="basic-addon2">Rp</a>
                </div>
                <input id="product-price-${id}" name="product-price-${(countPricelist + 1)}" type="number" class="input-price form-control form-control-lg" placeholder="" />
            </div>
        </div>
        <div class="col-lg-4">
            <label for="product-package-url-${id}">URL/Link Paket ${id} <span class="text-danger">*</span></label>
            <div class="input-group">
                <input id="product-package-url-${id}" name="product-package-url-${(countPricelist + 1)}" type="text" class="input-package-url form-control form-control-lg" placeholder="" />
                <div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div class="input-group-prepend">
                    <a onclick="deletePricelist(${id})" class="delete-pricelist input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <label for="product-package-description-${id}">Deskripsi Paket ${id} <span class="text-danger">*</span></label>
            <div class="input-group">
                <textarea id="product-package-description-${id}" name="product-package-description-${(countPricelist + 1)}" class="input-package-description form-control form-control-lg" placeholder=""></textarea>
            </div>
        </div>
    </div>`;
    $('#multi-pricelist').append(elmPricelist);
    window.scrollTo(0, document.body.scrollHeight);
};
let deletePricelist = (rowId) => {
    $('#pricelist-' + rowId).remove();
    $('.input-package').each((i, obj) => {
        obj.setAttribute('name', 'product-package-' + (i + 1));
    });
    $('.input-price').each((i, obj) => {
        obj.setAttribute('name', 'product-price-' + (i + 1));
    });
    $('.input-package-url').each((i, obj) => {
        obj.setAttribute('name', 'product-package-url-' + (i + 1));
    });
    $('.input-package-description').each((i, obj) => {
        obj.setAttribute('name', 'product-package-description-' + (i + 1));
    });
};
// product satisfy
let addSatisfy = () => {
    countSatisfy = $('#multi-satisfy .row').length;
    maxSatisfy = parseInt($('#multi-satisfy .row').last().attr('id').split('-').at(-1));
    let id = maxSatisfy + 1;
    let elmSatisfy = '' +
        `<div id="satisfy-${id}" class="row">
        <div class="col-lg-1${id}">
            <label for="product-satisfy-${id}">Jika tidak membeli, kerugian ${id} <span class="text-danger">*</span></label>
            <div class="input-group">
                <input id="product-satisfy-${id}" name="product-satisfy-${(countSatisfy + 1)}" type="text" class="input-satisfy form-control form-control-lg" placeholder="" />
                <div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div class="input-group-prepend">
                    <a onclick="deleteSatisfy(${id})" class="delete-satisfy input-group-text bg-danger text-white cursor-pointer" id="basic-addon"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                </div>
            </div>
        </div>
    </div>`;
    $('#multi-satisfy').append(elmSatisfy);
    window.scrollTo(0, document.body.scrollHeight);
};
let deleteSatisfy = (rowId) => {
    $('#satisfy-' + rowId).remove();
    $('.input-satisfy').each((i, obj) => {
        obj.setAttribute('name', 'product-satisfy-' + (i + 1));
    });
};
// product faq
let addFaq = () => {
    countFaq = $('#multi-faq .row').length;
    maxFaq = parseInt($('#multi-faq .row').last().attr('id').split('-').at(-1));
    let id = maxFaq + 1;
    let elmFaq = '' +
        `<div id="faq-${id}" class="row">
        <div class="col-lg-6">
            <label for="product-question-${id}">Pertanyaan ${id} <span class="text-danger">*</span></label>
            <div class="input-group">
                <input id="product-question-${id}" name="product-question-${(countFaq + 1)}" type="text" class="input-question form-control form-control-lg" placeholder="" />
            </div>
        </div>
        <div class="col-lg-6">
            <label for="product-answer-${id}">Jawaban ${id} <span class="text-danger">*</span></label>
            <div class="input-group">
                <input id="product-answer-${id}" name="product-answer-${(countFaq + 1)}" type="text" class="input-answer form-control form-control-lg number-input" placeholder="" />
                <div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div class="input-group-prepend">
                    <a onclick="deleteFaq(${id})" class="delete-faq input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                </div>
            </div>
        </div>
    </div>`;
    $('#multi-faq').append(elmFaq);
    window.scrollTo(0, document.body.scrollHeight);
};
let deleteFaq = (rowId) => {
    $('#faq-' + rowId).remove();
    $('.input-question').each((i, obj) => {
        obj.setAttribute('name', 'product-question-' + (i + 1));
    });
    $('.input-answer').each((i, obj) => {
        obj.setAttribute('name', 'product-answer-' + (i + 1));
    });
};
// product creator
let addCreator = () => {
    countCreator = $('#multi-creator .col-lg-4').length;
    maxCreator = parseInt($('#multi-creator .col-lg-4').last().attr('id').split('-').at(-1));
    let id = maxCreator + 1;
    let elmCreator = '' +
        `<div id="creator-${id}" class="col-lg-4">
        <label for="product-creator-image-${id}">Foto Creator ${id} <span class="text-danger">*</span></label>
        <div class="input-group">
            <input id="product-creator-image-${id}" name="product-creator-image-${(countCreator + 1)}" type="file" class="input-creator-image form-control form-control-lg" accept="image/*" />
        </div>
        <label for="product-creator-name-${id}">Nama Creator ${id} <span class="text-danger">*</span></label>
        <div class="input-group">
            <input id="product-creator-name-${id}" name="product-creator-name-${(countCreator + 1)}" type="text" class="input-creator-name form-control form-control-lg" placeholder="" />
            <div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <div class="input-group-prepend">
                <a onclick="deleteCreator(${id})" class="delete-creator input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
            </div>
        </div>
    </div>`;
    $('#multi-creator').append(elmCreator);
    window.scrollTo(0, document.body.scrollHeight);
};
let deleteCreator = (rowId) => {
    $('#creator-' + rowId).remove();
    $('.input-creator-image').each((i, obj) => {
        obj.setAttribute('name', 'product-creator-image-' + (i + 1));
    });
    $('.input-creator-name').each((i, obj) => {
        obj.setAttribute('name', 'product-creator-name-' + (i + 1));
    });
};
// product ps & disclaimer
let addPsDisclaimer = () => {
    countPsDisclaimer = $('#multi-ps-disclaimer .row').length;
    maxPsDisclaimer = parseInt($('#multi-ps-disclaimer .row').last().attr('id').split('-').at(-1));
    let id = maxPsDisclaimer + 1;
    let elmPsDisclaimer = '' +
        `<div id="ps-disclaimer-${id}" class="row">
        <div class="col-lg-12">
            <label for="product-ps-disclaimer-${id}">PS ${id} <span class="text-danger">*</span></label>
            <div class="input-group">
                <input id="product-ps-disclaimer-${id}" name="product-ps-disclaimer-${(countPsDisclaimer + 1)}" type="text" class="input-ps-disclaimer form-control form-control-lg" placeholder="" />
                <div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div class="input-group-prepend">
                    <a onclick="deletePsDisclaimer(${id})" class="delete-ps-disclaimer input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                </div>
            </div>
        </div>
    </div>`;
    $('#multi-ps-disclaimer').append(elmPsDisclaimer);
    window.scrollTo(0, document.body.scrollHeight);
};
let deletePsDisclaimer = (rowId) => {
    $('#ps-disclaimer-' + rowId).remove();
    $('.input-ps-disclaimer').each((i, obj) => {
        obj.setAttribute('name', 'product-ps-disclaimer-' + (i + 1));
    });
};