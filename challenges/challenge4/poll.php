<?php
session_start();
if(!isset($_SESSION['yes'])) {
    $_SESSION['yes'] = 25;
}
if(!isset($_SESSION['maybe'])) {
    $_SESSION['maybe'] = 40;
}
if(!isset($_SESSION['no'])) {
    $_SESSION['no'] = 30;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>

        <script>
        
        function updatePoll() {
            $("#container").html("<img src='img/loading.gif' />");
            $.ajax({
                type: "GET",
                url: "return.php",
                data: {"choice": $('#radio').val()},
                success: function(data, status) {
                    updatePollChart(data['yes'], data['maybe'], data['no']);
                }
            });
            //Include here the AJAX call 
            //on Success, call the 'updatePollChart' function passing the percentages of the three choices, for example:
            //updatePollChart(25,40,30);
        }
        
        //You can change the choice names if different from "yes", "maybe", and "no"
        function updatePollChart(yes, maybe, no) {
            Highcharts.chart('container', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: ''
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Choices',
                        colorByPoint: true,
                        data: [{
                            name: 'Yes',
                            y: yes
                        }, {
                            name: 'Maybe',
                            y: maybe,
                            sliced: true,
                            selected: true
                        }, {
                            name: 'No',
                            y: no
                        }]
                    }]
                });
        }//endFunction
        
        </script>
        
    </head>
    <body>

      <h1> Is Global Warming Real? </h1>
      <label><input type="radio" name="radioButton" id="radio" value="radio1" <?=($_GET['radioButton']=='radio1')?"checked":""?>>Yes</label>
      <label><input type="radio" name="radioButton" id="radio" value="radio2" <?=($_GET['radioButton']=='radio2')?"checked":""?>>Maybe</label>
      <label><input type="radio" name="radioButton" id="radio" value="radio3" <?=($_GET['radioButton']=='radio3')?"checked":""?>>No</label>
      <br>
      <button onclick="updatePoll()">Submit</button>
      <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

    </body>
</html>