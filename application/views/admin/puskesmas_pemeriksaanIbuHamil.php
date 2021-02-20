<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Daftar Pemeriksaan Ibu hamil</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <table class="mb-0 table" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Pemeriksaan/th>
                                    <th>Nama</th>
                                    <th>Pekerjaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=0; foreach ($pemeriksaans as $value) {  $no++;?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?php echo $value->id_pemeriksaan; ?></td>
                                        <td><?= $value->nama." ( ".$value->umur." Tahun )";?></td>
                                        <td><?php echo $value->pekerjaan; ?></td>
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