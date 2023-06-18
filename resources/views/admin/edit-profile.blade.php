@extends('admin.layout.layout')
@section('page_title','Edit Profile')

@section('content')

<div class="components-preview wide-md mx-auto">
    <div class="nk-block-head nk-block-head-lg wide-sm">
        <div class="nk-block-head-content">
            <div class="nk-block-head-sub"><a class="back-to" href="view-profile"><em class="icon ni ni-arrow-left"></em><span>Components</span></a></div>
            <h3 class="nk-block-title fw-normal">Edit Admin Profile</h3>
            <div class="nk-block-des">
                <p class="lead">Form is most esential part of your project. We styled out nicely so you can build your form so quickly.</p>
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
                            <h5 class="card-title">Admin Info</h5>
                        </div>
                        <form action="{{ route('update.profile') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="full-name">Full Name</label>
                                <div class="form-control-wrap">
                                    <input name="admin_name" type="text" class="form-control" id="full-name" value="{{ $admin_info['name'] }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email-address">Email address</label>
                                <div class="form-control-wrap">
                                    <input name="admin_email" type="text" class="form-control" id="email-address" value="{{ $admin_info['email'] }}">
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