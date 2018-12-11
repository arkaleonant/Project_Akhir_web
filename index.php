<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
    <title> Home | MAGNUM RENT CARS</title>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="ico/favicon1.png">
    <style>
        h1{
            font-style:"times new roman";
            color:red;
            font-size:50px;
        }
        h2{
            color: grey;
            font-size:40px;
        }
        p{
            font-size:18px;
        }
        body{
                    background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnwBypvLqmluAwRIR2SaUzrCJ1ny3TXGUvU6cp0xeMv89VmmqbZg);
                    background-size: 100% 130%;
                    background-repeat: repeat-y;
                }
    </style>
</head>
        
<body align=center>
    
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="about.html" style="color=red">MAGNUM RENTCARS</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a>Home</a></li>
                <li><a href="daftarmobil.php">List Mobil</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default" >Cari</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php?logout='1'"  align=top right>logout</a>
            </li>
            </ul>
            <ul class="nav navbar-nav navbar-right center">
                <li>
                <?php  if (isset($_SESSION['username'])) : ?>
    	            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                <?php endif ?>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>

    <nav>
        <div>
            <h1 style="font-family:times new roman" align=center> MURAH - AMAN - TERPERCAYA</h1>
            <h2> Magnum Rent Car</h2>
            <P style="font-family:times new roman" > adalah perusahaan sewa mobil yang dirintis oleh seorang wirausaha <br>
                sekaligus mahasiswa politeknik negeri malang jurusan teknologi informasi. <br> 
                kini lebih dari 10 mobil yang disewakan didalam perusahaan ini, dengan minimal 3 mobil per / hari  <br>
                tersewa oleh pelanggan. <br>
                dengan adanya aplikasi web ini, pelanggan tidak perlu ke perusahaan kami 2 kali, <br>
                melainkan untuk booking sewa bisa dilakukan melalui website ini. <br>
                dengan memiliki akun yang sudah terdaftar di web kami, maka anda akan disuguhkan <br>
                mobil yang dapat disewa oleh Anda. <br>
            </p>
        </div>
        <div>
            <h3> FASILITAS MOBIL </h3>
            <table align=center>
            <tr>
                <td>
                    <img src="https://2.bp.blogspot.com/-FrSg1Eb_O_E/WfHUFmKUY_I/AAAAAAAAAo8/SP8_ILmRxSg0zD1XxfO8_BlEcNIzlnvYgCLcBGAs/s1600/Foto-0003.jpg" width="300px" height="200px" > <br>
                    <p style="color:white; font-family: times new roman; font-size:21px"> Aman dan mobil selalu terawat</p>
                </td>
                <td>        
                    <img src="https://autonetmagz.com/wp-content/uploads/2014/06/Mesin-S-TECH-III-16-Valve-Chevrolet-Spin-Activ-1.5-liter.jpg" width="300px" height="200px" > <br>
                    <p style="color:white; font-family: times new roman; font-size:21px"> Cek Mesin dan Servis rutin </p>
                </td>
                <td>        
                    <img src="https://i.ytimg.com/vi/mbBQm60UhrA/maxresdefault.jpg" width="300px" height="200px" > <br>
                    <p style="color:white; font-family: times new roman; font-size:21px"> Interior yang nyaman </p>
                </td>
            </tr>
            </table>
        </div>
    </nav>
    
    
    <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
        <a class="navbar-brand" style="color:black">Tunggu Apa Lagi ?</a>
        <ul class="nav navbar-nav">
            <li class="pasive">
            <a href="transaksi.php"><button type="submit" class="btn" style="color:black"> PESAN SEKARANG !</button></a>
            </li>
            <li>
                <a href="about.html">Contact Us</a>
            </li>
        </ul>
    </nav>
</body>
</html> 