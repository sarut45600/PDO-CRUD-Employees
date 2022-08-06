<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<?php

require_once "db/connect.php";

if (!isset($_GET["id"])) {
    header("Location:index.php");
} else {

    $id = $_GET["id"];
    $result = $controller->delete($id);

    if ($result) {
        header("Location:index.php");
    }
}


?>