<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>


<?php
$title = "แบบฟอร์มบันทึกข้อมูล";
require_once "layout/header.php";
require_once "db/connect.php";
require_once "layout/check_admin.php";


$result = $controller->getDepartments();

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $salary = $_POST['salary'];
    $department_id = $_POST['department_id'];
    $insert = $controller->insert($fname, $lname, $salary, $department_id);
    
    if (empty($fname)) {
        echo "<script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: 'กรุณากรอกชื่อ',
                confirmButtonText: 'ตกลง',
                confirmButtonColor: '#3085d6'
              })
        })
        </script>";
    } else if (empty($lname)) {
        echo "<script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: 'กรุณากรอกนามสกุล',
                confirmButtonText: 'ตกลง',
                confirmButtonColor: '#3085d6'
              })
        })
        </script>";
    } else if (empty($salary)) {
        echo "<script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: 'กรุณากรอกเงินเดือน',
                confirmButtonText: 'ตกลง',
                confirmButtonColor: '#3085d6'
              })
        })
        </script>";
    } else {
        echo "<script>
        $(document).ready(function() {
            Swal.fire({
                title: 'เพิ่มข้อมูล',
                text: 'เพิ่มข้อมูลสำเร็จ',
                icon: 'success',
                timer: 5000,
                showConfirmButton: false
            });
        })
    </script>";
    $insert;
    header("refresh:2; url=index.php");
    }
}

?>

<body>
    <div class="container my-3">
        <h1 class="text-center"><?php echo "แบบฟอร์มบันทึกข้อมูลพนักงาน" ?></h1>
        <form action="addForm.php" method="POST">
            <div class="form-group">
                <label for="fname">ชื่อ</label>
                <input type="text" name="fname" class="form-control">
            </div>
            <div class="form-group">
                <label for="lname">นามสกุล</label>
                <input type="text" name="lname" class="form-control">
            </div>
            <div class="form-group">
                <label for="salary">เงินเดือน</label>
                <input type="number" name="salary" class="form-control">
            </div>
            <div class="form-group">
                <label for="department">แผนก</label>
                <select name="department_id" class="form-control">
                    <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $row["department_id"] ?>"><?php echo $row["department_name"] ?></option>
                    <?php } ?>
                </select>
            </div>
            <input type="submit" name="submit" value="บันทึกข้อมูล" class="btn btn-primary my-3">
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>