
@extends('app')

@section('content')



<!-- Start Content-->
<div class="container-fluid">

<!-- Begin page -->
<div class="wrapper">

<div class="content-page">
<div class="content">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box">
<div class="page-title-right">
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
        <li class="breadcrumb-item active">Profile 2</li>
    </ol>
</div>
<h4 class="page-title">Profile 2</h4>
</div>
</div>
</div>
<!-- end page title -->

<div class="row">
<div class="col-12">
<div class="card">
    <div class="card-body">
        <h4 class="header-title">Add Members</h4>
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
        
        <div class="tab-content">
            <div class="tab-pane show active" id="floating-preview">
                <form action="{{ route('member.update',$member)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                <div class="row mt-4">
                    <div class="col-lg-6">
                        <div class="form-floating mb-3">
                            @error('userFullName')
                    <div class="invalid-tooltip">{{$message}}</div>
                    @enderror
                            <input type="text" class="form-control" id="floatingInput" placeholder="John Duo" required name="userFullName" 
                            value="{{ $member->name}}">
                            <label for="floatingInput">{{__('Full Name')}}:</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="userEmailAddress"
                            value="{{ $member->email}}">
                            <label for="floatingInput">Email address</label>
                        </div>
                      
                        <h5 class="mb-3 mt-4">
                            Office
                        </h5>
                      
                        <div class="row g-2">
                            <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" name="userRoles" id="floatingSelect" aria-label="Floating label select example">
                                    @forelse($roles as $role)
                                    @if ($role->role===$member->role)
                                    <option value="{{$role->id}}" selected>
                                        {{__($role->role)}}
                                    </option>
                                    @else
                                        <option value="{{$role->id}}">
                                        {{__($role->role)}}
                                    </option>
                                    @endif
                                    
                                    @empty
                                    <option value="">{{__('No Data Founds')}}</option>
                                    @endforelse
                                </select>
                                <label for="floatingSelect">
                                    {{__('User Role')}}
                                </label>
                            </div>
                        </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                        
                                        @forelse($designation as $desig)
                                        @if ($desig->designation===$member->designation)

                                            <option value="{{$desig->id}}" selected>
                                                {{__($desig->designation)}}
                                            </option>
                                        @else
                                            <option value="{{$desig->id}}">
                                                {{__($desig->designation)}}
                                            </option>
                                   
                                        @endif
                                            <option value="{{$desig->id}}">
                                                {{__($desig->designation)}}
                                            </option>
                                        @empty
                                            <option value="">{{__('No Data Founds')}}</option>
                                        @endforelse
                                    </select>
                                    <label for="floatingSelectGrid">{{__('Designation')}}</label>
                                </div>
                            </div>
                            
                           
                        </div>
                    </div>
                
                    <div class="col-lg-6">
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="floatingInput" placeholder="+88-018-000-000" name="userPhoneNumber" 
                            value="{{ $member->phone}}">
                            <label for="floatingInput">{{__('Phone')}}</label>
                        </div>
                       
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" name="userPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                       <h5 class="mb-3">
                            Profile Picture
                        </h5>
                         <div class="col-md">
                            <div class="form-floating">
                                <div class="mb-3">
                                    <label for="example-fileinput" class="form-label">File</label>
                                    <input type="file" name="userAvatar" id="example-fileinput" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="d-flex justify-content-around" style="width:15rem; ">
                        
                        <button class="btn btn-primary text-center justify-content-center" type="submit">{{__('Uodate')}} </button>
                    </div>
                </div>
                </form>
            </div>
        </div> <!-- end tab-content-->
    </div> <!-- end card-body -->
</div> <!-- end card -->
</div><!-- end col -->
</div><!-- end row -->

<!-- end row-->

</div> <!-- End Content -->

<!-- Footer Start -->
<footer class="footer">
<div class="container-fluid">
<div class="row">
<div class="col-md-6">
<script>
    document.write(new Date().getFullYear())
</script> © Hyper - Coderthemes.com
</div>
<div class="col-md-6">
<div class="text-md-end footer-links d-none d-md-block">
    <a href="javascript: void(0);">About</a>
    <a href="javascript: void(0);">Support</a>
    <a href="javascript: void(0);">Contact Us</a>
</div>
</div>
</div>
</div>
</footer>
<!-- end Footer -->

</div> <!-- content-page -->

</div> <!-- end wrapper-->
</div>
<!-- END Container -->

@endsection