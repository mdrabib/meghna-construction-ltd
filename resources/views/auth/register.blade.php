@include('layout.header')

<body class="loading authentication-bg" data-layout-config='{"darkMode":false}'>

<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xxl-4 col-lg-5">
            <div class="card">
                <!-- Logo-->
                <div class="card-header pt-2 pb-4 text-center bg-primary">
                    <a href="index.html">
                        <span><img src="{{ asset('public/assets/images/logo.png') }}" alt="" height="18"></span>
                    </a>
                </div>
                <div class="card-body p-4">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li class="invalid-tooltips">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                    @endif -->
                    <form action="{{ route('userstore')}}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="mb-3">
                            <label for="fullname" class="form-label">{{__('Roles')}}:</label>


                            <select name="userRoles" id="" class="form-control select2">
                                <option value="{{old('userRoles')}}">{{__('Select Roles')}}</option>
                                @forelse($roles as $role)
                                <option value="{{$role->id}}">
                                    {{__($role->role)}}
                                </option>
                                @empty
                                <option value="">{{__('No Data Founds')}}</option>
                                @endforelse

                            </select>
                            @error('role_id')
                            <div class="invalid-tooltip">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="fullname" class="form-label">{{__('Full Name')}}</label>
                            <input class="form-control" type="text" id="fullname" placeholder="Enter your name" required name="userFullName" value="{{ old('userFullName')}}">
                            <div class="valid-tooltip"></div>
                            @error('userFullName')
                            <div class="invalid-tooltip">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="emailaddress" class="form-label">{{__('Email address')}}</label>
                            <input class="form-control" type="email" id="emailaddress" required placeholder="Enter your email" name="userEmailAddress" value="{{ old('userEmailAddress')}}">
                            @error('userEmailAddress')
                            <div class="invalid-tooltip">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="userPhoneNumber" class="form-label">{{__('Phone')}}</label>
                            <input class="form-control" type="tel" id="userPhoneNumber" required placeholder="Enter your Phone" name="userPhoneNumber" value="{{ old('userPhoneNumber')}}">
                            @error('userPhoneNumber')
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
                                <div class="invalid-tooltip">           {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{__('Confirm Password')}}</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" placeholder="Confirm  password" name="password_confirmation">
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                                @error('password')
                                <div class="invalid-tooltip">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-signup">
                                <label class="form-check-label" for="checkbox-signup">{{__('I accept')}} <a href="#" class="text-muted">{{__('Terms and Conditions')}}</a></label>
                            </div>
                        </div>

                        <div class="mb-3 text-center">
                            <button class="btn btn-primary" type="submit">{{__('Sign Up')}} </button>
                        </div>

                    </form>
                </div> <!-- end card-body -->
            </div>
            <!-- end card -->

            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p class="text-muted">A{{__('lready have account')}}? <a href="pages-login.html" class="text-muted ms-1"><b>Log In</b></a></p>
                </div> <!-- end col-->
            </div>
            <!-- end row -->

        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- end container -->
</div>
<!-- end page -->

<footer class="footer footer-alt">
2018 - 2021 © Hyper - Coderthemes.com
</footer>

@include('layout.footer')