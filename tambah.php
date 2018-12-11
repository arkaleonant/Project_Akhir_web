<?php
include('functions.php');
?>
<!DOCTYPE html>
<html>
	<head>
        <title>Tambah Data Mobil</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="icon" type="image/png" href="ico/favicon1.png">
        <style>
                body{
                    background-image: url("http://www.rentngoautos.com/pics/A7272692-2D30-4453-9E5589C0369DD5A5/2006-Dodge-Magnum-Rent-N-Go-Autos-Columbia-MO-65203-45B16752-4.JPG");
                    background-size: 100% 150%;
                    background-repeat: no-repeat;
                    color:white;
                }
            </style>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
    </head>
	<body>
		<div class="wrapper">
        </div><!-- .wrapper -->

        <header>
            <h1>Data Mobil</h1>
            
            <nav class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
            
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
            
        </header>
        <section class="courses" id="tambah">
                <form action="" method="POST" role="form">
                    <table align=center>
                        <tr>
                            <td>
                                <h1>Tambah Data Mobil</h1>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <div class="form-group">
                                    <label for="" class="col-sn-4">Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div class="form-group">
                                <label for="">Jenis</label>
                                <input type="text" class="form-control" id="jenis" placeholder=" ">
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div class="form-group">
                                <label for="" class="col-sn-4">Plat</label>
                                <input type="text" class="form-control" id="plat" placeholder=" ">
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div class="form-group">
                                <label for="" class="col-sn-4">Gambar</label>
                                <input type="text" class="form-control" id="gambar" placeholder=" ">
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="submit" class="btn btn-primary" name="submit">Tambahkan Data</button>
                                    <?php
                                    // buat koneksi
                                    $conn = mysqli_connect("localhost","root","","projectakhir");

                                    // cek apakah button submit sudah di tekan atau belum
                                    if(isset($_POST['submit']))
                                    {
                                        // ambil data dari tiap element dalam form yang disimpan di variabel baru
                                        $nama = $_POST["nama"];
                                        $jenis = $_POST["jenis"];
                                        $plat = $_POST["plat"];
                                        $gambar = $_POST["gambar"];

                                        // query insert data
                                        $query = " INSERT INTO listMobil
                                                    VALUES
                                                    ('','$nama','$jenis','$plat','$gambar')";
                                        mysqli_query($conn,$query);

                                        // cek sukses data ditambah menggunakan mysqli_affected_rows
                                        // jika kita var_dump maka akan muncul int(1) jika gagal maka akan muncul int (-1)
                                        //var_dump(mysqli_affected_rows($conn));
                                        if(mysqli_affected_rows($conn) > 0) {
                                                    echo "data berhasil disimpan";
                                        }
                                    else {
                                            echo "gagal!";
                                            echo "<br>";
                                            echo mysqli_error($conn);
                                        }
                                    }
                                ?>  
                            </td>
                        </tr>
                    </table>
                </form>

                
                <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
                    <a class="navbar-brand" >@JTI.POLINEMA 2018</a>
                </nav>
	</body>
</html>