<?php
session_start();
    if(isset($_SESSION['uid']))
    {
        echo "";
    }
else
{
    header('location: ../login.php');
}

?>

<?php  
include ('header.php');
include ('titlehead.php');
?>	
<table align="center" border="1">
<form action="" method="post">
<tr>
<th>Enter Standerd</th>
<td><input type="number" name="standerd" placeholder="Enter Standerd"/></td>
<th>Enter Student Name</th>
<td><input type="name" name="stuname" placeholder="Enter Student Name"/></td>
<td colspan="2"><input type="submit" name="submit" value="Search"></td>
</tr>
</form>
</table>
<table align="center" width="80%" border="1" style="margin-top:10px;">
    <tr style="background-color:#000; color:#fff;">
        <th>No.</th>
        <th>Image</th>
        <th>Name</th>
        <th>Roll No.</th>
        <th>Edit</th>
        
    </tr>
    <?php
if(isset($_POST['submit']))
{
    include('../dbcon.php');
    $standerd = $_POST['standerd'];
    $name= $_POST['stuname'];
    $qry="SELECT * FROM `student` where std='$standerd' OR name='$name'";
    $run=mysqli_query($con,$qry);
    $result = mysqli_num_rows( $run );
    if( $result < 1 ) {
        echo "<tr><td>No Records Found</td></tr>";
    } else {   
        $count=0;
        while($data=mysqli_fetch_assoc($run)) {
            $count++;
        ?>
            <tr>
                <td><?php echo $count;?></td>
                <td><img src="../dataimg/<?php echo $data['image'];?>" style="widht:50px;" height='50px';/></td>
                <td><?php  echo $data['name']; ?></td>
                <td><?php  echo $data['rollno']; ?></td>
                <td>Edit</td>
          </tr>

          <?php
        }
    }
}
    ?>
</table>