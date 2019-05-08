<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="section-gap">
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table" id="myTable">
                <thead>
                <tr>
                    <th>ID Servicio</th>
                    <th>Nombre</th>
                    <th>Credito</th>
                    <th>Tiempo</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {

        let opts = {
            'language': {
                'lengthMenu': 'Mostrar _MENU_ servicios por página',
                'zeroRecords': 'No hay resultados que mostrar',
                'info': 'Mostrando página _PAGE_ de _PAGES_',
                'infoEmpty': 'No hay servicios disponibles',
                'infoFiltered': '(filtered from _MAX_ total records)'
            },
            columns: [
                {data: 'SERVICEID'},
                {data: 'SERVICENAME'},
                {data: 'CREDIT'},
                {data: 'TIME'}
            ],
            "processing": true,
            ajax: {
                url: "<?php echo base_url()?>services/getData",
                type: 'POST'
            },
        };
        $('#myTable').DataTable(opts);
    });

</script>