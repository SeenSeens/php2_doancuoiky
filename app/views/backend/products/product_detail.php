<?php
$product = $this->data['sub_content']['product'];
$categories = $this->data['sub_content']['terms'];
?>
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">eCommerce</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Products Details</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <button type="button" class="btn btn-primary">Settings</button>
            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                <a class="dropdown-item" href="javascript:;">Another action</a>
                <a class="dropdown-item" href="javascript:;">Something else here</a>
                <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
            </div>
        </div>
    </div>
</div>
<!--end breadcrumb-->
<div class="card">
    <div class="row g-0">
        <div class="col-md-4 border-end">
            <img src="<?= __WEB_ROOT__ . '/public/uploads/' . $product['thumbnail']; ?>" class="img-fluid" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h4 class="card-title"><?= $product['title']; ?></h4>
                <div class="d-flex gap-3 py-3">
                    <div>0 reviews</div>
                    <div class="text-success"><i class='bx bxs-cart-alt align-middle'></i> 0 orders</div>
                </div>
                <div class="mb-3">
                    <span class="price h4">Giá bán <?= $product['price'] ?></span>
                    <span class="text-muted">VNĐ</span>
                </div>
                <p class="card-text fs-6 fw-light"><?= $product['excerpt'] ?></p>
                <dl class="row">
                    <dt class="col-sm-3">Chuyên mục</dt>
                    <?php foreach ($categories as $category) : ?>
                    <dd class="col-sm-9"><?= $product['category_id'] == $category['id'] ? $category['name'] : '' ?></dd>
                    <?php endforeach; ?>
                </dl>
                <hr>
                <div class="row row-cols-auto row-cols-1 row-cols-md-3 align-items-center">
                    <div class="col">
                        <label class="form-label">Quantity</label>
                        <div class="input-group input-spinner">
                            <button class="btn btn-white" type="button" id="button-plus"> + </button>
                            <input type="text" class="form-control" value="1">
                            <button class="btn btn-white" type="button" id="button-minus"> − </button>
                        </div>
                    </div>
                </div>
                <div class="d-flex gap-3 mt-3">
                    <a href="#" class="btn btn-primary">Buy Now</a>
                    <a href="#" class="btn btn-outline-primary"><span class="text">Add to cart</span> <i class='bx bxs-cart-alt'></i></a>
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <div class="card-body">
        <ul class="nav nav-tabs nav-primary mb-0" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class='bx bx-comment-detail font-18 me-1'></i>
                        </div>
                        <div class="tab-title"> Product Description </div>
                    </div>
                </a>
            </li>
        </ul>
        <div class="tab-content pt-3">
            <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                <?= $product['description'] ?>
            </div>
        </div>
    </div>

</div>