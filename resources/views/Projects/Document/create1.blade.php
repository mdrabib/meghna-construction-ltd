@extends('app')

@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/dropify/dropify.min.css.css')}}">
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
                <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                <li class="breadcrumb-item active">Form Elements</li>
            </ol>
        </div>
        <h4 class="page-title">Form Elements</h4>
    </div>
</div>
</div>
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Document</h4>
            <hr>
            <div class="tab-content">
                <div class="tab-pane show active" id="input-types-preview">
                    <div class="row d-none">
                        <div class="col-lg-12">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route('document.store')}}">
                                @csrf
                                <div class="mb-3">
                                    <label for="docuname" class="form-label">Document Name</label>
                                    <input type="text" id="docuname" name="docuname" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="docufile" class="form-label">Upload document</label>
                                    <input type="file" id="docufile" class="form-control" name="docufile">
                                </div>

                                <div class="mb-3">
                                    <label for="example-textarea" class="form-label">Description(optional)</label>
                                    <textarea class="form-control" id="example-textarea" name="description" rows="5"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>

                            </form>
                        </div> <!-- end col -->
                        <!-- end col -->
                    </div>
                    <!-- end row-->
                </div> <!-- end preview-->
            </div> <!-- end tab-content-->

            <!-- Another -->
            <div class="tab-content">
                <div class="tab-pane show active" id="input-types-preview">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route('document.store')}}">
                                @csrf
                                {{-- <h5 class="mb-3 text-uppercase bg-light p-2 mt-4"><i class="mdi mdi-office-building me-1"></i> {{__('Plot Document')}} :</h5> --}}
                                <div class="row">
                                    <div class="col-xl-6 mb-3 mt-xl-0">
                                        <label for="project-overview" class="form-label">{{__('Overview')}}</label>
                                        <p class="text-muted font-14">Brief about the document</p>
                                        <textarea class="form-control" id="documetnOverView" rows="7" placeholder="Enter some brief about project.."></textarea>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="mb-3 mt-3 mt-xl-0">
                                            <label for="projectname" class="mb-0">Project Image</label>
                                            <p class="text-muted font-14">Recommended thumbnail size 800x400 (px).</p>

                                            <!-- File Upload -->
                                            <div action="{{route('document.store')}}" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate" enctype="multipart/form-data>
                                        @csrf

                                        <div class=" fallback">
                                                                                        <input name="file" type="file" multiple />
                                            </div>

                                            <div class="dz-message needsclick">
                                                <i class="h1 text-muted dripicons-cloud-upload"></i>
                                                <h3>Drop files here or click to upload.</h3>
                                                <span class="text-muted font-13">(This is just a demo dropzone. Selected files are
                                                    <strong>not</strong> actually uploaded.)</span>
                                            </div>
                                        </div>

                                        <!-- Preview -->
                                        <div class="dropzone-previews mt-3" id="file-previews"></div>

                                        <!-- file preview template -->
                                        <div class="d-none" id="uploadPreviewTemplate">
                                            <div class="card mt-1 mb-0 shadow-none border">
                                                <div class="p-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                                                        </div>
                                                        <div class="col ps-0">
                                                            <span class="d-flex justify-content-between">
                                                                <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                                                                <p class="mb-0" data-dz-size></p>

                                                            </span>
                                                            <input type="text" name="documentText[]" class="form-control" placeholder="Enter image name">
                                                        </div>
                                                        <div class="col-auto">
                                                            <!-- Button -->
                                                            <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                                                <i class="dripicons-cross"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end file preview template -->
                                    </div>


                                </div> <!-- end col-->

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    </div> <!-- end col -->
                    <!-- end col -->
                </div>
                <!-- end row-->
            </div> <!-- end preview-->
        </div> <!-- end tab-content-->
    </div> <!-- end card-body -->
</div> <!-- end card -->
</div><!-- end col -->
</div><!-- end row -->
@endsection



@push('scripts')


<!-- plugin js -->
<!-- <script src="{{asset('assets/js/vendor/dropzone.min.js')}}"></script> -->
<script src="{{asset('assets/js/dropify/dropify.min.js')}}"></script>
<!-- init js -->
<!-- <script src="{{asset('assets/js/ui/component.fileupload.js')}}"></script> -->
{{-- drop zone --}}
<!-- <script src="{{asset('assets/js/dropzone/dropzone.min.js')}}"></script> -->


<script>
$('.dropify').dropify();
</script>

@endpush