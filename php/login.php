<?php
 $servername = "localhost";
 $username = "rahulyadav";
 $password = "Rahulyadav@2399";
 $database = "test";



$target_dir = "../imge/";
// $target_file = $target_dir .($_FILES["image"]["name"]);
// $uploadOk = 1;
//  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 $conn = new mysqli($servername, $username, $password, $database);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
$loginname = $_POST["email"];
$code = $_POST["passwrd"];

  $sql = "SELECT * FROM Registeration WHERE email_id='".$loginname."' AND password='".$code."';";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>
<table style="width:100%">
<link rel="stylesheet" type="text/css" href="../css/miniprj6.css">
<tr>
    <th>Name</th>
    <!-- <th>Lastname</th> -->
    <th>Email</th> 
    <th>Contact</th>
    <th>Age</th>
    <th>Profile photo</th>

  </tr>

<?php


// $sql = "INSERT INTO login (username, passwrd)
//   VALUES ('$loginname', '$code');";

$sql = "SELECT * FROM Registeration WHERE email_id='".$loginname."' AND password='".$code."';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Hello!!&nbsp;".$row["firstname"]."  ". $row["lastname"];      

echo "<img src='../".$row["image"]."' style='width:50px; height:50px; border-radius:100%; float:right;'>";
}
}

// $conn->close();
$sql = "SELECT * FROM Registeration";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
        <td> <?php      echo $row["firstname"];?> &nbsp; <?php     echo $row["lastname"];?> </td>
        <!-- <td> <?php      echo $row["lastname"];?> </td> -->
        <td> <?php      echo $row["email_id"];?> </td>
        <td> <?php      echo $row["contact"];?> </td>
        <td> <?php      echo $row["age"];?> </td>
        <td> <?php      echo "<img src='../".$row["image"]."' style='width:100px; height:100px; border-radius:100%;'>";?> </td>

        </tr>
<?php
    }
  }

  }}
     else {
       echo"ERROR: PLEASE CHECK YOUR LOGIN CREDENCIALS.";
     } 
?>
</table>