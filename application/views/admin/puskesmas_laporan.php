<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Laporan Puskesmas</div>
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
                                    <th>ID Pasien</th>
                                    <th>Nama</th>
                                    <th>Pekerjaan</th>
                                    <th>Suami</th>
                                    <th>Pekerjaan Suami</th>
                                    <th>Umur</th>
                                    <th>Alamat</th>
                                    <th>Kelurahan</th>
                                    <th>No Hp</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                foreach ($ibuhamils as $data) {
                                    $no++; ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data->nama ?></td>
                                        <td><?php echo $data->pekerjaan ?></td>
                                        <td><?php echo $data->nama_suami ?></td>
                                        <td><?php echo $data->pekerjaan_suami ?></td>
                                        <td><?php echo $data->umur ?></td>
                                        <td><?php echo $data->alamat ?></td>
                                        <td><?php echo $data->kelurahan ?></td>
                                        <td><?php echo $data->notelp ?></td>
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