<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('transaction', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Transaction', route('dashboard'));
});


Breadcrumbs::for('detailOrder', function ($trail) {
    $trail->parent('transaction');
    $trail->push('Detail Order', route('detailOrder'));
});


//breadcrumb category
Breadcrumbs::for('category', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Category', route('category.index'));
});

Breadcrumbs::for('category.create', function ($trail) {
    $trail->parent('category');
    $trail->push('Tambah Data', route('category.create'));
});

Breadcrumbs::for('category.edit', function ($trail, $category) {
    $trail->parent('category');
    $trail->push('Edit Data', route('category.edit', $category));
});

//breadcrumb product
Breadcrumbs::for('product.category', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Pilih Category', route('product.category'));
});

Breadcrumbs::for('product', function ($trail, $category) {
    $trail->parent('product.category');
    $trail->push('Product', route('product.index', $category));
});

Breadcrumbs::for('product.create', function ($trail, $category) {
    $trail->parent('product', $category);
    $trail->push('Tambah Data', route('product.create', $category));
});

Breadcrumbs::for('product.edit', function ($trail, $category, $product) {
    $trail->parent('product.category');
    $trail->push('Edit Data', route('product.edit', [$category, $product]));
});


//breadcrumbs order
Breadcrumbs::for('penjualan', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Penjualan', route('order.index'));
});

Breadcrumbs::for('penjualan.detail', function ($trail, $order) {
    $trail->parent('penjualan');
    $trail->push('Detail Penjualan', route('order.show', $order));
});

//breadcrumb report penjualan
Breadcrumbs::for('report', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Report', route('report.index'));
});

Breadcrumbs::for('change.periode', function ($trail) {
    $trail->parent('report');
    $trail->push('Ubah Periode', route('report.changePeriode'));
});

//breadcrumb profile
Breadcrumbs::for('profile', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Profile', route('profile.index'));
});

Breadcrumbs::for('profile.edit', function ($trail, $profile) {
    $trail->parent('profile');
    $trail->push('Edit Profile', route('profile.edit', $profile));
});

//user
// Breadcrumbs::for('user', function ($trail) {
//     $trail->parent('user');
//     $trail->push('User', route('user.index'));
// });

//breadcrumb chart
// Breadcrumbs::for('dashboard', function ($trail) {
//     $trail->parent('dashboard');
//     $trail->push('Dashboard', route('dashboard'));
// });
