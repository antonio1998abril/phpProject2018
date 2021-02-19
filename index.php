<?php include_once 'includes/templates/header.php';?>
<section class="seccion contenedor">
  <h2>Las mejores conferencias</h2>
  <p>
      Me gustaría saber si conoceis algun plugin o metodo html para poner un texto aleatorio cada vez que se cargue la pagina de inicio, el texto vendria a ser Hola, .
  </p>
</section><!--seccion-->

<section class="programa">
  <div class ="contenedor-video clearfix">
      <video autoplay muted loop poster="bg-talleres.jpg">
        <source src ="video/video.mp4" type="video/mp4">
          <source src="video/video.webm" type="video/webm">
            <source src="video/video.ogv" type="video/ogg">
      </video>
  </div><!--contenedor video-->
<div class="contenido-programa">
  <div class="contenedor">
    <div class="programa-evento">
      <h2>Programa del evento</h2>
      <?php
         try {
            require_once('includes/funciones/bd_conexion.php');
            $sql = "SELECT * FROM `categoria_evento` ";
           
            $resultado = $conn->query($sql);
         }catch(\Exception $e){
             echo $e->getMesage();
         }
        ?>






      <nav class="menu-programa">
      <?php while($cat= $resultado->fetch_array(MYSQLI_ASSOC)){?>
        <?php $categoria = $cat['categoria_evento'] ?>
        <a href="#<?php echo strtolower($categoria)?>">
          <i class="fa <?php echo $cat['icono']; ?>" aria-hidden="true"></i> <?php echo $categoria  ?></a>
      <?php } ?>
        </nav>



        <?php
         try {
            require_once('includes/funciones/bd_conexion.php');


            $sql = " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, categoria_evento, icono, nombre_invitado, apellido_invitado ";
            $sql .= " FROM eventos ";
            $sql .= " INNER JOIN categoria_evento ";
            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
            $sql .= " INNER JOIN invitados ";
            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
            $sql .= "AND eventos.id_cat_evento = 2 ";
            $sql .= " ORDER BY 'evento_id' LIMIT 2;";

            $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, categoria_evento, icono, nombre_invitado, apellido_invitado ";
            $sql .= " FROM eventos ";
            $sql .= " INNER JOIN categoria_evento ";
            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
            $sql .= " INNER JOIN invitados ";
            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
            $sql .= "AND eventos.id_cat_evento = 3 ";
            $sql .= " ORDER BY 'evento_id' LIMIT 2;";

            $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, categoria_evento, icono, nombre_invitado, apellido_invitado ";
            $sql .= " FROM eventos ";
            $sql .= " INNER JOIN categoria_evento ";
            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
            $sql .= " INNER JOIN invitados ";
            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
            $sql .= "AND eventos.id_cat_evento = 11 ";
            $sql .= " ORDER BY 'evento_id' LIMIT 2;";

            $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, categoria_evento, icono, nombre_invitado, apellido_invitado ";
            $sql .= " FROM eventos ";
            $sql .= " INNER JOIN categoria_evento ";
            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
            $sql .= " INNER JOIN invitados ";
            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
            $sql .= "AND eventos.id_cat_evento = 12 ";
            $sql .= " ORDER BY 'evento_id' LIMIT 2;";
               
            $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, categoria_evento, icono, nombre_invitado, apellido_invitado ";
            $sql .= " FROM eventos ";
            $sql .= " INNER JOIN categoria_evento ";
            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
            $sql .= " INNER JOIN invitados ";
            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
            $sql .= "AND eventos.id_cat_evento = 13 ";
            $sql .= " ORDER BY 'evento_id' LIMIT 2;";



 
               



            $resultado = $conn->query($sql);
         }catch(\Exception $e){
             echo $e->getMesage();
         }
        ?>
    

    <?php if(!$conn->multi_query($sql)) {
echo "Falló la multiconsulta: (" . $mysqli->errno . ") " . $mysqli->error;

  }

?>
<?php do {
$resultado = $conn->store_result();
$row = $resultado->fetch_all(MYSQLI_ASSOC); ?>
<?php $i = 0; ?>
<?php foreach ($row as $evento) {  ?>
<?php if ($i % 2 == 0) { ?>
  <div id="<?php echo strtolower($evento['categoria_evento']); ?>" class="info-curso ocultar clearfix">
<?php  } ?>
    <div class="detalle-evento">
      <h3><?php echo utf8_encode($evento['nombre_evento']); ?></h3>
      <p><i class="fas fa-clock" aria-hidden="true"></i> <?php echo $evento['hora_evento']; ?></p>
      <p><i class="fas fa-calendar" aria-hidden="true"></i> <?php echo $evento['fecha_evento']; ?></p>
      <p><i class="fas fa-user" aria-hidden="true"></i>
        <?php echo $evento['nombre_invitado']." ".$evento['apellido_invitado']; ?></p>
    </div>
<?php if ($i % 2 == 1) { ?>
    <a href="calendario.php" class="button float-right">Ver todos</a>
  </div>
  <!--#talleres-->
<?php } ?>
  <?php $i++; ?>
<?php } ?>
<?php $resultado->free(); ?>
<?php } while ($conn->more_results() && $conn->next_result()); ?>
    </div><!--programa eventp-->
  </div><!--contenetos-->
</div><!--pograa-->
</section>

<?php include_once 'includes/templates/invitados.php';
      require_once 'includes/funciones/bd_conexion.php';
?>



<div class="contador parallax">
  <div class="contenedor">
    <ul class="resumen-evento clearfix">
      <li><p class="numero"></p>Invitados</li>
      <li><p class="numero"></p>talleres</li>
      <li><p class="numero"></p>dias</li>
      <li><p class="numero"></p>conferencias</li>
    </ul>
  </div>
</div>

<section class="precios seccion">
  <h2>precios</h2>
  <div class="contenedor">
    <ul class="lista-precios clearfix">
      <li>
        <div class="tabla-precio">
          <h3>pasepor dia</h3>
          <p class="numero">$20</p>
          <ul>
            <li>bocadillos gratis</li>
            <li>Todas las conferencias</li>
            <li>todos los talleres</li>
          </ul>
          <a href="#" class="button hollow">comprar</a>
        </div>
      </li>

      <li>
        <div class="tabla-precio">
          <h3>todos los dias</h3>
          <p class="numero">$45</p>
          <ul>
            <li>bocadillos gratis</li>
            <li>Todas las conferencias</li>
            <li>todos los talleres</li>
          </ul>
          <a href="#" class="button ">comprar</a>
        </div>
      </li>

      <li>
        <div class="tabla-precio">
          <h3>pase por dpos dias</h3>
          <p class="numero">$30</p>
          <ul>
            <li>bocadillos gratis</li>
            <li>Todas las conferencias</li>
            <li>todos los talleres</li>
          </ul>
          <a href="#" class="button hollow">comprar</a>
        </div>
      </li>
    </ul>
  </div>
</section>
 <div id="mapa" class="mapa"></div>

 <section class="seccion">
   <h2>Testimoniales</h2>
   <div class="testimoniales contenedor clearfix">
   <div class="testimonial">
     <blockquote>
       <p>Buenas noches estoy haciendo un proyecto apenas con lo que llevó del curso, me animé a usar una plantilla HTML5 ya llevó algunas cosas pero me he dado cuenta que los links del menú principal sólo funcionan bien en mozilla, ya revisé pero seguramente me falta algo. Me podrías orienta</p>
      <footer class="info-testimonial clearfix">
          <img src="img/testimonial.jpg" alt="imagen testimonial">
          <cite>oswaldo apolo escobedo<span>diseñador en prisma</span></cite> 
      </footer>
      </blockquote>
   </div>
   <div class="testimonial">
    <blockquote>
      <p>Buenas noches estoy haciendo un proyecto apenas con lo que llevó del curso, me animé a usar una plantilla HTML5 ya llevó algunas cosas pero me he dado cuenta que los links del menú principal sólo funcionan bien en mozilla, ya revisé pero seguramente me falta algo. Me podrías orienta</p>
     <footer class="info-testimonial clearfix">
         <img src="img/testimonial.jpg" alt="imagen testimonial">
         <cite>oswaldo apolo escobedo<span>diseñador en prisma</span></cite> 
     </footer>
     </blockquote>
  </div>
  <div class="testimonial">
    <blockquote>
      <p>Buenas noches estoy haciendo un proyecto apenas con lo que llevó del curso, me animé a usar una plantilla HTML5 ya llevó algunas cosas pero me he dado cuenta que los links del menú principal sólo funcionan bien en mozilla, ya revisé pero seguramente me falta algo. Me podrías orienta</p>
     <footer class="info-testimonial clearfix">
         <img src="img/testimonial.jpg" alt="imagen testimonial">
         <cite>oswaldo apolo escobedo<span>diseñador en prisma</span></cite> 
     </footer>
     </blockquote>
  </div>
</div>
 </section>

<div class="newsletter parallax">
  <div class="contenido contenedor">
    <p>registrate al newletter</p>
    <h3>CUCEI</h3>
    <a href="#mc_embed_signup" class="boton_newsletter button transparente">registro</a>
  </div><!--contenidp-->
</div><!--newsletter-->

<section class="seccion">
  <h2>faltan</h2>
  <div class="cuenta-regresiva contenedor">
    <ul class="clearfix">
      <li><p id="dias" class="numero"></p>dias</li>
      <li><p id="horas" class="numero"></p>horas</li>
      <li><p id="minutos"class="numero"></p>minutos</li>
      <li><p id="segundos"class="numero"></p>segundos</li>
    </ul>
  </div>
</section>
<?php include_once 'includes/templates/footer.php';?>
 
