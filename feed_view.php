<?php
session_start();
    if(!isset($_SESSION["email"])) 
    {
        header("Location:login2.php");
    }
    // Username is root
    $user = 'root';
    $password = '';
     
    // Database name is registration
    $database = 'tesla';
    $servername='localhost';
    $mysqli = new mysqli($servername, $user,
                    $password, $database);
     
    // Checking for connections
    if ($mysqli->connect_error) {
        die('Connect Error (' .
        $mysqli->connect_errno . ') '.
        $mysqli->connect_error);
    }
    $sql="SELECT * FROM feedback";
    $resul = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Dashboard</title>
    <style>

    </style>   
</head>

<body>
<section class="header">
        <div class="logo">
        <h2>TESLA</h2>
        </div>
        <div class="search--notification--profile">
                <div>
                </div>
                        <h2>Welcome Admin</h2>
        </div>
    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
            <li>
                    <a href="admindashboard.php" id="active--link">
                        <span class="icon icon-1"><i class="ri-admin-line"></i></span>
                        <span class="sidebar--item"> Admin Dashboard</span>
                    </a>
                </li>
                
                <li>
                <a href="add_category.php">
                        <span class="icon icon-5"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Add category</span>
                    </a>
                </li>
                <li>
                <a href="insert_brands.php">
                        <span class="icon icon-5"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Add brands</span>
                    </a>
                </li>
                <li>
                   <a href="products.php">
                        <span class="icon icon-5"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Add products</span>
                    </a>
                </li>
                <li>
                   <a href="adproview.php">
                        <span class="icon icon-5"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">View Products</span>
                    </a>
                </li>
                <li>
                   <a href="update_stock.php" >
                        <span class="icon icon-5"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Stock Updation</span>
                    </a>
                </li>
                <li>
                    <a href="admin_order.php" >
                        <span class="icon icon-4"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Manage Order</span>
                    </a>
                </li>
                <li>
                    <a href="datavisualization.php" >
                        <span class="icon icon-4"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">current stock</span>
                    </a>
                </li>
                
                <li>
                    <a href="logout.php ">
                        <span class="icon icon-8"><i class="ri-logout-box-r-line"></i></span>
                        <span class="sidebar--item">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="main--content">
            
            
                <div>
                    <h2 > Feedback</h2>
                </div>
                <?php

if ($resul->num_rows > 0) {
  $texts = array();
  while ($row = $resul->fetch_assoc()) {
      $texts[] = $row["feedback"];
  }
  $url = 'http://127.0.0.1:5000/sentiment';
  $data = json_encode(array('texts' => $texts));
  $options = array(
      'http' => array(
          'header'  => "Content-type: application/json\r\n",
          'method'  => 'POST',
          'content' => $data,
      ),
  );
  $context  = stream_context_create($options);
  $resul = file_get_contents($url, false, $context);
  $resul = json_decode($resul, true);

  $positive = $resul['positive'];
  $negative = $resul['negative'];
  $neutral = $resul['neutral'];
  $total = $positive + $negative + $neutral;

  $pos_percent = ($positive / $total) * 100;
  $neg_percent = ($negative / $total) * 100;
  $neu_percent = ($neutral / $total) * 100;
  $pos_accuracy = ($pos_percent >( $neu_percent+$neg_percent)) ? $pos_percent : (100 -( $neu_percent+$neg_percent));
    $neg_accuracy = ($neg_percent > ($neu_percent+$pos_percent)) ? $neg_percent : (100 - ($neu_percent+$pos_percent));
  $neutral_accuracy = ($neu_percent > ($pos_percent + $neg_percent)) ? $neu_percent : (100 - ($pos_percent + $neg_percent));

 } else {
  echo "No comments.";
  $pos_percent = 0;
  $neg_percent = 0;
  $neu_percent=0;
  $neu_percent = 0;
  $pos_accuracy = 0;
  $neg_accuracy = 0;
  $neu_accuracy = 0;
  $neutral_accuracy=0;
}
?>
<div class="container-fluid">        
    <!-- <h1>Sentiment Analysis </h1> -->
    <div class="chart-container" style="margin-left:10%; width: 50%;
  height: 50%;">
        <canvas id="sentiment-chart"></canvas>
    </div>
    <div>
    <p>Positive: <?php echo $pos_accuracy; ?>%</p>
    <p>Negative: <?php echo $neg_accuracy; ?>%</p>
    <p>Neutral: <?php echo $neutral_accuracy; ?>%</p>
</div>
</div>

    <script>
        var ctx = document.getElementById('sentiment-chart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Positive', 'Negative', 'Neutral'],
                datasets: [{
                    label: 'Sentiment Analysis percentage',
                    data: [<?php echo $pos_percent; ?>, <?php echo $neg_percent; ?>, <?php echo $neu_percent; ?>],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1,
                  
                }]
            },
            
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 10,
                            max: 100
                        }
                    }
                }
            }
        });
    </script>

    <br><br><br>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                            <th>email</th>
                            <th >feedback</th>
                            </tr>
                        </thead>
                       <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                $sql="SELECT * FROM feedback";
    $result = $mysqli->query($sql);
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['feedback'];?></td>
            </tr>
            <?php
                }
            ?>
         </table>
                </div>
            </div>
            </div>
       
        
    </section>
</body>

</html>
