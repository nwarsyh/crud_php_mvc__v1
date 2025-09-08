<div class="container-fluid">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= BASEURL?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $Data['subjudullama']; ?></li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-light">Data Karyawan</h6>
                <button class="d-none d-sm-inline-block btn btn-sm btn-light shadow-sm tombolModalCreateKaryawan" data-toggle="modal" data-target="#tambahDataKaryawan">
                    <i class="fas fa-folder-plus fa-sm text-dark-50"></i> Tambah Data
                </button>
            </div>
        </div>
        <div class="card-body">
            <?php AlertCore::pemberitahuan(); ?>
            <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-gradient-light text-center">
                    <tr>
                        <th scope="row">No</th>
                        <th>Aksi</th>
                        <th>NIP</th>
                        <th>Nama Karyawan</th>
                        <th>Jenis Kelamin</th>
                        <th>Departemen</th>
                        <th>Foto</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $No = 1; ?>
                    <?php foreach ($Data['karyawan'] as $KaryawanData) : ?>
                    <tr>
                        <td class="text-center" width="5%"><?= $No; ?></td>
                        <td class="text-center" width="10%">
                            <a href="#" class="btn btn-outline-warning btn-circle btn-sm tombolModalUpdateKaryawan" title="Update Karyawan" data-toggle="modal" data-target="#updateDataKaryawan<?= $KaryawanData['mvc_id_karyawan']; ?>">
                                <i class="fas fa-exclamation-triangle"></i>
                            </a>
                            <a href="<?= BASEURL;?>/Karyawan/DeleteKaryawan/<?= $KaryawanData['mvc_id_karyawan']; ?>" class="btn btn-outline-danger btn-circle btn-sm" title="Delete Karyawan">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                        <td><?= $KaryawanData['mvc_nip_karyawan']; ?></td>
                        <td><?= $KaryawanData['mvc_nama_karyawan']; ?></td>
                        <td><?= $KaryawanData['mvc_jk_karyawan']; ?></td>
                        <td><?= $KaryawanData['crudmvc_nama_departemen'] ?? 'Departemen tidak diketahui'; ?></td>
                        <td><img src="<?= BASEURL;?>/asset/img/img_karyawan/<?= $KaryawanData['mvc_foto_karyawan'];?>" width="50" height="50"></td>
                    </tr>
                        <!--    Start Edit Karyawan-->
                        <div class="modal fade" id="updateDataKaryawan<?= $KaryawanData['mvc_id_karyawan']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateDataKaryawan" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateDataKaryawanLabel">Update Data Karyawan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= BASEURL; ?>/Karyawan/UpdateKaryawan" method="post" enctype="multipart/form-data">
                                            <div class="mb-1">
                                                <label for="nipkaryawan" class="form-label">NIP Karyawan</label>
                                                <input type="hidden" class="form-control form-control-sm" id="idkaryawan" name="idkaryawan" value="<?= $KaryawanData['mvc_id_karyawan']; ?>">
                                                <input type="text" class="form-control form-control-sm" id="nipkaryawan" name="nipkaryawan" value="<?= $KaryawanData['mvc_nip_karyawan']; ?>" readonly>
                                            </div>
                                            <div class="mb-1">
                                                <label for="namakaryawan" class="form-label">Nama Karyawan</label>
                                                <input type="text" class="form-control form-control-sm" id="namakaryawan" name="namakaryawan" value="<?= $KaryawanData['mvc_nama_karyawan']; ?>">
                                            </div>

                                            <div class="mb-1">
                                                <label for="jeniskelamin" class="form-label">Jenis Kelamin</label><br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jeniskelamin" id="lakilaki" value="Laki - Laki"
                                                    <?= ($KaryawanData['mvc_jk_karyawan'] === 'Laki - Laki') ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="lakilaki">Laki - Laki</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jeniskelamin" id="perempuan" value="Perempuan"
                                                    <?= ($KaryawanData['mvc_jk_karyawan'] === 'Perempuan') ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                                </div>
                                            </div>

                                            <div class="mb-1">
                                                <label for="unitkaryawan" class="form-label">Departmen/Unit</label>
                                                <select class="form-select form-control form-control-sm" aria-label="Default select example" id="unitkaryawan" name="unitkaryawan" required>
                                                    <?php foreach ($Data['departemenkaraywan'] as $DepartemenKaraywan) : ?>
                                                        <option value="<?= $DepartemenKaraywan['crudmvc_id_departemen']; ?>"
                                                            <?= ($DepartemenKaraywan['crudmvc_id_departemen'] == $KaryawanData['mvc_id_departemen']) ? 'selected' : '' ?>>
                                                            <?= $DepartemenKaraywan['crudmvc_nama_departemen']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="mb-1">
                                                <label for="fotoprofil" class="form-label">Foto Karyawan</label>
                                                <input type="hidden" class="form-control form-control-sm" id="fotoprofillama" name="fotoprofillama" value="<?= $KaryawanData['mvc_foto_karyawan']; ?>">
                                                <input type="file" class="form-control form-control-sm" id="fotoprofil" name="fotoprofil">
                                                <img src="<?= BASEURL;?>/asset/img/img_karyawan/<?= $KaryawanData['mvc_foto_karyawan'];?>" width="50" height="50">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--    End Edit Karyawan-->
                        <?php $No++; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!--    Start Tambah Karyawan-->
    <div class="modal fade" id="tambahDataKaryawan" tabindex="-1" role="dialog" aria-labelledby="tambahDataKaryawan" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataKaryawanLabel">Tambah Data Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL; ?>/Karyawan/CreateKaryawan" method="post" enctype="multipart/form-data">
                        <div class="mb-1">
                            <label for="nipkaryawan" class="form-label">NIP Karyawan<sup class="text-danger"> *</sup></label>
                            <div class="input-group has-validation">
                                <span class="input-group-text form-control-sm" id="inputGroupPrepend">RSP</span>
                                <input type="text" class="form-control form-control-sm" id="nipkaryawan" name="nipkaryawan" aria-describedby="inputGroupPrepend" required>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="namakaryawan" class="form-label">Nama Karyawan<sup class="text-danger"> *</sup></label>
                            <input type="text" class="form-control form-control-sm" id="namakaryawan" name="namakaryawan" required>
                        </div>
                        <div class="mb-1">
                            <label for="jeniskelamin" class="form-label">Jenis Kelamin<sup class="text-danger"> *</sup></label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jeniskelamin" id="lakilaki" value="Laki - Laki">
                                <label class="form-check-label" for="lakilaki">Laki - Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jeniskelamin" id="perempuan" value="Perempuan">
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="unitkaryawan" class="form-label">Departmen/Unit<sup class="text-danger"> *</sup></label>
                            <select class="form-select form-control form-control-sm" aria-label="Default select example" id="unitkaryawan" name="unitkaryawan" required>
                                <option selected>--Pilih Departemen--</option>
                                <?php foreach ($Data['departemenkaraywan'] as $DepartemenKaraywan) : ?>
                                    <option value="<?= $DepartemenKaraywan['crudmvc_id_departemen']; ?>"><?= $DepartemenKaraywan['crudmvc_nama_departemen']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="fotoprofil" class="form-label">Foto Karyawan<sup class="text-danger"> *</sup></label>
                            <input type="file" class="form-control form-control-sm" id="fotoprofil" name="fotoprofil" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<!--    End Tambah Karyawan-->
</div>