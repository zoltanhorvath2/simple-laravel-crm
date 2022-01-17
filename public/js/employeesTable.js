$(document).ready( function () {

    let path = window.location.href.split('employees')[0];

    let employeesTable = $('#employees_table').DataTable({
        processing: true,
        serverSide: true,
        pagingType: "first_last_numbers",
        ajax:  path + "employees/get-employees",
        columns: [
            { data: 'id', name: 'id'},
            { data: 'last_name', name: 'last_name'},
            { data: 'first_name', name: 'first_name'},
            { data: 'company_name', name: 'company_name'},
            { data: 'email', name: 'email'},
            { data: 'phone_number', name: 'phone_number'},
            {
                "data": null,
                "defaultContent":
                    "<div class='centered-button-container'>" +
                    "<button class='btn btn-primary btn-employees-edit mr-1'><i class='far fa-eye'></i></button>" +
                    "<button class='btn btn-danger btn-employees-delete'><i class='far fa-trash-alt'></i></button>" +
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

    //AUTOCOMPLETE FIELD

    path = window.location.href.split('employees')[0];

    let company_name;
    $( "#company_name" ).autocomplete({
        source: path + "companies/get-company-names",
        minLength: 0,
        select: function( event, ui ) {
            company_name = ui.item.value;
            $( "#company_name" ).value = company_name;
        }
    }).focus(function () {
        $(this).autocomplete('search', "")
    });

    //Deletion for companies table rows

    $('#employees_table').on('click', '.btn-employees-delete', function (){
        var employeeData = employeesTable.row( $(this).parents('tr') ).data();

        var url = path + 'employees/delete';

        swal.fire({
            title: 'Biztosan törölni akarja ezt az alkalmazottat?',
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
                $.post(url, {id : employeeData.id}, function(data){
                    if(data.code === 1){
                        $('#employees_table').DataTable().ajax.reload(null, false);
                        toastr.success(data.msg);
                    }else{
                        toastr.error(data.msg);
                    }
                }, 'json');
            }
        })

    })

    //Editing row data

    $('#users-table').on('click', '.btn-edit', function (){
        var userData = usersTable.row( $(this).parents('tr') ).data();
        window.location.href=`users/edit/${userData.id}`;
    })




} );

