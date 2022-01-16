$(document).ready( function () {

    let path = window.location.href.split('companies')[0];

    let companiesTable = $('#companies_table').DataTable({
        processing: true,
        serverSide: true,
        pagingType: "first_last_numbers",
        ajax:  path + "companies/get-companies",
        columns: [
            { data: 'id', name: 'id'},
            { data: 'company_name', name: 'company_name'},
            { data: 'email', name: 'email'},
            {
                data: 'logo_url',
                name: 'logo_url',
                render: function ( data, type, full ) {
                    return data ? '<img style="width: 30px; height: 30px" src="'+data+'"></>' : ''
                }
            },
            { data: 'website_url', name: 'website_url'},
            {
                "data": null,
                "defaultContent":
                    "<div class='centered-button-container'>" +
                    "<button class='btn btn-primary btn-companies-edit mr-1'><i class='far fa-eye'></i></button>" +
                    "<button class='btn btn-danger btn-companies-delete'><i class='far fa-trash-alt'></i></button>" +
                    "</div>",
                'orderable' : false,
                'searchable' : false
            }
        ],
        language: {
            lengthMenu: "_MENU_ találat",
            zeroRecords: "Nincs megjeleníthető rekord",
            info: "Találatok: _START_ - _END_ Összesen: _TOTAL_",
            infoEmpty: "Nincs elérhető rekord.",
            infoFiltered: "(_MAX_ összes rekord közül szűrve)",
            loadingRecords: "Betöltés...",
            processing: "Feldolgozás...",
            search: "Keresés:",
            paginate: {
                "first": "Első",
                "previous": "Előző",
                "next": "Következő",
                "last": "Utolsó"
            }
        },
        columnDefs: [
            { width: "35px", targets: [0]}
        ],
        scrollX: true,
        select: {
            style: 'os',
            items: 'row',
        }
    })

    //Deletion for companies table rows

    $('#companies_table').on('click', '.btn-companies-delete', function (){
        var companyData = companiesTable.row( $(this).parents('tr') ).data();

        var url = path + 'companies/delete';

        swal.fire({
            title: 'Biztosan törölni akarja ezt a céget és a hozzá tartozó alkalmazottakat?',
            html: 'A művelet nem visszavonható.',
            showCancelButton: true,
            showCloseButton: true,
            cancelButtonText: 'Mégsem',
            confirmButtonText: 'Töröl',
            cancelButtonColor: 'blue',
            confirmButtonColor: 'red',
            width: 300,
            allowOutsideClick: false
        }).then(function(result){
            if(result.value){
                $.post(url, {id : companyData.id}, function(data){
                    if(data.code === 1){
                        $('#companies_table').DataTable().ajax.reload(null, false);
                        toastr.success(data.msg);
                    }else{
                        toastr.error(data.msg);
                    }
                }, 'json');
            }
        })

    })

} );
