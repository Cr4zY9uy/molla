<?php
    require_once("../config/connect.php");
?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="container" style="width: 900px;">
        <canvas id="myChart"></canvas>
    </div>

    <?php
    // Kết nối đến cơ sở dữ liệu
    global $cont;

    // Truy vấn dữ liệu từ bảng Orders và OrderDetail
    $sql = "SELECT MONTH(od.created_at) AS month, SUM(o.quantity * p.price) AS revenue
            FROM Orderdetail o
            INNER JOIN Orders od ON o.orderid = od.id
            INNER JOIN Product p ON o.productid = p.id
            GROUP BY MONTH(od.created_at)";
    $result = $cont->query($sql);

    $revenueData = array();
    while ($row = $result->fetch_assoc()) {
        $month = $row['month'];
        $revenue = $row['revenue'];
        $revenueData[$month] = $revenue;
    }

    // Đóng kết nối đến cơ sở dữ liệu
    ?>

    <script>
        // Dữ liệu biểu đồ
        var data = {
            labels: ["January", "February", "March", "April", "May", "June"],
            datasets: [
                {
                    type: 'bar',
                    label: 'Doanh thu',
                    data: <?php echo json_encode(array_values($revenueData)); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)'
                    ],
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    type: 'line',
                    label: 'Doanh thu (Tổng)',
                    data: <?php echo json_encode(array_values($revenueData)); ?>,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                    fill: false
                }
            ]
        };

        // Tùy chọn biểu đồ
        var options = {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Tạo biểu đồ kết hợp
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>
