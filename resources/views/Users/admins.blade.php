@extends('app')

@push('style')
   <!-- third party css -->
   <link href="{{asset('assets/css/vendor/dataTables.bootstrap5.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{asset('assets/css/vendor/responsive.bootstrap5.css')}}" rel="stylesheet" type="text/css" />
   <!-- third party css end -->   
@endpush

@section('content')



<div class="content-page">
<div class="content">

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route(decrypt(session()->get('roleIdentity')) .'.dashboard')}}">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('member.index')}}">{{__('Members')}}</a></li>
                    <li class="breadcrumb-item active">
                        {{__('Members')}}
                    </li>
                </ol>
            </div>
            <h4 class="page-title">Members</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <a href="{{route('member.create')}}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Member</a>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog"></i></button>
                            <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                            <button type="button" class="btn btn-light mb-2">Export</button>
                        </div>
                    </div><!-- end col-->
                </div>

                <div class="table-responsive">
                    @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                    @endif
                    <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                        <thead>
                            <tr>
                                <th style="width: 20px;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Create Date</th>
                                <th>Status</th>
                                <th style="width: 75px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($admins as $admin)
                         
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                    @if ($admin->avatar !== "")
                                    <img src="{{ asset('uploads/profile/'.$admin->avatar)}}" alt="table-user" class="me-2 rounded-circle">
                                    @else
                                    <img src="{{ asset('uploads/profile/avatar.webp')}}" alt="table-user" class="me-2 rounded-circle">
                                    @endif
                                    <a href="{{route('member.show',$admin) }}" class="text-body fw-semibold">
                                        {{$admin->name}}
                                    </a>
                                </td>
                                <td>
                                    {{$admin->phone}}
                                </td>
                                <td>
                                    {{$admin->email}}
                                </td>
                                <td>
                                    {{$admin->role->role}}
                                </td>
                                <td>
                                    {{$admin->created_at}}
                                </td>
                                <td>
                                    @if ($admin->status === 1)
                                    <span class="badge badge-success-lighten">Active</span>
                                    @else                                   
                                        <span class="badge badge-danger-lighten">Blocked</span>
                                    
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <a 
                                    href="{{route('member.edit',$admin)}}"
                                     class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                     <form action="{{route('member.destroy',$admin)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn action-icon"><i class="mdi mdi-delete"></i></button>
                                     </form>
                                </td>
                            </tr>
                        
                            @empty
                            <tr>
                                <td colspan="8">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                           
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->

</div> <!-- End Content -->

<!-- Footer Start -->
<footer class="footer">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <script>document.write(new Date().getFullYear())</script> © Hyper - Coderthemes.com
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

@endsection

@push('scripts')
    <script src="{{asset('assets/js/vendor/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.checkboxes.min.js')}}"></script>

    <script src="{{asset('assets/js/pages/demo.customers.js')}}"></script>
@endpush