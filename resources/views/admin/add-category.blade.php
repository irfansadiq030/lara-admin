@extends('admin.layout.layout')
@section('page_title','Add Category')

@section('content')

<div class="components-preview wide-md mx-auto">
    <div class="nk-block-head nk-block-head-lg wide-sm">
        <div class="nk-block-head-content">
            <div class="nk-block-head-sub"><a class="back-to" href="categories"><em class="icon ni ni-arrow-left"></em><span>Categories</span></a></div>
            <h3 class="nk-block-title fw-normal">Add New Category</h3>
            <div class="nk-block-des">
                <p class="lead">Create a New Category to Organize and Categorize Your Content</p>
            </div>
        </div>
    </div><!-- .nk-block -->
    <div class="nk-block nk-block-lg">
        <!-- <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">Edit Basic information</h4>
                <div class="nk-block-des">
                    <p>Below example helps you to build your own form nice way.</p>
                </div>
            </div>
        </div> -->
        <div class="row g-gs">
            <div class="col-lg-10">
                <div class="card h-100">
                    <div class="card-inner">
                        <div class="card-head">
                            <h5 class="card-title">Category Info</h5>
                        </div>
                        <form action="{{ route('create-category') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="full-name">Category Title</label>
                                <div class="form-control-wrap">
                                    <input name="category_title" type="text" class="form-control" id="full-name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email-address">Slug</label>
                                <div class="form-control-wrap">
                                    <input name="slug" type="text" class="form-control" id="email-address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email-address">Description</label>
                                <div class="form-control-wrap">
                                    <textarea name="description" type="text" class="form-control" id="email-address" rows="1"> </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .nk-block -->

</div>

@endsection