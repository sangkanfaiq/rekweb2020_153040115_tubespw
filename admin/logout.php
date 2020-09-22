<?php
    error_reporting(0);
    session_destroy();

    echo "
        <script>
            alert('Anda telah keluar');
            window.location = '../index.php';
        </script>
    ";


?>