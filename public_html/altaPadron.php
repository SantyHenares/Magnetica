<?php
$Nombre=$_POST['Nombre'];
$Correo=$_POST['Correo'];
$Cel=$_POST['Cel'];

$servername = "localhost";
$database = "c1322042_datos";
$username = "c1322042_datos";
$password = "wo79ZAtuno";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Conexion exitosa_";



$sql = "INSERT INTO SubCriptos(Nombre, Correo, Cel) VALUES ('$Nombre', '$Correo', '$Cel')";


if (mysqli_query($conn, $sql)) {
      echo "Tu registro se ha realizado con exito ";
 header("Location:index.html");
                echo"<script language='javascript'>window.location='index.html'</script>;";
                exit();
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>