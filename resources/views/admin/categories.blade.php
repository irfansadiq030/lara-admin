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
        <div class="card card-preview">
            <div class="card-inner text-center">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Img</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->img }}</td>
                            <td><span class="badge badge-pill badge-success">Active</span></td>
                            <td class="d-flex justify-content-center">
                                <div class="nk-tb-col nk-tb-col-tools py-1">
                                    <ul class="nk-tb-actions gx-1 my-n1">
                                        <li class="mr-n1">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right" style="">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-eye"></em><span>View </span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- nk-block -->

</div><!-- .components-preview -->

@endsection