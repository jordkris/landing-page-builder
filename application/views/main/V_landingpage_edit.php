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
                            <li class="breadcrumb-item"><a href="<?= base_url('landingpage/lists'); ?>">Landing Page List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit Landing Page
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
        <div id="edit-card" class="card shadow mb-3 border-left-primary">
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
                        <h4 class="card-title">Edit Form Landing Page</h4>
                        <br />
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row">
                            <div class="col-lg-6 mb-3" style="display:grid;">
                                <select id="select-sub-landingpage" name="select-sub-landingpage" class="select2 form-select shadow-none" style="width: 100%; height: 36px">
                                    <option value="product-url" checked>URL Produk</option>
                                    <option value="product-name">Nama Produk</option>
                                    <option value="product-background">Background</option>
                                    <option value="product-headline">Headline</option>
                                    <option value="product-subheadline">Subheadline</option>
                                    <option value="product-description">Produk</option>
                                    <option value="product-feature-benefit">Feature & Benefit</option>
                                    <option value="product-preview">Product Preview</option>
                                    <option value="product-scarity">Scarity</option>
                                    <option value="product-precta">Pre-CTA</option>
                                    <option value="product-pricelist">Pricelist</option>
                                    <option value="product-satisfy">Satisfy</option>
                                    <option value="product-cta">CTA</option>
                                    <option value="product-faq">FAQ</option>
                                    <option value="product-creator">Creator & Co</option>
                                    <option value="product-ps-disclaimer">PS & Disclaimer</option>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <a id="saveButton" class="btn btn-success text-white"><i class="mdi mdi-content-save"></i> Go & Save</a>
                                <a id="openToken" class="btn btn-primary text-white float-end"></a>
                            </div>
                        </div>
                        <form id="form-product-url" method="post" action="<?= base_url('api/edit_product/') . $id . '/' . $section; ?>" class="mt-5">
                            <!-- <div> -->
                            <h3>URL</h3>
                            <section>
                                <p><span class="text-danger">*</span> Wajib</p>
                                <input type="text" class="form-control form-control-lg not-required" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" readonly style="position: absolute;opacity: 0;z-index: -1;" />
                                <label for="product-url">URL Produk <span class="text-danger">*</span></label>
                                <input id="product-url" name="product-url" type="text" class="form-control mb-2" />
                                <small>Contoh : <?= base_url('id/p/'); ?>best_template_ppt</small>
                                <div class="row mt-3">
                                    <div class="col-lg-12 text-center mt-3">
                                        <button type="submit" class="btn btn-success text-white"><i class="fas fa-save"></i> Submit</button>
                                    </div>
                                </div>
                            </section>
                        </form>
                        <form id="form-product-name" method="post" action="<?= base_url('api/edit_product/') . $id . '/' . $section; ?>" class="mt-5" enctype="multipart/form-data">
                            <h3>Nama Produk</h3>
                            <section>
                                <p><span class="text-danger">*</span> Wajib</p>
                                <label for="product-name">Nama Produk <span class="text-danger">*</span></label> <!-- class="required" for mandatory case -->
                                <input id="product-name" name="product-name" type="text" class="form-control mb-2" placeholder="Mahardika Template" />
                                <div class="row mb-2">
                                    <div class="col-lg-5">
                                        <label for="product-logo">Upload logo produk <span class="text-danger">*</span><small class="text-danger">(ukuran yang disarankan : 396 x 70 pixel)</small></label>
                                        <input id="product-logo" name="product-logo" type="file" class="form-control mb-2" accept="image/*" />
                                    </div>
                                    <div class="col-lg-7">
                                        <img id="product-image-logo-show" alt="no image" class="product-image-show" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <label for="product-image">Upload foto produk <span class="text-danger">*</span><small class="text-danger">(ukuran yang disarankan : 834 x 639 pixel)</small></label>
                                        <input id="product-image" name="product-image" type="file" class="form-control mb-2" accept="image/*" />
                                    </div>
                                    <div class="col-lg-7">
                                        <img id="product-image-main-show" alt="no image" class="product-image-show" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-12 text-center mt-3">
                                        <button type="submit" class="btn btn-success text-white"><i class="fas fa-save"></i> Submit</button>
                                    </div>
                                </div>
                            </section>
                        </form>
                        <form id="form-product-background" method="post" action="<?= base_url('api/edit_product/') . $id . '/' . $section; ?>" class="mt-5" enctype="multipart/form-data">
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
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="product-background-color" class="product-background-color">Pilih Warna untuk Background <span class="text-danger">*</span></label>
                                            <input id="product-background-color" name="product-background-color" type="color" class="form-control mb-2 product-background-color" value="#ff0000" />
                                            <label for="product-background-image" class="product-background-image">Pilih Gambar untuk Background <span class="text-danger">*</span></label>
                                            <input id="product-background-image" name="product-background-image" type="file" class="form-control mb-2 product-background-image not-required" accept="image/*" />
                                        </div>
                                        <div class="col-lg-6">
                                            <img id="product-image-background-show" alt="no image" class="product-image-show" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-12 text-center mt-3">
                                        <button type="submit" class="btn btn-success text-white"><i class="fas fa-save"></i> Submit</button>
                                    </div>
                                </div>
                            </section>
                        </form>
                        <form id="form-product-headline" method="post" action="<?= base_url('api/edit_product/') . $id . '/' . $section; ?>" class="mt-5" enctype="multipart/form-data">
                            <h3>Headline</h3>
                            <section>
                                <p><span class="text-danger">*</span> Wajib</p>
                                <label for="product-headline-1">Headline 1 <span class="text-danger">*</span></label>
                                <input id="product-headline-1" name="product-headline-1" type="text" class="form-control mb-2" placeholder="INI DIA RATUSAN TEMPLATE POWERPOINT KEKINIAN" />
                                <label for="product-headline-2">Headline 2 <span class="text-danger">*</span></label>
                                <input id="product-headline-2" name="product-headline-2" type="text" class="form-control mb-2" placeholder="YANG BAKAL BIKIN KONTEN PROMOSIMU MAKIN PROFESIONAL & OMSET MAKIN KENCANG" />
                                <div class="row mt-3">
                                    <div class="col-lg-12 text-center mt-3">
                                        <button type="submit" class="btn btn-success text-white"><i class="fas fa-save"></i> Submit</button>
                                    </div>
                                </div>
                            </section>
                        </form>
                        <form id="form-product-subheadline" method="post" action="<?= base_url('api/edit_product/') . $id . '/' . $section; ?>" class="mt-5" enctype="multipart/form-data">
                            <h3>Subheadline</h3>
                            <section>
                                <p><span class="text-danger">*</span> Wajib</p>
                                <label for="product-subheadline">Subheadline <span class="text-danger">*</span></label>
                                <input id="product-subheadline" name="product-subheadline" type="text" class="form-control mb-2" placeholder="3 LANGKAH MUDAH MEMBUAT DESAIN PROMOSI YANG PROFESIONAL" />
                                <div id="multi-subheadline-detail"></div>
                                <div class="row mt-3">
                                    <div class="col-lg-12 text-center">
                                        <a onclick="addSubHeadlineDetail()" class="btn btn-warning text-white" style="border-radius:20px;"><i class="mdi mdi-library-plus"></i> Add More</a>
                                    </div>
                                    <div class="col-lg-12 text-center mt-3">
                                        <button type="submit" class="btn btn-success text-white"><i class="fas fa-save"></i> Submit</button>
                                    </div>
                                </div>
                            </section>
                        </form>
                        <form id="form-product-description" method="post" action="<?= base_url('api/edit_product/') . $id . '/' . $section; ?>" class="mt-5" enctype="multipart/form-data">
                            <h3>Produk</h3>
                            <section>
                                <p><span class="text-danger">*</span> Wajib</p>
                                <label for="product-description">Deskripsi Produk <span class="text-danger">*</span></label>
                                <input id="product-description" name="product-description" type="text" class="form-control mb-2" placeholder="170+ Template Powerpoint Untuk Kebutuhan Desain Promosi" />
                                <div class="row mt-3">
                                    <div class="col-lg-12 text-center mt-3">
                                        <button type="submit" class="btn btn-success text-white"><i class="fas fa-save"></i> Submit</button>
                                    </div>
                                </div>
                            </section>
                        </form>
                        <form id="form-product-feature-benefit" method="post" action="<?= base_url('api/edit_product/') . $id . '/' . $section; ?>" class="mt-5" enctype="multipart/form-data">
                            <h3>Feature & Benefit</h3>
                            <section>
                                <p><span class="text-danger">*</span> Wajib</p>
                                <div id="multi-feature-benefit"></div>
                                <div class="row mt-3">
                                    <div class="col-lg-12 text-center">
                                        <a onclick="addFeatureBenefit()" class="btn btn-warning text-white" style="border-radius:20px;"><i class="mdi mdi-library-plus"></i> Add More</a>
                                    </div>
                                    <div class="col-lg-12 text-center mt-3">
                                        <button type="submit" class="btn btn-success text-white"><i class="fas fa-save"></i> Submit</button>
                                    </div>
                                </div>
                            </section>
                        </form>
                        <form id="form-product-preview" method="post" action="<?= base_url('api/edit_product/') . $id . '/' . $section; ?>" class="mt-5" enctype="multipart/form-data">
                            <h3>Product Preview</h3>
                            <section>
                                <p><span class="text-danger">*</span> Wajib</p>
                                <div id="multi-preview"></div>
                                <div class="row mt-3">
                                    <div class="col-lg-12 text-center">
                                        <a onclick="addPreview()" class="btn btn-warning text-white" style="border-radius:20px;"><i class="mdi mdi-library-plus"></i> Add More</a>
                                    </div>
                                    <div class="col-lg-12 text-center mt-3">
                                        <button type="submit" class="btn btn-success text-white"><i class="fas fa-save"></i> Submit</button>
                                    </div>
                                </div>
                            </section>
                        </form>
                        <form id="form-product-scarity" method="post" action="<?= base_url('api/edit_product/') . $id . '/' . $section; ?>" class="mt-5" enctype="multipart/form-data">
                            <h3>Scarity</h3>
                            <section>
                                <p><span class="text-danger">*</span> Wajib</p>
                                <label for="product-scarity">Scarity <span class="text-danger">*</span></label>
                                <input id="product-scarity" name="product-scarity" type="text" class="form-control mb-2" placeholder="Kami menjual produk ini dengan sangat terbatas hanya ke 100 orang saja" />
                                <div class="row mt-3">
                                    <div class="col-lg-12 text-center mt-3">
                                        <button type="submit" class="btn btn-success text-white"><i class="fas fa-save"></i> Submit</button>
                                    </div>
                                </div>
                            </section>
                        </form>
                        <form id="form-product-precta" method="post" action="<?= base_url('api/edit_product/') . $id . '/' . $section; ?>" class="mt-5" enctype="multipart/form-data">
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
                                <div class="row mt-3">
                                    <div class="col-lg-12 text-center mt-3">
                                        <button type="submit" class="btn btn-success text-white"><i class="fas fa-save"></i> Submit</button>
                                    </div>
                                </div>
                            </section>
                        </form>
                        <form id="form-product-pricelist" method="post" action="<?= base_url('api/edit_product/') . $id . '/' . $section; ?>" class="mt-5" enctype="multipart/form-data">
                            <h3>Pricelist</h3>
                            <section>
                                <p><span class="text-danger">*</span> Wajib</p>
                                <div id="multi-pricelist"></div>
                                <div class="row mt-3">
                                    <div class="col-lg-12 text-center">
                                        <a onclick="addPricelist()" class="btn btn-warning text-white" style="border-radius:20px;"><i class="mdi mdi-library-plus"></i> Add More</a>
                                    </div>
                                    <div class="col-lg-12 text-center mt-3">
                                        <button type="submit" class="btn btn-success text-white"><i class="fas fa-save"></i> Submit</button>
                                    </div>
                                </div>
                            </section>
                        </form>
                        <form id="form-product-satisfy" method="post" action="<?= base_url('api/edit_product/') . $id . '/' . $section; ?>" class="mt-5" enctype="multipart/form-data">
                            <h3>Satisfy</h3>
                            <section>
                                <p><span class="text-danger">*</span> Wajib</p>
                                <div id="multi-satisfy"></div>
                                <div class="row mt-3">
                                    <div class="col-lg-12 text-center">
                                        <a onclick="addSatisfy()" class="btn btn-warning text-white" style="border-radius:20px;"><i class="mdi mdi-library-plus"></i> Add More</a>
                                    </div>
                                    <div class="col-lg-12 text-center mt-3">
                                        <button type="submit" class="btn btn-success text-white"><i class="fas fa-save"></i> Submit</button>
                                    </div>
                                </div>
                            </section>
                        </form>
                        <form id="form-product-cta" method="post" action="<?= base_url('api/edit_product/') . $id . '/' . $section; ?>" class="mt-5" enctype="multipart/form-data">
                            <h3>CTA</h3>
                            <section>
                                <p><span class="text-danger">*</span> Wajib</p>
                                <label for="product-cta">CTA Description <span class="text-danger">*</span></label>
                                <textarea id="product-cta" name="product-cta" class="form-control mb-2" placeholder="Alhasil, kalau manfaatnya sih pasti banhyak banget. jadi jangan sampai kesalip kompetitormu yang lebih dulu"></textarea>
                                <div class="row mt-3">
                                    <div class="col-lg-12 text-center mt-3">
                                        <button type="submit" class="btn btn-success text-white"><i class="fas fa-save"></i> Submit</button>
                                    </div>
                                </div>
                            </section>
                        </form>
                        <form id="form-product-faq" method="post" action="<?= base_url('api/edit_product/') . $id . '/' . $section; ?>" class="mt-5" enctype="multipart/form-data">
                            <h3>FAQ</h3>
                            <section>
                                <p><span class="text-danger">*</span> Wajib</p>
                                <div id="multi-faq"></div>
                                <div class="row mt-3">
                                    <div class="col-lg-12 text-center">
                                        <a onclick="addFaq()" class="btn btn-warning text-white" style="border-radius:20px;"><i class="mdi mdi-library-plus"></i> Add More</a>
                                    </div>
                                    <div class="col-lg-12 text-center mt-3">
                                        <button type="submit" class="btn btn-success text-white"><i class="fas fa-save"></i> Submit</button>
                                    </div>
                                </div>
                            </section>
                        </form>
                        <form id="form-product-creator" method="post" action="<?= base_url('api/edit_product/') . $id . '/' . $section; ?>" class="mt-5" enctype="multipart/form-data">
                            <h3>Creator & Co</h3>
                            <section>
                                <p><span class="text-danger">*</span> Wajib</p>
                                <div id="multi-creator" class="row"></div>
                                <div class="row mt-3">
                                    <div class="col-lg-12 text-center">
                                        <a onclick="addCreator()" class="btn btn-warning text-white" style="border-radius:20px;"><i class="mdi mdi-library-plus"></i> Add More</a>
                                    </div>
                                    <div class="col-lg-12 text-center mt-3">
                                        <button type="submit" class="btn btn-success text-white"><i class="fas fa-save"></i> Submit</button>
                                    </div>
                                </div>
                            </section>
                        </form>
                        <form id="form-product-ps-disclaimer" method="post" action="<?= base_url('api/edit_product/') . $id . '/' . $section; ?>" class="mt-5">
                            <h3>PS & Disclaimer</h3>
                            <section>
                                <p><span class="text-danger">*</span> Wajib</p>
                                <div id="multi-ps-disclaimer"></div>
                                <div class="row mt-3">
                                    <div class="col-lg-12 text-center">
                                        <a onclick="addPsDisclaimer()" class="btn btn-warning text-white" style="border-radius:20px;"><i class="mdi mdi-library-plus"></i> Add More</a>
                                    </div>
                                    <div class="col-lg-12 text-center mt-3">
                                        <button type="submit" class="btn btn-success text-white"><i class="fas fa-save"></i> Submit</button>
                                    </div>
                                </div>
                            </section>
                        </form>
                        <!-- </div> -->
                        </form>
                        <!-- <div class="row mt-2">
                            <div class="col-lg-12">
                                <button class="btn btn-info float-end waves-effect waves-dark"><i class="mdi mdi-content-save-settings"></i> Save Draft</button>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->