<?php echo $this->extend('layout/template'); ?>

<?php echo $this->section('content'); ?>
<a href="/add" class="btn btn-info my-3">Tambah Data</a>
<?= $this->include('layout/svg_alert'); ?>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
            <use xlink:href="#check-circle-fill" />
        </svg>
        <div>
            <strong><?= esc(session()->getFlashdata('pesan')); ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?>

<form action="/" method="post">
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="keyword" placeholder="Masukkan Keyword">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
    </div>
</form>


<table class="table table-hover table-bordered table-responsive" style="vertical-align: middle;">
    <thead class="bg bg-info">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">No Hp</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1 + (3 * ($currentPage - 1)); ?>
        <?php if (!empty($data_training) && is_array($data_training)) : ?>
            <?php foreach ($data_training as $data) : ?>
                <tr>
                    <th><?= esc($no++); ?></th>
                    <td><?= esc($data["nama"]); ?></td>
                    <td><?= esc($data["alamat"]); ?></td>
                    <td><?= esc($data["no_hp"]); ?></td>
                    <td style="width: 120px;">
                        <a href="/edit/<?= esc($data['id']); ?>" class="btn btn-warning text-light"><i class="fa fa-edit"></i></a>
                        <form action="/delete/<?= esc($data['id']); ?>" method="post" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?')"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
    </tbody>
</table>

<?php else : ?>
    <h1>Data Tidak Ada</h1>
<?php endif; ?>

<?= $pager->links('ronald_koeman', 'data_training_pager'); ?>
<?php echo $this->endSection(); ?>