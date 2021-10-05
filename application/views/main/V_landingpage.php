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
                            <li class="breadcrumb-item"><a href="<?= base_url('landingpage/lists'); ?>">Landing Page list</a></li>
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
                        <form id="landingpage-form" method="post" action="<?= base_url('api/postNewLandingPage') ?>" class="mt-5" enctype="multipart/form-data">
                            <div>
                                <h3>URL</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <input type="text" class="form-control form-control-lg not-required" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" readonly style="position: absolute;opacity: 0;z-index: -1;" />
                                    <label for="product-url">URL Produk <span class="text-danger">*</span></label>
                                    <input id="product-url" name="product-url" type="text" class="form-control mb-2"/>
                                    <small>Contoh : <?= base_url('id/p/'); ?>best_template_ppt</small>
                                </section>
                                <h3>Nama Produk</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <label for="product-name">Nama Produk <span class="text-danger">*</span></label> <!-- class="required" for mandatory case -->
                                    <input id="product-name" name="product-name" type="text" class="form-control mb-2" placeholder="Mahardika Template" />
                                    <label for="product-logo">Upload logo produk <span class="text-danger">*</span><small class="text-danger">(ukuran yang disarankan : 396 x 70 pixel)</small></label>
                                    <input id="product-logo" name="product-logo" type="file" class="form-control mb-2" accept="image/*" />
                                    <label for="product-image">Upload foto produk <span class="text-danger">*</span><small class="text-danger">(ukuran yang disarankan : 834 x 639 pixel)</small></label>
                                    <input id="product-image1" name="product-image" type="file" class="form-control mb-2" accept="image/*" />
                                </section>
                                <h3>Background</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <label for="address">Background Type <span class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <label class="form-check-label" for="radio-product-background-color">
                                            Background Color
                                        </label>
                                        <input class="form-check-input" type="radio" name="radio-product-background" id="radio-product-background-color" value="1" checked> 
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="radio-product-background-image">
                                            Background Image
                                        </label>
                                        <input class="form-check-input" type="radio" name="radio-product-background" id="radio-product-background-image" value="2">
                                    </div>
                                    <div id="background-input">
                                        <label for="product-background-color" class="product-background-color">Pilih Warna untuk Background <span class="text-danger">*</span></label>
                                        <input id="product-background-color" name="product-background-color" type="color" class="form-control mb-2 product-background-color" value="#ff0000" />
                                        <label for="product-background-image" class="product-background-image">Pilih Gambar untuk Background <span class="text-danger">*</span></label>
                                        <input id="product-background-image" name="product-background-image" type="file" class="form-control mb-2 product-background-image not-required" accept="image/*" />
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
                                    <div id="multi-subheadline-detail">
                                        <div id="subheadline-detail-1" class="row">
                                            <div class="col-lg-6">
                                                <label for="product-subheadline-detail-1">Detail Subheadline 1 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-subheadline-detail-1" name="product-subheadline-detail-1" type="text" class="input-subheadline-detail form-control form-control-lg" placeholder="PILIH" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="product-subheadline-detail-icon-1">Icon 1 <span class="text-danger">*</span><small class="text-danger">(ukuran yang disarankan : memiliki rasio 1:1)</small></label>
                                                <div class="input-group">
                                                    <input id="product-subheadline-detail-icon-1" name="product-subheadline-detail-icon-1" type="file" class="input-subheadline-detail-icon form-control form-control-lg" accept="image/*">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="subheadline-detail-2" class="row">
                                            <div class="col-lg-6">
                                                <label for="product-subheadline-detail-2">Detail Subheadline 2 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-subheadline-detail-2" name="product-subheadline-detail-2" type="text" class="input-subheadline-detail form-control form-control-lg" placeholder="EDIT" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="product-subheadline-detail-icon-2">Icon 2 <span class="text-danger">*</span><small class="text-danger">(ukuran yang disarankan : memiliki rasio 1:1)</small></label>
                                                <div class="input-group">
                                                    <input id="product-subheadline-detail-icon-2" name="product-subheadline-detail-icon-2" type="file" class="input-subheadline-detail-icon form-control form-control-lg" accept="image/*">
                                                    <div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                                    <div class="input-group-prepend">
                                                        <a onclick="deleteSubheadlineDetail(2)" class="delete-subheadline-detail input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="subheadline-detail-3" class="row">
                                            <div class="col-lg-6">
                                                <label for="product-subheadline-detail-3">Detail Subheadline 3 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-subheadline-detail-3" name="product-subheadline-detail-3" type="text" class="input-subheadline-detail form-control form-control-lg" placeholder="SELESAI" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="product-subheadline-detail-icon-3">Icon 3 <span class="text-danger">*</span><small class="text-danger">(ukuran yang disarankan : memiliki rasio 1:1)</small></label>
                                                <div class="input-group">
                                                    <input id="product-subheadline-detail-icon-3" name="product-subheadline-detail-icon-3" type="file" class="input-subheadline-detail-icon form-control form-control-lg" accept="image/*">
                                                    <div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                                    <div class="input-group-prepend">
                                                        <a onclick="deleteSubheadlineDetail(3)" class="delete-subheadline-detail input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12 text-center">
                                            <a onclick="addSubHeadlineDetail()" class="btn btn-success text-white"><i class="mdi mdi-library-plus"></i> Add More</a>
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
                                    <div id="multi-feature-benefit">
                                        <div id="feature-benefit-1" class="row">
                                            <div class="col-lg-6">
                                                <label for="product-feature-benefit-1">Feature & Benefit 1 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-feature-benefit-1" name="product-feature-benefit-1" type="text" class="input-feature-benefit form-control form-control-lg" placeholder="Tidak perlu mahir desain" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="product-feature-benefit-icon-1">Icon 1 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-feature-benefit-icon-1" name="product-feature-benefit-icon-1" type="file" class="input-feature-benefit-icon form-control form-control-lg" accept="image/*" />
                                                </div>
                                            </div>
                                        </div>
                                        <div id="feature-benefit-2" class="row">
                                            <div class="col-lg-6">
                                                <label for="product-feature-benefit-2">Feature & Benefit 2 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-feature-benefit-2" name="product-feature-benefit-2" type="text" class="input-feature-benefit form-control form-control-lg" placeholder="Tidak perlu aplikasi desain khusus" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="product-feature-benefit-icon-2">Icon 2 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-feature-benefit-icon-2" name="product-feature-benefit-icon-2" type="file" class="input-feature-benefit-icon form-control form-control-lg" accept="image/*" />
                                                    <div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                                    <div class="input-group-prepend">
                                                        <a onclick="deleteFeatureBenefit(2)" class="delete-feature-benefit input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="feature-benefit-3" class="row">
                                            <div class="col-lg-6">
                                                <label for="product-feature-benefit-3">Feature & Benefit 3 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-feature-benefit-3" name="product-feature-benefit-3" type="text" class="input-feature-benefit form-control form-control-lg" placeholder="Tersedia template done for you" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="product-feature-benefit-icon-3">Icon 3 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-feature-benefit-icon-3" name="product-feature-benefit-icon-3" type="file" class="input-feature-benefit-icon form-control form-control-lg" accept="image/*" />
                                                    <div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                                    <div class="input-group-prepend">
                                                        <a onclick="deleteFeatureBenefit(3)" class="delete-feature-benefit input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12 text-center">
                                            <a onclick="addFeatureBenefit()" class="btn btn-success  text-white"><i class="mdi mdi-library-plus"></i> Add More</a>
                                        </div>
                                    </div>
                                </section>
                                <h3>Product Preview</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <div id="multi-preview">
                                        <div id="preview-1" class="row">
                                            <div class="col-lg-6">
                                                <label for="product-preview-icon-1">Icon 1 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-preview-icon-1" name="product-preview-icon-1" type="file" class="input-preview-icon form-control form-control-lg" accept="image/*" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="product-preview-1">Caption 1 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-preview-1" name="product-preview-1" type="text" class="input-preview form-control form-control-lg" placeholder="Demo Kebugaran" />
                                                </div>
                                            </div>
                                        </div>
                                        <div id="preview-2" class="row">
                                            <div class="col-lg-6">
                                                <label for="product-preview-icon-2">Icon 2 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-preview-icon-2" name="product-preview-icon-2" type="file" class="input-preview form-control form-control-lg" accept="image/*" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="product-preview-2">Caption 2 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-preview-2" name="product-preview-2" type="text" class="input-preview-icon form-control form-control-lg" placeholder="Demo Memasak" />
                                                    <div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                                    <div class="input-group-prepend">
                                                        <a onclick="deletePreview(2)" class="delete-preview input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="preview-3" class="row">
                                            <div class="col-lg-6">
                                                <label for="product-preview-icon-3">Icon 3 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-preview-icon-3" name="product-preview-icon-3" type="file" class="input-preview form-control form-control-lg" accept="image/*" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="product-preview-3">Caption 3 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-preview-3" name="product-preview-3" type="text" class="input-preview-icon form-control form-control-lg" placeholder="Demo Berjualan" />
                                                    <div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                                    <div class="input-group-prepend">
                                                        <a onclick="deletePreview(3)" class="delete-preview input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12 text-center">
                                            <a onclick="addPreview()" class="btn btn-success text-white"><i class="mdi mdi-library-plus"></i> Add More</a>
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
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <a class="input-group-text bg-white text-black h-100 cursor-pointer" id="basic-addon2">Rp</a>
                                        </div>
                                        <input id="product-selling-price" name="product-selling-price" type="number" class="form-control form-control-lg number-input" placeholder="399.000" />
                                    </div>
                                    <label for="product-strike-price">Harga Coret <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <a class="input-group-text bg-white text-black h-100 cursor-pointer" id="basic-addon2">Rp</a>
                                        </div>
                                        <input id="product-strike-price" name="product-strike-price" type="number" class="form-control form-control-lg number-input" placeholder="700.000" />
                                    </div>
                                    <small class="text-danger">*Harga coret harus lebih tinggi daripada harga jual</small>
                                </section>
                                <h3>Pricelist</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <div id="multi-pricelist">
                                        <div id="pricelist-1" class="row mb-2">
                                            <div class="col-lg-4">
                                                <label for="product-package-1">Nama Paket 1 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-package-1" name="product-package-1" type="text" class="input-package form-control form-control-lg" placeholder="Personal User" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="product-price-1">Harga Paket 1 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <a class="input-group-text bg-white text-black h-100 cursor-pointer" id="basic-addon2">Rp</a>
                                                    </div>
                                                    <input id="product-price-1" name="product-price-1" type="number" class="input-price form-control form-control-lg" placeholder="429000" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="product-package-url-1">URL/Link Paket 1 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-package-url-1" name="product-package-url-1" type="text" class="input-package-url form-control form-control-lg" placeholder="https://weboxbuilder.com/checkout?p=1" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <label for="product-package-description-1">Deskripsi Paket 1 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <textarea id="product-package-description-1" name="product-package-description-1" class="input-package-description form-control form-control-lg" placeholder="Lisensi berlaku 2 bulan"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="pricelist-2" class="row mb-2">
                                            <div class="col-lg-4">
                                                <label for="product-package-2">Nama Paket 2 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-package-2" name="product-package-2" type="text" class="input-package form-control form-control-lg" placeholder="PLR" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="product-price-2">Harga Paket 2 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <a class="input-group-text bg-white text-black h-100 cursor-pointer" id="basic-addon2">Rp</a>
                                                    </div>
                                                    <input id="product-price-2" name="product-price-2" type="number" class="input-price form-control form-control-lg" placeholder="499000" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="product-package-url-2">URL/Link Paket 2 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-package-url-2" name="product-package-url-2" type="text" class="input-package-url form-control form-control-lg" placeholder="https://weboxbuilder.com/checkout?p=2" />
                                                    <div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                                    <div class="input-group-prepend">
                                                        <a onclick="deletePricelist(2)" class="delete-pricelist input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <label for="product-package-description-2">Deskripsi Paket 2 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <textarea id="product-package-description-2" name="product-package-description-2" class="input-package-description form-control form-control-lg" placeholder="Lisensi berlaku 3 bulan"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="pricelist-3" class="row mb-2">
                                            <div class="col-lg-4">
                                                <label for="product-package-3">Nama Paket 3 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-package-3" name="product-package-3" type="text" class="input-package form-control form-control-lg" placeholder="MMR" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="product-price-3">Harga Paket 3 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <a class="input-group-text bg-white text-black h-100 cursor-pointer" id="basic-addon2">Rp</a>
                                                    </div>
                                                    <input id="product-price-3" name="product-price-3" type="number" class="input-price form-control form-control-lg" placeholder="699000" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="product-package-url-3">URL/Link Paket 3 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-package-url-3" name="product-package-url-3" type="text" class="input-package-url form-control form-control-lg" placeholder="https://weboxbuilder.com/checkout?p=3" />
                                                    <div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                                    <div class="input-group-prepend">
                                                        <a onclick="deletePricelist(3)" class="delete-pricelist input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <label for="product-package-description-3">Deskripsi Paket 3 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <textarea id="product-package-description-3" name="product-package-description-3" class="input-package-description form-control form-control-lg" placeholder="Lisensi berlaku 5 bulan + CS Support"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12 text-center">
                                            <a onclick="addPricelist()" class="btn btn-success text-white"><i class="mdi mdi-library-plus"></i> Add More</a>
                                        </div>
                                    </div>
                                </section>
                                <h3>Satisfy</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <div id="multi-satisfy">
                                        <div id="satisfy-1" class="row">
                                            <div class="col-lg-12">
                                                <label for="product-satisfy-1">Jika tidak membeli, kerugian 1 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-satisfy-1" name="product-satisfy-1" type="text" class="input-satisfy form-control form-control-lg" placeholder="Bayar jasa desain grafis mahal" />
                                                </div>
                                            </div>
                                        </div>
                                        <div id="satisfy-2" class="row">
                                            <div class="col-lg-12">
                                                <label for="product-satisfy-2">Jika tidak membeli, kerugian 2 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-satisfy-2" name="product-satisfy-2" type="text" class="input-satisfy form-control form-control-lg" placeholder="Bayar jasa desain grafis mahal" />
                                                    <div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                                    <div class="input-group-prepend">
                                                        <a onclick="deleteSatisfy(2)" class="delete-satisfy input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12 text-center">
                                            <a onclick="addSatisfy()" class="btn btn-success text-white"><i class="mdi mdi-library-plus"></i> Add More</a>
                                        </div>
                                    </div>
                                </section>
                                <h3>CTA</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <label for="product-cta">CTA Description <span class="text-danger">*</span></label>
                                    <textarea id="product-cta" name="product-cta" class="form-control mb-2" placeholder="Alhasil, kalau manfaatnya sih pasti banhyak banget. jadi jangan sampai kesalip kompetitormu yang lebih dulu"></textarea>
                                </section>
                                <h3>FAQ</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <div id="multi-faq">
                                        <div id="faq-1" class="row">
                                            <div class="col-lg-6">
                                                <label for="product-question-1">Pertanyaan 1 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-question-1" name="product-question-1" type="text" class="input-question form-control form-control-lg" placeholder="Sekali bayar atau tahunan?" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="product-answer-1">Jawaban 1 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-answer-1" name="product-answer-1" type="text" class="input-answer form-control form-control-lg number-input" placeholder="Betul, sekali bayar" />
                                                </div>
                                            </div>
                                        </div>
                                        <div id="faq-2" class="row">
                                            <div class="col-lg-6">
                                                <label for="product-question-2">Pertanyaan 2 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-question-2" name="product-question-2" type="text" class="input-question form-control form-control-lg" placeholder="Apa format file yang didapat?" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="product-answer-2">Jawaban 2 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-answer-2" name="product-answer-2" type="text" class="input-answer form-control form-control-lg number-input" placeholder="Formatnya PPT" />
                                                    <div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                                    <div class="input-group-prepend">
                                                        <a onclick="deleteFaq(2)" class="delete-faq input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12 text-center">
                                            <a onclick="addFaq()" class="btn btn-success text-white"><i class="mdi mdi-library-plus"></i> Add More</a>
                                        </div>
                                    </div>
                                </section>
                                <h3>Creator & Co</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <div id="multi-creator" class="row">
                                        <div id="creator-1" class="col-lg-4">
                                            <label for="product-creator-image-1">Foto Creator 1 <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input id="product-creator-image-1" name="product-creator-image-1" type="file" class="input-creator-image form-control form-control-lg" accept="image/*" />
                                            </div>
                                            <label for="product-creator-name-1">Nama Creator 1 <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input id="product-creator-name-1" name="product-creator-name-1" type="text" class="input-creator-name form-control form-control-lg" placeholder="Budi" />
                                            </div>
                                        </div>
                                        <div id="creator-2" class="col-lg-4">
                                            <label for="product-creator-image-2">Foto Creator 2 <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input id="product-creator-image-2" name="product-creator-image-2" type="file" class="input-creator-image form-control form-control-lg" accept="image/*" />
                                            </div>
                                            <label for="product-creator-name-2">Nama Creator 2 <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input id="product-creator-name-2" name="product-creator-name-2" type="text" class="input-creator-name form-control form-control-lg" placeholder="Susi" />
                                                <div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                                <div class="input-group-prepend">
                                                    <a onclick="deleteCreator(2)" class="delete-creator input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12 text-center">
                                            <a onclick="addCreator()" class="btn btn-success text-white"><i class="mdi mdi-library-plus"></i> Add More</a>
                                        </div>
                                    </div>
                                </section>
                                <h3>PS & Disclaimer</h3>
                                <section>
                                    <p><span class="text-danger">*</span> Wajib</p>
                                    <div id="multi-ps-disclaimer">
                                        <div id="ps-disclaimer-1" class="row">
                                            <div class="col-lg-12">
                                                <label for="product-ps-disclaimer-1">PS 1 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-ps-disclaimer-1" name="product-ps-disclaimer-1" type="text" class="input-ps-disclaimer form-control form-control-lg" placeholder="Ada banyak alasan dan keuntungan untuk memakai produk kami ini" />
                                                </div>
                                            </div>
                                        </div>
                                        <div id="ps-disclaimer-2" class="row">
                                            <div class="col-lg-12">
                                                <label for="product-ps-disclaimer-2">PS 2 <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="product-ps-disclaimer-2" name="product-ps-disclaimer-2" type="text" class="input-ps-disclaimer form-control form-control-lg" placeholder="Beli sekarang untuk mendapatkan harga promo" />
                                                    <div>‏‏‎&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                                    <div class="input-group-prepend">
                                                        <a onclick="deletePsDisclaimer(2)" class="delete-ps-disclaimer input-group-text bg-danger text-white cursor-pointer" id="basic-addon2"><i class="mdi mdi-delete fs-4"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12 text-center">
                                            <a onclick="addPsDisclaimer()" class="btn btn-success text-white"><i class="mdi mdi-library-plus"></i> Add More</a>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </form>
                        <div class="row mt-2">
                            <div class="col-lg-12">
                                <a id="saveDraft" onclick="saveDraft()" class="btn btn-info float-end waves-effect waves-dark"><i class="mdi mdi-content-save-settings"></i> Save Draft</a>
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