<?php
    include "koneksi.php";

    $username = $_POST['username'];
    $password_admin = $_POST['password_admin'];

    $login = mysqli_query($connect,"SELECT * FROM tb_login where username = '$username' and password_admin = '$password_admin'");
    $ketemu = mysqli_num_rows($login);
    $r = mysqli_fetch_array($login);

        if($ketemu > 0) {
            session_start();

            $_SESSION['id_login']       = $r['id_login'];
            $_SESSION['username']       = $r['username'];
            $_SESSION['nama_admin']     = $r['nama_admin'];
            $_SESSION['status_admin']   = $r['status_admin'];

            echo "
                <script>
                    alert('Berhasil login, Selamat datang $_SESSION[nama_admin]');
                    window.location = 'admin/index.php'
                </script>  
            ";

        } else {

            echo "
                <script>
                    alert('Username atau Password salah');
                    window.location = 'index.php'
                </script>  
            ";

        }


?>