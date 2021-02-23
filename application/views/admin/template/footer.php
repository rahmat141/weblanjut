</div>
<script type="text/javascript" src="<?= base_url('assets/admin/scripts/main.js') ?>"></script>

</body>

</html>


<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/dataTables.jqueryui.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>


<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ]
            }]
        });
    });

    $(document).on('click', '#editJenisBayar', function() {
            const id = $(this).attr('data-id');
            const url = "<?= base_url('admin/puskesmas/getKategori/jenisBayar/'); ?>";
            const urlEdit = "<?= base_url('admin/puskesmas/editkategori/jenisBayar/'); ?>";
            $.ajax({
                url: url + id,
                type: "get",
                dataType: "json",
                success:(data) => {
                    const {pembayaran} = data;
                    $('#ModaleditJenisbayar form').attr("action", urlEdit + id);
                    $('#ModaleditJenisbayar #ModalBody #input-jenisPembayaran').val(pembayaran);
                }
            });
        });

        $(document).on('click', '#editKondisiHb', function() {
            const id = $(this).attr('data-id');
            const url = "<?= base_url('admin/puskesmas/getKategori/kondisiHb/'); ?>";
            const urlEdit = "<?= base_url('admin/puskesmas/editkategori/kondisiHb/'); ?>";
            $.ajax({
                url: url + id,
                type: "get",
                dataType: "json",
                success:(data) => {
                    const {kondisiHb} = data;
                    $('#ModalEditKondisiHb form').attr("action", urlEdit + id);
                    $('#ModalEditKondisiHb #ModalBody #input-kondisiHB').val(kondisiHb);
                }
            });
        });

        $(document).on('click', '#editLetakBayi', function() {
            const id = $(this).attr('data-id');
            const url = "<?= base_url('admin/puskesmas/getKategori/letakBayi/'); ?>";
            const urlEdit = "<?= base_url('admin/puskesmas/editkategori/letakBayi/'); ?>";
            $.ajax({
                url: url + id,
                type: "get",
                dataType: "json",
                success:(data) => {
                    const {letakBayi} = data;
                    $('#ModalEditLetakBayi form').attr("action", urlEdit + id);
                    $('#ModalEditLetakBayi #ModalBody #input-letakBayi').val(letakBayi);
                }
            });
        });
</script>

<!-- 
https://code.jquery.com/jquery-3.5.1.js
https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js
https://cdn.datatables.net/1.10.23/js/dataTables.jqueryui.min.js -->