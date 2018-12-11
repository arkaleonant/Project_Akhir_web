<?php
include('functions.php');
$result = mysqli_query("SELECT * FROM users");
$listMobil = query("SELECT * FROM listmobil");

if(isset($_POST["cari"]))
{
    $listMobil = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>List Mobil | MAGNUM RENT CARS</title>
        <style>
                body{
                    background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnwBypvLqmluAwRIR2SaUzrCJ1ny3TXGUvU6cp0xeMv89VmmqbZg");
                    background-size: 100% 130%;
                    background-repeat: no-repeat;
                }
            </style>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="icon" type="image/png" href="ico/favicon1.png">
    </head>
	<body>
		<div class="wrapper">
        </div><!-- .wrapper -->

        <header>            
            <nav class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" class="active" href="about.html">MAGNUM RENTCARS</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php?logout='1'"  align=top right>logout</a>
                </li>
                </ul>
            
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li class=""><a href="index.php">Home</a></li>
                        <li><a href="daftarmobil.php">List Mobil</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>      
        </header>

        
        <form class="navbar-form pull-right">
            <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off" style="width: 200px;">
            <button type="submit" name="cari">Cari</button>
        </form>
        
        <div class="navbar-body">
            <a href="tambah.php"><button type="submit"> Tambah Data Mobil</button></a>
            <br>    
            <br>
        
        <div>
            <table border ="1" cellpadding="10" cellspacing="0" align=center>

                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Plat Nomor</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
                <?php $i=1 ?>
                <?php foreach ($result as $row):?>  
                    <tr>
                        <td><?= $i;?></td>
                        <td><?= $row["nama"];?></td>
                        <td><?= $row["jenis"];?></td>
                        <td><?= $row["plat"];?></td>
                        <td>
                        <img src="img/<?php echo $row["gambar"]; ?>" alt="" height="125" width="100" srcset=""></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row["id"];?>">Edit</a>
                            <a href="hapus.php?id=<?php echo $row["id"];?>"onclick="return confirm('apakah data ini akan dihapus')">Hapus </a>
                        </td>
                    </tr>
                <?php $i++ ?>
                <?php endforeach;?>
                </table>
        </div>

        <div>    
            <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
            <a class="navbar-brand" >@MAGNUM.RENTCAR 2018</a>
        <ul class="nav navbar-nav">
            <li class="pasive">
            <a href="transaksi.php"><button type="submit" class="btn"> PESAN SEKARANG !</button></a>
            </li>
            <li>
            </nav>  
        </div>
	</body>
</html>