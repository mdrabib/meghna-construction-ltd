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
                                    <form class="form" method="post" enctype="multipart/form-data" action="{{ route('material.update',$material->id)}}">
                                        @csrf
                                        @method('patch')
                                        <div class="row">
                                            <div class="mb-3 col-md-4">
                                                <label for="uname" class="form-label">Name</label>
                                                <select class="form-control select2" data-toggle="select2" name="uname" id="uname">
                                                    
                                                    @forelse($unitname as $uName)
                                                        <option value="{{$uName->id}}" {{ old('uname',$material->unit_id)==$uName->id?"selected":""}}> {{ $uName->name}}</option>
                                                    @empty
                                                        <option value="">No data found</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label for="brand" class="form-label">Brand</label>
                                                <input type="text" value="{{ old('brand',$material->brand)}}" id="brand" name="brand" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label for="unit" class="form-label">Unit</label>
                                                <input type="text" value="{{ old('unit',$material->unit)}}" id="unit" name="unit" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="perunitprice" class="form-label">Quantity Name</label>
                                                <input type="text" value="{{ old('perunitprice',$material->per_unit_price)}}" id="perunitprice" class="form-control" name="perunitprice">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="note" class="form-label">Note</label>
                                                <textarea class="form-control form-control-light mb-2" placeholder="Write message" id="example-textarea" name="note" rows="3">{{ old('note',$material->note)}}</textarea>
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