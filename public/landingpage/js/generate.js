let main_url = localStorage.getItem('base_url');
let assets_path = main_url + 'public/landingpage/generatedImages/product-image/';
let token = location.href.split('/').at(-1);
let running_type = location.href.split('/').at(-2);
let api_type;
if (running_type == 'd') {
    api_type = 'api/getlandingpagedraft/' + token;
} else if (running_type == 'p') {
    api_type = 'api/getlandingpage/' + token;
}

fetch(main_url + 'install/config.json').then((u) => {
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
                location.href = main_url + 'id/r/' + redirect_url;
            }
        },
        error: (error) => {
            console.log(error);
        }
    });
});

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
// use number_format(67000, 2, ',', '.') => 67.000,00 

$.ajax({
    url: main_url + api_type,
    type: 'GET',
    success: (result) => {
        $('.product-name').html(result.product.name);
        $('.product-logo').attr('src', assets_path + result.productImage[0]['logo-path']);
        $('.product-image').attr('src', assets_path + result.productImage[0].path);
        $('#img-logo').attr('href', assets_path + result.productImage[0]['logo-path']);
        if (result.product['background-type'] == "1") {
            $('.host_version').css('background-color', result.productBackgroundColor[0]['html-color-code']);
        } else {
            $('.host_version').css('background-image', 'url("' + assets_path + result.productBackgroundImage[0].path + '")');
        }
        $('.product-headline-1').html(result.productHeadline[0]['headline-1']);
        $('#product-headline-2').html(result.productHeadline[0]['headline-2']);
        $('#product-subHeadline').html(result.productSubHeadline[0].text);
        $('#count-subheadline-detail').html(result.productSubheadlineDetail.length);
        result.productSubheadlineDetail.forEach((val) => {
            let subheadlineDetail = '' +
                `<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow zoomIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="widget clearfix">
                        <img src="${assets_path+val.image}" alt="" class="img-responsive img-subheadline-detail">
                        <div class="widget-title">
                            <h3 class="text_white">${val.text}</h3>
                        </div>
                    </div>
                </div>`;
            $('#product-subHeadlineDetail').append(subheadlineDetail);
        });
        $('.product-description').html(result.productDescription[0].text);
        result.productFeatureBenefit.forEach((val) => {
            let featureBenefit = '' +
                `<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow zoomIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="text-center">
                        <img src="${assets_path+val.icon}" alt="" class="effect-1 fb-image">
                    </div>
                    <br />
                    <h3 class="text-center text_white">${val.text}</h3>
                </div>`;
            $('#product-featureBenefit').append(featureBenefit);
        });
        result.productPreview.forEach((val, i) => {
            let productPreview = '' +
                `<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow zoomIn" data-wow-duration="1s" data-wow-delay="0.2s">
                <div class="widget clearfix">
                    <img src="${assets_path+val.icon}" alt="" class="img-responsive img-custom">
                    <div class="widget-title">
                        <h3 class="text_white">${val.caption}</h3>
                    </div>
                </div>
            </div>`;
            $('#product-preview').append(productPreview);
        });
        $('#product-scarity').html(result.productScarity[0].text);
        $('#product-preCTA-strike').append('Rp ' + number_format(result.productPreCTA[0]['strike-price'], 2, ',', '.'));
        $('#product-preCTA-selling').append('Rp ' + number_format(result.productPreCTA[0]['selling-price'], 2, ',', '.'));
        result.productPricelist.forEach((val) => {
            let productPricelist = '' +
                `<div class="col-md-4">
                    <div class="pricing-table pricing-table-highlighted">
                        <div class="pricing-table-header grd1">
                            <h2>${val.package}</h2>
                            <h3>Rp ${number_format(val.price, 2, ',', '.')}</h3>
                        </div>
                        <div class="pricing-table-space"></div>
                            <div class="pricing-table-features text-success">
                                <p class="text_black"><i class="fa fa-check-circle fa-2x" style="color:green;float:left"></i> ${val.description}</p>
                            </div>
                            <div class="pricing-table-sign-up">
                                <a href="${val.url}" data-scroll class="btn btn-light btn-radius btn-brd grd1 effect-1" target="_blank"><i class="fas fa-cart-plus"></i> Order Now</a>
                            </div>
                        </div>
                    </div>
                </div>`;
            $('#product-pricelist').append(productPricelist);
        });
        result.productSatisfy.forEach((val) => {
            let productSatisfy = '<h3 class="text_white" style="margin-bottom:10px;"><i class="fa fa-quote-left"></i> ' + val.text + '</h3>';
            $('#product-satisfy').append(productSatisfy);
        });
        $('#product-CTA').html(result.productCTA[0].text);
        let faq = [];
        result.productFAQ.forEach((val, i) => {
            let productFAQ = '' +
                `<div class="col-md-4">
                    <div id="product-FAQ-${i}" class="pricing-table pricing-table-highlighted">
                        <div class="pricing-table-header grd1">
                            <h3><i class="fas fa-question-circle"></i> ${val['question-text']} <i id="product-FAQ-icon-${i}" class="fas fa-chevron-down"></i></h3>
                        </div>
                        <div id="product-FAQ-ans-space-${i}" class="pricing-table-space"></div>
                            <div id="product-FAQ-ans-${i}" class="pricing-table-sign-up">
                                <h1 class="text_black" style="font-size:20px;"><i class="far fa-comment-dots"></i> ${val['answer-text']}</h1>
                            </div>
                        </div>
                    </div>
                </div>`;
            $('#product-FAQ').append(productFAQ);
            // custom 
            $('#product-FAQ-ans-space-' + i).css('display', 'none');
            $('#product-FAQ-ans-' + i).css('display', 'none');
            faq[i] = 0;
            $('#product-FAQ-' + i).click(() => {
                if (faq[i] == 0) {
                    $('#product-FAQ-ans-space-' + i).css('display', '');
                    $('#product-FAQ-ans-' + i).css('display', '');
                    for (let j = 0; j < result.productFAQ.length; j++) {
                        if (j != i) {
                            $('#product-FAQ-ans-space-' + i).css('display', 'none');
                            $('#product-FAQ-ans-' + j).css('display', 'none');
                            $('#product-FAQ-icon-' + j).removeClass('fa-chevron-up').removeClass('fa-chevron-down').addClass('fa-chevron-down');
                        }
                    }
                    $('#product-FAQ-icon-' + i).removeClass('fa-chevron-down').addClass('fa-chevron-up');
                    faq[i] = 1;
                } else {
                    $('#product-FAQ-ans-space-' + i).css('display', 'none');
                    $('#product-FAQ-ans-' + i).css('display', 'none');
                    faq.forEach((val, j) => {
                        faq[j] = 0;
                    });
                    $('#product-FAQ-icon-' + i).removeClass('fa-chevron-up').addClass('fa-chevron-down');
                    faq[i] = 0;
                }
            });
        });
        result.productCreator.forEach((val) => {
            let creator = '' +
                `<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow zoomIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <img src="${assets_path + val['image-path']}" alt="" class="img-responsive img-creator">
                    <div class="widget-title">
                        <div>
                            <h2 class="text_white product-creator-name">${val.name}</h2>
                        </div>
                    </div>
                </div>`;
            $('#product-creator').append(creator);
        });
        result.productPsDisclaimer.forEach((val) => {
            let productPsDisclaimer = '<h3 class="text_white" style="margin-bottom:10px;"><i class="fa fa-quote-left"></i> ' + val.text + '</h3>';
            $('#product-psDisclaimer').append(productPsDisclaimer);
        });
        $('#footer-year').html(new Date().getFullYear());


    },
    error: (error) => {
        console.log(error.responseText);
    }
});

//custom