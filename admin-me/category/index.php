<?php 
    require_once '../../config/init.php';

    $error = '';
    if(Input::get('goAdd')){
        $kode_kategori = addslashes(Input::get('kode_kategori'));
        $nama_kategori = addslashes(Input::get('nama_kategori'));
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_error = $_FILES['image']['error'];
        $image_size = $_FILES['image']['size'];
        $image_type = $_FILES['image']['type'];
        $image_name = date('dmYHis'). ' - '.$image;
        $image_location = '../../assets/images/category icon/'.$image_name;

        if(Input::required($kode_kategori) && Input::required($nama_kategori)){
            if($image_error == 0){
                if($image_size <= 2000000){
                    if($image_type == 'image/jpg' || $image_type == 'image/jpeg' || $image_type == 'image/png'){
                        $_db->insertData('tbl_kategori', array(
                            'kode_kategori' => $kode_kategori,
                            'nama_kategori' => $nama_kategori
                        ));
                    }else{
                        $error = 'Ups maaf, format gambar yang didukung hanya jpg, jpeg, png';
                    }
                }else{
                    $error = 'Ukuran Gambar Maksimal 2MB';
                }
            }else{
                $error = 'Ups, Gambar Tidak Valid/Error';
            }
        }else{
            $error = 'Ups maaf, form harus diisi dengan benar, tidak boleh ada yang kosong';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php require_once '../../views/css.php';  ?>
</head>
<body>
<!-- Navbar -->
<?php require_once '../../views/navbar-admin.php';  ?>

<!-- Content -->
<div class="col-md-8 table-section">
    <div class="table-header">
        <div class="row">
            <div class="col-md-10 table-heading">
                <p><i class="fas fa-cubes"></i>&nbsp; Kelola <b>Kategori Desain</b></p>
            </div>
            <div class="col-md-2 table-button">
                <button class="btn btn-primary" data-toggle="modal" data-target="#tambahData"><i class="fas fa-plus"></i>&nbsp; Tambah Data</button>
            </div>
        </div>
    </div>
    <div class="col-md-12 table-spacing">
        <table id="myTable" class="table">
            <thead align="center">
                <tr>
                    <th>No</th>
                    <th>Icon Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Kode Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody align="center">
                <tr>
                    <td>1</td>
                    <td class="tbl_image"><img src="../../assets/images/category icon/kaos.png" alt=""></td>
                    <td>Desain Baju/Kaos</td>
                    <td>F9875</td>
                    <td><a href="" class="btn btn-primary"><i class="fas fa-pencil-alt"></i>&nbsp; Ubah</a> &nbsp; <a href="" class="btn btn-danger"><i class="fas fa-trash-alt"></i>&nbsp; Hapus</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i>&nbsp; Tambah Kategori Desain</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="form-group col-xl-3 col-4">
                            <input type="hidden" value="<?= Input::randomCode(); ?>" name="kode_kategori" readonly required>
                            <label for="">Icon:</label> <br class="break">
                            <label for="icon_kategori" title="Pilih Icon" class="label-icon"><img src="../../assets/images/default.png" id="icon_default" alt="Icon"></label>
                            <input type="file" class="form-control" id="icon_kategori" name="image">
                        </div>
                        <div class="form-group col-xl-9 col-8">
                            <label for="nama_kategori">Nama Kategori:</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan Nama Kategori..."><br>
                            <input type="hidden" name="goAdd" value="Submit">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once '../../views/js.php';  ?>
<script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
</body>
</html>