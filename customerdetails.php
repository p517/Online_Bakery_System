<style type="text/css">
  table, th, td 
  {
    border: 1px solid black;
    border-collapse: collapse;
  }
  th, td {
    padding-left: 15px;
    padding-right: 15px;
  }
</style>

<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "checkoutsystem";

  $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) 
    {
      die("Connection failed: " . $conn->connect_error);
    }

  $sql = "SELECT * FROM bill";
  $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
      echo "<table>";
        echo "<th>Customer_Id</th><th>Full_Name</th><th>Email</th><th>Address</th><th>City</th><th>State</th><th>Zipcode</th>";
      while($row = $result->fetch_assoc()) 
      {
        echo "<tr>";
        echo "<td>" . $row["Customer_Id"]. "</td> 
        <td>" . $row["Full_Name"]. "</td>
        <td>" . $row["Email"]. "</td>
        <td>" . $row["Address"]."</td>
        <td>" . $row["City"]."</td> 
        <td>" .$row["State"]. "</td>
        <td>". $row["Zipcode"]."</td>";
        echo "</tr>";
      }
      echo "</table>";
    } 
    else 
    {
      echo "0 results";
    }
  $conn->close();


if(array_key_exists("DELETE", $_POST))
{
button();
}
function button()
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "checkoutsystem";
$conn = new mysqli($servername, $username, $password, $dbname);
$Customer_Id = $_POST['Customer_Id'];
$sql = "DELETE FROM bill WHERE Customer_Id = '$Customer_Id'";
$result = $conn->query($sql);
$conn->close();
header("refresh: 0.1");
}
?>
<form method="post" style="margin: 20px;">
<h3 style="margin-left: 20px">Enter ID to delete the record of those customer whose order has been completed successfully !</h3>

<input type="number" name="Customer_Id" max="1000" placeholder="Customer ID" style="margin-
left: 20px" width="100px">

<input type="submit" name="DELETE" value=" DELETE " />
</form>
