<?php
include('conn.php');
$covid = mysqli_query($koneksi,"select * from praktikun13");
while($row = mysqli_fetch_array($covid)){
	$nama_negara[] = $row['Country'];
	
	$query = mysqli_query($koneksi,"select * from praktikun13 where country='".$row['Country']."'");
	$row = $query->fetch_array();
	$new_case[] = $row['New_Cases'];
	$death_case[] = $row['Total_Deaths'];
	$new_deaths[] = $row['New_Deaths'];
	$recover[] = $row['Total_Recovered'];
	$active_case[] = $row['Active_Cases'];
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
				datasets: [
				{
					label: 'New Cases',
					data: <?php echo json_encode($new_case); ?>,
					backgroundColor: 'rgba(255, 99, 132, 1)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				},
				{
					label: 'Death Cases',
					data: <?php echo json_encode($death_case); ?>,
					backgroundColor: 'rgba(207, 0, 15, 1)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1 
				},
				{
					label: 'New Death',
					data: <?php echo json_encode($new_deaths); ?>,
					backgroundColor: 'rgba(240, 52, 52, 1))',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1 
				},
				{
					label: 'Recovered',
					data: <?php echo json_encode($recover); ?>,
					backgroundColor: 'rgba(0, 177, 106, 1)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				},
				{
					label: 'Active Cases',
					data: <?php echo json_encode($active_case); ?>,
					backgroundColor: 'rgba(255, 203, 5, 1)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				}
				]
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