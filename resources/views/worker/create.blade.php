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
                            <li class="breadcrumb-item active">{{__('Create worker ')}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{__('Create Worker')}}</h4>
                </div>
            </div>
        </div>


        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('worker.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <h5 class="mb-3 text-uppercase bg-light p-2 mt-4"><i class="mdi mdi-office-building me-1"></i> {{__('Worker Information')}} :</h5>
                           
                            <div class="row">                            
                                <div class="col-xl-4 mb-3">
                                    <label for="name" class="form-label">{{__('Name')}}</label>
                                    <input type="text" id="name" class="form-control" placeholder="Enter project name" name="name"  required>
                                </div>
                                <div class="col-xl-4 mb-3">
                                    <label for="fname" class="form-label">{{__('Father Name')}}</label>
                                    <input type="text" id="fname" class="form-control" placeholder="Enter project name" name="fname"  required>
                                </div>
                                <div class="col-xl-4 mb-3">
                                    <label for="mname" class="form-label">{{__('Mother Name')}}</label>
                                    <input type="text" id="mname" class="form-control" placeholder="Enter project name" name="mname" required>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-xl-4 mb-3">
                                    <label for="nbcertificate" class="form-label">{{__('NID/Birth Certificate')}}</label>
                                    <input type="number" id="nbcertificate" class="form-control" placeholder="Enter project name" name="nbcertificate" value="{{ old('projectNameInputField')}}" required>
                                </div>
                               
                                <div class="col-xl-4 mb-3 position-relative" id="dob">
                                    <label class="dob">{{__('Date of Birth')}}</label>
                                    <input type="date" class="form-control" 
                                    name="dob"
                                    value="{{ old('parojectStarDate')}}"
                                    >
                                </div>
                               
                                <div class="col-xl-4 mb-3 mt-3 mt-xl-0">
                                    <label for="attachment" class="mb-0">{{__('Attachment')}} : </label>
                                    
                                        <input class="form-control" type="file" id="attachment" name="attachment"
                                        value="{{old('projectImage')}}">
                                        <p class="text-muted font-14">Recommended thumbnail size 800x400 (px).</p>
                                </div>
                            </div>
                            
                            <h5 class="mb-3 text-uppercase bg-light p-2 mt-4"><i class="mdi mdi-office-building me-1"></i> {{__('Address')}} :</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="preaddress" class="form-label">{{__('Present Address')}}</label>
                                        <textarea class="form-control" rows="6" id="preaddress" name="preaddress" placeholder="1234 Main St"></textarea>
                                    </div>
                                </div>
                                 @php
                                    $countires = DB::table('countries')->get();

                                 @endphp
                                <div class="col-md-6">
                                    <div class="mb-3">
                                    <label for="country" class="form-label">{{__('Country')}}</label>
                                    <select id="inputState" name="country"class="form-select" >
                                       
                                        <option>{{_('Select Country')}}</option>
                                        @forelse ($countires as $country)
                                        <option value="{{$country->id}}">{{$country->country}}</option>
                                            
                                        @empty
                                        <option>No data Found</option>
                                            
                                        @endforelse
                                    </select>
                                </div>  
                                @php
                                    $divisions = DB::table('divisions')->get();
                                        
                                @endphp
                                <div class="mb-3">
                                    <label for="division" class="form-label">{{__('Division')}}</label>
                                    <select id="divisons" name="division" class="form-select">
                                      
                                        <option>{{_('Select Division')}}</option>

                                    @forelse ($divisions as $division)
                                    <option value="{{$division->id}}">{{$division->divison}}</option>
                                        
                                    @empty
                                    <option>No data Found</option>
                                        
                                    @endforelse
                                    </select>
                                </div>
                                @php
                                    $districts = DB::table('districts')->get();
                                        
                                @endphp
                                <div class="mb-3">
                                    <label for="district" class="form-label">{{__('District')}}</label>
                                    <select id="district" name="district" class="form-select">
                                        
                                        <option>{{_('Select District')}}</option>

                                    @forelse ($districts as $district)
                                    <option value="{{$district->id}}">{{$district->district}}</option>
                                        
                                    @empty
                                    <option>No data Found</option>
                                        
                                    @endforelse
                                    </select>
                                </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                                   <hr>       
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="peraddress" class="form-label">{{__('Permanent Address')}}</label>
                                        <textarea class="form-control" name="peraddress" rows="6" id="inputAddress" placeholder="1234 Main St"> 

                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                    <label for="slectcountry" class="form-label">{{__('Country')}}</label>
                                    <select id="slectcountry" name="slectcountry" class="form-select">
                                        <option>{{_('Select Country')}}</option>
                                        @forelse ($countires as $country)
                                        <option value="{{$country->id}}">{{$country->country}}</option>
                                            
                                        @empty
                                        <option>No data Found</option>
                                            
                                        @endforelse
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="slectdivision" class="form-label">{{__('Division')}}</label>
                                    <select id="slectdivision" name="slectdivision" class="form-select">
                                    <option>{{_('Select Division')}}</option>

                                        @forelse ($divisions as $division)
                                        <option value="{{$division->id}}">{{$division->divison}}</option>
    
                                        @empty
                                            <option>No data Found</option>
    
                                        @endforelse
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="slectdistrict" class="form-label">{{__('District')}}</label>
                                    <select id="slectdistrict" name="slectdistrict" class="form-select">
                                        <option>{{_('Select District')}}</option>

                                        @forelse ($districts as $district)
                                            <option value="{{$district->id}}">{{$district->district}}</option>
    
                                            @empty
                                            <option>No data Found</option>
    
                                            @endforelse
                                    </select>
                                </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            {{-- <div class="mb-3">
                                <label for="designId" class="form-label">Design</label>
                                <input type="files" id="designId" class="form-control" name="designId">
                            </div> --}}
                        </div>
                        <!-- end row -->
                        <!-- Plot Documents -->
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

 