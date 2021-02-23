<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Daftar Pasien</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <table class="display" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Pasien</th>
                                    <th>Nama Anak</th>
                                    <th>TTL</th>
                                    <th>Nama Ibu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=0; foreach ($pendaftaran as $value) {  $no++;?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?php echo $value->no_pasien; ?></td>
                                        <td><?php echo $value->nama_anak; ?></td>
                                        <td><?php echo $value->tempat_lahir.", ".$value->tanggal_lahir; ?></td>
                                        <td><?php echo $value->nama_ibu; ?></td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>
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