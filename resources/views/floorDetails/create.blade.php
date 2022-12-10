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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Constructions</a></li>
                            <li class="breadcrumb-item active">Floor Create</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Floor Create</h4>
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
                                    <form class="form" method="post" enctype="multipart/form-data" action="{{ route('floorDetails.store')}}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="floorNo" class="form-label">Floor No.</label>
                                            <input type="text" id="floorNo" name="floorNo" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="tsFeet" class="form-label">Total Squire Feet</label>
                                            <input type="text" id="tsFeet" name="tsFeet" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label for="tBudget" class="form-label">Total Budget</label>
                                            <input type="text" id="tBudget" class="form-control" name="tBudget">
                                        </div>

                                        <div class="mb-3">
                                            <label for="tCost" class="form-label">Total Cost</label>
                                            <input type="text" id="tCost" class="form-control" name="tCost">
                                        </div>

                                        {{-- <div class="mb-3">
                                            <label for="mId" class="form-label">Materials</label>
                                            <input type="text" id="mId" class="form-control" name="mId">
                                        </div> --}}

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