<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
include '../class/report.php'; // Thêm đường dẫn đến file report.php

$report = new report();
$select_report = $report->select_report();

if ($select_report) {
    $chartData = array(); // Khởi tạo mảng để chứa dữ liệu cho biểu đồ

    while ($result = $select_report->fetch_assoc()) {
        // Thêm dòng dữ liệu vào mảng $chartData
        $chartData[] = array($result['cat_Name'], (float) $result['total_price']);
    }
} else {
    echo "No data found.";
}
?>

<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Category Name', 'Total Price'],
            <?php 
                // Duyệt qua mảng $chartData để tạo chuỗi dữ liệu cho biểu đồ
                foreach ($chartData as $dataRow) {
                    echo "['" . $dataRow[0] ." - ". $dataRow[1]. "  VND"."', " . $dataRow[1] . "],";
                }
            ?>
        ]);

        var options = {
            title: 'Report by Category',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
    </script>
</head>

<body>
    <div id="piechart_3d" style="width: auto; height: 700px; margin-left: 293px;"></div>
</body>

</html>