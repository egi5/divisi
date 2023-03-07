<form autocomplete="off" class="row g-3 mt-3" action="<?= site_url() ?>divisi/<?= $divisi['id'] ?>" method="POST">

    <?= csrf_field() ?>

    <input type="hidden" name="_method" value="PUT">

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


        $('#form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $('#tombolUpdate').html('Tunggu <i class="fa-solid fa-spin fa-spinner"></i>');
                $('#tombolUpdate').prop('disabled', true);
            },
            complete: function() {
                $('#tombolUpdate').html('Update <i class="fa-fw fa-solid fa-check"></i>');
                $('#tombolUpdate').prop('disabled', false);
            },
            success: function(response) {
                if (response.error) {
                    let err = response.error;

                    if (err.error_nama) {
                        $('.error-nama').html(err.error_nama);
                        $('#nama').addClass('is-invalid');
                    } else {
                        $('.error-nama').html('');
                        $('#nama').removeClass('is-invalid');
                        $('#nama').addClass('is-valid');
                    }
                }
                if (response.success) {
                    $('#my-modal').modal('hide')
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.success,
                    }).then((value) => {
                        $('#tabel').DataTable().ajax.reload();
                        Toast.fire({
                            icon: 'success',
                            title: response.success
                        })
                    })
                }
            },
            error: function(e) {
                alert('Error \n' + e.responseText);
            }
        });
    })
    })
    
    
</script>