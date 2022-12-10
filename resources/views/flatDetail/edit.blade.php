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
                            <li class="breadcrumb-item active">Flat Edit</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Flat Edit</h4>
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
                                    <form class="form" method="post" enctype="multipart/form-data" action="{{ route('flatDetail.update',$flatDetail->id)}}">
                                        @csrf
                                        @method('patch')
                                        <div class="mb-3">
                                            <label for="squireFeet" class="form-label">Squire Feet</label>
                                            <input type="text" value="{{ old('squireFeet',$flatDetail->squire_feet)}}" id="squireFeet" name="squireFeet" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label for="tcost" class="form-label">House No.</label>
                                            <input type="text" value="{{ old('tcost',$flatDetail->total_cost)}}" id="tcost" class="form-control" name="tcost">
                                        </div>

                                        <div class="mb-3">
                                            <label for="salePrice" class="form-label">salePrice</label>
                                            <input type="text" value="{{ old('salePrice',$flatDetail->sales_price)}}" id="salePrice" class="form-control" name="salePrice">
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