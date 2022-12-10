@include('layout.header')

<body class="loading authentication-bg" data-layout-config='{"darkMode":false}'>
<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-5">
                <div class="card">

                    <!-- Logo -->
                    <div class="card-header pt-4 pb-4 text-center bg-primary">
                        <a href="index.html">
                            <span><img src="{{ asset('assets/images/logo.png') }}" alt="" height="18"></span>
                        </a>
                    </div>

                    <div class="card-body p-4">
                        
                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center mt-0 fw-bold">Sign In</h4>
                            @if ($errors->any())
                                <div class="alert alert-danger mb-4">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <p class="invalid-tooltips">{{ $error }}</p>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
            
                                @if(Session::has('response'))
                                {!!Session::get('response')['message']!!}
                                @endif
                           
                        </div>

                        <form action="{{route('userlogin')}}" method="POST">
                            @csrf
                            @method('post')

                           
                        <div class="mb-3">
                            <label for="emailaddress" class="form-label">{{__('Email address')}}</label>
                            <input class="form-control" type="email" id="emailaddress" required placeholder="Enter your email" name="userEmailAddress" value="{{ old('userEmailAddress')}}">
                            @error('userEmailAddress')
                            <div class="invalid-tooltip">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{__('Password')}}</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" placeholder="Enter your password" name="userPassword">
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                                @error('password')
                                <div class="invalid-tooltip">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                            <div class="mb-3 mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>

                            <div class="mb-3 mb-0 text-center">
                                <button class="btn btn-primary" type="submit"> Log In </button>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">Don't have an account? <a href="{{route('userstore')}}" class="text-muted ms-1"><b>Sign Up</b></a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

@include('layout.footer_content')

@include('layout.footer')
