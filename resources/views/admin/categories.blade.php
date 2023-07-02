@extends('admin.layout.layout')
@section('page_title','Categories')

@section('content')

<div class="components-preview wide-md mx-auto">
    <div class="nk-block-head nk-block-head-lg wide-sm">
        <div class="nk-block-head-content">
            <div class="nk-block-head-sub"><a class="back-to" href="dashboard"><em class="icon ni ni-arrow-left"></em><span>Dashboard</span></a></div>
            <h4 class="nk-block-title fw-normal">View Categories</h4>

        </div>
    </div><!-- .nk-block-head -->

    <div class="nk-block nk-block-lg">
        <!-- <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Separated Data Table</h4>
                <div class="nk-block-des">
                    <p>Using the most basic table markup, here’s how <code class="code-class">.table</code> based tables look by default.</p>
                </div>
            </div>
        </div> -->
        <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

            <div class="my-3">
                <div class="card card-preview">
                    <div class="card-inner">
                        <table class="table table-hover data-table-2">

                            <thead>
                                <tr class="text-center">
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- <tr class="text-center">
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- .nk-tb-list -->
    </div>

</div><!-- .components-preview -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('custom-js')

<script type="text/javascript">
    $(function() {

        let domStructure = '<"row justify-between g-2' + 'HHH' + '"<"col-7 col-sm-4 text-left"f><"col-5 col-sm-8 text-right"<"datatable-filter"<"d-flex justify-content-end g-2"' + 'GHT' + 'l>>>><"datatable-wrap my-3"t><"row align-items-center"<"col-7 col-sm-12 col-md-9"p><"col-5 col-sm-12 col-md-3 text-left text-md-right"i>>';

        var Datatable = $('.data-table-2').DataTable({
            serverSide: true,
            processing: true,
            ajax: "{{ route('categories') }}",
            columns: [{
                    data: 'id',
                    name: 'id',
                    createdCell: function(td, cellData, rowData, row, col) {
                        $(td).addClass('py-2');
                    }
                    // render: function(data, type, row, meta) {
                    //     return '<td class="nk-tb-col nk-tb-col-check sorting_1">' +
                    //         '<div class="custom-control custom-control-sm custom-checkbox notext">' +
                    //         '<input type="checkbox" class="custom-control-input" id="puid' + meta.row + '">' +
                    //         '<label class="custom-control-label" for="puid' + meta.row + '"></label>' +
                    //         '</div>' +
                    //         '</td>';
                    // }
                },
                {
                    data: 'title',
                    name: 'title',
                },
                {
                    data: 'slug',
                    name: 'slug',
                },
                {
                    data: 'img',
                    name: 'img',
                    render: function(data) {
                        return '<td> <img class="rounded" width="60" src="{{ asset("uploads/category/") }}/' + data + '" alt=""></td>';
                    }
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function(data) {

                        let statusText = data === 0 ? 'Draft' : 'Active';
                        let statusClass = data === 0 ? 'badge-danger' : 'badge-success';

                        return '<td class="nk-tb-col tb-col-sm">' +
                            '<span class="tb-product">' +
                            '<span class="badge badge-pill ' + statusClass + '">' + statusText + '</span>' +
                            '</span>' +
                            '</td>';
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                },
            ],
            dom: domStructure,
            language: {
                search: "",
                searchPlaceholder: "Type in to Search",
                lengthMenu: "<span class='d-none d-sm-inline-block'>Show</span><div class='form-control-select'> _MENU_ </div>",
                info: "_START_ -_END_ of _TOTAL_",
                infoEmpty: "No records found",
                infoFiltered: "( Total _MAX_  )",
                paginate: {
                    "first": "First",
                    "last": "Last",
                    "next": "Next",
                    "previous": "Prev"
                }
            },
            createdRow: function(row, data, dataIndex) {
                $(row).addClass('text-center');
            },
            autoWidth: false

        });

    });

    const confirmDelete = () => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send the delete request
                fetch(uri, {
                        method: 'Get',
                        headers: {
                            'Content-Type': 'application/json',
                            // Add any additional headers if needed
                        },
                    })
                    .then(response => {
                        if (response.ok) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                            // Perform any additional actions after successful deletion
                        } else {
                            throw new Error('Failed to delete the file.');
                        }
                    })
                    .catch(error => {
                        Swal.fire(
                            'Error!',
                            error.message,
                            'error'
                        );
                        // Handle error or display error message
                    });
            }
        });
    };
</script>

@endsection