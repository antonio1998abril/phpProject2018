<?php
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
            Listado de Categorías de Eventos
            <small></small>
          </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja las categorías de los eventos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Icono</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            try {
                                $sql = "SELECT * FROM categoria_Evento";
                                $resultado = $conn->query($sql);
                            } catch (Exception $e) {
                                $error = $e->getMessage();
                                echo $error;
                            }
                            while($categoria = $resultado->fetch_assoc() ) { ?>
                                
                                <tr>
                                    <td><?php echo $categoria['categoria_evento']; ?></td>
                                     <!-- /.problemas on mostrar los iconos modifica esta linea -->
                                    <td><i class=" fas <?php echo $categoria['icono']; ?>"></i></td>
                    
                                    
                                    <td>
                                        <a href="editar-categoria.php?id=<?php echo $categoria['id_categoria'] ?>" class="btn bg-green btn-flat margin">
                                        <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="#" data-id="<?php echo $categoria['id_categoria']; ?>" data-tipo="categoria" class="btn bg-red bnt-flat margin borrar_registro">
                                            <i class ="fas fa-trash-alt"></i>
                                        </a>
                                        
                                    </td>
                                </tr>
                            <?php }  ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Icono</th>
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