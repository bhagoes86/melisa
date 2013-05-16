
<!DOCTYPE HTML>
<html>
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Highcharts Example</title>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/highchart/js/highcharts.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/highchart/js/modules/exporting.js"></script>		
        <script type="text/javascript">
            $(function () {
                var chart;
                $(document).ready(function() {
                    chart = new Highcharts.Chart({
                        chart: {
                            renderTo: 'container',
                            type: 'column'
                        },
                        title: {
                            text: 'Statistik video per topik'
                        },
                        subtitle: {
                            text: 'Vabel'
                        },
                        xAxis: {
                            title: {
                                text: 'Topic'
                            },
                                labels:
                            {
                                enabled: false
                            }
                            ,
                            categories: [
                                <?php
                                    $i = 0;
                                    $test = count($topic);
                                    foreach ($topic as $row):
                                        echo "'$row->topic'";
                                        //echo $row->id_topic;
                                        if ($i + 1 != $test) {
                                            echo ",";
                                        }
                                        $i++;
                                    endforeach;
                                    ?>
                            ]
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Jumlah'
                            }
                        },
                        legend: {
                            layout: 'vertical',
                            backgroundColor: '#FFFFFF',
                            align: 'left',
                            verticalAlign: 'top',
                            x: 50,
                            y: 50,
                            floating: true,
                            shadow: true
                        },
                        tooltip: {
                            formatter: function() {
                                return ''+
                                    this.x +': '+ this.y +' video';
                            }
                        },
                        plotOptions: {
                            column: {
                                pointPadding: 0.2,
                                borderWidth: 0
                            }
                        },
                        series: [{
                                
                                name: 'Jumlah Video',
                                color : '#4572A7',
                                data: [
                                <?php
                                    $i = 0;
                                    $test = count($topic);
                                    foreach ($topic as $row):
                                        echo $row->jmlh_video;
                                        if ($i + 1 != $test) {
                                            echo ",";
                                        }
                                        $i++;
                                    endforeach;
                                    ?>
                                ]
    
                            }
                            ]
                    });
                });
    
            });
        </script>
        <script type="text/javascript">
            $(function () {
                var chart;
                $(document).ready(function() {
                    chart = new Highcharts.Chart({
                        chart: {
                            renderTo: 'container1',
                            type: 'column'
                        },
                        title: {
                            text: 'Statistik video per kategori'
                        },
                        subtitle: {
                            text: 'Vabel'
                        },
                        xAxis: {
                            title: {
                                text: 'Kategori'
                            },
                                labels:
                            {
                                enabled: false
                            }
                            ,
                            categories: [
                                <?php
                                    $i = 0;
                                    $test = count($kategori);
                                    foreach ($kategori as $row):
                                        echo "'$row->category'";
                                        //echo $row->id_topic;
                                        if ($i + 1 != $test) {
                                            echo ",";
                                        }
                                        $i++;
                                    endforeach;
                                    ?>
                            ]
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Jumlah'
                            }
                        },
                        legend: {
                            layout: 'vertical',
                            backgroundColor: '#FFFFFF',
                            align: 'left',
                            verticalAlign: 'top',
                            x: 50,
                            y: 50,
                            floating: true,
                            shadow: true
                        },
                        tooltip: {
                            formatter: function() {
                                return ''+
                                    this.x +': '+ this.y +' video';
                            }
                        },
                        plotOptions: {
                            column: {
                                pointPadding: 0.2,
                                borderWidth: 0
                            }
                        },
                        series: [{
                                name: 'Jumlah Video',
                                color : '#89A54E'
                                ,
                                data: [
                                <?php
                                    $i = 0;
                                    $test = count($kategori);
                                    foreach ($kategori as $row):
                                        echo $row->jumlah_konten;
                                        if ($i + 1 != $test) {
                                            echo ",";
                                        }
                                        $i++;
                                    endforeach;
                                    ?>
                                ]
    
                            }
                            ]
                    });
                });
    
            });
        </script>
        <script type="text/javascript">
            $(function () {
                var chart;
                $(document).ready(function() {
                    chart = new Highcharts.Chart({
                        chart: {
                            renderTo: 'container2',
                            type: 'column'
                        },
                        title: {
                            text: 'Statistik video per facultas'
                        },
                        subtitle: {
                            text: 'Vabel'
                        },
                        xAxis: {
                            title: {
                                text: 'Faculty'
                            },
                                labels:
                            {
                                enabled: false
                            }
                            ,
                            categories: [
                                <?php
                                    $i = 0;
                                    $test = count($faculty);
                                    foreach ($faculty as $row):
                                        echo "'$row->faculty'";
                                        //echo $row->id_topic;
                                        if ($i + 1 != $test) {
                                            echo ",";
                                        }
                                        $i++;
                                    endforeach;
                                    ?>
                            ]
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Jumlah'
                            }
                        },
                        legend: {
                            layout: 'vertical',
                            backgroundColor: '#FFFFFF',
                            align: 'left',
                            verticalAlign: 'top',
                            x: 50,
                            y: 50,
                            floating: true,
                            shadow: true
                        },
                        tooltip: {
                            formatter: function() {
                                return ''+
                                    this.x +': '+ this.y +' video';
                            }
                        },
                        plotOptions: {
                            column: {
                                pointPadding: 0.2,
                                borderWidth: 0
                            }
                        },
                        series: [{
                                name: 'Jumlah Video',color : '#AA4643',
                                data: [
                                <?php
                                    $i = 0;
                                    $test = count($faculty);
                                    foreach ($faculty as $row):
                                        echo $row->jumlah_konten;
                                        if ($i + 1 != $test) {
                                            echo ",";
                                        }
                                        $i++;
                                    endforeach;
                                    ?>
                                ]
    
                            }
                            ]
                    });
                });
    
            });
        </script>
    </head>
    <body>
        <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
        <div id="container1" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
        <div id="container2" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
    </body>
</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               