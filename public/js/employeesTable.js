$(document).ready( function () {

    let path = window.location.href.split('employees')[0];

    let employeesTable = $('#employees_table').DataTable({
        processing: true,
        serverSide: true,
        pagingType: "first_last_numbers",
        ajax:  path + "employees/get-employees",
        columns: [
            {
                data: null,
                defaultContent:
                    "<div>" +
                    "<input type='checkbox' name='employee_checkbox'>" +
                    "</div>",
                orderable : false,
                searchable : false
            },
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
                    "<button class='btn btn-primary btn-customers-edit mr-1'><i class='far fa-eye'></i></button>" +
                    "<button class='btn btn-danger btn-customers-delete'><i class='far fa-trash-alt'></i></button>" +
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
    }).on('draw', function (){
        $('input[name="employee_checkbox"]').each(function (){
            this.checked = false;
        });
        $('input[name="main-checkbox-employees"]').prop('checked', false);
        $('button#btn-multiple-delete-customers').addClass('d-none');
    });
} );
