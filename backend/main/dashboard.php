<?php
    require_once "../../core/autoload.php";
    require_once "../../core/dashboard.php";

    $dbdata = new Dashboard;
    $raw = $dbdata->countMember();

    $totalRevenue = "BDT ".number_format($dbdata->totalRevenue()->total, 2);
    $totalUnpaid = "BDT ".number_format($dbdata->totalUnpaid()->total, 2);
  //   echo "TUP ".$totalUnpaid. " TR ".$totalRevenue;
  // die();
    $pending = $dbdata->countStatus(0);
    $active = $dbdata->countStatus(1);
    $banned = $dbdata->countStatus(2);

    $memberStatus = "[".$banned.", ".$active.", ".$pending."]";
  
    $memberCount = $raw['member_id'];
    

    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }
    require_once "../inc/be-header.php";

    if(isset( $_SESSION['role']) &&  $_SESSION['role'] == 'admin' )
    {
      require_once "../inc/be-nav-admin.php";
    }
    else
    {
      header("Location: ../user/user-profile.php");
    }
    
?>

<div class="container-fluid overflow-hidden mb-5">
    <div class="row gx-2 mt-3">
      <?php
        if(isset( $_SESSION['role']) &&  $_SESSION['role'] == 'admin' )
        {
          require_once "../inc/be-sidenav-admin.php";
        }
        else
        {
          require_once "../inc/be-sidenav-user.php";
        }
      ?>

        <div class="col-md-9">
            <div class="border p-4">
                <h2 class="display-5">Dashboard</h2>

                <div class="row g-2">

                    <div class="col-4">
                        <div class="border p-2">
                            <div id="CurrMembers"></div>
                        </div>                    
                    </div>

                    <div class="col-4">
                        <div class="border p-2">
                            <div id="cost"></div>
                        </div>                    
                    </div>

                    <div class="col-4">
                        <div class="border p-2">
                            <div id="revenue"></div>
                        </div>                    
                    </div>

                    <div class="col-6">
                        <div class="border p-3">
                            <h3 class="h3 text-primary">Earning</h2>
                            <div id="earningChart"></div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="border p-3">
                            <h3 class="h3 text-primary">Member Status</h2>
                            <div id="userChart"></div>
                        </div>
                    </div>

                </div>
                
                
            </div>            
        </div>
    </div>
</div>

<script>

    // Demo Data
    // data for the sparklines that appear below header area
    var sparklineData = [47, 45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46];

    // Randomize Array
    var randomizeArray = function (arg) 
    {
        var array = arg.slice();
        var currentIndex = array.length, temporaryValue, randomIndex;

        while (0 !== currentIndex) 
        {

            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex -= 1;

            temporaryValue = array[currentIndex];
            array[currentIndex] = array[randomIndex];
            array[randomIndex] = temporaryValue;
        }

        return array;
        }

    // Summery
    var optionsMember = {
          series: [{
          data: randomizeArray(sparklineData)
        }],
          chart: {
          type: 'area',
          height: 160,
          sparkline: {
            enabled: true
          },
        },
        stroke: {
          curve: 'straight'
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0
        },
        colors: ['#03A9F4'],
        title: {
          text: '<?=$memberCount;?>',
          offsetX: 0,
          style: {
            fontSize: '24px',
          }
        },
        subtitle: {
          text: 'Member',
          offsetX: 0,
          style: {
            fontSize: '14px',
          }
        }
        };

        var currentMember = new ApexCharts(document.querySelector("#CurrMembers"), optionsMember);
        currentMember.render();
      
        var optionsSpark2 = {
          series: [{
          data: randomizeArray(sparklineData)
        }],
          chart: {
          type: 'area',
          height: 160,
          sparkline: {
            enabled: true
          },
        },
        stroke: {
          curve: 'straight'
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0
        },
        colors: ['#DC143C'],
        title: {
          text: '<?=$totalUnpaid;?>',
          offsetX: 0,
          style: {
            fontSize: '24px',
          }
        },
        subtitle: {
          text: 'Due Bill',
          offsetX: 0,
          style: {
            fontSize: '14px',
          }
        }
        };

        var TotalCost = new ApexCharts(document.querySelector("#cost"), optionsSpark2);
        TotalCost.render();
      
        var optionsSpark3 = {
          series: [{
          data: randomizeArray(sparklineData)
        }],
          chart: {
          type: 'area',
          height: 160,
          sparkline: {
            enabled: true
          },
        },
        stroke: {
          curve: 'straight'
        },
        fill: {
          opacity: 0.3
        },
        xaxis: {
          crosshairs: {
            width: 1
          },
        },
        yaxis: {
          min: 0
        },
        colors:['#60CC0F'],
        title: {
          text: '<?=$totalRevenue;?>',
          offsetX: -1,
          style: {
            fontSize: '24px',
          }
        },
        subtitle: {
          text: 'Revenue',
          offsetX: 0,
          style: {
            fontSize: '14px',
          }
        }
        };

        var revenue = new ApexCharts(document.querySelector("#revenue"), optionsSpark3);
        revenue.render();
      

    // User Status
    var options = 
    {
          series: <?=$memberStatus;?>,
          chart: {
          width: 380,
          type: 'donut',
        },
        labels: ['Banned', 'Active', 'Pending'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
    };
    var chartUser = new ApexCharts(document.querySelector("#userChart"), options);
    chartUser.render();

    // Earning
    var options = {
        chart: {
            type: 'line'
        },
        series: [{
            name: 'Payment',
            data: [30000,40000,35000,50000,49000,60000]
        }],
        xaxis: {
            categories: ["January","February","March","April","June","July"]
        }
    }

    var chartEarning = new ApexCharts(document.querySelector("#earningChart"), options);    
    chartEarning.render();
</script>

<?php
    require_once "../inc/be-footer.php"
?>