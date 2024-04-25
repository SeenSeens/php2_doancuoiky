<?php
$product_json = json_encode($this->data['sub_content']['product']);
//$a = $this->data['sub_content']['product'];
//echo '<pre>';
//var_dump($a[0]['category_id']);
//echo '<pre>';
?>
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Tables</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Data Table</li>
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
<h6 class="mb-0 text-uppercase">Sản phẩm</h6>
<hr/>
<div class="card" ng-controller="productController">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th ng-repeat="col in Columns">{{ col }}</th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="product in products">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ product.title }}</td>
                    <td class="col-1 text-center">
                        <img ng-src="<?= __WEB_ROOT__ . '/public/images/'?>{{ product.thumbnail }}" alt="" class="img-fluid">
                    </td>
                    <td>{{ product.price }}</td>
                    <td>{{ product.discount }}</td>
                    <td>{{ categories[product.category_id] }}</td>
                    <td>
                        <button type="button" ng-click="deleteData(1)" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th ng-repeat="col in Columns">{{ col }}</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>