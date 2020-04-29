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
<!DOCTYPE html>
<html>
<head>
	<title>Membuat Grafik Menggunakan Chart JS</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<div style="width: 800px;height: 800px">
		<canvas id="myChart"></canvas>
	</div>


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($nama_negara); ?>,
				datasets: [{
					label: 'Grafik Covid-19',
					data: <?php echo json_encode($jumlah_case); ?>,
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>