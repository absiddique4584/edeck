@extends('website.components.layout')

@section('title')
    Registration | Edeck
@endsection

@section('content')

    <div class="sign-in-page">
        <div class="row">
        @includeIf('message.message')

            <div class="col-md-6 col-md-offset-3">
                <!-- create a new account -->

                    <h4 class="checkout-subtitle">Create a new account</h4>

                    <form class="register-form outer-top-xs"  method="post" action="{{ route('customer.registration') }}">
                        @csrf

                        <div class="form-group">
                            <label class="info-title" for="name">Name <span>*</span></label>
                            <input type="text" name="name" class="form-control unicase-form-control text-input" id="name" value=" {{ old('name') }}" required >
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="email">Email Address <span>*</span></label>
                            <input type="email" name="email" class="form-control unicase-form-control text-input" id="email" value=" {{old('email')}}" required >
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="phone">Phone Number <span>*</span></label>
                            <input type="text" name="phone" class="form-control unicase-form-control text-input" id="phone" pattern="01[3|5|6|7|8|9][0-9]{8}" value="{{ old('phone') }}" required >
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="password">Password <span>*</span></label>
                            <input type="password" name="password" class="form-control unicase-form-control text-input" id="password" required >
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="confirm_password">Confirm Password <span>*</span></label>
                            <input type="password" name="confirm_password" class="form-control unicase-form-control text-input" id="confirm_password" required >
                        </div>

                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                    </form>



                <!-- create a new account -->

            </div>
        </div><!-- /.row -->
    </div><!-- /.sigin-in-->

    <br>


@endsection

