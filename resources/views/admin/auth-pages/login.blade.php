@extends('admin.auth-pages.layout')
@section('page_title','Login')

@section('content')

<div class="nk-block nk-block-middle nk-auth-body">
    <div class="brand-logo pb-5">
        <a href="html/index.html" class="logo-link">
            <img class="logo-light logo-img logo-img-lg" src="{{ asset('admin_assets/images/logo.png') }}" srcset="./images/logo2x.png 2x" alt="logo">
            <img class="logo-dark logo-img logo-img-lg" src="{{ asset('admin_assets/images/logo-dark.png') }}" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
        </a>
    </div>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">Login</h5>
            <div class="nk-block-des">
                <p>Access the DashLite panel using your email and passcode.</p>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <form action="{{ route('admin.login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label" for="email">Email or Username</label>
            <div class="form-control-wrap">
                <input type="text" class="form-control form-control-lg" id="email" placeholder="Enter your email address or username">
            </div>
        </div>
        <div class="form-group">
            <label class="form-label" for="password">Passcode</label>
            <div class="form-control-wrap">
                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                </a>
                <input type="password" class="form-control form-control-lg" id="password" placeholder="Enter your passcode">
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block">Login in</button>
        </div>
    </form><!-- form -->
    <div class="form-note-s2 pt-4"> Register an Admin ? <a href="test2"><strong>Create an Account</strong></a>
    </div>
    <div class="text-center pt-4 pb-3">
        <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
    </div>
    <ul class="nav justify-center gx-8">
        <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
    </ul>
</div><!-- .nk-block -->

@endsection