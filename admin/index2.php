<?php include("header.php");
?>

<div class="container">
    <div class="row">


        <!--<div class="card--container">
            <h3 class="main--title">Today's data</h3>
            <div class="card--wrapper">
            <div class="payment--card">
            <div class="card--heard">
            <div class="amount">
            <span class="title">Payment amount</span><br>
                <span class="amount--value">$100.00</span>
                </div>
                <i class="fas fa-dollar-sign icon"></i>
                </div>
                <span class="card-detail">*** *** ***3484</span>
                </div>

                <div class="payment--card">
                <div class="card--heard">
                    <div class="amount">
                        <span class="title">Payment amount</span><br>
                        <span class="amount--value">$100.00</span>
                    </div>
                    <i class="fas fa-dollar-sign icon"></i>
                </div>
                <span class="card-detail">*** *** ***3484</span>
                </div>-->


        <div class="col-lg-3 col-md-2">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body"> Total Sacco Members<br>
                    <span style="font-size:22px;">126 </span>
                    <!--<img style="padding-left: 180px; height: 30px;" src="bootstrap-icons-1.11.3/2-circle-fill.svg" alt="">-->
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="class.php?class=b1">View Details</a>
                    <div class=" small text-white"><i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body"> Total Acc. Ballance <br>
                    <span style="font-size:22px;">SH. 10,000</span>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="class.php?class=b1">View Details</a>
                    <div class=" small text-white"><i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body"> Recent Forum posts<br>
                    <span style="font-size:22px;">23</span>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="class.php?class=b1">View Details</a>
                    <div class=" small text-white"><i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body"> Recente Transactions<br>
                    <span style="font-size:22px;">12</span>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="class.php?class=b1">View Details</a>
                    <div class=" small text-white"><i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <Script>
        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawAxisTickColors);

        function drawAxisTickColors() {
            var data = google.visualization.arrayToDataTable([
                ['City', '2010 Population', '2000 Population'],
                ['New York City, NY', 8175000, 8008000],
                ['Los Angeles, CA', 3792000, 3694000],
                ['Chicago, IL', 2695000, 2896000],
                ['Houston, TX', 2099000, 1953000],
                ['Philadelphia, PA', 1526000, 1517000]
            ]);

            var options = {
                title: 'Population of Largest U.S. Cities',
                chartArea: {

                    width: '70%'
                },
                hAxis: {
                    title: 'Total Population',
                    minValue: 0,
                    textStyle: {
                        bold: true,
                        fontSize: 12,
                        color: '#4d4d4d'
                    },
                    titleTextStyle: {
                        bold: true,
                        fontSize: 18,
                        color: '#4d4d4d'
                    }
                },
                vAxis: {
                    title: 'City',
                    textStyle: {
                        fontSize: 14,
                        bold: true,
                        color: '#848484'
                    },
                    titleTextStyle: {
                        fontSize: 14,
                        bold: true,
                        color: '#848484'
                    }
                }
            };
            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
    <div id="chart_div"></div>
    <script></script>

</div>
</div>
</div>
</div>
<script src="../js/bootstrap.js"></script>