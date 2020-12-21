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
// define variables and set to empty values

  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $email = $_POST["email"];
  $contact = $_POST["contact"];
  $age = $_POST["age"];
  $code = $_POST["code"];
  $confcode = $_POST["confirmcode"];
  $check_fname = filter_var($firstname, FILTER_SANITIZE_STRING);
  $check_lname = filter_var($lastname, FILTER_SANITIZE_STRING);
  $check_age = filter_var($age, FILTER_VALIDATE_INT);
  

  
  // $target_file2 = $target_dir2 .($_FILES["photo"]["name"]);
  // $target_dir2 = "loginimge/";

  $servername = "localhost";
  $username = "rahulyadav";
  $password = "Rahulyadav@2399";
  $database = "test";
  $target_dir = "../imge/";
   $target_file = $target_dir .($_FILES["image"]["name"]);
   $uploadOk = 1;
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 if ($code === $confcode){
  $conn = new mysqli($servername, $username, $password, $database);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "INSERT INTO Registeration (firstname, lastname, email_id, contact, age, password, image)
  VALUES ('$check_fname', '$check_lname', '$email', '$contact', '$check_age', '$code', '$target_file');";


  

if ($conn->query($sql) === TRUE) { 
          echo "*Welcome!&nbsp;".$check_fname."&nbsp;".$check_lname."<br>";
          echo "*Registeration sucessfull*<br>";
      }
       else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }



  
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.<br>";
      $uploadOk = 0;
    }
  }
  
  // Check file size
  if ($_FILES["image"]["size"] > 900000000) {
    echo "Sorry, your file is too large.<br>";
    $uploadOk = 0;
  }
  
  // Allowed file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      // echo "The file ". htmlspecialchars(( $_FILES["image"]["name"])). " has been uploaded.<br>";
    } else {
      echo "Sorry, there was an error uploading your file.<br>";
    }
  }



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
        <td> <?php      echo "<img src='../".$row["image"]."' style='width:100px; height:100px; border-radius: 100%;'>";?> </td>

        </tr>


        <?php
    }
} else {
    echo "0 results";
}
}
else{
  echo " Registeration Unsucessfull!! <br> Error: Created Password isn't same <br>";
  $uploadOk = 0;
}
$conn->close();
?>


</table>
