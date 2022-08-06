<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<?php
$title = "แบบฟอร์มลงชื่อเข้าใช้";
require_once "layout/header.php";
require_once "db/connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $new_password = md5($username . $password);
    $result = $user->getUser($username, $new_password);

    if (!$result) {
        echo "<script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',
                confirmButtonText: 'ตกลง',
                confirmButtonColor: '#3085d6'
              })
        })
        </script>";
    } else {
        echo "<script>
        $(document).ready(function() {
            Swal.fire({
                title: 'เข้าสู่ระบบ',
                text: 'เข้าสู่ระบบสำเร็จ',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        })
    </script>";

        $_SESSION["username"] = $username;
        $_SESSION["userid"] = $result["id"];
        header("refresh:2; url=index.php");

    }
    
}

?>

<body>
    <div class="container my-3">
        <h1 class="text-center"><?php echo "แบบฟอร์มลงชื่อเข้าใช้" ?></h1>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" value="<?php if($_SERVER["REQUEST_METHOD"] == "POST") echo $_POST["username"];  ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <input type="submit" name="submit" value="เข้าสู่ระบบ" class="btn btn-primary my-3">
        </form>
    </div>

</body>

</html>