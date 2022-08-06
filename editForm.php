<?php
$title = "แบบฟอร์มแก้ไขข้อมูล";
require_once "layout/header.php";
require_once "db/connect.php";
require_once "layout/check_admin.php";

$result = $controller->getDepartments();

if (!isset($_GET["id"])) {
    header("Location:index.php");
} else {
    $id = $_GET["id"];
    $emp = $controller->getEmployeesEdit($id);
}


?>

<body>
    <div class="container my-3">
        <h1 class="text-center"><?php echo "แบบฟอร์มแก้ไขข้อมูลพนักงาน" ?></h1>
        <form action="update.php" method="POST">
            <input type="hidden" name="emp_id" value="<?php echo $emp['emp_id'] ?>">
            <div class="form-group">
                <label for="fname">ชื่อ</label>
                <input type="text" name="fname" class="form-control" value="<?php echo $emp['fname']; ?>">
            </div>
            <div class="form-group">
                <label for="lname">นามสกุล</label>
                <input type="text" name="lname" class="form-control" value="<?php echo $emp['lname']; ?>">
            </div>
            <div class="form-group">
                <label for="salary">เงินเดือน</label>
                <input type="number" name="salary" class="form-control" value="<?php echo $emp['salary']; ?>">
            </div>
            <div class="form-group">
                <label for="department">แผนก</label>
                <select name="department_id" class="form-control">
                    <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option 
                            <?php if ($row["department_id"] == $emp['department_id']) echo "selected"?>
                            value="<?php echo $row["department_id"] ?>"><?php echo $row["department_name"] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <input type="submit" name="submit" value="บันทึกข้อมูล" class="btn btn-warning my-3">
        </form>
    </div>

</body>

</html>