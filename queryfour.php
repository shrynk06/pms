<!DOCTYPE html>
<html>
<head>
<title>PATIENTS</title>
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
<th>NAME</th>
<th>PID</th>
<th>DATE VISITED</th>
<th>MEDICATION</th>
<th>CONDITION</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "patient details");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT patient.name, medicalhistory.pid, medicalhistory.mdate, medicalhistory.medication, medicalhistory.conditionn
FROM patient
JOIN medicalhistory ON patient.pid = medicalhistory.pid
WHERE medicalhistory.mdate BETWEEN '2017-01-01' AND '2017-12-31'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["name"]. "</td><td>" . $row["pid"]    . "</td><br><td>"
. $row["mdate"]. "</td><td>" .$row["medication"] . "</td><td>" .$row["conditionn"] . "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
<button class="button" onclick="location.href='querydash.html'" type="button">BACK</button>
</table>
</body>
</html>