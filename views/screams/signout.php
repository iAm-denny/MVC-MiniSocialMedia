<?php 

if(isset($_GET['id'])) {
    setcookie("userid", "", time() - 3600);
    setcookie("name", "", time() - 3600);
    header("Location: /");
}
