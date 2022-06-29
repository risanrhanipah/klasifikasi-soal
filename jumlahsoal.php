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
                    <font face="Brush Script MT"><h1 class="m-0">Total Soal</h1></font>
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
                <table id="myTable5" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenjang</th>
                            <th>Matpel</th>
                            <th>Jumlah Soal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $query = "SELECT j.jenjang,m.nama,COUNT(*) AS jumlah FROM soals s, matpels m,jenjangs j WHERE s.id_matpel = m.id AND j.id = m.id_jenjang GROUP BY id_matpel, id_jenjang;
                        ";
                        $jsoal = mysqli_query($connection, $query);
                        $no = 1;
                        while ($row = mysqli_fetch_array($jsoal))
                        echo "<tr>
                            <td>".$no++."</td>
                            <td>".$row['jenjang']."</td>
                            <td>".$row['nama']."</td>
                            <td>".$row['jumlah']."</td>
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