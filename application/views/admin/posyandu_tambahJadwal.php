<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Jadwal Posyandu</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Jadwal</h5>
                        <form class="" action="<?= base_url('admin/posyandu/addJadwal') ?>" method="post">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="exampleEmail11" class="">ID Jadwal</label><input name="id_jadwal" id="exampleEmail11" type="text" class="form-control" required></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="examplePassword11" class="">Nama Petugas</label><input name="nama_petugas" id="examplePassword11" type="text" class="form-control" required></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="exampleCity" class="">Bulan</label><input name="bulan" id="exampleCity" type="text" class="form-control" required></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="exampleState" class="">tahun</label><input name="tahun" id="exampleState" type="text" class="form-control" required></div>
                                </div>
                            </div>
                            <div class="form-row">
                            <!-- <?= var_dump($wilayah) ?> -->
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="exampleZip" class="">Wilayah</label>
                                        <select class="mb-2 form-control" name="wilayah" required>
                                        <option selected>Pilih Wilayah</option>
                                        <?php foreach ($wilayah as $key => $value) { ?>
                                            <option value="<?= $value['nama_wilayah'] ?>"><?= $value['nama_wilayah'] ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button class="mt-2 btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('#myTable').DataTable();
                });
            </script>
        </div>
    </div>
</div>