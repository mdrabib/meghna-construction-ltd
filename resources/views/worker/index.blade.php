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
                    <li class="breadcrumb-item"><a href="{{ route('worker.index')}}">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active">
                        {{__('worker')}}
                    </li>
                </ol>
            </div>
            <h4 class="page-title">Workers</h4>
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
                        <a href="{{route('worker.create')}}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add worker</a>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog"></i></button>
                            <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                            <button type="button" class="btn btn-light mb-2">Export</button>
                        </div>
                    </div><!-- end col-->
                </div>
                    @if(Session::has('response'))
                        {!!Session::get('response')['message']!!}
                    @endif 
                   
                <div class="table-responsive">
                    {{$workers}}
                  
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
                                <th>Father Name</th>
                                <th>Mother Name</th>
                                <th>NID/Birth Certificate</th>
                                <th>Date of Birth</th>
                                <th>Attachment</th>
                                <th>Present Address</th>
                                <th>Parmanent Address</th>
                                <th>Total Working Day</th>
                                <th>Total Working Hour</th>
                                <th>Total Sallary</th>
                                <th style="width: 75px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($workers as $worker)
                         
                            <tr>
                                 <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                    <a href="{{route('worker.show',$worker) }}" class="text-body fw-semibold">
                                        {{$worker->name}}
                                    </a>
                                   
                                </td>
                                <td>
                                {{$worker->father_name}}
                                </td>
                                <td>
                                    {{$worker->mother_name}}
                                </td>
                                <td>
                                    {{$worker->nid_birth_Cirtificate}}
                                </td>
                                <td>
                                    {{$worker->dob}}
                                </td>
                                <td>
                                    {{$worker->attachment}}
                                </td>
                                <td>
                                    {{$worker->present_address}}
                                </td>
                                <td>
                                    {{$worker->parmanent_address}}
                                </td>
                                <td>
                                    {{$worker->total_working_day}}
                                </td>
                                <td>
                                    {{$worker->total_working_hour}}
                                </td>
                                <td>
                                    {{$worker->total_sallary}}
                                </td>
                                <td>
                                    @if ($worker->status === 1)
                                    <span class="badge badge-success-lighten">Active</span>
                                    @else                                   
                                        <span class="badge badge-danger-lighten">Blocked</span>
                                    
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <a 
                                    href="{{route('worker.edit',$worker)}}"
                                     class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                     <form action="{{route('worker.destroy',$worker)}}" method="POST">
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