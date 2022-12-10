@extends('app')


@push('style')
<!-- <link rel="stylesheet" href="{{asset('assets/css/dropify/dropify.min.css')}}"> -->
<link rel="stylesheet" href="{{asset('assets/css/dropify/dropify-multiple.min.css')}}">
<style>
    .file-icon {
        font-size: 2rem !important;
    }
</style>
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
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form" method="post" enctype="multipart/form-data" action="{{route('document.store')}}">
                                            @csrf
                                            {{-- <h5 class="mb-3 text-uppercase bg-light p-2 mt-4"><i class="mdi mdi-office-building me-1"></i> {{__('Plot Document')}} :</h5> --}}
                                            <input type="hidden" name="project_id" value="{{$_GET['id']}}">
                                            <div class="row">
                                                <div class="col-xl-6 mb-3 mt-xl-0">
                                                    <label for="project-overview" class="form-label">{{__('Documet name')}}</label>
                                                    <input type="text" name="docuname" id="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6 mb-3 mt-xl-0">
                                                    <label for="project-overview" class="form-label">{{__('Description')}}</label>
                                                    <p class="text-muted font-14">Brief about the document</p>
                                                    <textarea class="form-control" name="description" id="documetnOverView" rows="7" placeholder="Enter some brief about project.."></textarea>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="mb-3 mt-3 mt-xl-0">
                                                        <label for="projectname" class="mb-0">Project Image</label>
                                                        <p class="text-muted font-14">Recommended thumbnail size 800x400 (px).</p>
                                                        <input type="file" multiple="multiple" class="dropify" data-max-height="1000" name="documents[]" id="documentFile" data-max-file-size-preview="3M" />

                                                    </div>
                                                    <!-- Preview -->
                                                    <span class="text-danger text-center" id="imageData"></span>
                                                    <div class="dropzone-previews mt-3" id="file-previews"></div>
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
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->
        @endsection


        @push('scripts')



        <script src="{{asset('assets/js/dropify/dropify.min.js')}}"></script>

        <!-- <script src="{{asset('assets/js/dropify/dropify-multiple.min.js')}}"></script> -->

        <script>
            $('.dropify').dropify({
                filename: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            let droped = $('.dropify').dropify();

            // console.log(droped);
            let doc = $('#documentFile');
            console.log(doc);


            doc.change((e) => {
                let images = $('form input[type=file]').get(0).files
                let filePreviews = $('#imageData');
                let img;
                console.log(images);
                // images.map((image) => {
                //     console.log();
                // });
                return filePreviews.html(images.length + ' Item selected');

            })
        </script>

        @endpush