<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Set a message to display on the login page
    $_SESSION['login_message'] = "Please log in to access the dashboard.";
    header("Location: login.html");
    exit();
}

// Check for the login success flag
if (isset($_SESSION['login_success'])) {
    echo "<script>alert('Karibu Sana!');</script>";
    unset($_SESSION['login_success']); // Clear the flag
}

require_once 'php/db.php';

$sql_mhp = "SELECT special AS specialization,
COUNT(*) AS occurrence_count FROM
            mhp GROUP BY special ORDER BY occurrence_count DESC";
//execute the query 
$result_mhp = $conn->query($sql_mhp);
$mhp_data=[];
$mhp_labels=[];
while ($row = $result_mhp->fetch_assoc()){
$mhp_data[]= $row['occurrence_count'];
$mhp_labels[]= $row['specialization'];

}

// Fetching data for the depression rates
$sql_depression_rate = "SELECT 
    COUNT(*) AS total_rows,
    SUM(CASE WHEN status = '1' THEN 1 ELSE 0 END) AS total_depressed 
    FROM report";
$result2 = $conn->query($sql_depression_rate);

$drate_data = $result2->fetch_assoc();
$depression_rate = ($drate_data['total_depressed'] / $drate_data['total_rows']) * 100;
$depression_rate = round($depression_rate);


$sql_c_depression = "SELECT 
    SUM(q1) AS interest,
    SUM(q2) AS hoplessness,
    SUM(q3) AS sleep,
    SUM(q4) AS energy,
    SUM(q5) AS appetite,
    SUM(q6) AS  self_Loathing,
    SUM(q7) AS concentration,
    SUM(q8) AS activity
FROM report;
";
$result3 = $conn->query($sql_c_depression);
$c_depression =$result3->fetch_assoc() ;
$c_depression_lables=array_keys($c_depression);
$c_depression_data= array_values($c_depression)


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tune Me Up Admin Dashboard</title>
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="./assets/compiled/css/app.css">
    <link rel="stylesheet" href="./assets/compiled/css/app-dark.css">
</head>
<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="index.html"><img src="./assets/images/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        <li class="sidebar-item">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item active">
                            <a href="manage-mhp.php" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Manage MHP</span>
                            </a>
                            <ul class="submenu">
                                <!-- Submenu items go here -->
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="main" class='layout-navbar navbar-fixed'>
            <header>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-lg-0">
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"><?php echo $_SESSION['username']; ?></h6>
                                            <p class="mb-0 text-sm text-gray-600"><?php echo $_SESSION['role']; ?></p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="./assets/compiled/jpg/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">Hello,<?php echo $_SESSION['username']; ?></h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My Profile</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="php/logout.php"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Dashboard</h3>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="row">
<div class="col-md-6">
<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Our MHP's</h4>
                            </div>
                            <div class="card-body">
<div id="mhps">

</div>


                        </div>
                        </div>
</div>

<div  class="col-md-6">
<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Depression rate(submitted assessments)</h4>
                            </div>
                            <div class="card-body">
<div id="depression-rate">





</div>

                        </div>
                        </div>

</div>

                        </div>
                        
                        <div class="row">

                        <div class="col-md-12">
<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Cumulative depression Score per question</h4>
                            </div>
                            <div class="card-body">
<div id="cumulative-depression-score">
</div>


                        </div>
                        </div>
</div>


                    </div>






                    </section>
                </div>
            </div>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p><?php echo date('Y') ?>&copy; Tune Me Up </p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span> by <a href="#">Zakyboss</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/static/js/components/dark.js"></script>
    <script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="assets/compiled/js/app.js"></script>
<script>

var options = {
          series: <?php echo json_encode($mhp_data, JSON_NUMERIC_CHECK)?>,
          labels : <?=json_encode($mhp_labels); ?>,
          chart: {
          width: 380,
          type: 'donut',
        },
        plotOptions: {
          pie: {
            startAngle: -90,
            endAngle: 270
          }
        },
        dataLabels: {
          enabled: true,
        },
        fill: {
          type: 'gradient',
        },
        legend: {
          formatter: function(val, opts) {
            return val + " - " + opts.w.globals.series[opts.seriesIndex]
          }
        },
        // title: {
        //   text: 'Gradient Donut with custom Start-angle'
        // },
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
            //   width: 200

            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#mhps"), options);
        chart.render();
      
      
</script>
<script>
var options2 = {
          series: [<?=$depression_rate;?>],
          chart: {
          height: 250,
          type: 'radialBar',
          toolbar: {
            show: true
          }
        },
        plotOptions: {
          radialBar: {
            startAngle: -135,
            endAngle: 225,
             hollow: {
              margin: 0,
              size: '70%',
              background: '#fff',
              image: undefined,
              imageOffsetX: 0,
              imageOffsetY: 0,
              position: 'front',
              dropShadow: {
                enabled: true,
                top: 3,
                left: 0,
                blur: 4,
                opacity: 0.24
              }
            },
            track: {
              background: '#fff',
              strokeWidth: '67%',
              margin: 0, // margin is in pixels
              dropShadow: {
                enabled: true,
                top: -3,
                left: 0,
                blur: 4,
                opacity: 0.35
              }
            },
        
            dataLabels: {
              show: true,
              name: {
                offsetY: -10,
                show: true,
                color: '#888',
                fontSize: '17px'
              },
              value: {
                formatter: function(val) {
                  return parseInt(val);
                },
                color: '#111',
                fontSize: '36px',
                show: true,
              }
            }
          }
        },
        fill: {
          type: 'gradient',
          gradient: {
            shade: 'dark',
            type: 'horizontal',
            shadeIntensity: 0.5,
            gradientToColors: ['red'],
            inverseColors: true,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100]
          }
        },
        stroke: {
          lineCap: 'round'
        },
        labels: ['Percent'],
        };

        var chart2 = new ApexCharts(document.querySelector("#depression-rate"), options2);
        chart2.render();
      

// Cumulative depression score per category 
var options3 = {
          series: [{
            data: <?php echo json_encode($c_depression_data, JSON_NUMERIC_CHECK)?>,
        }],
          chart: {
          type: 'bar',
          height: 380
        },
        plotOptions: {
          bar: {
            barHeight: '100%',
            distributed: true,
            horizontal: true,
            dataLabels: {
              position: 'bottom'
            },
          }
        },
        colors: ['#33b2df', '#546E7A', '#d4526e', '#13d8aa', '#A5978B', '#2b908f', 
          '#f48024', '#69d2e7'
        ],
        dataLabels: {
          enabled: true,
          textAnchor: 'start',
          style: {
            colors: ['#fff']
          },
          formatter: function (val, opt) {
            return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
          },
          offsetX: 0,
          dropShadow: {
            enabled: true
          }
        },
        stroke: {
          width: 1,
          colors: ['#fff']
        },
        xaxis: {
          categories:<?php echo json_encode($c_depression_lables)?>,

          
        },
        yaxis: {
          labels: {
            show: false
          }
        },
        title: {
            text: 'Cumulative depression scores based on categories',
            align: 'center',
            floating: true
        },
        subtitle: {
            // text: 'Category Names as DataLabels inside bars',
            align: 'center',
        },
        tooltip: {
          theme: 'dark',
          x: {
            show: false
          },
          y: {
            title: {
              formatter: function () {
                return ''
              }
            }
          }
        }
        };

        var chart3 = new ApexCharts(document.querySelector("#cumulative-depression-score"), options3);
        chart3.render();
      



        </script>
    




</body>
</html>
