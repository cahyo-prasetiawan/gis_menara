<?php // routes/breadcrumbs.php

// Home
Breadcrumbs::for('dasboard', function ($trail) {
    $trail->push('Dasboard', route('dasboard'));
});

// Home > Blog
Breadcrumbs::for('proveider', function ($trail) {
    $trail->parent('dasboard');
    $trail->push('Data Proveider', route('provider.index'));
});

Breadcrumbs::for('proveider.create', function ($trail) {
    $trail->parent('proveider');
    $trail->push('Tambah Data Proveider', route('provider.create'));
});

Breadcrumbs::for('proveider.edit', function ($trail) {
    $trail->parent('proveider');
    $trail->push('Edit Data ', route('provider.edit'));
});

Breadcrumbs::for('pengguna', function ($trail) {
    $trail->parent('dasboard');
    $trail->push('Data Pengguna ', route('pengguna.index'));
});

Breadcrumbs::for('pengguna.create', function ($trail) {
    $trail->parent('pengguna');
    $trail->push('Tambah Data Pengguna ', route('pengguna.create'));
});

Breadcrumbs::for('pegawai', function ($trail) {
    $trail->parent('dasboard');
    $trail->push('Data Pegawai ', route('pegawai.index'));
});

Breadcrumbs::for('pegawai.create', function ($trail) {
    $trail->parent('pegawai');
    $trail->push('Tambah Data Pegawai', route('pegawai.create'));
});

Breadcrumbs::for('kecamatan', function ($trail) {
    $trail->parent('dasboard');
    $trail->push('Data Kecamatan ', route('kecamatan.index'));
});

Breadcrumbs::for('kecamatan.create', function ($trail) {
    $trail->parent('kecamatan');
    $trail->push('Tambah Data kecamatan', route('kecamatan.create'));
});

Breadcrumbs::for('menara', function ($trail) {
    $trail->parent('dasboard');
    $trail->push('Data Menara ', route('menara.index'));
});

Breadcrumbs::for('menara.create', function ($trail) {
    $trail->parent('menara');
    $trail->push('Tambah Data Menara', route('menara.create'));
});

Breadcrumbs::for('menara.edit', function ($trail) {
    $trail->parent('menara');
    $trail->push('Edit Data Menara', route('menara.edit'));
});

Breadcrumbs::for('myprofile', function ($trail) {
    $trail->parent('dasboard');
    $trail->push('My Profile ', route('myprofile'));
});

Breadcrumbs::for('jenis', function ($trail) {
    $trail->parent('dasboard');
    $trail->push('Data Jenis Menara', route('jenis.index'));
});

Breadcrumbs::for('jenis.create', function ($trail) {
    $trail->parent('jenis');
    $trail->push('Tambah Data Jenis Menara', route('jenis.create'));
});

Breadcrumbs::for('peta', function ($trail) {
    $trail->parent('dasboard');
    $trail->push('Peta Persebaran Menara', route('peta'));
});

Breadcrumbs::for('retribusi', function ($trail) {
    $trail->parent('dasboard');
    $trail->push('Data Retribusi', route('retribusi.index'));
});

Breadcrumbs::for('retribusi.create', function ($trail) {
    $trail->parent('retribusi');
    $trail->push('Tambah Data Retribusi', route('retribusi.create'));
});
