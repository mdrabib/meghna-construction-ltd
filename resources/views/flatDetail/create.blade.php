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
                            <li class="breadcrumb-item active">Flat Create</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Flat Create</h4>
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
                                    <form class="form" method="post" action="{{ route('flatDetail.store')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="materialName" class="form-label">Material Name</label>
                                                <select class="form-control" name="materialName" id="materialName">
                                                    <option value="">Select Name</option>
                                                    @forelse($matName as $mName)
                                                        <option value="{{$mName->id}}" {{ old('materialName')==$mName->id?"selected":""}}> {{ $mName->material_name}}</option>
                                                    @empty
                                                        <option value="">No data found</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="squireFeet" class="form-label">Squire Feet</label>
                                                <input type="text" id="squireFeet" name="squireFeet" class="form-control">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tbudget" class="form-label">Total Budget</label>
                                            <input type="text" id="tbudget" class="form-control" name="tbudget">
                                        </div>

                                        <div class="mb-3">
                                            <label for="tcost" class="form-label">Total Cost</label>
                                            <input type="text" id="tcost" class="form-control" name="tcost">
                                        </div>
                                        <div class="mb-3">
                                            <label for="salePrice" class="form-label">Sales Price</label>
                                            <input type="text" id="salePrice" class="form-control" name="salePrice">
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