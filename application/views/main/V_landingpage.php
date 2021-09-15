<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title"><?= $title; ?></h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Landing Page
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- Card -->
        <div class="card shadow mb-3 border-left-primary">
            <!-- Card Header - Dropdown -->
            <div class="card-header py d-flex flex-row align-items-center justify-content-between col-lg">
                <h6 class="m-0 font-weight-bold text-dark">
                    <?php if ($profile['role_id'] == 1) {
                        echo 'Admin';
                    } else {
                        echo 'Member';
                    }
                    ?>
                    Landing Page</h6>
            </div>

            <!-- Card Body -->
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body wizard-content">
                        <h4 class="card-title">Form Landing Page Generator</h4>
                        <h6 class="card-subtitle"></h6>
                        <form id="landingpage-form" action="#" class="mt-5" enctype="multipart/form-data">
                            <div>
                                <h3>URL</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <label for="product-url">URL Produk <span class="text-danger">*</span></label>
                                    <input id="product-url" name="product-url" type="text" class="form-control mb-2" placeholder="Contoh : https://weboxbuilder.com/best_template_ppt" />
                                </section>
                                <h3>Nama Produk</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <label for="product-name">Nama Produk <span class="text-danger">*</span></label> <!-- class="required" for mandatory case -->
                                    <input id="product-name" name="product-name" type="text" class="form-control mb-2" placeholder="Mahardika Template" />
                                    <label for="product-image">Upload foto produk <span class="text-danger">*</span></label>
                                    <input id="product-image" name="product-image" type="file" class="form-control mb-2" accept="image/*" />
                                </section>
                                <h3>Background</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <label for="address">Background Type <span class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <label class="form-check-label" for="radio-product-background-color">
                                            Background Color
                                        </label>
                                        <input class="form-check-input" type="radio" name="radio-product-background" id="radio-product-background-color" value="1">
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="radio-product-background-image">
                                            Background Image
                                        </label>
                                        <input class="form-check-input" type="radio" name="radio-product-background" id="radio-product-background-image" value="2">
                                    </div>
                                    <div id="background-input">
                                        <label for="product-background-color" class="product-background-color">Pilih Warna untuk Background <span class="text-danger">*</span></label>
                                        <input id="product-background-color" name="product-background" type="color" class="form-control mb-2 product-background-color" value="#ff0000" />
                                        <label for="product-background-image" class="product-background-image">Pilih Gambar untuk Background <span class="text-danger">*</span></label>
                                        <input id="product-background-image" name="product-background" type="file" class="form-control mb-2 product-background-image" accept="image/*" />
                                    </div>
                                </section>
                                <h3>Headline</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <label for="product-headline-1">Headline 1 <span class="text-danger">*</span></label>
                                    <input id="product-headline-1" name="product-headline-1" type="text" class="form-control mb-2" placeholder="INI DIA RATUSAN TEMPLATE POWERPOINT KEKINIAN" />
                                    <label for="product-headline-2">Headline 2 <span class="text-danger">*</span></label>
                                    <input id="product-headline-2" name="product-headline-2" type="text" class="form-control mb-2" placeholder="YANG BAKAL BIKIN KONTEN PROMOSIMU MAKIN PROFESIONAL & OMSET MAKIN KENCANG" />
                                </section>
                                <h3>Subheadline</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <label for="product-subheadline">Subheadline <span class="text-danger">*</span></label>
                                    <input id="product-subheadline" name="product-subheadline" type="text" class="form-control mb-2" placeholder="3 LANGKAH MUDAH MEMBUAT DESAIN PROMOSI YANG PROFESIONAL" />
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="product-subheadline-detail-1">Detail Subheadline 1 <span class="text-danger">*</span></label>
                                            <input id="product-subheadline-detail-1" name="product-subheadline-detail-1" type="text" class="form-control mb-2" placeholder="PILIH TEMPLATE" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="product-subheadline-detail-icon-1">Icon 1 <span class="text-danger">*</span></label>
                                            <input id="product-subheadline-detail-icon-1" name="product-subheadline-detail-icon-1" type="file" class="form-control mb-2" accept="image/*" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="product-subheadline-detail-2">Detail Subheadline 2 <span class="text-danger">*</span></label>
                                            <input id="product-subheadline-detail-2" name="product-subheadline-detail-2" type="text" class="form-control mb-2" placeholder="EDIT" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="product-subheadline-detail-icon-2">Icon 2 <span class="text-danger">*</span></label>
                                            <input id="product-subheadline-detail-icon-2" name="product-subheadline-detail-icon-2" type="file" class="form-control mb-2" accept="image/*" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="product-subheadline-detail-3">Detail Subheadline 3 <span class="text-danger">*</span></label>
                                            <input id="product-subheadline-detail-3" name="product-subheadline-detail-3" type="text" class="form-control mb-2" placeholder="SELESAI" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="product-subheadline-detail-icon-3">Icon 3 <span class="text-danger">*</span></label>
                                            <input id="product-subheadline-detail-icon-3" name="product-subheadline-detail-icon-3" type="file" class="form-control mb-2" accept="image/*" />
                                        </div>
                                    </div>
                                </section>
                                <h3>Produk</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <label for="product-description">Deskripsi Produk <span class="text-danger">*</span></label>
                                    <input id="product-description" name="product-description" type="text" class="form-control mb-2" placeholder="170+ Template Powerpoint Untuk Kebutuhan Desain Promosi" />
                                </section>
                                <h3>Feature & Benefit</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="product-feature-benefit-1">Feature & Benefit 1 <span class="text-danger">*</span></label>
                                            <input id="product-feature-benefit-1" name="product-feature-benefit-1" type="text" class="form-control mb-2" placeholder="Tidak perlu mahir desain" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="product-feature-benefit-icon-1">Icon 1 <span class="text-danger">*</span></label>
                                            <input id="product-feature-benefit-icon-1" name="product-feature-benefit-icon-1" type="file" class="form-control mb-2" accept="image/*" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="product-feature-benefit-2">Feature & Benefit 2 <span class="text-danger">*</span></label>
                                            <input id="product-feature-benefit-2" name="product-feature-benefit-2" type="text" class="form-control mb-2" placeholder="Tidak perlu aplikasi desain khusus" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="product-feature-benefit-icon-2">Icon 2 <span class="text-danger">*</span></label>
                                            <input id="product-feature-benefit-icon-2" name="product-feature-benefit-icon-2" type="file" class="form-control mb-2" accept="image/*" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="product-feature-benefit-3">Feature & Benefit 3 <span class="text-danger">*</span></label>
                                            <input id="product-feature-benefit-3" name="product-feature-benefit-3" type="text" class="form-control mb-2" placeholder="Tersedia template done for you" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="product-feature-benefit-icon-3">Icon 3 <span class="text-danger">*</span></label>
                                            <input id="product-feature-benefit-icon-3" name="product-feature-benefit-icon-3" type="file" class="form-control mb-2" accept="image/*" />
                                        </div>
                                    </div>
                                </section>
                                <h3>Product Preview</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="product-preview-icon-1">Icon 1 <span class="text-danger">*</span></label>
                                            <input id="product-preview-icon-1" name="product-preview-icon-1" type="file" class="form-control mb-2" accept="image/*" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="product-preview-caption-1">Caption 1 <span class="text-danger">*</span></label>
                                            <input id="product-preview-caption-1" name="product-preview-caption-1" type="text" class="form-control mb-2" placeholder="Demo Kebugaran" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="product-preview-icon-2">Icon 2 <span class="text-danger">*</span></label>
                                            <input id="product-preview-icon-2" name="product-preview-icon-2" type="file" class="form-control mb-2" accept="image/*" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="product-preview-caption-2">Caption 2 <span class="text-danger">*</span></label>
                                            <input id="product-preview-caption-2" name="product-preview-caption-2" type="text" class="form-control mb-2" placeholder="Demo Memasak" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="product-preview-icon-3">Icon 3 <span class="text-danger">*</span></label>
                                            <input id="product-preview-icon-3" name="product-preview-icon-3" type="file" class="form-control mb-2" accept="image/*" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="product-preview-caption-3">Caption 3 <span class="text-danger">*</span></label>
                                            <input id="product-preview-caption-3" name="product-preview-caption-3" type="text" class="form-control mb-2" placeholder="Demo Berjualan" />
                                        </div>
                                    </div>
                                </section>
                                <h3>Scarity</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <label for="product-scarity">Scarity <span class="text-danger">*</span></label>
                                    <input id="product-scarity" name="product-scarity" type="text" class="form-control mb-2" placeholder="Kami menjual produk ini dengan sangat terbatas hanya ke 100 orang saja" />
                                </section>
                                <h3>Pre-CTA</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <label for="product-selling-price">Harga Jual <span class="text-danger">*</span></label>
                                    <input id="product-selling-price" name="product-selling-price" type="number" class="form-control mb-2 number-input" placeholder="Rp 399.000" />
                                    <label for="product-strike-price">Harga Coret <span class="text-danger">*</span></label>
                                    <input id="product-strike-price" name="product-strike-price" type="number" class="form-control mb-2 number-input" placeholder="Rp 700.000" />
                                    <small class="text-danger">*Harga coret harus lebih tinggi daripada harga jual</small>
                                </section>
                                <h3>Pricelist</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="product-package-1">Nama Paket 1 <span class="text-danger">*</span></label>
                                            <input id="product-package-1" name="product-package-1" type="text" class="form-control mb-2" placeholder="Personal User" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="product-price-1">Harga Paket 1 <span class="text-danger">*</span></label>
                                            <input id="product-price-1" name="product-price-1" type="number" class="form-control mb-2 number-input" placeholder="Rp 429000" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="product-package-2">Nama Paket 2 <span class="text-danger">*</span></label>
                                            <input id="product-package-2" name="product-package-2" type="text" class="form-control mb-2" placeholder="PLR" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="product-price-2">Harga Paket 2 <span class="text-danger">*</span></label>
                                            <input id="product-price-2" name="product-price-2" type="number" class="form-control mb-2 number-input" placeholder="Rp 499000" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="product-package-3">Nama Paket 3 <span class="text-danger">*</span></label>
                                            <input id="product-package-3" name="product-package-3" type="text" class="form-control mb-2" placeholder="MMR" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="product-price-3">Harga Paket 3 <span class="text-danger">*</span></label>
                                            <input id="product-price-3" name="product-price-3" type="number" class="form-control mb-2 number-input" placeholder="Rp 699000" />
                                        </div>
                                    </div>
                                </section>
                                <h3>Satisfy</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="product-satisfy-1">Jika tidak membeli, kerugian 1 <span class="text-danger">*</span></label>
                                            <input id="product-satisfy-1" name="product-satisfy-1" type="text" class="form-control mb-2" placeholder="Bayar jasa desain grafis mahal" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="product-satisfy-2">Jika tidak membeli, kerugian 2 <span class="text-danger">*</span></label>
                                            <input id="product-satisfy-2" name="product-satisfy-2" type="text" class="form-control mb-2" placeholder="Rekrut graphic designer mahal" />
                                        </div>
                                    </div>
                                </section>
                                <h3>CTA</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <label for="product-cta">CTA Description <span class="text-danger">*</span></label>
                                    <input id="product-cta" name="product-cta" type="text" class="form-control mb-2" placeholder="Alhasil, kalau manfaatnya sih pasti banhyak banget. jadi jangan sampai kesalip kompetitormu yang lebih dulu" />
                                </section>
                                <h3>FAQ</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="product-question-1">Pertanyaan 1 <span class="text-danger">*</span></label>
                                            <input id="product-question-1" name="product-question-1" type="text" class="form-control mb-2" placeholder="Sekali bayar atau tahunan?" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="product-answer-1">Jawaban 1 <span class="text-danger">*</span></label>
                                            <input id="product-answer-1" name="product-answer-1" type="text" class="form-control mb-2 number-input" placeholder="Betul, sekali bayar" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="product-question-2">Pertanyaan 2 <span class="text-danger">*</span></label>
                                            <input id="product-question-2" name="product-question-2" type="text" class="form-control mb-2" placeholder="Apa format file yang didapat?" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="product-answer-2">Jawaban 2 <span class="text-danger">*</span></label>
                                            <input id="product-answer-2" name="product-answer-2" type="text" class="form-control mb-2 number-input" placeholder="Formatnya PPT" />
                                        </div>
                                    </div>
                                </section>
                                <h3>Creator & Co</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="product-creator-image-1">Foto Creator 1 <span class="text-danger">*</span></label>
                                            <input id="product-creator-image-1" name="product-creator-image-1" type="file" class="form-control mb-2" accept="image/*" />
                                            <label for="product-creator-name-1">Nama Creator 1 <span class="text-danger">*</span></label>
                                            <input id="product-creator-name-1" name="product-creator-name-1" type="text" class="form-control mb-2" placeholder="Budi" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="product-creator-image-2">Foto Creator 2 <span class="text-danger">*</span></label>
                                            <input id="product-creator-image-2" name="product-creator-image-2" type="file" class="form-control mb-2" accept="image/*" />
                                            <label for="product-creator-name-2">Nama Creator 2 <span class="text-danger">*</span></label>
                                            <input id="product-creator-name-2" name="product-creator-name-2" type="text" class="form-control mb-2" placeholder="Cahyo" />
                                        </div>
                                    </div>
                                </section>
                                <h3>PS & Disclaimer</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="product-ps-disclaimer-1">PS 1 <span class="text-danger">*</span></label>
                                            <input id="product-ps-disclaimer-1" name="product-ps-disclaimer-1" type="text" class="form-control mb-2" placeholder="Ada banyak alasan dan keuntungan untuk memakai produk kami ini" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="product-ps-disclaimer-2">PS 2 <span class="text-danger">*</span></label>
                                            <input id="product-ps-disclaimer-2" name="product-ps-disclaimer-2" type="text" class="form-control mb-2" placeholder="Beli sekarang untuk mendapatkan harga promo" />
                                        </div>
                                    </div>
                                </section>
                                <!-- <h3>Finish</h3>
                                <section>
                                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required" />
                                    <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                                </section> -->
                            </div>
                        </form>
                        <div class="row mt-2">
                            <div class="col-lg-12">
                            <button class="btn btn-info float-end waves-effect waves-dark"><i class="mdi mdi-content-save-settings"></i> Save Draft</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->