<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'projectAkhir');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// ...

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }

  // DAFTAR MOBIL
  //$result = mysqli_query($conn,"SELECT * FROM listmobil");
// function query akan menerima isi parameter dari string query yang ada pada index2.php
function query($query_kedua)
{
    // dikarenakan $conn diluar function query maka dibutuhkan scope global $conn
    global $conn;
    $result = mysqli_query($conn,$query_kedua);
    // wadah kosong untuk menampung isi array pada saat looping
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah ($data) 
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $jenis = htmlspecialchars($data["jenis"]);
    $plat = htmlspecialchars($data["plat"]);
    $gambar = $data["gambar"];

    $query = " INSERT INTO listmobil
                VALUES
                ('','$nama','$jenis','$plat','$gambar')";
                mysqli_query($conn,$query);

                return mysqli_affected_rows($conn);     
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn,"DELETE FROM listmobil WHERE id =$id");
    return mysqli_affected_rows($conn);
    
}

function edit ($data)
{
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["jenis"]);
    $email = htmlspecialchars($data["plat"]);
    $gambar = htmlspecialchars($data["gambar"]);

    if($_FILES['gambar'][error]=== 4){
        $gambar = $GambarLama;
    } else {
        $gambar=upload();
    }
    $query= "   UPDATE listmobil SET
                nama = '$nama',
                jenis = '$nim',
                plat = '$email',
                gambar = '$gambar'
                WHERE id= $id ";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $sql="SELECT * FROM listmobil
    WHERE
    nama LIKE '%$keyword%' OR
    jenis LIKE '%$keyword%' OR
    plat LIKE '%$keyword%'
    ";
    var_dump($sql);
    //die();
    return query($sql);
}

function upload(){
    $nama_file =$_FILES['gambar']['name'];
    $ukuran_file =$_FILES['gambar']['size'];
    $error =$_FILES['gambar']['error'];
    $tmpfile =$_FILES['gambar']['tmp_name'];

    if($error===4){
        echo "
            <script>
                alert('Tidak ada gambar yang diupload');
            <script>
        ";
        return false;
    }

    $jenis_gambar = ['jpg','jpeg','gif'];
    $pecah_gambar = explode('.',$nama_file);
    $pecah_gambar = strtolower(end($pecah_gambar));
    if(!in_array($pecah_gambar,$jenis_gambar)){
        echo "
            <script>
                alert('yang anda upload bukan file gambar');
            <script>
        ";
        return false;
    }

    if($ukuran_file > 10000000){
        echo "
            <script>
                alert('ukuran gambar terlalu besar');
            <script>
        ";
        return false;
    }

    move_uploaded_file($tmpfile,'img/'.$nama_file);

    return $nama_file;
}

function update(){
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $pecah_gambar;

    move_uploaded_file($tmpfile,'img/'.$namafilebaru);

    return $namafilebaru;
} 
?>