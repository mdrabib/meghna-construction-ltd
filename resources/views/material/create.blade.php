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
                            <li class="breadcrumb-item active">Material Create</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Material Create</h4>
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
                                    <form class="form" enctype="multipart/form-data" method="post" action="{{ route('material.store')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-md-4">
                                                <h4 class="mt-0">Unit Name</h4>
                                                <select class="form-control select2" data-toggle="select2" name="unitName" id="unitName">
                                                    <option value="">Select Name</option>
                                                    @forelse($unitname as $uName)
                                                        <option value="{{$uName->id}}" {{ old('unitName')==$uName->id?"selected":""}}> {{ $uName->name}}</option>
                                                    @empty
                                                        <option value="">No data found</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">                                                
                                                <h4 class="mt-0">Brand</h4>
                                                <input type="text" id="brandName" name="brandName" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <h4 class="mt-0">Unit</h4>
                                                <input type="text" id="unit" name="unit" class="form-control">
                                            </div>                                            
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <h4 class="mt-0">Per unit price</h4>
                                                <input type="text" id="perunitprice" name="perunitprice" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <h4 class="mt-0">Note</h4>
                                                <textarea class="form-control form-control-light mb-2" placeholder="Write message" id="example-textarea" name="note" rows="3"></textarea>
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