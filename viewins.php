<!DOCTYPE html>
<html>
<head>
<title>INSURANCE</title>
<style>
body {background-image: url('green.jpg');}
table {
border-collapse: collapse;
width: 100%;
color: rgb(6, 25, 34);
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #17408b;
color: white;
}
tr:nth-child(even) {background-color: #27fdf3}
tr:nth-child(odd) {background-color: #6CB4EE}
.button {
  background-color: #04AA6D; /* Green background */
  border: 1px solid green; /* Green border */
  color: black; /* White text */
  font-size: large;
  padding: 10px 24px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  display: block;
  align-items: center;
  padding:30px;
  display: flex;
  margin: auto;
 
}
.container{  
  display: flex;
  justify-content: center;
  align-items: center;
  height: 200px;
   }
</style>
</head>
<body>


<table align="center">
<tr>
<th>PATIENT ID</th>
<th>POLICY NUMBER</th>
<th>AMOUNT</th>
<th>NOMINEE</th>
<th>DATE OF MATURITY</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "patient details");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM insurance";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["pid"]. "</td><td>" . $row["policynumber"]    . "</td><br><td>"
. $row["amount"]. "</td><td>" .$row["nominee"] . "</td><td>" .$row["dateofmaturity"] . "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
<button class="button" onclick="location.href='viewtable.html'" type="button">BACK</button>
</table>
</body>
</html>