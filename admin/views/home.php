<div class="row">
    <div class="col-lg-12" style="margin-bottom: 100px; height: 350px; width: 1200px;">
        <canvas id="areaChart1"></canvas>
    </div>
    <div class="col-lg-12" style="width: 1200px; height: 350px; ">
        <canvas id="areaChart2"></canvas>
    </div>
</div>

<?php
include("../config/connect.php");

// Truy vấn dữ liệu từ bảng Product và Category
$sql = "SELECT c.name, COUNT(*) AS total FROM Product p
            JOIN Category c ON p.categoryid = c.id
            GROUP BY p.categoryid";
$result = mysqli_query($cont, $sql);

// Tạo mảng dữ liệu cho biểu đồ miền
$areaData1 = [
    'labels' => [],
    'datasets' => [
        [
            'label' => 'Số lượng',
            'data' => [],
            'backgroundColor' => [
                'rgba(255, 0, 255, 0.7)', // Màu xanh nõn chuối
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 205, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)'
            ],
            'borderColor' => 'rgba(0, 0, 128, 1)',
            'borderWidth' => 1,
            'fill' => true
        ]
    ]
];

// Lặp qua kết quả truy vấn và lấy dữ liệu
if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $areaData1['labels'][] = $row['name'];
        $areaData1['datasets'][0]['data'][] = $row['total'];
    }
}

// Truy vấn dữ liệu từ bảng Product và Brand
$sql = "SELECT b.name AS brand, COUNT(p.id) AS product_count
        FROM Product p
        JOIN Brand b ON p.brandid = b.id
        GROUP BY p.brandid";
$result = $cont->query($sql);

// Tạo mảng dữ liệu cho biểu đồ miền
$areaData2 = [
    'labels' => [],
    'datasets' => [
        [
            'label' => 'Số lượng',
            'data' => [],
            'backgroundColor' => [
                'rgba(255, 159, 64, 0.7)',
                'rgba(153, 102, 255, 0.5)', // Màu tím
                'rgba(255, 205, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(255, 99, 132, 0.5)'
            ],
            'borderColor' => 'rgba(128, 0, 0, 1)',
            'borderWidth' => 1,
            'fill' => true
        ]
    ]
];


// Lặp qua kết quả truy vấn và lấy dữ liệu
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $areaData2['labels'][] = $row['brand'];
        $areaData2['datasets'][0]['data'][] = $row['product_count'];
    }
}
?>

<script>
// Biểu đồ miền 1
var areaData1 = {
    labels: <?php echo json_encode($areaData1['labels']); ?>,
    datasets: <?php echo json_encode($areaData1['datasets']); ?>
};

var areaOptions1 = {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
        legend: {
            position: 'right'
        },
        title: {
            display: true,
            text: 'Số lượng sản phẩm theo Danh mục',
            font: {
                size: 18,
                weight: 'bold'
            }
        }
    }
};

var areaCtx1 = document.getElementById('areaChart1').getContext('2d');
new Chart(areaCtx1, {
    type: 'line',
    data: areaData1,
    options: areaOptions1
});

// Biểu đồ miền 2
var areaData2 = {
    labels: <?php echo json_encode($areaData2['labels']); ?>,
    datasets: <?php echo json_encode($areaData2['datasets']); ?>
};

var areaOptions2 = {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
        legend: {
            position: 'right',
            labels: {
                padding: 10
            }
        },
        title: {
            display: true,
            text: 'Số lượng sản phẩm theo nhãn hiệu',
            font: {
                size: 18,
                weight: 'bold'
            }
        }
    }
};

var areaCtx2 = document.getElementById('areaChart2').getContext('2d');
new Chart(areaCtx2, {
    type: 'line',
    data: areaData2,
    options: areaOptions2
});
</script>
