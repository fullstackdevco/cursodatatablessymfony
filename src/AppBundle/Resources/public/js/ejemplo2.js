(function () {
    $(document).ready(function () {
        $('#tabla2').DataTable(
            {
                "processing": true,
                "serverSide": true,
                "ajax": {
                    'url': 'app/api/disponibilidades',
                    'type': 'GET'
                },
                "columns": [
                    { 'data': 'id' },
                    { 'data': 'fecha' },
                    { 'data': 'hora' }
                ]
            }
        );
    });
})();
