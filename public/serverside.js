let role_data = $('.role-data').DataTable({
    processing: true,
    serverSide: true,
    ajax: 'role_data',
    pageLength: 5,
    lengthMenu: [5, 10, 20, 50, 100, 200, 500],
    columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
        { data: 'role_name', name: 'role_name'},
        { data: 'created_at', name: 'created_at'},
        { data: 'updated_at', name: 'updated_at'},
        { data: 'action', name: 'action', orderable: false, searchable: false }
    ],
    columnDefs: [
		{
			targets: [0,1, 2, 3, 4],
			className: "text-center"
		}
	]
});
