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
                            <li class="breadcrumb-item active">Material Update</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Material Update</h4>
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
                                    <form class="form" method="post" enctype="multipart/form-data" action="{{ route('materialDetail.update',$materialDetail->id)}}">
                                        @csrf
                                        @method('patch')
                                        <div class="row">
                                            <div class="mb-3">
                                                <label for="materialName">Material Name</label>
                                                <select class="form-control" name="materialName" id="materialName">
                                                    <option value="">Select Material Name</option>
                                                    @forelse($matName as $mName)
                                                        <option value="{{$mName->id}}" {{ old('materialName',$materialDetail->material_id)==$mName->id?"selected":""}}> {{ $mName->material_name}}</option>
                                                    @empty
                                                        <option value="">No data found</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="brandName" class="form-label">Material Name</label>
                                                <input type="text" value="{{ old('brandName',$materialDetail->brand_name)}}" id="brandName" name="brandName" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3">
                                                <label for="quantity" class="form-label">Material Name</label>
                                                <input type="text" value="{{ old('quantity',$materialDetail->quantity)}}" id="quantity" name="quantity" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="costPerItems" class="form-label">Quantity Name</label>
                                                <input type="text" value="{{ old('costPerItems',$materialDetail->cost_per_items)}}" id="costPerItems" class="form-control" name="costPerItems">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="voucherImage" class="form-label">Voucher</label>
                                            <input type="file" id="voucherImage" class="form-control" name="voucherImage">
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