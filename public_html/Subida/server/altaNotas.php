<?php
include "db.php";
$titulo=$_POST['titulo'];
$texto=$_POST['texto'];
$categoria=$_POST['categoria'];
$link=$_POST['link'];



if(!isset($_POST['titulo'])){
		header("Location:ingresarNotas.php");

	}else{
			$allowedExts = array("gif", "jpeg", "jpg", "png");
			$temp = explode(".", $_FILES["isologo"]["name"]);
			$extension = end($temp);
			$isologo="";
			$random=rand(1,999999);

				//Verificamos que sea una imagen
		  	if ($_FILES["isologo"]["error"] > 0){
		  		//verificamos que venga algo en el input file
		    	echo "Error numero: " . $_FILES["isologo"]["error"] . "<br>";
		    }else{
		    	//subimos la imagen

		    	$isologo= $random.'_'.$_FILES["isologo"]["name"];
		    	if(file_exists("NotaImg/".$random.'_'.$_FILES["isologo"]["name"])){
		      		echo $_FILES["isologo"]["name"] . " Ya existe. ";
		      	}else{
		      		move_uploaded_file($_FILES["isologo"]["tmp_name"],
		      		"NotasImg/" .$random.'_'.$_FILES["isologo"]["name"]);
		      		echo "Archivo guardado en " . "NotasImg/" .$random.'_'. $_FILES["isologo"]["name"];


							}

			}

}
	

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

mysqli_set_charset($conn, "utf8");


$sql="INSERT INTO Blog (titulo,texto,categoria,link,imagen) VALUES ('$titulo','$texto','$categoria','$link','$isologo')";
$resultado=mysqli_query($conexion,$sql);


if (mysqli_query($conn, $sql)) {
      echo "Tu registro se ha realizado con exito ";

               // echo"<script language='javascript'>window.location='index.html'</script>;";
                exit();
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);


?>