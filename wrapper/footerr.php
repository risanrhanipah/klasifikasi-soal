<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; <?= date('Y'); ?> <a href="https://adminlte.io"></a>.</strong>
    <div class="float-right d-none d-sm-inline-block">

    </div>
</footer>

<!-- Control Sidebar -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="wrapper/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="wrapper/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="wrapper/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="wrapper/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="wrapper/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="wrapper/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="wrapper/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="wrapper/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="wrapper/plugins/moment/moment.min.js"></script>
<script src="wrapper/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="wrapper/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="wrapper/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="wrapper/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="wrapper/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="wrapper/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="wrapper/dist/js/pages/dashboard.js"></script>
<script src="//cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <script>
        $(document).ready(function() {
            $('#jenjang').on('change', function() {
                var valueid = $(this).val();
                if (valueid) {
                    $.ajax({
                        type: 'POST',
                        url: 'datamatpel.php',
                        data: 'idjenjang=' + valueid,
                        success: function(html) {
                            $('#matpel').html(html);
                        }
                    });
                } else {
                    $('#matpel').html('<option value="">Select matpel first</option>');
                }
            });

            $('#matpel').on('change', function() {
                var matpelid = $(this).val();
                if (matpelid) {
                    $.ajax({
                        type: 'POST',
                        url: 'datamatpel.php',
                        data: 'idmatpel=' + matpelid,
                        success: function(html) {
                            $('#tablesoal').html(html);
                            $(document).ready(function() {
                                $('#myTable').DataTable({
                                    "bPaginate": false,
                                    "bLengthChange": false,
                                    "bFilter": true,
                                    "bInfo": false,
                                    "bAutoWidth": false
                                });
                            });
                        }
                    });
                } else {
                    $('#tablesoal').html('<option value="">Select matpel first</option>');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable1').DataTable();
        });
        $(document).ready(function() {
            $('#myTable2').DataTable();
        });
        $(document).ready(function() {
            $('#myTable3').DataTable();
        });
        $(document).ready(function() {
            $('#myTable4').DataTable();
        });
        $(document).ready(function() {
            $('#myTable5').DataTable();
        });
        $(document).ready(function() {
            $('#myTable6').DataTable();
        });
        $(document).ready(function() {
            $('#myTable7').DataTable();
        });
    </script>
    </body>

    </html>