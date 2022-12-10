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
                                    <form class="form" method="post" enctype="multipart/form-data" action="{{ route('unit.update',$unit->id)}}">
                                        @csrf
                                        @method('patch')
                                        <div class="row">
                                            <div class="mb-3 col-md-4">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" value="{{ old('name',$unit->name)}}" id="name" name="name" class="form-control">
                                            </div>

                                            <div class="mb-3 col-md-4">
                                                <label for="quantity" class="form-label">Quantity</label>
                                                <input type="text" value="{{ old('quantity',$unit->quantity)}}" id="quantity" name="quantity" class="form-control">
                                            </div>

                                            <div class="mb-3 col-md-4">
                                                <label for="qname" class="form-label">Quantity Name</label>
                                                <input type="text" value="{{ old('qname',$unit->quantity_name)}}" id="qname" class="form-control" name="qname">
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