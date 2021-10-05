var main_urlv2 = localStorage.getItem('base_url');
var is_published = localStorage.getItem('is_published');
var current_id = location.href.split('/').at(-2);
var current_section = location.href.split('/').at(-1);
var assets_path = main_urlv2 + 'public/landingpage/generatedImages/product-image/';

fetch(main_urlv2 + 'install/config.json').then((u) => {
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
                let redirect = 'auth__forceLogout';
                let type = 'danger';
                let message = response.message.replaceAll(' ', '_');
                let redirect_url = redirect + '?type=' + type + '&message=' + message;
                location.href = main_urlv2 + 'id/r/' + redirect_url;
            }
        },
        error: (error) => {
            console.log(error);
        }
    });
});

$('section').css('border', '1px solid #000').css('padding', '10px');
jQuery.validator.addMethod("isValidUrl", (value, element) => {
    let temp_url = main_urlv2 + 'id/p/';
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
            url: main_urlv2 + 'api/checkurl?url=' + value,
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
var form = $("#form-product-url");
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
form.css('display', 'none');
var formArray = ['product-name', 'product-background', 'product-headline', 'product-subheadline', 'product-description', 'product-feature-benefit', 'product-preview', 'product-scarity', 'product-precta', 'product-pricelist', 'product-satisfy', 'product-cta', 'product-faq', 'product-creator', 'product-ps-disclaimer'];
formArray.forEach((val) => {
    form = $("#form-" + val);
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
        rules: {}
    });
    form.css('display', 'none');
});
$('#select-sub-landingpage').val(current_section);
$('#select-sub-landingpage').trigger('change');
$('#form-' + current_section).css('display', '');

$('#saveButton').click(() => {
    let directPage = $('#select-sub-landingpage').val();
    // let submitData = {};
    // submitData.append('product-backgrounf-image')
    // $('#form-' + current_section).serializeArray().forEach((res) => {
    //     submitData[res.name] = res.value;
    // });
    // console.log(submitData);
    let submitData = new FormData(document.getElementById('form-' + current_section));
    let redirect = 'landingpage_edit_' + current_id + '_' + directPage;
    let type = 'success';
    let message = 'Data_landing_page_berhasil_diperbarui!';
    let redirect_url = redirect + '?type=' + type + '&message=' + message;
    $.ajax({
        url: main_urlv2 + 'api/edit_product/' + current_id + '/' + current_section,
        type: 'POST',
        data: submitData,
        // data: new FormData($('#form-' + current_section).submit()),
        processData: false,
        cache: false,
        contentType: false,
        beforeSend: () => {
            console.log('loading..');
            $('#saveButton').html('<i class="fas fa-spinner fa-spin"></i>');
        },
        success: (result) => {
            console.log('success');
            $('#saveButton').html('<i class="fas fa-check-circle"></i>');
            location.href = main_urlv2 + 'id/r/' + redirect_url;
        },
        error: (error) => {
            console.log(error);
            console.log('Terjadi error! Periksa kembali data yang sedang diisi.');
            $('#saveButton').html('<i class="mdi mdi-content-save"></i> Go & Save');
            location.href = main_urlv2 + 'id/r/' + redirect_url;
        }
    });
});

$('.product-background-color').css('display', 'none');
$('.product-background-image').css('display', 'none');
let triggerRadioBackground = () => {
    let val = $('input:radio:checked').val();
    if (val == 1) {
        $('.product-background-color').css('display', '');
        $('.product-background-image').css('display', 'none');
    } else {
        $('.product-background-color').css('display', 'none');
        $('.product-background-image').css('display', '');
    }
};
$('input[name=radio-product-background]').change(() => {
    triggerRadioBackground();
});

$.ajax({
    url: main_urlv2 + 'api/getLandingPageById/' + current_id,
    type: 'GET',
    success: (result) => {
        if (result.product['is-published'] == 0) {
            $('#openToken').html('<i class="fas fa-external-link-alt"></i> Open Draft')
                .click(() => {
                    $('#openToken').html('<i class="fas fa-spinner fa-spin"></i>');
                    setTimeout(() => {
                        $('#openToken').html('<i class="fas fa-check-circle text-success"></i>');
                        setTimeout(() => {
                            $('#openToken').html('<i class="fas fa-external-link-alt"></i> Open Draft');
                            window.open(main_urlv2 + 'id/d/' + result.product['draft-token'], '_blank');
                        }, 500)
                    }, 500);
                });
        } else {
            $('#openToken').html('<i class="fas fa-external-link-alt"></i> Open Url')
                .click(() => {
                    $('#openToken').html('<i class="fas fa-spinner fa-spin"></i>');
                    setTimeout(() => {
                        $('#openToken').html('<i class="fas fa-check-circle text-success"></i>');
                        setTimeout(() => {
                            $('#openToken').html('<i class="fas fa-external-link-alt"></i> Open Draft');
                            window.open(result.product.url, '_blank');
                        }, 500)
                    }, 500);
                });
        }

        $('#product-url').val(result.product.url);
        $('#product-name').val(result.product.name);
        $('#product-image-logo-show').attr('src', assets_path + result.productImage[0]['logo-path']);
        $('#product-image-main-show').attr('src', assets_path + result.productImage[0].path);
        if (parseInt(result.product['background-type']) == 1) {
            $('input[name="radio-product-background"][value="1"]').prop("checked", true);
        } else {
            $('input[name="radio-product-background"][value="2"]').prop("checked", true);
        }
        triggerRadioBackground();
        $('#product-background-color').val(result.productBackgroundColor[0]['html-color-code']);
        $('#product-image-background-show').attr('src', assets_path + result.productBackgroundImage[0]['path']);
        $('#product-headline-1').val(result.productHeadline[0]['headline-1']);
        $('#product-headline-2').val(result.productHeadline[0]['headline-2']);
        $('#product-subheadline').val(result.productSubHeadline[0].text);
        var idx, deleteButton;
        result.productSubheadlineDetail.forEach((val, i) => {
            idx = i + 1;
            deleteButton = ``;
            if (idx != 1) {
                deleteButton = '' +
                    `<div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <div class="input-group-prepend">
                        <a href="${main_urlv2}api/delete/${current_id}/${current_section}/${val.id}/product-subheadline-detail" class="delete-subheadline-detail input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                    </div>`;
            }
            let elmSubheadlineDetail = '' +
                `<div id="subheadline-detail-${idx}" class="row mb-3 border-bottom border-dark">
                    <div class="col-lg-12">
                        <label for="product-subheadline-detail-${idx}">Detail Subheadline ${idx} <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="product-subheadline-detail-${idx}" name="product-subheadline-detail-${val.id}" type="text" class="input-subheadline-detail form-control form-control-lg" placeholder="PILIH" />
                            ${deleteButton}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="product-subheadline-detail-icon-${idx}">Icon ${idx} <span class="text-danger">*</span><small class="text-danger">(ukuran yang disarankan : memiliki rasio 1:1)</small></label>
                        <div class="input-group">
                            <input id="product-subheadline-detail-icon-${idx}" name="product-subheadline-detail-icon-${val.id}" type="file" class="input-subheadline-detail-icon form-control form-control-lg" accept="image/*">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img id="product-image-subheadline-detail-icon-${idx}" class="product-image-show" alt="no image" />
                    </div>
                </div>`;
            $('#multi-subheadline-detail').append(elmSubheadlineDetail);
            $('#product-subheadline-detail-' + idx).val(val.text);
            $('#product-image-subheadline-detail-icon-' + idx).attr('src', assets_path + val.image);
        });
        $('#product-description').val(result.productDescription[0].text);
        result.productFeatureBenefit.forEach((val, i) => {
            idx = i + 1;
            deleteButton = ``;
            if (idx != 1) {
                deleteButton = '' +
                    `<div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <div class="input-group-prepend">
                        <a href="${main_urlv2}api/delete/${current_id}/${current_section}/${val.id}/product-feature-benefit" class="delete-feature-benefit input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                    </div>`;
            }
            let elmFeatureBenefit = '' +
                `<div id="feature-benefit-${idx}" class="row mb-3 border-bottom border-dark">
                    <div class="col-lg-12">
                        <label for="product-feature-benefit-${idx}">Feature & Benefit ${idx} <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="product-feature-benefit-${idx}" name="product-feature-benefit-${val.id}" type="text" class="input-feature-benefit form-control form-control-lg" placeholder="Tidak perlu mahir desain" />
                            ${deleteButton}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="product-feature-benefit-icon-${idx}">Icon ${idx} <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="product-feature-benefit-icon-${idx}" name="product-feature-benefit-icon-${val.id}" type="file" class="input-feature-benefit-icon form-control form-control-lg" accept="image/*" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img id="product-image-feature-benefit-icon-${idx}" class="product-image-show" alt="no image" />
                    </div>
                </div>`;
            $('#multi-feature-benefit').append(elmFeatureBenefit);
            $('#product-feature-benefit-' + idx).val(val.text);
            $('#product-image-feature-benefit-icon-' + idx).attr('src', assets_path + val.icon);
        });
        result.productPreview.forEach((val, i) => {
            idx = i + 1;
            deleteButton = ``;
            if (idx != 1) {
                deleteButton = '' +
                    `<div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <div class="input-group-prepend">
                        <a href="${main_urlv2}api/delete/${current_id}/${current_section}/${val.id}/product-preview" class="delete-product-preview input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                    </div>`;
            }
            let elmPreview = '' +
                `<div id="preview-${idx}" class="row mb-3 border-bottom border-dark">
                    <div class="col-lg-12">
                        <label for="product-preview-${idx}">Caption ${idx} <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="product-preview-${idx}" name="product-preview-${val.id}" type="text" class="input-preview-icon form-control form-control-lg" placeholder="Demo Memasak" />
                            ${deleteButton}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="product-preview-icon-${idx}">Icon ${idx} <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="product-preview-icon-${idx}" name="product-preview-icon-${val.id}" type="file" class="input-preview form-control form-control-lg" accept="image/*" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img id="product-image-preview-icon-${idx}" class="product-image-show" alt="no image" />
                    </div>
                </div>`;
            $('#multi-preview').append(elmPreview);
            $('#product-image-preview-icon-' + idx).attr('src', assets_path + val.icon);
            $('#product-preview-' + idx).val(val.caption);
        });
        $('#product-scarity').val(result.productScarity[0].text);
        $('#product-strike-price').val(result.productPreCTA[0]['strike-price']);
        $('#product-selling-price').val(result.productPreCTA[0]['selling-price']);
        result.productPricelist.forEach((val, i) => {
            idx = i + 1;
            deleteButton = ``;
            if (idx != 1) {
                deleteButton = '' +
                    `<div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <div class="input-group-prepend">
                        <a href="${main_urlv2}api/delete/${current_id}/${current_section}/${val.id}/product-pricelist" class="delete-pricelist input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                    </div>`;
            }
            let elmPricelist = '' +
                `<div id="pricelist-${idx}" class="row mb-3 border-bottom border-dark">
                    <div class="col-lg-4">
                        <label for="product-package-name-${idx}">Nama Paket ${idx} <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="product-package-name-${idx}" name="product-package-name-${val.id}" type="text" class="input-package-name form-control form-control-lg" placeholder="MMR" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label for="product-price-${idx}">Harga Paket ${idx} <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <a class="input-group-text bg-white text-black h-100 cursor-pointer" id="basic-addon2">Rp</a>
                            </div>
                            <input id="product-price-${idx}" name="product-price-${val.id}" type="number" class="input-price form-control form-control-lg" placeholder="699000" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label for="product-package-url-${idx}">URL/Link Paket ${idx} <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="product-package-url-${idx}" name="product-package-url-${val.id}" type="text" class="input-package-url form-control form-control-lg" placeholder="https://weboxbuilder.com/checkout?p=${idx}" />
                            ${deleteButton}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <label for="product-package-description-${idx}">Deskripsi Paket ${idx} <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <textarea id="product-package-description-${idx}" name="product-package-description-${val.id}" class="input-package-description form-control form-control-lg" placeholder="Lisensi berlaku 5 bulan + CS Support"></textarea>
                        </div>
                    </div>
                </div>`;
            $('#multi-pricelist').append(elmPricelist);
            $('#product-package-name-' + idx).val(val.package);
            $('#product-price-' + idx).val(val.price);
            $('#product-package-url-' + idx).val(val.url);
            $('#product-package-description-' + idx).val(val.description);
        });
        result.productSatisfy.forEach((val, i) => {
            idx = i + 1;
            deleteButton = ``;
            if (idx != 1) {
                deleteButton = '' +
                    `<div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <div class="input-group-prepend">
                        <a href="${main_urlv2}api/delete/${current_id}/${current_section}/${val.id}/product-satisfy" class="delete-satisfy input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                    </div>`;
            }
            let elmProductSatisfy = '' +
                `<div id="satisfy-${idx}" class="row mb-3">
                    <div class="col-lg-12">
                        <label for="product-satisfy-${idx}">Jika tidak membeli, kerugian ${idx} <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="product-satisfy-${idx}" name="product-satisfy-${val.id}" type="text" class="input-satisfy form-control form-control-lg" placeholder="Bayar jasa desain grafis mahal" />
                            ${deleteButton}
                        </div>
                    </div>
                </div>`;
            $('#multi-satisfy').append(elmProductSatisfy);
            $('#product-satisfy-' + idx).val(val.text);
        });
        $('#product-cta').val(result.productCTA[0].text);
        result.productFAQ.forEach((val, i) => {
            idx = i + 1;
            deleteButton = ``;
            if (idx != 1) {
                deleteButton = '' +
                    `<div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <div class="input-group-prepend">
                        <a href="${main_urlv2}api/delete/${current_id}/${current_section}/${val.id}/product-faq" class="delete-faq input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                    </div>`;
            }
            let elmProductFaq = '' +
                `<div id="faq-${idx}" class="row mb-3 border-bottom border-dark">
                    <div class="col-lg-6">
                        <label for="product-question-${idx}">Pertanyaan ${idx} <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="product-question-${idx}" name="product-question-${val.id}" type="text" class="input-question form-control form-control-lg" placeholder="Sekali bayar atau tahunan?" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="product-answer-${idx}">Jawaban ${idx} <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="product-answer-${idx}" name="product-answer-${val.id}" type="text" class="input-answer form-control form-control-lg number-input" placeholder="Betul, sekali bayar" />
                            ${deleteButton}
                        </div>
                    </div>
                </div>`;
            $('#multi-faq').append(elmProductFaq);
            $('#product-question-' + idx).val(val['question-text']);
            $('#product-answer-' + idx).val(val['answer-text']);
        });
        result.productCreator.forEach((val, i) => {
            idx = i + 1;
            deleteButton = ``;
            if (idx != 1) {
                deleteButton = '' +
                    `<div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <div class="input-group-prepend">
                        <a href="${main_urlv2}api/delete/${current_id}/${current_section}/${val.id}/product-creator" class="delete-creator input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                    </div>`;
            }
            let elmProductCreator = '' +
                `<div id="creator-${idx}" class="col-lg-4">
                    <img id="product-image-creator-${idx}" class="product-image-show" alt="no image" />
                    <label for="product-creator-image-${idx}">Foto Creator ${idx} <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input id="product-creator-image-${idx}" name="product-creator-image-${val.id}" type="file" class="input-creator-image form-control form-control-lg" accept="image/*" />
                    </div>
                    <label for="product-creator-name-${idx}">Nama Creator ${idx} <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input id="product-creator-name-${idx}" name="product-creator-name-${val.id}" type="text" class="input-creator-name form-control form-control-lg" placeholder="Budi" />
                        ${deleteButton}
                    </div>
                </div>`;
            $('#multi-creator').append(elmProductCreator);
            $('#product-image-creator-' + idx).attr('src', assets_path + val['image-path']);
            $('#product-creator-name-' + idx).val(val.name);
        });
        result.productPsDisclaimer.forEach((val, i) => {
            idx = i + 1;
            deleteButton = ``;
            if (idx != 1) {
                deleteButton = '' +
                    `<div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <div class="input-group-prepend">
                        <a href="${main_urlv2}api/delete/${current_id}/${current_section}/${val.id}/product-ps-disclaimer" class="delete-ps-disclaimer input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                    </div>`;
            }
            let elmPsDisclaimer = '' +
                `<div id="ps-disclaimer-${idx}" class="row">
                    <div class="col-lg-12">
                        <label for="product-ps-disclaimer-${idx}">PS ${idx} <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="product-ps-disclaimer-${idx}" name="product-ps-disclaimer-${val.id}" type="text" class="input-ps-disclaimer form-control form-control-lg" placeholder="Ada banyak alasan dan keuntungan untuk memakai produk kami ini" />
                            ${deleteButton}
                        </div>
                    </div>
                </div>`;
            $('#multi-ps-disclaimer').append(elmPsDisclaimer);
            $('#product-ps-disclaimer-' + idx).val(val.text);
        });
        // delete loading
        $("*[class^='delete-']").click((e) => {
            let deleteId = e.target.id;
            $('#' + deleteId).html('<i class="fas fa-spinner fa-spin"></i>');
        });
        //enlarge image
        $(function() {
            $('img').on('click', function(event) {
                $('.imagepreview').attr('src', $(this).attr('src'));
                $('#imagemodal').modal('show');
            });
            $('#closeModal').click(() => {
                $('#imagemodal').modal('toggle');
            });
        });
        $('#product-url').keyup(function(e) {
            var prefix = main_urlv2 + 'id/p/';
            if (this.value.length < prefix.length) {
                this.value = prefix;
            } else if (this.value.indexOf(prefix) !== 0) {
                this.value = prefix + String.fromCharCode(e.which);
            }
        });
    },
    error: (err) => {
        alert('Terjadi Error: ' + err.message);
    }
});

$('#addModalButton').click(() => {
    console.log($('#addmodal form')[0]);
    let subSection = $('#addmodal form').attr('id').split('form-')[1];
    let directPage = current_section;
    let submitData = new FormData($('#addmodal form')[0]);
    let redirect = 'landingpage_edit_' + current_id + '_' + directPage;
    $.ajax({
        url: main_urlv2 + 'api/add/' + current_id + '/' + current_section + '/' + subSection,
        type: 'POST',
        data: submitData,
        processData: false,
        cache: false,
        contentType: false,
        beforeSend: () => {
            console.log('loading..');
            $('#addModalButton').html('<i class="fas fa-spinner fa-spin"></i>');
        },
        success: (result) => {
            console.log('success');
            $('#addModalButton').html('<i class="fas fa-check-circle"></i>');
            let type = 'success';
            let message = 'Data_berhasil_ditambahkan!';
            let redirect_url = redirect + '?type=' + type + '&message=' + message;
            location.href = main_urlv2 + 'id/r/' + redirect_url;
        },
        error: (error) => {
            console.log('Terjadi error! Periksa kembali data yang sedang diisi.');
            $('#addModalButton').html('<i class="fas fa-times-circle"></i>');
            let type = 'danger';
            let message = 'Data_gagal_ditambahkan!';
            let redirect_url = redirect + '?type=' + type + '&message=' + message;
            location.href = main_urlv2 + 'id/r/' + redirect_url;
        }
    });
});
$('#closeAddModal').click(() => {
    $('#addmodal').modal('toggle');
});

let addActionUrl = main_urlv2 + 'api/add/' + current_id + '/' + current_section + '/';
// subheadline detail
let addSubHeadlineDetail = () => {
    let elmSubHeadlineDetail = '' +
        `<form id="form-product-subheadline-detail" action="${addActionUrl + 'product-subheadline-detail'}" method="post" enctype="multipart/form-data">
            <div id="subheadline-detail-new" class="row">
                <div class="col-lg-12">
                    <label for="product-subheadline-detail-new">Detail Subheadline <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input id="product-subheadline-detail-new" name="product-subheadline-detail-new" type="text" class="input-subheadline-detail form-control form-control-lg" />
                    </div>
                </div>
                <div class="col-lg-12">
                    <label for="product-subheadline-detail-icon-new">Icon <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input id="product-subheadline-detail-icon-new" name="product-subheadline-detail-icon-new" type="file" class="input-subheadline-detail-icon form-control form-control-lg" accept="image/*">
                    </div>
                </div>
            </div>
        </form>`;
    $('#addmodal-content').html(elmSubHeadlineDetail);
    $('#addmodal').modal('show');
};
// feature & benefit
let addFeatureBenefit = () => {
    let elmFeatureBenefit = '' +
        `<form id="form-product-feature-benefit" action="${addActionUrl + 'product-feature-benefit'}" method="post" enctype="multipart/form-data">
            <div id="feature-benefit-new" class="row">
                <div class="col-lg-12">
                    <label for="product-feature-benefit-new">Feature & Benefit <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input id="product-feature-benefit-new" name="product-feature-benefit-new" type="text" class="input-feature-benefit form-control form-control-lg" />
                    </div>
                </div>
                <div class="col-lg-12">
                    <label for="product-feature-benefit-icon-new">Icon <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input id="product-feature-benefit-icon-new" name="product-feature-benefit-icon-new" type="file" class="input-feature-benefit-icon form-control form-control-lg" accept="image/*">
                    </div>
                </div>
            </div>
        </form>`;
    $('#addmodal-content').html(elmFeatureBenefit);
    $('#addmodal').modal('show');
};
// product preview
let addPreview = () => {
    let elmPreview = '' +
        `<form id="form-product-preview" action="${addActionUrl + 'product-preview'}" method="post" enctype="multipart/form-data">
            <div id="preview-new" class="row">
                <div class="col-lg-12">
                    <label for="product-preview-icon-new">Icon <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input id="product-preview-icon-new" name="product-preview-icon-new" type="file" class="input-preview-icon form-control form-control-lg" accept="image/*">
                    </div>
                    </div>
                    <div class="col-lg-12">
                        <label for="product-preview-new">Caption <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="product-preview-new" name="product-preview-new" type="text" class="input-preview form-control form-control-lg" />
                        </div>
                    </div>
                </div>
            </div>
        </form>`;
    $('#addmodal-content').html(elmPreview);
    $('#addmodal').modal('show');
};
// pricelist
let addPricelist = () => {
    let elmPricelist = '' +
        `<form id="form-product-pricelist" action="${addActionUrl + 'product-pricelist'}" method="post" enctype="multipart/form-data">
            <div id="pricelist-new" class="row mb-2">
                <div class="col-lg-12">
                    <label for="product-package-name-new">Nama Paket <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input id="product-package-name-new" name="product-package-name-new" type="text" class="input-package-name form-control form-control-lg" placeholder="" />
                    </div>
                </div>
                <div class="col-lg-12">
                    <label for="product-price-new">Harga Paket <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <a class="input-group-text bg-white text-black h-100 cursor-pointer" id="basic-addon2">Rp</a>
                        </div>
                        <input id="product-price-new" name="product-price-new" type="number" class="input-price form-control form-control-lg" placeholder="" />
                    </div>
                </div>
                <div class="col-lg-12">
                    <label for="product-package-url-new">URL/Link Paket <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input id="product-package-url-new" name="product-package-url-new" type="text" class="input-package-url form-control form-control-lg" placeholder="" />
                    </div>
                </div>
                <div class="col-lg-12">
                    <label for="product-package-description-new">Deskripsi Paket <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <textarea id="product-package-description-new" name="product-package-description-new" class="input-package-description form-control form-control-lg" placeholder=""></textarea>
                    </div>
                </div>
            </div>
        </form>`;
    $('#addmodal-content').html(elmPricelist);
    $('#addmodal').modal('show');
};
// product satisfy
let addSatisfy = () => {
    let elmSatisfy = '' +
        `<form id="form-product-satisfy" action="${addActionUrl + 'product-satisfy'}" method="post" enctype="multipart/form-data">
            <div id="satisfy-new" class="row">
                <div class="col-lg-12">
                    <label for="product-satisfy-new">Jika tidak membeli, kerugian <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input id="product-satisfy-new" name="product-satisfy-new" type="text" class="input-satisfy form-control form-control-lg" placeholder="" />
                    </div>
                </div>
            </div>
        </form>`;
    $('#addmodal-content').html(elmSatisfy);
    $('#addmodal').modal('show');
};
// product faq
let addFaq = () => {
    let elmFaq = '' +
        `<form id="form-product-faq" action="${addActionUrl + 'product-faq'}" method="post" enctype="multipart/form-data">
            <div id="faq-new" class="row">
                <div class="col-lg-12">
                    <label for="product-question-new">Pertanyaan <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input id="product-question-new" name="product-question-new" type="text" class="input-question form-control form-control-lg" placeholder="" />
                    </div>
                </div>
                <div class="col-lg-12">
                    <label for="product-answer-new">Jawaban <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input id="product-answer-new" name="product-answer-new" type="text" class="input-answer form-control form-control-lg number-input" placeholder="" />
                    </div>
                </div>
            </div>
        </form>`;
    $('#addmodal-content').html(elmFaq);
    $('#addmodal').modal('show');
};
// product creator
let addCreator = () => {
    let elmCreator = '' +
        `<form id="form-product-creator" action="${addActionUrl + 'product-creator'}" method="post" enctype="multipart/form-data">
            <div id="creator-new" class="col-lg-12">
                <label for="product-creator-image-new">Foto Creator <span class="text-danger">*</span></label>
                <div class="input-group">
                    <input id="product-creator-image-new" name="product-creator-image-new" type="file" class="input-creator-image form-control form-control-lg" accept="image/*" />
                </div>
                <label for="product-creator-name-new">Nama Creator <span class="text-danger">*</span></label>
                <div class="input-group">
                    <input id="product-creator-name-new" name="product-creator-name-new" type="text" class="input-creator-name form-control form-control-lg" placeholder="" />
                </div>
            </div>
        </form>`;
    $('#addmodal-content').html(elmCreator);
    $('#addmodal').modal('show');
};
// product ps & disclaimer
let addPsDisclaimer = () => {
    let elmPsDisclaimer = '' +
        `<form id="form-product-ps-disclaimer" action="${addActionUrl + 'product-ps-disclaimer'}" method="post" enctype="multipart/form-data">
            <div id="ps-disclaimer-new" class="row">
                <div class="col-lg-12">
                    <label for="product-ps-disclaimer-new">PS <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input id="product-ps-disclaimer-new" name="product-ps-disclaimer-new" type="text" class="input-ps-disclaimer form-control form-control-lg" placeholder="" />
                    </div>
                </div>
            </div>
        </form>`;
    $('#addmodal-content').html(elmPsDisclaimer);
    $('#addmodal').modal('show');
};
//enlarge image
$(function() {
    $('img').on('click', function(event) {
        $('.imagepreview').attr('src', $(this).attr('src'));
        $('#imagemodal').modal('show');
    });
    $('#imagemodal').on('hide.bs.modal', (e) => {
        $('.imagepreview').attr('src', main_urlv2 + 'public/assets/images/loading.gif');
    });
    $('#closeImageModal').click(() => {
        $('#imagemodal').modal('toggle');
    });
});

$('#flash-message').click(() => {
    let url = main_urlv2 + "auth/session_destroy";
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