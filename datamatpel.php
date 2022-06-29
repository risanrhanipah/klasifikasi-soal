<?php
$connection = mysqli_connect("103.41.207.247", "root", "Root!@#$%@", "tryout") or die("Tidak bisa terhubungan ke database");
if (isset($_POST['idjenjang'])) :
    $sqlmatpel = "SELECT * FROM `matpels` where id_jenjang = " . $_POST['idjenjang'];
    $matpel = mysqli_query($connection, $sqlmatpel) or die(mysqli_error($connection));
?>
    <option>Pilih Matpel</option>
    <?php
    while ($list = mysqli_fetch_array($matpel)) {
    ?>
        <option value="<?= $list['id'] ?>"><?= $list['nama'] ?></option>
    <?php }
elseif (isset($_POST['idmatpel'])) :
    ?>
    <div class="row">
        <div class="col">
            <div class="form-inline">
                <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control" id="kodebuku" name="kodebuku" placeholder="Kode Buku" required>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control" id="idpaket" name="idpaket" placeholder="ID Paket Baru" required>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control" id="jumlahsoal" name="jumlahsoal" placeholder="Jumlah Soal di Buku" required>
                </div>

                <button type="submit" class="btn btn-info mb-2">GANTI PAKET</button>
                <button type="reset" class="btn btn-dark mb-2 ml-2" onclick="confirm('apakah anda yakin mereset yg dipilih?')">Reset All</button>
            </div>
        </div>

    </div>
    </div>

    <table class="table" id="myTable" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Paket Baru</th>
                <th scope="col">Soal</th>
                <th scope="col">jawaban</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sqlsoal = "select * from soals where id_matpel=" . $_POST['idmatpel'];
            $soal = mysqli_query($connection, $sqlsoal) or die(mysqli_error($connection));
            while ($listsoal = mysqli_fetch_array($soal)) :  ?>
                <tr>
                    <th scope="row"><input type="checkbox" name="soals[]" id="id<?= $listsoal['id'] ?>" value="<?= $listsoal['id'] ?>"></th>

                    <td><label for="id<?= $listsoal['id'] ?>"><?= $listsoal['id']; ?></label></td>
                    <td><label for="id<?= $listsoal['id'] ?>"><?= $listsoal['id_type_new']; ?></label></td>
                    <td><label for="id<?= $listsoal['id'] ?>"><?= $listsoal['soals']; ?></label></td>
                    <td><?= $listsoal['jawaban']; ?></td>
                </tr>
            <?php
            endwhile;
            ?>
        </tbody>
    </table>
    <br>
    <div class="row">
            <div><a href="#atas" class="btn btn-primary">Back To Top</a></div>
        </div>
<?php
endif;
?>
