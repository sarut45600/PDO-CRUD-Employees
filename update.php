<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<?php

require_once "db/connect.php";

if (isset($_POST['submit'])) {
    $emp_id = $_POST['emp_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $salary = $_POST['salary'];
    $department_id = $_POST['department_id'];
    $update = $controller->update($emp_id, $fname, $lname, $salary, $department_id);

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
                title: 'แก้ไขข้อมูล',
                text: 'แก้ไขข้อมูลสำเร็จ',
                icon: 'success',
                timer: 5000,
                showConfirmButton: false
            });
        })
    </script>";
    $update;
    header("refresh:2; url=index.php");
    }
}
