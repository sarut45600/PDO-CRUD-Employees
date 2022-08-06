<?php

$title = "หน้าแรกของเว็บไซต์";
require_once "layout/header.php";
require_once "db/connect.php";
require_once "layout/check_admin.php";

$result = $controller->getEmployees();

?>

<body>
    <div class="container my-3">
        <h1 class="text-center"><?php echo "ข้อมูลพนักงาน" ?></h1>

        <table class="table my-3">
            <thead class="text-center">
                <tr>
                    <th scope="col">ชื่อ</th>
                    <th scope="col">นามสกุล</th>
                    <th scope="col">เงินเดือน</th>
                    <th scope="col">แผนก</th>
                    <th scope="col">ดำเนินการ</th>
                </tr>
            </thead>
            <tbody class="text-center">
                
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $row["fname"]; ?></td>
                        <td><?php echo $row["lname"]; ?></td>
                        <td><?php echo number_format($row["salary"]); ?></td>
                        <td><?php echo $row["department_name"] ?></td>
                        <td>
                            <a href="editForm.php?id=<?php echo $row["emp_id"] ?>" class="btn btn-warning ">แก้ไขข้อมูล</a>
                            <a onclick="return confirm('ต้องการลบข้อมูลหรือไม่ ?')" href="delete.php?id=<?php echo $row["emp_id"] ?>" class="btn btn-danger delete-btn">ลบข้อมูล</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>