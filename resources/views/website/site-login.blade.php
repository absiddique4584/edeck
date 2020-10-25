@extends('website.components.layout')

@section('title')
    Checkout | Edeck
@endsection

@section('content')

    <div class="sign-in-page">
        <div class="row">
        @includeIf('message.message')
        <!-- Sign-in -->
            <div class="col-md-6 col-md-offset-2 ">
                <h4 class="">Sign in</h4>
                <p class="">Hello, Welcome to your account.</p>



                <form class="register-form outer-top-xs" action="{{ route('customer.site.loggedin') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label class="info-title" for="lemail">Email Address <span>*</span></label>
                        <input type="email" name="email" class="form-control unicase-form-control text-input" id="lemail" value="{{ old('email') }}" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="lpassword">Password <span>*</span></label>
                        <input type="password" name="password" class="form-control unicase-form-control text-input" id="lpassword"  placeholder="Password">
                    </div>

                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                </form>
            </div>
            <!-- Sign-in -->

        </div><!-- /.row -->
    </div><!-- /.sigin-in-->

    <br>


@endsection


