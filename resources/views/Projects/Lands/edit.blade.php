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
                            <li class="breadcrumb-item active">Land Edit</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Land Edit</h4>
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
                                    <form class="form" method="post" enctype="multipart/form-data" action="{{ route('land.update',$land->id)}}">
                                        @csrf
                                        @method('patch')
                                        <div class="mb-3">
                                            <label for="squireFeet" class="form-label">Squire Feet</label>
                                            <input type="text" value="{{ old('squireFeet',$land->squire_feet)}}" id="squireFeet" name="squireFeet" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label for="houseNo" class="form-label">House No.</label>
                                            <input type="text" value="{{ old('houseNo',$land->house_no)}}" id="houseNo" class="form-control" name="houseNo">
                                        </div>

                                        <div class="mb-3">
                                            <label for="block" class="form-label">Block</label>
                                            <input type="text" value="{{ old('block',$land->block)}}" id="block" class="form-control" name="block">
                                        </div>
                                        <div class="mb-3">
                                            <label for="roadNo" class="form-label">Road No.</label>
                                            <input type="text" value="{{ old('roadNo',$land->road_no)}}" id="roadNo" class="form-control" name="roadNo">
                                        </div>
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" value="{{ old('address',$land->address)}}" id="address" class="form-control" name="address">
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label for="designId" class="form-label">Design</label>
                                            <input type="file" id="designId" class="form-control" name="designId">
                                        </div> --}}
                                        <div class="mb-3">
                                            <label for="totalBudget" class="form-label">Total Budget</label>
                                            <input type="text" value="{{ old('totalBudget',$land->total_budget)}}" id="totalBudget" class="form-control" name="totalBudget">
                                        </div>
                                        <div class="mb-3">
                                            <label for="totalCost" class="form-label">Total Cost</label>
                                            <input type="text" value="{{ old('totalCost',$land->total_cost)}}" id="totalCost" class="form-control" name="totalCost">
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