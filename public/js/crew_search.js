// public/js/crew-search.js
$(document).ready(function() {
    var searchTimer;

    $('#search-query').on('input', function() {
        var query = $(this).val();
        clearTimeout(searchTimer);

        searchTimer = setTimeout(function() {
            if (query.length >= 2) {
                $.ajax({
                    url: '/admin/crews/search',
                    method: 'GET',
                    data: { query: query },
                    success: function(response) {
                        updateCrewsTable(response);
                    },
                    error: function(xhr) {
                        console.error('Error en la búsqueda:', xhr.responseText);
                    }
                });
            } else if (query.length === 0) {
                // Si el campo de búsqueda está vacío, cargar todos los crews
                $.ajax({
                    url: '/admin/crews',
                    method: 'GET',
                    success: function(response) {
                        $('#crews-table-container').html(response);
                    },
                    error: function(xhr) {
                        console.error('Error al cargar todos los crews:', xhr.responseText);
                    }
                });
            }
        }, 300);
    });

    function updateCrewsTable(crews) {
        var tbody = $('#crews-table-body');
        tbody.empty();

        crews.forEach(function(crew) {
            var row = '<tr>' +
                '<td>' + crew.name + '</td>' +
                '<td>' + crew.year + '</td>' +
                '<td>' + crew.slogan + '</td>' +
                '<td>' + crew.color + '</td>' +
                '<td>' + crew.capacity + '</td>' +
                '<td>' + crew.fondation_date + '</td>' +
                '<td>' + crew.description + '</td>' +
                '<td>' +
                    '<a href="/admin/crews/' + crew.id + '/edit" class="btn btn-sm btn-secondary">Edit</a> ' +
                    '<form action="/admin/crews/' + crew.id + '" method="POST" style="display:inline;">' +
                        '<input type="hidden" name="_method" value="DELETE">' +
                        '<input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '">' +
                        '<button type="submit" class="btn btn-sm btn-danger">Delete</button>' +
                    '</form>' +
                '</td>' +
            '</tr>';

            tbody.append(row);
        });
    }
});