<?php
    $connection = mysqli_connect("103.41.207.247", "root", "Root!@#$%@", "tryout") or die("Tidak bisa terhubungan ke database");
?>
<?php include('wrapper/headerr.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <font face="Brush Script MT"><h1 class="m-0">Soal <?=$_GET['matpel']; ?> <?=$_GET['jenjang']; ?></h1></font>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li> -->
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
            <h5>PAKET <?= $_GET['idpaket']; ?> </h5>
            <br>
            <table id="myTable7" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Soal</th>
                        <th>jawaban</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            $idpaket = $_GET['idpaket'];
                            $idmatpel = $_GET['idmatpel'];
                            $idjenjang = $_GET['idjenjang'];
                            $jenjang = $_GET['jenjang'];
                            $matpel = $_GET['nama'];
                            $query="SELECT * FROM soals s,matpels m WHERE id_type_new=$idpaket AND s.id_matpel=m.id and s.id_matpel=$idmatpel and m.id_jenjang=$idjenjang;";
                            $daftarsoal = mysqli_query($connection, $query);
                            $no = 1;
                            // print_r(mysqli_fetch_array($summary));
                            while ($row = mysqli_fetch_array($daftarsoal)) 
                            echo "<tr>
                                <td>" . $no++ . "</td> 
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['soals'] . "</td> 
                                <td>" . $row['jawaban'] . "</td> 
                                </tr>";
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </section>
    <!-- /.content -->
</div>
<?php include('wrapper/footerr.php'); ?>