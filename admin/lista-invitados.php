<?php
 error_reporting(0);
        include_once 'funciones/sesiones.php';
        include_once 'funciones/funciones.php';
        include_once 'templates/header.php';
        include_once 'templates/barra.php';
        include_once 'templates/navegacion.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            Listado de Invitados
            <small></small>
          </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Administra la lista de invitados y su información aquí</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Biografía</th>
                  <th>Imagen</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            try {
                                $sql = "SELECT * FROM invitados";
                                $resultado = $conn->query($sql);
                            } catch (Exception $e) {
                                $error = $e->getMessage();
                                echo $error;
                            }
                            while($invitado = $resultado->fetch_assoc() ) { ?>
                                
                                <tr>
                                    <td><?php echo $invitado['nombre_invitado'] . " " . $invitado['apellido_invitado'];  ?></td>
                                    <td><?php echo $invitado['descripcion']; ?></td>
                                    <td><img src="../img/<?php echo $invitado['url_imagen']; ?>" width="150"></td>
                                    <td>
                                        <a href="editar-invitado.php?id=<?php echo $invitado['invitado_id'] ?>" class="btn bg-orange btn-flat margin">
                                        <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="#" data-id="<?php echo $invitado['invitado_id'] ?>" data-tipo="invitados" class="btn bg-maroon bnt-flat margin borrar_registro">
                                        <i class ="fas fa-trash-alt"></i>
                                        </a>
                                        
                                    </td>
                                </tr>
                            <?php }  ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Biografía</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
          include_once 'templates/footer.php';
  ?>
