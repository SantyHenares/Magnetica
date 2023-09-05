<?php
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
 

mysqli_set_charset($conn, "utf8");

// Verificamos si el usuario ha hecho clic en el botón "Eliminar"
if (isset($_POST['eliminar'])) {
    // Validamos y escapamos el ID de la nota
    $nota_id = mysqli_real_escape_string($conn, $_POST['nota_id']);
    $sql = "DELETE FROM Blog WHERE id = $nota_id";
    mysqli_query($conn, $sql);
}

// Si se envió un término de búsqueda
if (isset($_POST['busqueda'])) {
    // Sanitizar y escapar el término de búsqueda para evitar inyección SQL
    $busqueda = mysqli_real_escape_string($conn, $_POST['busqueda']);
    
    // Construir la consulta SQL con la cláusula WHERE para buscar notas por título
    $sql = "SELECT * FROM Blog WHERE Titulo LIKE '%$busqueda%'";
} else {
    // Si no se envió un término de búsqueda, mostrar todas las notas
    $sql = "SELECT * FROM Blog  ORDER BY `id` DESC";
}
// Ejecutar la consulta SQL
$result = mysqli_query($conn, $sql);

$sql1 = "SELECT * FROM 	SubCriptos  ORDER BY `id` DESC;";
$resu1 = mysqli_query($conn, $sql1);






?>


<!DOCTYPE html>
<html>
<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <title>Intra Red de Sofia</title>
<style>
body {
  background: url("https://sofiaferreyra.online/Subida/banner5.JPG") no-repeat fixed center center;
  background-size: cover;
}
</style>
</head>

<body >

 
<div class="container-full">
<div class="row align-items-center mt-4">
    <div class="col col-md-4 mt-2 text-center">
<h5>Intra Red Sofia Ferreyra</h5>
    </div>
    <div class="col col-md-4 mt-2">

    </div>
    <div class="col col-md-4">

    </div>
  </div>


<div class="row">
 





<div class="col col-md-8 mt-2 ms-4 p-1 d-grid gap-2 col-6 mx-auto" style="background: rgba(0, 0, 0, 0.7);height: 600px; overflow-y: scroll;">
  <div class="container mt-2 ">
    <?php while ($row = mysqli_fetch_assoc($result)): ?>

<div class="card mt-3 bg-dark text-white border border-white p-2" style="max-width: 840px;">
  <div class="row mt-2 g-0 ">
    <div class="col-md-4 text-center">
        <img src="https://sofiaferreyra.online/Subida/server/NotasImg/<?php echo ($row['imagen']); ?>" alt="<?php echo htmlspecialchars($row['titulo']); ?>" class="img-fluid rounded-start m-2 ">




<p><?php echo strftime('%d-%m-%Y', strtotime($row['fecha'])); ?></p>
<h5>Categoria:</h5><p class="p-2 m-1" style="font-size: 14px;"><?php echo($row['categoria']); ?></p>


    </div>
<div class="col-md-8">
      <div class="card-body">
    
          <h5 class="card-title m-3"><?php echo($row['titulo']); ?></h5>


<p class="p-2 m-1" style="font-size: 14px;"><?php echo($row['texto']); ?></p>



 <p class="card-text m-3"><a href="<?php echo($row['link']); ?>" class="text-white"><?php echo htmlspecialchars($row['link']); ?></a></p>

          <form method="POST" class="d-grid gap-2 d-md-flex justify-content-md-end">
            <input type="hidden" name="nota_id" value="<?php echo htmlspecialchars($row['id']); ?>">
            <button type="submit" name="eliminar" onclick="return confirm('¿Está seguro de que desea eliminar esta nota?')" class="btn btn-danger btn-sm mt-3 mb-1 ">Eliminar</button>
          </form>
</div>

</div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>









<div class="col col-md-2 mt-5 " style="background: rgba(0, 0, 0, 0);height: 600px; ">
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
<button class="btn btn-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Operaciones</button>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header text-white" style="background: rgba(0, 0, 0, 8);">
    <h5 class="offcanvas-title" id="Operaciones">Operaciones...</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body"  style="background: rgba(0, 0, 0, 8);">
 <div class="container mt-5">
<a href="https://sofiaferreyra.online/Subida/server/ingresarNotas.html" class=" btn btn-secondary  mt-3 ">Escribir una Nueva Nota</a>
<div class="col-auto mt-3">

<form method="post" ">
<label for="Input1" class="form-label text-light">Buscar Nota por palabra en el Título </label>
<div class="input-group mb-3">
<input type="text" name="busqueda" placeholder="Buscar por título" id="Input1" class="form-control">
<input type="submit" value="Buscar" class="btn btn-secondary">
</div>
</form>

</div>
</div>
<div class="container mt-5">
<button type="button" class="btn btn-primary mt-5 " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Click para ver E-mail Subcriptos
</button>
</div>
  </div>
</div>











<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content" style="color:white;background: rgba(0, 0, 0, 0.9);height: 60vh; ">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     <div class="modal-body">
  <?php while ($row = mysqli_fetch_assoc($resu1)): ?>
    <p class="m-2"><?php echo htmlspecialchars($row['Correo']); ?></p>
  <?php endwhile; ?>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
 
      </div>
    </div>
  </div>
</div>
</div>
</div>
</body>
</html>

<?php
// Cerramos la conexión a la base de datos
mysqli_close($conn);
?>