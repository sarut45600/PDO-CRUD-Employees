<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<?php

require_once "layout/session.php";


?>


<?php 

if (session_destroy()) {
    echo "<script>
    $(document).ready(function() {
        Swal.fire({
            title: 'ออกจากระบบ',
            text: 'ออกจากระบบสำเร็จ',
            icon: 'success',
            showConfirmButton: false,
            timer: 2000
          }).then((result) => {
            if (result) {
                window.location.href = 'loginForm.php';
            }
          })
    })
</script>";
}

?>
