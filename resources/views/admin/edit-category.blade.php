@extends('admin.layout.layout')
@section('page_title','Edit Category')

@section('content')

<div class="components-preview wide-md mx-auto">
    <div class="nk-block-head nk-block-head-lg wide-sm">
        <div class="nk-block-head-content">
            <div class="nk-block-head-sub"><a class="back-to" href="categories"><em class="icon ni ni-arrow-left"></em><span>Categories</span></a></div>
            <h3 class="nk-block-title fw-normal">Edit Category</h3>
            <div class="nk-block-des">
                <p class="lead">Edit Category</p>
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
            <div class="col-lg-12">
                <div class="card h-100">
                    <div class="card-inner">
                        <div class="card-head">
                            <h5 class="card-title">Category Info</h5>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-pro alert-danger alert-dismissible">
                            <div class="alert-text">
                                <h6>Errors!</h6>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li class="text-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <button class="close" data-dismiss="alert"></button>
                        </div>
                        @endif

                        <form action="{{ route('update-category') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label class="form-label" for="full-name">Category Title</label>
                                    <div class="form-control-wrap">
                                        <input name="category_title" value="{{ $category_data->title }}" type="text" class="form-control" id="category_title">
                                        <input name="category_id" value="{{ $category_data->id }}" type="hidden" />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="cat_slug">Slug</label>
                                    <div class="form-control-wrap">
                                        <input name="slug" value="{{ $category_data->slug }}" type="text" class="form-control" id="cat_slug">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <div class="form-control-wrap">
                                    <select name="category_status" class="form-select select2-hidden-accessible" data-select2-id="3" tabindex="-1" aria-hidden="true">
                                        <option {{ $category_data->status==1 ? 'selected' : ''  }} value="1" data-select2-id="5">Active</option>
                                        <option {{ $category_data->status==0 ? 'selected' : ''}} value="0" data-select2-id="18">Draft</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email-address">Description</label>
                                <div class="form-control-wrap">
                                    <textarea name="description" type="text" class="form-control" id="email-address" rows="1"> {{ $category_data->description }} </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="upload-zone">
                                    <div class="dz-message" data-dz-message>
                                        <span class="dz-message-text">Drag and drop file</span>
                                        <span class="dz-message-or">or</span>
                                        <button class="btn btn-primary">SELECT</button>
                                    </div>
                                </div>
                                <input type="hidden" id="temp_img_id" name="img_id">
                            </div>
                            <div class="form-group">
                                <img width="150" class="rounded" src="{{ asset('uploads/category/'.$category_data->img) }}" alt="">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary">Update Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .nk-block -->

</div>

@endsection

@section('custom-js')

<script>
    $(document).ready(function() {
    $("#category_title").change(function() {
            // alert($(this).val());
            // const element = $(this);
            $.ajax({
                    url: '{{ route(
                    'get-slug')
            }
        }
        ',
        type: 'get',
        data: {
            category_title: $(this).val()
        },
        dataType: 'json',
        success: function(response) {
            if (response['status']) {
                $("#cat_slug").val(response['slug']);
            } else {
                alert();
            }
        }

    });
    })
    })
</script>

@endsection