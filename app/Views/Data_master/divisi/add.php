<?= $this->extend('MyLayout/template') ?>

<?= $this->section('content') ?>

<main class="p-md-3 p-2">
    <div class="d-flex mb-0">
        <div class="me-auto mb-1">
            <h3 style="color: #566573;">Tambah Divisi</h3>
        </div>
        <div class="me-2 mb-1">
            <a class="btn btn-sm btn-outline-dark" href="<?= site_url() ?>divisi"?>
                <i class="fa-fw fa-solid fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <hr class="mt-0 mb-4">

    <div class="col-md-10 mt-4 mb-5">

        <form autocomplete="off" class="row g-3 mt-3" action="<?= site_url() ?>divisi/create" method="POST">

            <div class="row mb-3">
                <label for="nama" class="col-sm-3 col-form-label">Nama Divisi</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama'); ?>">
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="note" class="col-sm-3 col-form-label">Deskripsi</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= old('deskripsi'); ?>">
                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <div class="text-center">
                <a class="btn px-5 btn-outline-danger" href="<?= site_url() ?>divisi">
                    Batal <i class="fa-fw fa-solid fa-xmark"></i>
                </a>
                <button class="btn px-5 btn-outline-primary" type="submit">Simpan<i class="fa-fw fa-solid fa-check"></i></button>
            </div>
        </form>

    </div>
</main>

<?= $this->include('MyLayout/js') ?>

<?= $this->endSection() ?>