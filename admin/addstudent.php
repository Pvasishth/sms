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
<form method="post" action="" enctype="multipart/form-data">
	<table border="1" align="center" style="width: 70%; margin-top: 40px;">
		<tr>
			<th>Roll No</th>
			<td><input type="text" name="rollno" placeholder="Enter Rollno"></td>
		</tr>
		<tr>
			<th>Full Name</th>
			<td> <input type="text" name="name" placeholder="Enter Full Name"></td>
		</tr>
		<tr>
			<th>City</th>
			<td> <input type="text" name="city" placeholder="Enter City"></td>
		</tr>
		<tr>
			<th>Parents Contact no</th>
			<td> <input type="text" name="pcon" placeholder="Enter the Contact no of Parents"></td>
		</tr>
		<tr>
			<th>Standerd</th>
			<td> <input type="number" name="std" placeholder="Enter Standerd"></td>
		</tr>
		<tr>
			<th>Image</th>
			<td> <input type="file" name="simg"></td>
		</tr>
		<tr>
			<td colspan="2" align="center"> <input type="submit" name="submit" value="submit"></td>
		</tr>
		</table>
</form>
</body>
</html>
<?php 
	if 
		(isset($_POST['submit'])) 
	{
		include('../dbcon.php');
		$rollno= $_POST['rollno'];
		$name= $_POST['name'];
		$city=$_POST['city'];
		$pcon= $_POST['pcon'];
		$std= $_POST['std'];
		$imagename= $_FILES['simg']['name'];
		$tempname= $_FILES['simg']['tmp_name'];
		move_uploaded_file($tempname,"../dataimg/$imagename");

		$qry="INSERT INTO student (rollno,name,city,pcon,std,image) VALUES('$rollno','$name','$city','$pcon','$std','$imagename')"; 
        if($con->query($qry)==true)
        {
			?>
			<script>alert('Record Inserted Successful')</script>
			<?php
        }
        else{
        	echo "Data Not Inserted";
        }
	}		
?>
					
	
