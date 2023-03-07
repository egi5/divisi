<form autocomplete="off" class="row g-3 mt-3" action="<?= site_url() ?>divisi/<?= $divisi['id'] ?>" method="POST" id="form">

    <?= csrf_field() ?>

    <input type="hidden" name="_method" value="<?= $divisi['id']; ?>">

    <div class="row mb-3">
        <label for="nama" class="col-sm-3 col-form-label">Nama Divisi</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $divisi['nama']; ?>">
                <div class="invalid-feedback"></div>
            </div>
    </div>

    <div class="row mb-3">
        <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= old('deskripsi', $divisi['deskripsi']); ?>">
                <div class="invalid-feedback"></div>
            </div>
    </div>

    <div class="text-center">
        <a class="btn px-5 btn-outline-danger" href="<?= site_url() ?>divisi">Batal 
            <i class="fa-fw fa-solid fa-xmark"></i>
        </a>
        <button id="#tombolUpdate" class="btn px-5 btn-outline-primary" type="submit">Update<i class="fa-fw fa-solid fa-check"></i></button>
    </div>
</form>

<?= $this->include('MyLayout/js') ?>

<script>
    $(document).ready(function() 
    {
        // Alert
        var op = <?= (!empty(session()->getFlashdata('pesan')) ? json_encode(session()->getFlashdata('pesan')) : '""'); ?>;
        if (op != '') {
            Toast.fire({
                icon: 'success',
                title: op
            })
        }

        // Bahan Alert
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            background: '#63ec88',
            color: '#fff',
            iconColor: '#fff',
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    })
    
</script>