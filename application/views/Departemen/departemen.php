<div class="container-fluid">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= BASEURL?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $Data['subjudulnamam']; ?></li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-light">Data Departemen</h6>
                <button class="d-none d-sm-inline-block btn btn-sm btn-light shadow-sm tombolModalCreateDepartemen" data-toggle="modal" data-target="#tambahDataDepartemen">
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
                        <th>Kategori</th>
                        <th>Nama</th>
                        <th>Kode</th>
                        <th>Keterangan</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $No = 1; ?>
                    <?php foreach ($Data['departemen'] as $DepartemenData) : ?>
                    <tr>
                        <td class="text-center" width="5%"><?= $No; ?></td>
                        <td class="text-center" width="10%">
                            <a href="#" class="btn btn-outline-warning btn-circle btn-sm tombolModalUpdateDepartemen" title="Update Departemen" data-toggle="modal" data-target="#updateDataDepartemen<?= $DepartemenData['crudmvc_id_departemen']; ?>">
                                <i class="fas fa-exclamation-triangle"></i>
                            </a>
                            <a href="<?= BASEURL;?>/Departemen/DeleteDepartemen/<?= $DepartemenData['crudmvc_id_departemen']; ?>" class="btn btn-outline-danger btn-circle btn-sm" title="Delete Departemen">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                        <td><?= $DepartemenData['crudmvc_kategori_departemen']; ?></td>
                        <td><?= $DepartemenData['crudmvc_nama_departemen']; ?></td>
                        <td><?= $DepartemenData['crudmvc_kode_departemen']; ?></td>
                        <td><?= $DepartemenData['crudmvc_departemen_ket']; ?></td>

                    </tr>
                        <!--Start Modal Edit Departemen-->
                        <div class="modal fade" id="updateDataDepartemen<?= $DepartemenData['crudmvc_id_departemen']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateDataDepartemen" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateDataDepartemenLabel">Update Data Departemen</h5>
                                        <button type="button" class="btn" data-dismiss="modal" aria-label="Tutup">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= BASEURL; ?>/Departemen/UpdateDepartemen" method="post">
                                            <input type="hidden" class="form-control" id="id" name="id">
                                            <div class="mb-1">

                                                <input type="hidden" class="form-control form-control-sm" id="iddepartemen" name="iddepartemen" value="<?= $DepartemenData['crudmvc_id_departemen']; ?>">
                                                <label for="namadepartemen" class="form-label">Nama Departemen<sup class="text-danger"> *</sup></label>
                                                <label for="kategoridepartemen" class="form-label">Kategori Departemen<sup class="text-danger"> *</sup></label>
                                                <select class="form-select form-control form-control-sm" aria-label="Default select example" id="kategoridepartemen" name="kategoridepartemen" required>
                                                    <option value="<?= $DepartemenData['crudmvc_kategori_departemen']; ?>"><?= $DepartemenData['crudmvc_kategori_departemen']; ?></option>
                                                    <option value="Medis">Medis</option>
                                                    <option value="Non Medis">Non Medis</option>
                                                    <option value="Manajemen">Manajemen</option>
                                                </select>
                                            </div>
                                            <div class="mb-1">
                                                <label for="namadepartemen" class="form-label">Nama Departemen<sup class="text-danger"> *</sup></label>
                                                <input type="text" class="form-control form-control-sm" id="namadepartemen" name="namadepartemen" value="<?= $DepartemenData['crudmvc_nama_departemen']; ?>">
                                            </div>
                                            <div class="mb-1">
                                                <label for="kodedepartemen" class="form-label">Kode Departemen<sup class="text-danger"> *</sup></label>
                                                <input type="text" class="form-control form-control-sm" id="kodedepartemen" name="kodedepartemen" value="<?= $DepartemenData['crudmvc_kode_departemen']; ?>" style="text-transform: uppercase">
                                            </div>
                                            <div class="mb-1">
                                                <label for="keterangandepartemen" class="form-label">Keterangan Departemen</label>
                                                <input type="text" class="form-control form-control-sm" id="keterangandepartemen" name="keterangandepartemen" value="<?= $DepartemenData['crudmvc_departemen_ket']; ?>">
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
                        <!--End Modal Edit Departemen-->
                        <?php $No++;?>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--Start Modal Tambah Departemen-->
    <div class="modal fade" id="tambahDataDepartemen" tabindex="-1" role="dialog" aria-labelledby="tambahDataDepartemen" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataDepartemenLabel">Tambah Data Departemen</h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL; ?>/Departemen/CreateDepartemen" method="post">
                        <div class="mb-1">
                        <label for="kategoridepartemen" class="form-label">Kategori Departemen<sup class="text-danger"> *</sup></label>
                            <select class="form-select form-control form-control-sm" aria-label="Default select example" id="kategoridepartemen" name="kategoridepartemen" required>
                                <option selected>--Pilih Kategori--</option>
                                <option value="Medis">Medis</option>
                                <option value="Non Medis">Non Medis</option>
                                <option value="Manajemen">Manajemen</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="namadepartemen" class="form-label">Nama Departemen<sup class="text-danger"> *</sup></label>
                            <input type="text" class="form-control form-control-sm" id="namadepartemen" name="namadepartemen" required>
                        </div>
                        <div class="mb-1">
                            <label for="kodedepartemen" class="form-label">Kode Departemen<sup class="text-danger"> *</sup></label>
                            <input type="text" class="form-control form-control-sm" id="kodedepartemen" name="kodedepartemen" style="text-transform: uppercase" required>
                        </div>
                        <div class="mb-1">
                            <label for="keterangandepartemen" class="form-label">Keterangan Departemen</label>
                            <input type="text" class="form-control form-control-sm" id="keterangandepartemen" name="keterangandepartemen">
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
    <!--End Modal Tambah Departemen-->
</div>