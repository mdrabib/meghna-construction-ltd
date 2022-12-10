@extends('app')


@push('style')
<link href="{{ asset('assets/css/vendor/simplemde.min.css')}}" rel="stylesheet" type="text/css" />
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                            <li class="breadcrumb-item active">{{__('Create Project')}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{__('Create Project')}}</h4>
                </div>
            </div>
        </div>


        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    
                        <form action="{{route('management.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" value="{{ $_GET['id']}}" name="project_id"/>
                            <div class="row">                            
                                <div class="col-xl-4 mb-3">
                                    <label for="projectDirector" class="form-label">{{__('Project Director')}}</label>
                                    <input type="text" id="projectDirector" class="form-control" placeholder="Enter project director name" name="projectDirector" value="{{ old('projectDirector')}}" required>
                                </div>

                                <div class="col-xl-4 mb-3">
                                    <label for="architecht" class="form-label">{{__('Architecht Name')}}</label>
                                    <input type="text" id="architecht" class="form-control" placeholder="Enter architecht name" name="architecht" value="{{ old('architecht')}}" required>
                                </div>

                                <div class="col-xl-4 mb-3">
                                    <label for="civilEngineer" class="form-label">{{__('Civil Engineer')}}</label>
                                    <input type="text" id="civilEngineer" class="form-control" name="civilEngineer" placeholder="Enter civil engineer name"
                                    value="{{ old('civilEngineer')}}">
                                </div>
                            </div>

                            <div class="row">                              
                                <div class="mb-0 col-xl-4 col-6">
                                    <label for="team" class="form-label">{{__('Team Name')}} :</label>

                                    <select class="form-control select2" data-toggle="select2" name="team">
                                        <option value="">{{__('Select Name')}}</option>
                                        {{-- @forelse($landOwner as $team)
                                        <option value="{{$team->id}}">{{$team->name}}</option> --}}

                                        {{-- @empty
                                            <option value="">{{('No data found!')}}</option>
                                        @endforelse --}}
                                    </select>
                                </div>
                            </div>
                        <div class="col-10 offset-1 d-flex justify-content-end">

                            <button type="reset" class="btn btn-warning mt-2 mx-1"><i class="mdi mdi-content-save"></i> Reset</button>
                            <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save mx-1"></i> Save</button>
                        </div>
                    </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
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


@endsection

@push('scripts')



<!-- plugin js -->
<script src="{{asset('assets/js/vendor/dropzone.min.js')}}"></script>
<!-- init js -->
<script src="{{asset('assets/js/ui/component.fileupload.js')}}"></script>

                                                    <!-- SimpleMDE js -->
<script src="{{asset('assets/js/vendor/simplemde.min.js')}}"></script>
<!-- SimpleMDE demo -->
<script src="{{asset('assets/js/pages/demo.simplemde.js')}}"></script>
                                                



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

        // console.log('host',host);

    //     $.ajax({
    //         method: 'GET',
            // headers:{
            //     _token : '<?php echo csrf_token() ?>',
             //       _method:'PATCH',
            //},
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

 