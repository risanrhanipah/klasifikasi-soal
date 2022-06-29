<?php
    $connection = mysqli_connect("103.41.207.247", "root", "Root!@#$%@", "tryout") or die("Tidak bisa terhubungan ke database");
?>
<?php include('wrapper/headerr.php'); ?>
<?php include('formatdate.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <font face="Brush Script MT"><h1 class="m-0">Jumlah Soal Diketik User</h1></font>
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
                <table id="myTable6" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>ID User</th>
                            <th>Nama</th>
                            <th>Jumlah Soal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $query = "SELECT date(s.createdAt),s.id_user,u.name, COUNT(*) AS jumlah FROM soals s, users u WHERE date(s.createdAt) > '2021-09-07' AND s.id_user = u.id GROUP BY date(s.createdAt) DESC, s.id_user;";
                        $sduser = mysqli_query($connection, $query);
                        $no = 1;
                        while ($row = mysqli_fetch_array($sduser))
                        echo "<tr>
                            <td>".$no++."</td>
                            <td>". longdate_indo($row['date(s.createdAt)'])."</td>
                            <td>".$row['id_user']."</td>
                            <td>".$row['name']."</td>
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
   