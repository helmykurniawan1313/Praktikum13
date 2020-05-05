<?php
include('conn.php');
$query = mysqli_query($koneksi,"select sum(Total_Cases) as Total_Cases, sum(New_Cases) as New_Cases, sum(Total_Deaths) as Total_Deaths, sum(new_deaths) as New_Deaths, sum(total_recovered) as Total_Recovered, sum(active_cases) as Active_Cases from praktikun13");
$row = 	$query->fetch_array();
$total_case[] = $row['Total_Cases'];
	$new_case[] = $row['New_Cases'];
	$total_death[] = $row['Total_Deaths'];
	$new_death[] = $row['New_Deaths'];
	$recovered[] = $row['Total_Recovered'];
	$active_cases[] = $row['Active_Cases'];

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	
	</style>
	<title>Membuat Grafik Menggunakan Chart JS</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	
						<canvas id="myChart"></canvas>
					
	<script>
		var ctx = document.getElementById("myChart");
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ['Total Cases','New Cases','Total Death', 'New Death', 'Total Recovered', 'Active Cases'],
				datasets: [{ 
					data: [<?php 
						echo json_encode($total_case); 
						echo ', '; 
						echo json_encode($new_case); 
						echo ', '; 
						echo json_encode($total_death);
						echo ', '; 
						echo json_encode($new_death); 
						echo ', '; 
						echo json_encode($recovered);
						echo ', '; 
						echo json_encode($active_cases);
						   ?>],
					label: 'Total Cases', 
        			backgroundColor:[ 
						'rgba(255, 99, 132, 1)',
						'rgba(207, 0, 15, 1)',
						'rgba(240, 52, 52, 1)',
						'rgba(0, 177, 106, 1)',
						'rgba(255, 203, 5, 1)',
						'rgba(89, 167, 144, 1)'
					]
				}
			]
			},
			options: {
    title: {
      display: true,
      text: 'Total cases Covid-19 in the World'
    }
  }
});
	</script>
</body>
</html>