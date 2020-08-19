<!DOCTYPE html>
<html>
<head>
	<title>Pagination</title>
	<table class="table table-striped table-bordered">
<thead>
<tr>
<th style='width:50px;'>ID</th>
<th style='width:150px;'>Name</th>
<th style='width:50px;'>Email</th>
</tr>
</thead>
<tbody>

<?php 
#Database Connection
require_once('db_connection.php');
#Get the Current Page Number
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
        }
#SET Total Records Per Page Value
$total_records_per_page = 3;
#Calculate OFFSET Value and SET other Variables
$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";
#Get the Total Number of Pages for Pagination
$result_count = mysqli_query(
$conn,
"SELECT COUNT(*) As total_records FROM users"
);
$total_records = mysqli_fetch_array($result_count);
$total_records = $total_records['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total pages minus 1
#SQL Query for Fetching Limited Records using LIMIT Clause and OFFSET
$result = mysqli_query(
    $conn,
    "SELECT * FROM users LIMIT $offset, $total_records_per_page"
    );
while($row = mysqli_fetch_array($result)){
    echo "<tr>
 <td>".$row['id']."</td>
 <td>".$row['name']."</td>
 <td>".$row['email']."</td>
 </tr>";
        }
mysqli_close($conn);

$pagination = 'SELECT * FROM `pagination_table` LIMIT 3 OFFSET 4';
	/*Or you can use shorthand method as well.

SELECT * FROM `pagination_table` LIMIT 4, 3;
The difference between both queries that in first method you write LIMIT value after LIMIT and OFFSET value after OFFSET, but in shorthand method you write OFFSET value after LIMIT clause and  LIMIT value after comma (,).
*/

 ?>
</tbody>
</table>
<!--Showing Current Page Number Out of Total-->


<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>
<!-- Creating Pagination Buttons-->
<ul class="pagination">
<?php if($page_no > 1){
echo "<li><a href='?page_no=1'>First Page</a></li>";
} ?>
    
<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
<a <?php if($page_no > 1){
echo "href='?page_no=$previous_page'";
} ?>>Previous</a>
</li>

<li><?php
if ($total_no_of_pages <= 10){   
 for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
 if ($counter == $page_no) {
 echo "<li class='active'><a>$counter</a></li>"; 
         }else{
        echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }
        }
}elseif ($total_no_of_pages > 10){
if($page_no <= 4) { 
 for ($counter = 1; $counter < 8; $counter++){ 
 if ($counter == $page_no) {
    echo "<li class='active'><a>$counter</a></li>"; 
 }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }
}
echo "<li><a>...</a></li>";
echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
}
}elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) { 
echo "<li><a href='?page_no=1'>1</a></li>";
echo "<li><a href='?page_no=2'>2</a></li>";
echo "<li><a>...</a></li>";
for (
     $counter = $page_no - $adjacents;
     $counter <= $page_no + $adjacents;
     $counter++
     ) { 
     if ($counter == $page_no) {
 echo "<li class='active'><a>$counter</a></li>"; 
 }else{
        echo "<li><a href='?page_no=$counter'>$counter</a></li>";
          }                  
       }
echo "<li><a>...</a></li>";
echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
}else {
echo "<li><a href='?page_no=1'>1</a></li>";
echo "<li><a href='?page_no=2'>2</a></li>";
echo "<li><a>...</a></li>";
for (
     $counter = $total_no_of_pages - 6;
     $counter <= $total_no_of_pages;
     $counter++
     ) {
     if ($counter == $page_no) {
 echo "<li class='active'><a>$counter</a></li>"; 
 }else{
        echo "<li><a href='?page_no=$counter'>$counter</a></li>";
 }                   
     }
}
?>
	
</li>
    
<li <?php if($page_no >= $total_no_of_pages){
echo "class='disabled'";
} ?>>
<a <?php if($page_no < $total_no_of_pages) {
echo "href='?page_no=$next_page'";
} ?>>Next</a>
</li>
 
<?php if($page_no < $total_no_of_pages){
echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
} ?>
</ul>
</head>
<body>

</body>
</html>

