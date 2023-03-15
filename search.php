<?php
include 'connection.php';
if(isset($_POST["search"])){
  $output="";
  $search = $_POST["search"];
  $search=preg_replace("#[^0-9a-z]#", "", $search);
  $service_search=mysqli_query($con,"SELECT * FROM tbl_products WHERE status='true' AND product_title LIKE '%$search%'");
  if(mysqli_num_rows($service_search)==0)
  {
      $output='There was no search results. ';
    
  }
  else{
    while($row=mysqli_fetch_assoc($service_search))
    {
        $service_data=$row['product_title'];
        $id=$row['product_id'];
        $output .= '<div class="results-item" style="margin: bottom 2px;">'.$service_data.'</div>';

    }
  }
}



echo'<script>
        $(".results-item").hover(
          function() {
            $(this).css("background-color", "lightgray");
          },
          function() {
            $(this).css("background-color", "");
          }
        );
        $(".results-item").click(function() {
          var value=$(this).text();
          $("#search-input").val(value);
        });
  </script>';
  echo ($output);
  

?>