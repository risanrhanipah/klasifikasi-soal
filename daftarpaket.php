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
                    <font face="Brush Script MT"><h1 class="m-0">Daftar Paket</h1></font>
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
    <!-- sini -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <table id="myTable1" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Paket</th>
                            <!-- <th>ID Jenjang</th> -->
                            <th>Jenjang</th>
                            <!-- <th>ID Matpel</th> -->
                            <th>Matpel</th>
                            <th>Jumlah Soal</th>
                            <th>Jumlah di Buku</th>
                            <th>Jumlah Belum Diketik</th>
                            <th>Kode Buku</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "select s.id_type_new,j.id as idjenjang, m.id as idmatpel ,j.jenjang,m.nama,COUNT(*) as jumlah ,(select jumlahsoal from paketnew where idpaket=s.id_type_new and idmatpel=s.id_matpel and idjenjang = j.id) as jumlah_di_buku,(select kodebuku from paketnew where idpaket=s.id_type_new and idmatpel=s.id_matpel and idjenjang = j.id) as kodebuku from soals s,matpels m,jenjangs j where s.id_matpel = m.id and j.id = m.id_jenjang and s.id_type_new is not null group by s.id_type_new,s.id_matpel;";
                        $daftarpaket = mysqli_query($connection, $query);
                        // $daftarpaket = mysqli_query($connection, "select s.id_type_new,j.jenjang,m.nama,COUNT(*) as jumlah from soals s,matpels m,jenjangs j where s.id_matpel = m.id and j.id = m.id_jenjang and s.id_type_new is not null group by s.id_type_new,s.id_matpel");
                        $no = 1;
                        while ($row = mysqli_fetch_array($daftarpaket)) :
                            $jumlahbelumdiketik = $row['jumlah_di_buku'] - $row['jumlah']; ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>Paket <?= $row['id_type_new'] ?></td>
                                <!-- <td><?= $row['idjenjang'] ?></td> -->
                                <td><?= $row['jenjang'] ?></td>
                                <!-- <td><?= $row['idmatpel'] ?></td> -->
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['jumlah'] ?></td>
                                <td><?= $row['jumlah_di_buku'] ?></td>
                                <td class="text-danger"><?= $jumlahbelumdiketik; ?></td>
                                <td><?= $row['kodebuku'] ?></td>
                                <td><a href="show.php?idpaket=<?= $row['id_type_new'] ?>&idjenjang=<?= $row['idjenjang'] ?>&idmatpel=<?= $row['idmatpel'] ?>&matpel=<?=$row['nama']?>&jenjang=<?=$row['jenjang']?>" target="_blank" rel="noopener noreferrer" class="btn btn-dark"><i class="right fas fa-eye"></i></a></td>
                            </tr>
                            
                        <?php
                             endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- akhir -->
    </section>
    <!-- /.content -->
</div>
<?php include('wrapper/footerr.php'); ?>