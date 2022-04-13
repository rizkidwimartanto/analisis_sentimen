<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<h3 class="my-3">Form Edit Data</h3>
<form action="/pages/editing/<?= $data['id']; ?>" method="POST">
    <?= csrf_field(); ?>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $data['nama']; ?>" autofocus>
        <div class="invalid-feedback">
            <?= $validation->getError('nama'); ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : '' ?>" id="alamat" name="alamat" value="<?= (old('alamat')) ? old('alamat') : $data['alamat']; ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('alamat'); ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="no_hp" class="form-label">No Hp</label>
        <input type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : '' ?>" id="no_hp" name="no_hp" value="<?= (old('no_hp')) ? old('no_hp') : $data['no_hp']; ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('no_hp'); ?>
        </div>
    </div>
    <!-- <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> -->
    <button type="submit" class="btn btn-primary">Ubah</button>
</form>
<?= $this->endSection(); ?>