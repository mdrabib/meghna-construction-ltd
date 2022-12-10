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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Project</a></li>
                            <li class="breadcrumb-item active">Unit Create</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Unit Create</h4>
                </div>
            </div>
        </div>      
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <hr>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form class="form" method="post" action="{{ route('foundation.store')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-md-3">
                                                <label for="height" class="form-label">Height</label>
                                                <input type="text" id="height" name="height" class="form-control">
                                            </div>

                                            <div class="mb-3 col-md-3">
                                                <label for="weight" class="form-label">Weight</label>
                                                <input type="text" id="weight" name="weight" class="form-control">
                                            </div>

                                            <div class="mb-3 col-md-3">
                                                <label for="piles" class="form-label">Piller Name</label>
                                                <input type="text" id="piles" class="form-control" name="piles">
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label for="rodsize" class="form-label">Rod size</label>
                                                <input type="text" id="rodsize" class="form-control" name="rodsize">
                                            </div>
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