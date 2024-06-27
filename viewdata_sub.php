<?php
$server = "localhost";
$username = "nacmcaho_arab_board_exam";
$password = "Gt(A2IndxS9X";
$database = "nacmcaho_arab_board_exam";
$connection = mysqli_connect($server, $username, $password);
$select_db = mysqli_select_db($connection, $database);
if (!$select_db) {
    echo "تم إنهاء الاتصال";
}

include ('Admin_login_control.php');
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="Author" name="MJ Maraz">
    <!-- خطوط جوجل -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <title>كل البيانات</title>
    <link rel="icon" href="logo.svg" type="image/icon type">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>
    <!-- ========================================================= -->

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="./Login.css">

</head>

<body style="margin-top: -54px;">
    <!-- <header class="header_part">
    </header> -->
    <!-- =======  جدول البيانات  = البداية  ========================== -->
    <div class="container" style="direction: rtl;">
        <div class="row">
            <div class="col-12">
                <div class="data_table">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
    <th>ID</th>
    <th>Name (Arabic)</th>
    <th>Name (English)</th>
    <th>Email</th>
    <th>Attempts</th>
    <th>Scientific Council</th>
    <th>Country</th>
    <th>Exam Center</th>
    <th>Mobile Number</th>
    <th>Application Date</th>
    <th>Creation Date</th>
    <th>Personal Email</th>
    <th>UserID</th>
    <th>Stage</th>
    <th>Alternative Exam Center</th>
</tr>
                        </thead>
                        <tbody>
                            <?php
                            $select_query = mysqli_query($connection, "SELECT
    r.*,
    sc.Name_Arabic AS scientific_council_name,
    ec.center_name AS center_name,
    c.country_name,
    ecc.center_name AS center_nam2
    FROM
    registration AS r
    LEFT JOIN
    scientificcouncil AS sc ON r.scientific_council_id = sc.ID
    LEFT JOIN
    exam_centers AS ec ON r.exam_center_id = ec.center_id
    LEFT JOIN
    exam_centers AS ecc ON r.exam_center2_id = ecc.center_id
    LEFT JOIN
    countries AS c ON r.country_id = c.country_id
	where sc.ID = 13	
    "
    );
                            while ($data = mysqli_fetch_array($select_query)) {
                                echo "<tr>";
                                echo "<td>" . $data['id'] . "</td>";
                                echo "<td>" . $data['name_arabic'] . "</td>";
                                echo "<td>" . $data['name_english'] . "</td>";
                                echo "<td>" . $data['email'] . "</td>";
                                echo "<td>" . $data['attempts'] . "</td>";
                                echo "<td>" . $data['scientific_council_name'] . "</td>";
                                echo "<td>" . $data['country_name'] . "</td>";
                                echo "<td>" . $data['center_name'] . "</td>";
                                echo "<td>" . $data['mobile_number'] . "</td>";
                                echo "<td>" . $data['application_date'] . "</td>";
                                echo "<td>" . $data['created_at'] . "</td>";
                                echo "<td>" . $data['pemail'] . "</td>";
                                echo "<td>" . $data['userId'] . "</td>";
                                echo "<td>" . $data['stage'] . "</td>";
                                echo "<td>" . $data['center_nam2'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <script src="assets/js/bootstrap.bundle.min.js"></script>
                <script src="assets/js/jquery-3.6.0.min.js"></script>
                <script src="assets/js/datatables.min.js"></script>
                <script src="assets/js/pdfmake.min.js"></script>
                <script src="assets/js/vfs_fonts.js"></script>
                <script src="assets/js/custom.js"></script>

                <script>
                    $(document).ready(function () {
                        if ($.fn.DataTable.isDataTable('#example')) {
                            $('#example').DataTable().destroy();
                        }
                        $('#example').DataTable({
                            "language": {
                                "sEmptyTable": "لا توجد بيانات متاحة في الجدول",
                                "sLoadingRecords": "جارٍ التحميل...",
                                "sProcessing": "جارٍ التحميل...",
                                "sLengthMenu": "أظهر _MENU_ مدخلات",
                                "sZeroRecords": "لم يعثر على أية سجلات",
                                "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                                "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                                "sSearch": "ابحث:",
                                "oPaginate": {
                                    "sFirst": "الأول",
                                    "sPrevious": "السابق",
                                    "sNext": "التالي",
                                    "sLast": "الأخير"
                                },
                                "oAria": {
                                    "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                                    "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                                }
                            },
                            "buttons": [
                                {
                                    extend: 'excel',
                                    text: 'تنزيل Excel'
                                },
                                {
                                    extend: 'pdf',
                                    text: 'تنزيل PDF'
                                },
                                {
                                    extend: 'print',
                                    text: 'طباعة'
                                },
                                {
                                    extend: 'copy',
                                    text: 'نسخ'
                                }
                            ],
                            "dom": '<"row"<"col-md-6"l><"col-md-6"f>><"top"B>rtip',
                        });
                    });







                    // $(document).ready(function () {
                    //     if ($.fn.DataTable.isDataTable('#example')) {
                    //         $('#example').DataTable().destroy();
                    //     }
                    //     $('#example').DataTable({
                    //         "language": {
                    //             "sEmptyTable": "لا توجد بيانات متاحة في الجدول",
                    //             "sLoadingRecords": "جارٍ التحميل...",
                    //             "sProcessing": "جارٍ التحميل...",
                    //             "sLengthMenu": "أظهر _MENU_ مدخلات",
                    //             "sZeroRecords": "لم يعثر على أية سجلات",
                    //             "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    //             "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                    //             "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                    //             "sSearch": "ابحث:",
                    //             "oPaginate": {
                    //                 "sFirst": "الأول",
                    //                 "sPrevious": "السابق",
                    //                 "sNext": "التالي",
                    //                 "sLast": "الأخير"
                    //             },
                    //             "oAria": {
                    //                 "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                    //                 "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                    //             }
                    //         }
                    //     });
                    // });
                </script>

</body>

</html>