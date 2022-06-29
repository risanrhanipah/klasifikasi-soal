<?php
$connection = mysqli_connect("103.41.207.247", "root", "Root!@#$%@", "tryout") or die("Tidak bisa terhubungan ke database");
if (isset($_POST['soals'])) {
    $idpaket = $_POST['idpaket'];
    $soals = $_POST['soals'];

    $idjenjang = $_POST['jenjang'];
    $idmatpel = $_POST['matpel'];
    $jumlahsoal = $_POST['jumlahsoal'];
    $kodebuku = $_POST['kodebuku'];

    $result = mysqli_query($connection, "select jumlahsoal from paketnew where idpaket=$idpaket and idmatpel=$idmatpel and idjenjang = $idjenjang") or die(mysqli_error($connection));
    $nums = mysqli_num_rows($result);
    if ($nums < 1) {
        mysqli_query($connection, "insert into paketnew (idpaket,idjenjang,idmatpel,jumlahsoal,kodebuku) values ($idpaket,$idjenjang,$idmatpel,$jumlahsoal,'$kodebuku')") or die(mysqli_error($connection));
    }

    echo "<br>";
    for ($i = 0; $i < count($soals); $i++) {
        echo $i . ". " . $soals[$i] . "<br>";
        mysqli_query($connection, "update soals set id_type_new = $idpaket where id = " . $soals[$i]) or die(mysqli_error($connection));
    }
}
