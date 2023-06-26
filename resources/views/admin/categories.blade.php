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
                <table class="datatable-init nowrap nk-tb-list is-separate dataTable no-footer" data-auto-responsive="false" id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info">
                    <thead>
                        <tr class="nk-tb-item nk-tb-head" role="row">
                            <th class="nk-tb-col nk-tb-col-check sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="
                                                        
                                                            
                                                            
                                                        
                                                    : activate to sort column ascending">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="puid">
                                    <label class="custom-control-label" for="puid"></label>
                                </div>
                            </th>
                            <th class="nk-tb-col tb-col-sm sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"><span>Title</span></th>
                            <th class="nk-tb-col sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="SKU: activate to sort column ascending"><span>Slug</span></th>
                            <th class="nk-tb-col sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending"><span>Status</span></th>
                            <th class="nk-tb-col sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Stock: activate to sort column ascending"><span>Image</span></th>
                            <th class="nk-tb-col tb-col-md sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label=": activate to sort column ascending"><em class="tb-asterisk icon ni ni-star-round"></em></th>
                            <th class="nk-tb-col nk-tb-col-tools sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="
                                                        
                                                            
                                                                
                                                                    
                                                                    
                                                                        
                                                                            Edit Selected
                                                                            Remove Selected
                                                                            Update Stock
                                                                            Update Price
                                                                        
                                                                    
                                                                
                                                            
                                                        
                                                    : activate to sort column descending" aria-sort="ascending">
                                <ul class="nk-tb-actions gx-1 my-n1">
                                    <li class="mr-n1">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right" style="">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Selected</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Selected</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-bar-c"></em><span>Update Stock</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-invest"></em><span>Update Price</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </th>
                        </tr><!-- .nk-tb-item -->
                    </thead>
                    <tbody>
                        <tr class="nk-tb-item odd">
                            <td class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="puid1">
                                    <label class="custom-control-label" for="puid1"></label>
                                </div>
                            </td>
                            <td class="nk-tb-col tb-col-sm">
                                <span class="tb-product">
                                    <img src="./images/product/a.png" alt="" class="thumb">
                                    <span class="title">Pink Fitness Tracker</span>
                                </span>
                            </td>
                            <td class="nk-tb-col">
                                <span class="tb-sub">UY3749</span>
                            </td>
                            <td class="nk-tb-col">
                                <span class="tb-lead">$ 99.49</span>
                            </td>
                            <td class="nk-tb-col">
                                <span class="tb-sub">49</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <div class="asterisk tb-asterisk">
                                    <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                </div>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools sorting_1">
                                <ul class="nk-tb-actions gx-1 my-n1">
                                    <li class="mr-n1">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right" style="">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="nk-tb-item odd">
                            <td class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="puid1">
                                    <label class="custom-control-label" for="puid1"></label>
                                </div>
                            </td>
                            <td class="nk-tb-col tb-col-sm">
                                <span class="tb-product">
                                    <img src="./images/product/a.png" alt="" class="thumb">
                                    <span class="title">Pink Fitness Tracker</span>
                                </span>
                            </td>
                            <td class="nk-tb-col">
                                <span class="tb-sub">UY3749</span>
                            </td>
                            <td class="nk-tb-col">
                                <span class="tb-lead">$ 99.49</span>
                            </td>
                            <td class="nk-tb-col">
                                <span class="tb-sub">49</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <div class="asterisk tb-asterisk">
                                    <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                </div>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools sorting_1">
                                <ul class="nk-tb-actions gx-1 my-n1">
                                    <li class="mr-n1">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right" style="">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Product</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View Product</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Product Orders</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Product</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!-- .nk-tb-list -->
    </div>

</div><!-- .components-preview -->

@endsection