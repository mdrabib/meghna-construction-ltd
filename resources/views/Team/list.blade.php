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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Management</a></li>
                            <li class="breadcrumb-item active">Team</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Team</h4>
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
                                <button class="btn btn-danger mb-2" onclick="modelAction()">
                                    <i class="mdi mdi-plus-circle me-2"></i>
                                    {{__('Add Team')}}
                                </button>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog"></i></button>
                                    <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                    <button type="button" class="btn btn-light mb-2">Export</button>
                                </div>
                            </div><!-- end col-->
                            @if(Session::has('response'))
                            {!!Session::get('response')['message']!!}
                            @endif
                        </div>

                        <div class="table-responsive">
                            <table class="table table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Team Leader</th>
                                        <th>Worker</th>
                                        <th>Builder</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($teams as $team)
                                {{$team}}

                                    <tr>
                                        <td>{{++$loop->index}}</td>
                                        <td>{{$team->team_name}}</td>
                                        <td>{{$team->team_name}}</td>
                                        <td>{{$team->team_name}}</td>
                                        <td>{{$team->team_name}}</td>
                                        {{-- <td>{{$teamLeader?->name}}</td> --}}
                                        {{-- <td>{{$teamLeader?->name}}</td> --}}
                                        <td>
                                            <!-- Switch-->
                                            <div>
                                                @if($team->status === 1)
                                                    <input type="checkbox" id="switch1" checked data-switch="success" />
                                                    <label for="switch1" data-on-label="Yes" data-off-label="No" class="mb-0 d-block"></label>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{route('team.edit',$team)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            <form action="{{route('team.destroy',$team)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="action-icon btn"><i class="mdi mdi-delete"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                No data Founds!
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                            {{$teams->links()}}
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
                <!-- ? Popup Add Country Start -->
                <!-- Add New Country MODAL -->
                <div class="modal fade" id="country-modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="needs-validation" name="event-form" id="form-event" novalidate method="POST" action="{{route('team.store')}}">
                                @csrf
                                @method('POST')
                                <!-- <input type="text" hidden value="{{decrypt(session()->get('roleIdentity'))}}" id="authName"> -->
                                <div class="modal-header py-3 px-4 border-bottom-0">
                                    <h5 class="modal-title" id="modal-title">Add Team</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="modelAction()"></button>
                                </div>
                                <div class="modal-body px-4 pb-4 pt-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="control-label form-label">Team Name</label>
                                                <input class="form-control" placeholder="Insert Event Name" type="text" name="teamName" id="teamName" required />
                                                <div class="invalid-feedback">Please provide a valid name</div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                                        </div>
                                        <div class="col-6 text-end">
                                            <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal" onclick="modelAction()">Close</button>
                                            <button type="submit" class="btn btn-success" id="">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- end modal-content-->
                    </div> <!-- end modal dialog-->
                </div>
                <!-- end modal-->
                <!-- Popup Add Country end -->
            </div> <!-- end col -->

            @if(isset($countryData))
            <div class="modal fade show d-block show" id="country-modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="needs-validation" name="event-form" id="form-event" novalidate method="POST" action="{{route('team.update',$countryData)}}">
                                @csrf
                                @method('PATCH')
                                <!-- <input type="text" hidden value="{{decrypt(session()->get('roleIdentity'))}}" id="authName"> -->
                                <div class="modal-header py-3 px-4 border-bottom-0">
                                    <h5 class="modal-title" id="modal-title">Add Country</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="modelAction()"></button>
                                </div>
                                <div class="modal-body px-4 pb-4 pt-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="control-label form-label">Country Name</label>
                                                <input class="form-control" placeholder="Insert Event Name" type="text" name="countryName" id="countryName" required value="{{$countryData->country}}"/>
                                                <div class="invalid-feedback">Please provide a valid event name</div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                                        </div>
                                        <div class="col-6 text-end">
                                            <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal" onclick="modelAction()">Close</button>
                                            <button type="submit" class="btn btn-success" id="" onclick="modelAction()">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- end modal-content-->
                    </div> <!-- end modal dialog-->
                </div>
            @endif
        </div>
        <!-- end row -->

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

@endsection

@push('scripts')
<script src="{{asset('assets/js/vendor/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('assets/js/vendor/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/responsive.bootstrap5.min.js')}}"></script>

<!-- third party js -->
<script src="{{asset('assets/js/vendor/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/fullcalendar.min.js')}}"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="{{asset('assets/js/pages/demo.calendar.js')}}"></script>


<script>
    function modelAction(country=false) {
        $('#country-modal').toggleClass('d-block show');
        $('body').toggleClass('modal-open');
        console.log(country);
    }

    // function handleSubmit() {
    //     // e.preventDefault();
    //     let countryName = $('#countryName').val();
    //     let authName = $('#authName').val();
    //     // console.log(countryName);
    //     const host = `${window.location.origin}`;
    //     const data = {
    //         countryName,
    //         _token: '<?php echo csrf_token() ?>',
    //         _method:'PATCH',
    //     }

    //     // console.log('host',host);

    //     $.ajax({
    //         method: 'GET',
    //         // headers:{
    //         //     _token : '<?php echo csrf_token() ?>',
    //          //       _method:'PATCH',
    //         //},
    //         url: host + `/${authName}/country/store`,
    //         data,
    //         success: function(data) {
    //             console.log(data);
    //         },
    //         error: function(data) {
    //             console.log(data);
    //         }
    //     });

    // }
</script>

@endpush