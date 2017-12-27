<!-- load header in page/header -->
<?php $this->load->view('page/header'); ?>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/wordcloud.js"></script>



<!-- load sidebar in page/sidebar -->
<?php $this->load->view('page/sidebar'); ?>

<!-- Load navbar in page/navbar -->
<?php $this->load->view('page/navbar'); ?>


<div class="content">
    <div class="row">
<div id="container2" class="col-md-12"></div>
        <div id="bulan" class="col-md-12"></div>
        </div>
</div>

<script>
Highcharts.chart('container2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Statistik'
    },
    subtitle: {
        text: 'Peminjam dalam seminggu <?php echo date(''); ?>'
    },
    xAxis: {
        categories: [
            '7 Hari lalu',
            '6 Hari lalu',
            '5 Hari lalu',
            '4 Hari lalu',
            '3 Hari lalu',
            '2 Hari lalu',
            'Kemarin',
            'Hari ini',
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'ORANG'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y}'
            }
        }
    },
    series: [{
        name: 'Peminjam',
        data: <?php echo $data; ?>
        

    }],
        credits: {
        enabled : false
    }
        
});
             
	
	Highcharts.chart('bulan', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
    title: {
        text: 'Peminjam dalam<br>2 bulan<br>terakhir',
        align: 'center',
        verticalAlign: 'middle',
        y: 40
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            dataLabels: {
                enabled: true,
                distance: -50,
                style: {
                    fontWeight: 'bold',
                    color: 'white'
                }
            },
            startAngle: -90,
            endAngle: 90,
            center: ['50%', '75%']
        }
    },
    series: [{
        type: 'pie',
        name: 'Peminjam',
        innerSize: '50%',
        data: [<?php echo $bulan; ?>]
    }]
});
</script>

        <?php $this->load->view('page/footer'); ?>

</body>

    <!--   Core JS Files   -->
    <?php $this->load->view('page/js'); ?>

</html>
