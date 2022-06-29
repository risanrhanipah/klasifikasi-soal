<?php
$connection = mysqli_connect("103.41.207.247", "root", "Root!@#$%@", "tryout") or die("Tidak bisa terhubungan ke database");
$sqljenjang = "SELECT * FROM `jenjangs`";
$jenjang = mysqli_query($connection, $sqljenjang) or die(mysqli_error($connection));
?>
<?php include('wrapper/headerr.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <font face="Brush Script MT"><h1 class="m-0">Klasifikasi Soal</h1></font>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"></a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div id="atas"></div>
                    <form action="action.php" method="post" target="_blank">
                        <div class="row">
                            <div class="col-xs-5 col-sm-5 col-md-5">
                                <div class="form-group">
                                    <strong>Jenjang</strong>
                                    <select name="jenjang" id="jenjang" class="form-control">
                                        <option disabled selected>pilih jenjang</option>
                                        <?php
                                        while ($list = mysqli_fetch_array($jenjang)) {
                                        ?>
                                            <option value="<?= $list['id'] ?>"><?= $list['jenjang'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-5 col-sm-5 col-md-5">
                                <div class="form-group">
                                    <strong>Matpel</strong>
                                    <select name="matpel" id="matpel" class="form-control">
                                        <option disabled selected>pilih matpel</option>
                                        <?php
                                        while ($list = mysqli_fetch_array($matpel)) {
                                        ?>
                                            <option value="<?= $list['id'] ?>"><?= $list['nama'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- TABEL SOAL -->

                        <div class="row">
                            <div class="col-12">

                                <div id="tablesoal"></div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php include('wrapper/footerr.php'); ?>