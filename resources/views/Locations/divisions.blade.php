@extends('app')

@section('content')



<div class="content-page">
    <div class="content">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Location</a></li> --}}
                            <li class="breadcrumb-item active">Location</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Divisions</h4>
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
                                <button onclick="modelAction()" href="" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Division</button>
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
                            <table class="table table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Divions</th>
                                        <th>Country</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($divisions as $division)
                                    <tr>
                                        <td>{{++$loop->index}}</td>
                                        <td>{{$division->divison}}</td>
                                        <td>July 24, 1950</td>
                                        <td>
                                            <!-- Switch-->
                                            <div>
                                                <input type="checkbox" id="switch1" checked data-switch="success" />
                                                <label for="switch1" data-on-label="Yes" data-off-label="No" class="mb-0 d-block"></label>
                                            </div>
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{route('division.edit',$division)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            <form action="{{route('division.destroy',$division)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="action-icon btn"><i class="mdi mdi-delete"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            No data Found
                                        </td>
                                    </tr>
                                    @endforelse


                                </tbody>
                            </table>

                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
                <!-- Popup Add divisions Start-->
                <!-- Add New Division MODAL -->
                <div class="modal fade" id="division-modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="needs-validation" name="event-form" id="form-event" novalidate method="POST" action="{{route('division.store')}}">
                                @csrf
                                @method('POST')
                                <div class="modal-header py-3 px-4 border-bottom-0">
                                    <h5 class="modal-title" id="modal-title">Event</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="modelAction()"></button>
                                </div>
                                <div class="modal-body px-4 pb-4 pt-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="control-label form-label">Divison</label>
                                                <input class="form-control" placeholder="Insert Division Name" type="text" name="divisonName" id="divisonName" required />
                                                <div class="invalid-feedback">Please provide a valid event name</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="control-label form-label">Country</label>
                                                <select class="form-select" name="countryName" id="event-category" required>
                                                    <option value="bg-danger" selected>Select Country</option>
                                                    @forelse($countries as $country)
                                                    <option value="{{$country->id}}">{{$country->country}}</option>
                                                    @empty
                                                    <option value="bg-primary">No data Founds!</option>
                                                    @endforelse
                                                </select>
                                                <div class="invalid-feedback">Please select a valid event category</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                                        </div>
                                        <div class="col-6 text-end">
                                            <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal" onclick="modelAction()">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-success" id="btn-save-event">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- end modal-content-->
                    </div> <!-- end modal dialog-->
                </div>
                <!-- end modal-->
                <!-- ? Popup Add Divisions End-->
            </div> <!-- end col -->
            <!-- Update Divions -->
            @if(isset($divisionData))
            <div class="modal fade show d-block show" id="" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form class="needs-validation" name="event-form" id="form-event" novalidate method="POST" action="{{route('division.update',$divisionData)}}">
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
                                            <label class="control-label form-label">Divison</label>
                                            <input class="form-control" placeholder="Insert Divison Name" type="text" name="divisonName" id="divisonName" required value="{{$divisionData->divison}}" />
                                            <div class="invalid-feedback">Please provide a valid event name</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="control-label form-label">Country</label>
                                            <select class="form-select" name="countryName" id="event-category" required>
                                                <option value="">Select Country</option>
                                                @forelse($countries as $country)
                                                @if($country->id === $divisionData->country_id)
                                                <option value="{{$country->id}}" selected>{{$country->country}}</option>
                                                @else
                                                <option value="{{$country->id}}">{{$country->country}}</option>
                                                @endif
                                                @empty
                                                <option value="bg-primary">No data Founds!</option>
                                                @endforelse
                                            </select>
                                            <div class="invalid-feedback">Please select a valid event category</div>
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
    function modelAction() {
        $('#division-modal').toggleClass('d-block show');
        $('body').toggleClass('modal-open');

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