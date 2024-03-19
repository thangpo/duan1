<div class="row formcontent">
    <div id="piechart"></div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
    // Load google charts
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Danh mục', 'Số lượng sản phầm'],
            <?php
            $tongdm = count($listthongke);
            $i=1;
                foreach ($listthongke as $checklistthongke) {
                    extract($checklistthongke);
                    if ($i==$tongdm) {
                        $dauphay="";
                    }else {
                        $dauphay= ",";
                    }
                    echo "['".$checklistthongke['ten_dm']."', ".$checklistthongke['countsp']."]".$dauphay;
                    $i+=1;
                }
            ?>  
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {
            'title': 'BIỂU ĐỒ THỐNG KÊ HÀNG HOÁ THEO DANH MỤC',
            'width': 550,
            'height': 400
        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
    </script>
    <a href="index.php?act=thongke">
        <input type="button" value="KIỂM TRA THỐNG KÊ" tyle="background-color: #00BFFF; color: white;">
    </a>
</div>