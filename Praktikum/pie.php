<?php
include('conn.php');
$covid = mysqli_query($koneksi,"select * from praktikun13");
while($row = mysqli_fetch_array($covid)){
	$nama_negara[] = $row['Country'];
	
	$query = mysqli_query($koneksi,"select * from praktikun13 where country='".$row['Country']."'");
	$row = $query->fetch_array();
	$jumlah_case[] = $row['Total_Cases'];
}
?>
<!doctype html>
<html>

<head>
	<title>Pie Chart</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>

<body>
	<div id="canvas-holder" style="width:50%">
		<canvas id="chart-area"></canvas>
	</div>
	<script>
		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data:<?php echo json_encode($jumlah_case); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.4)',
					'rgba(54, 162, 235, 0.4)',
					'rgba(255, 206, 86, 0.4)',
					'rgba(241, 5, 86, 0.4)',
					'rgba(89, 23, 221, 0.4)',
					'rgba(0, 255, 255, 0.4)',
					'rgba(225, 255, 0, 0.4)',
					'rgba(0, 255, 0, 0.4)',
					'rgba(121, 56, 124, 0.4)',
					'rgba(75, 192, 192, 0.4)',
					'rgba(255, 0, 0, 0.4)',
					'rgba(0, 0, 255, 0.4)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(241, 5, 86, 1)',
					'rgba(89, 23, 221,1)',
					'rgba(0, 255, 255, 1)',
					'rgba(225, 255, 0, 1)',
					'rgba(0, 255, 0, 1)',
					'rgba(121, 56, 124, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(255, 0, 0, 1)',
					'rgba(0, 0, 255, 1)'
					],
					label: 'Presentase Kasus Covid-19 Tiap Negara'
				}],
				labels: <?php echo json_encode($nama_negara); ?>},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>
</body>

</html>
