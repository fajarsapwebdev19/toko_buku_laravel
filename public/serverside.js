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

let school_data = $('.school_data').DataTable({
    processing: true,
    serverSide: true,
    ajax: 'school_data',
    pageLength: 5,
    lengthMenu: [5, 10, 20, 50, 100, 200, 500],
    columns: [
        { data: 'npsn', name: 'npsn'},
        { data: 'nama_sekolah', name: 'nama_sekolah'},
        { data: 'email', name: 'email'},
        { data: 'nama_kepsek', name: 'nama_kepsek'},
        { data: 'updated_at', name: 'updated_at'},
        { data: 'action', name: 'action', orderable: false, searchable: false }
    ],
    columnDefs: [
		{
			targets: [0,1, 2, 3, 4, 5],
			className: "text-center"
		}
	]
});

let category_data = $('.category_data').DataTable({
    processing: true,
    serverSide: true,
    ajax: 'category_data',
    pageLength: 5,
    lengthMenu: [5, 10, 20, 50, 100, 200, 500],
    columns: [
        { data: 'jenis', name: 'jenis'},
        { data: 'kelas', name: 'kelas'},
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

let book_data = $('.book_data').DataTable({
    processing: true,
    serverSide: true,
    ajax: 'book_data',
    pageLength: 5,
    lengthMenu: [5, 10, 20, 50, 100, 200, 500],
    // columns: [
    //     { data: 'npsn', name: 'npsn'},
    //     { data: 'nama_sekolah', name: 'nama_sekolah'},
    //     { data: 'email', name: 'email'},
    //     { data: 'nama_kepsek', name: 'nama_kepsek'},
    //     { data: 'updated_at', name: 'updated_at'},
    //     { data: 'action', name: 'action', orderable: false, searchable: false }
    // ],
    // columnDefs: [
	// 	{
	// 		targets: [0,1, 2, 3, 4, 5],
	// 		className: "text-center"
	// 	}
	// ]
});
