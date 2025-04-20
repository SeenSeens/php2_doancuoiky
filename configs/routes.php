<?php
$routes = [
    'default_controller' => 'HomeController',
    'gioi-thieu' => 'AboutController',
    'lien-he' => 'ContactController',
    'tin-tuc' => 'NewsController',
    'tin-tuc/(.*)' => 'NewsController/detail/$1',
    'cua-hang' => 'ShopController',




    // Dashboard
    'admin' => 'admin/DashboardController',
    'admin/dashboard' => 'DashboardController/index',

    // PostController
    'admin/posts' => 'admin/PostController',
    'admin/post-new' => 'admin/PostController/create',
    'admin/post/edit_id=(.+)' => 'admin/PostController/edit/$1',
    'admin/post/delete' => 'admin/PostController/delete',

    // PageController
    'admin/page' => 'admin/PageController',
    'admin/page-new' => 'admin/PageController/create',
    'admin/page/edit_id=(.+)' => 'admin/PageController/edit/$1',
    'admin/page/delete' => 'admin/PageController/delete',

    // ProductController
    'admin/product' => 'admin/ProductController',
    'admin/product-new' => 'admin/ProductController/create',
    'admin/product/edit_id=(.+)' => 'admin/ProductController/edit/$1',
    'admin/product/delete' => 'admin/ProductController/delete',

    // CategoryController
    'admin/category' => 'admin/taxonomy/CategoryController/index',
    'admin/category-new' => 'admin/taxonomy/CategoryController/create',
    'admin/category/(.+)' => 'admin/taxonomy/CategoryController/category/$1',
    'admin/category/delete' => 'admin/taxonomy/CategoryController/delete',
    'admin/category/edit_id=(.+)' => 'admin/taxonomy/CategoryController/edit/$1',

    // PostTagController
    'admin/post-tag' => 'admin/taxonomy/PostTagController/index',
    'admin/post-tag-new' => 'admin/taxonomy/PostTagController/create',
    'admin/post-tag/(.+)' => 'admin/taxonomy/PostTagController/category/$1',
    'admin/post-tag/delete' => 'admin/taxonomy/PostTagController/delete',
    'admin/post-tag/edit_id=(.+)' => 'admin/taxonomy/PostTagController/edit/$1',

    // ProductCategoryController
    'admin/product-cat' => 'admin/taxonomy/ProductCategoryController/index',
    'admin/product-cat-new' => 'admin/taxonomy/ProductCategoryController/create',
    'admin/product-cat/(.+)' => 'admin/taxonomy/ProductCategoryController/category/$1',
    'admin/product-cat/delete' => 'admin/taxonomy/ProductCategoryController/delete',
    'admin/product-cat/edit_id=(.+)' => 'admin/taxonomy/ProductCategoryController/edit/$1',

    // ProductTagController
    'admin/product-tag' => 'admin/taxonomy/ProductTagController/index',
    'admin/product-tag-new' => 'admin/taxonomy/ProductTagController/create',
    'admin/product-tag/(.+)' => 'admin/taxonomy/ProductTagController/category/$1',
    'admin/product-tag/delete' => 'admin/taxonomy/ProductTagController/delete',
    'admin/product-tag/edit_id=(.+)' => 'admin/taxonomy/ProductTagController/edit/$1',

    // ProductBrandController
    'admin/product-brand' => 'admin/taxonomy/ProductBrandController/index',
    'admin/product-brand-new' => 'admin/taxonomy/ProductBrandController/create',
    'admin/product-brand/(.+)' => 'admin/taxonomy/ProductBrandController/category/$1',
    'admin/product-brand/delete' => 'admin/taxonomy/ProductBrandController/delete',
    'admin/product-brand/edit_id=(.+)' => 'admin/taxonomy/ProductBrandController/edit/$1',


    // MediaController
    'admin/upload' => 'admin/MediaController',
    'admin/media-new' => 'admin/MediaController/create',

    // UserController
    'admin/user' => 'admin/UserController',
    'admin/user/add-user' => 'admin/UserController/create',
    'admin/user/profile' => 'admin/UserController/profile',
    'admin/user/profile/(.+)' => 'admin/UserController/profile/$1',
    'admin/user/delete' => 'admin/UserController/delete',

    // CommentController
    'admin/comments' => 'admin/CommentController',

    // AuthController
    'admin/login' => 'admin/AuthController/login',
    'admin/register' => 'admin/AuthController/register',
    'admin/forgot-password' => 'admin/AuthController/forgotPassword',
    'admin/logout' => 'admin/AuthController/logout',
];

?>