<?php
    //Create the connection string
    include ("../db_connect.php");

    //Create the query string to read data
    $query = "select * from participant";

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="../img/sing.png">
        <link rel="stylesheet" href="../css/app3.css" />
        <script type="text/javascript" src="../chartjs/Chart.js"></script>

        <title>List of Participant Student Exchange Scholarship to Singapore</title>
    </head>

    <body>
    <?php 
        session_start();
    
        // cek apakah yang mengakses halaman ini sudah login
        if($_SESSION['userrole']==""){
            header("location:../index.php?message=loginfirst");
        }
        if($_SESSION['userrole']=="viewer"){
            header("location:../viewer/view.php?message=notadmin");
        }
    
    ?>
    <div class="card">
    <!-- <img src="../img/sing.png" width="200"> -->
    <h1>List of Participants</h1><h1>Student Exchange Scholarship to Singapore</h1>
        <?php
            //Check the data
            $result = mysqli_query($con, $query);

            if(!$result){
                die("*** Fail to fetch the data <br/> Error Message"
                .mysqli_error($con));
            };
            
            if(mysqli_num_rows($result)==0){
                echo("There is no data to display");
                ?>
                <br/>        
                <br>
                <br>
                <a href="admin.php">Home</a>
                <a href="create.php">Add New Data</a>
                <a href="../logout.php">Logout</a>
                <br>
                <br>
                <footer>
                    Copyright &copy; 2020 Muhammad Fauzi Maulana. All rights reserved.
                </footer>
                <?php
            } else{
        ?>

        <div style="width: 500px;margin: 0px auto;">
            <canvas id="myChart"></canvas>
            <!-- <canvas id="myChart2"></canvas> -->
        </div>
        <br>
        <button id="line">LINE Chart</button>
        <button id="pie">PIE Chart</button>
        <button id="bar">BAR Chart</button>
        <br>
        <br>
        NUS = National University of Singapore
        <br>
        NTU = Nanyang Technological University
        <br>
        SMU = Singapore Management University
        <br>
        SIM = Singapore Institute of Management
        <br>
        SUTD = Singapore Institute of Management
        <br>
        <br>
        <br>
        <?php 
            $jumlah = mysqli_query($con,"select * from participant");
            $total_participant =  mysqli_num_rows($jumlah);
        ?>
        <b> Participant = <?php echo $total_participant; ?> Students</b>
        <br>
        <br>
        <table border="1" align="center">
            <thead>
            <tr>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>From University</th>
                    <th>Your University's Website</th>
                    <th>Selected University in Singapore</th>
                    <th>Action</th>
            </tr>
            </thead>

            <tbody>
                <?php
            
                while ($row = mysqli_fetch_assoc($result)){
                        
                ?>

                <tr>
                    <td><?= $row["full_name"] ?></td>
                    <td><?= $row["gender"] ?></td>
                    <td><?= $row["dob"] ?></td>
                    <td><?= $row["p_address"] ?></td>
                    <td><?= $row["email"] ?></td>
                    <td><?= $row["phone"] ?></td>
                    <td><?= $row["university"] ?></td>
                    <td><?= $row["university_web"] ?></td>
                    <td><?= $row["university_sg"] ?></td>
                    <td><a href='updatedata.php?participant_id=<?= $row["participant_id"] ?>'onclick="return confirm('Are you sure you want to update this data?');">Update</a><a href='delete.php?participant_id=<?= $row["participant_id"] ?>' onclick="return confirm('Are you sure you want to delete this data?');">Delete</a></td>
                </tr>

                <?php
                }

                ?>
            </tbody>



        </table>
                <br/>
                <br>
                <a href="admin.php">Home</a>
                <a href="create.php">Add New Data</a>
                <a href="deleteall.php" onclick="return confirm('Are you sure you want to delete all data?');">Delete All</a>
                <a href="../logout.php">Logout</a>
                <br>
                <br>
                <br>
    
    <!-- new -->
    <script>
		var ctx = document.getElementById("myChart").getContext('2d');
        // var ctx2 = document.getElementById("myChart2").getContext('2d');
		var data = {
					label: 'Participants',
					data: [
					<?php 
                    $jumlah_nus = mysqli_query($con,"select * from participant where university_sg='National University of Singapore (NUS)'");
                    echo mysqli_num_rows($jumlah_nus);
					?>, 
					<?php 
					$jumlah_ntu = mysqli_query($con,"select * from participant where university_sg='Nanyang Technological University (NTU)'");
					echo mysqli_num_rows($jumlah_ntu);
					?>, 
					<?php 
					$jumlah_smu = mysqli_query($con,"select * from participant where university_sg='Singapore Management University (SMU)'");
					echo mysqli_num_rows($jumlah_smu);
					?>, 
					<?php 
					$jumlah_sim = mysqli_query($con,"select * from participant where university_sg='Singapore Institute of Management (SIM)'");
					echo mysqli_num_rows($jumlah_sim);
					?>,
                    <?php 
					$jumlah_sutd = mysqli_query($con,"select * from participant where university_sg='Singapore University of Technology and Design (SUTD)'");
					echo mysqli_num_rows($jumlah_sutd);
					?>
					],
					backgroundColor: [
					// 'rgba(255, 99, 132, 0.2)',
                    'rgba(0,0,0,0)',
					'rgba(36, 37, 42, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
                    'rgba(83, 51, 237, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(36, 37, 42, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
                    'rgba(77, 5, 232, 1)'
					],
					borderWidth: 1
				};
        var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: ["NUS", "NTU", "SMU", "SIM", "SUTD"],
				datasets: [data]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				},
                legend: {
                display: true
                }
			}
		});
        document.getElementById('bar').onclick = function() {
        myChart.destroy();
        myChart = new Chart(ctx, {
            type: 'bar',
            data: {
				labels: ["NUS", "NTU", "SMU", "SIM", "SUTD"],
				datasets: [data]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true,
						}
					}]
				},
                legend: {
                display: false
                }
			}
		});
        };

        document.getElementById('pie').onclick = function() {
        myChart.destroy();
        myChart = new Chart(ctx, {
            type: 'pie',
			data: {
				labels: ["NUS", "NTU", "SMU", "SIM", "SUTD"],
				datasets: [data]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true,
                            display: false
						}
					}]
				},
                legend: {
                display: true
                }
			}
		});
        };

        document.getElementById('line').onclick = function() {
            myChart.destroy();
            myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["NUS", "NTU", "SMU", "SIM", "SUTD"],
                    datasets: [data]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                            }
                        }]
                    },
                    legend: {
                    display: true
                    }
                }
            });
            };
        // var myChart2 = new Chart(ctx2, {
		// 	type: 'bar',
		// 	data: {
		// 		labels: ["NUS", "NTU", "SMU", "SIM", "SUTD"],
		// 		datasets: [data]
		// 	},
		// 	options: {
		// 		scales: {
		// 			yAxes: [{
		// 				ticks: {
		// 					beginAtZero:true,
		// 				}
		// 			}]
		// 		},
        //         legend: {
        //         display: false
        //         }
		// 	}
		// });
	</script>
    </body>
    
        <footer>
            Copyright &copy; 2020 Muhammad Fauzi Maulana. All rights reserved.
        </footer>
    <br>
</div>
    <?php
            }
            include ("../db_disconnect.php");
        ?>



</html>