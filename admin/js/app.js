        $(document).ready(function () {
            $('.sidebar-menu').tree()


            
            $('#registros').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
            'language' :{
                paginate:{
                    next: 'Siguiente',
                    previous: 'Anterior',
                    last: 'Ultimo',
                    first: 'Primero'
                },
                    info: 'Mostrando _START_ a _END_ de _TOTAL_ resultado',
                    emptyTable: 'No hay registros',
                    infoEmpty: '0 Registros',
                    search: 'Buscar: '
                }
            });

                //Date picker
                $('#fecha').datepicker({
                    autoclose: true
                });
                //Initialize Select2 Elements
                $('.seleccionar').select2()

                //Timepicker
                $('.timepicker').timepicker({
                    showInputs: false
                })
                //todos los iconpicker
                $('#icono').iconpicker();

                    // LINE CHART
                    $.getJSON('servicio-registrados.php', function(data) {
                        var line = new Morris.Line({
                          element: 'grafica-registros',
                          resize: true,
                          data: data,
                          xkey: 'fecha',
                          ykeys: ['cantidad'],
                          labels: ['cantidad'],
                          lineColors: ['#3c8dbc'],
                          hideHover: 'auto'
                        });
                    });

            $('#crear_registro').attr('disabled', true);

            $('input#repetir_password').on('input', function(){
                var password_nuevo = $('input#password').val();
                
                if($(this).val() == password_nuevo){
                    $('#resultado_password').text('Correcto');
                    $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
                    $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
                    $('#crear_registro').attr('disabled', false);
                }else{
                    $('#resultado_password').text('No son igualaes!!! X(');
                    $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
                    $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
                    $('#crear_registro').attr('disabled', true);
                }
            });

            
  

        })



     