<?php
header('Content-Type: text/html; charset=utf-8');

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
$sql2 = "SELECT * FROM Blog  ORDER BY `id` DESC";
// Ejecutar la consulta SQL
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Contenido Gratuito</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/terceros/aos/aos.css" rel="stylesheet">
  <link href="assets/terceros/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/terceros/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/terceros/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/terceros/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/terceros/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>


  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:sofiaferreyrainc@gmail.com">sofiaferreyrainc@gmail.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+54 3498 444635</span></i>
      </div>

      <div class="cta d-none d-md-flex align-items-center">
<a aria-label="Chat on WhatsApp" href="https://wa.me/543498444635"> <span><i class="bi bi-whatsapp"></i></span> Iniciemos</a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
      
         <a href="https://sofiaferreyra.online/index.html"><img src="assets/img/Pnglogo.png" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="https://sofiaferreyra.online/index.html">Home</a></li>
          <li><a class="nav-link scrollto" href="https://elmundodesofia.substack.com">Blog</a></li>
          <li><a href="contruccion.html">Contenido Gratuito</a></li>
          <i class="bi bi-list mobile-nav-toggle"></i>
          <li class="dropdown"><a href="#"><span>Redes Sociales</span> </a>
            <ul>
              <li><a href="https://www.instagram.com/sofiaaa_ferreyra/?utm_medium=copy_link">Instagram</a></li>
              <li><a href="https://www.youtube.com/channel/UC9L2KM-cQzJU8_2N0DQ-vLA ">Youtube</a></li>
              <li><a href="https://open.spotify.com/show/4fWLZjWRWkMEePF9f13qzJ?si=edff5fee800d42c8">Podcast(spotify)</a></li>
<li><a href="https://twitter.com/Sofiaa_ferreyra" class="twitter">Twitter</a></li>
<li> <a href="https://vm.tiktok.com/ZMevG1v5c/" class="Tik Tok">Tik Tok</a></li>
             
              
            </ul>
          </li>
       
          <li><a class="nav-link scrollto" href="#contact">Contacto</a></li>
        </ul>
        
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Contenido Gratuido</li>
        </ol>
        <h2>Contenido Gratuito</h2>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
<article class="entry mb-4">
              <div class="entry-img ">
                <img src="https://sofiaferreyra.online/Subida/server/NotasImg/<?php echo htmlspecialchars($row['imagen']); ?>" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title mt-2">
               <?php echo($row['titulo']); ?>
              </h2>

              <div class="entry-meta">
                <ul>
            
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i>  <time datetime="2020-01-01"> <?php echo strftime('%d-%m-%Y', strtotime($row['fecha'])); ?></time></li>
                  
                </ul>
              </div>

              <div class="entry-content">
                <p><?php echo($row['texto']); ?>
                </p>
                <div class="read-more">
                  <a href="<?php echo($row['link']); ?>">Leer Mas</a>
                </div>
              </div>
         </article><!-- End blog entry -->
      <?php endwhile; ?> 
   

           

           

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Buscar por Titulo</h3>
              <div class="sidebar-item search-form">
                <form method="post" ">
                  <input type="text" name="busqueda">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

            

              <h3 class="sidebar-title">Posteos Recientes</h3>
              
  <?php while ($row = mysqli_fetch_assoc($result2)): ?>
<div class="sidebar-item recent-posts">

                <div class="post-item clearfix">

                  <img src="https://sofiaferreyra.online/Subida/server/NotasImg/<?php echo htmlspecialchars($row['imagen']); ?>" alt="">
                  <h4><a href="<?php echo($row['link']); ?>">  <?php echo($row['titulo']); ?></a></h4>
                  <time datetime="2020-01-01"> <?php echo strftime('%d-%m-%Y', strtotime($row['fecha'])); ?></time>
           
  </div>


              </div><!-- End sidebar recent posts-->
 
      <?php endwhile; ?>     

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/terceros/aos/aos.js"></script>
  <script src="assets/terceros/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/terceros/glightbox/js/glightbox.min.js"></script>
  <script src="assets/terceros/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/terceros/swiper/swiper-bundle.min.js"></script>
  <script src="assets/terceros/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
<?php
// Cerramos la conexión a la base de datos
mysqli_close($conn);
?>