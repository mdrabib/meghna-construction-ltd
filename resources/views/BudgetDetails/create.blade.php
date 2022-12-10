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
                            <li class="breadcrumb-item active">Floor Budget Details Create</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Floor Budget Details Create</h4>
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
                                    <form class="form" enctype="multipart/form-data" method="post" action="{{ route('floorBudgetDetail.store')}}">
                                        @csrf
                                        {{-- building name --}}
                                        <div class="row">
                                            <div class="mb-3 col-md-2">
                                                <label for="buildingName" class="form-label">Building Name</label>
                                                <select class="form-control" name="buildingName" id="buildingName">
                                                    <option value="">Select Name</option>
                                                    @forelse($buildingName as $mtn)
                                                        <option value="{{$mtn->id}}" {{ old('buildingName')==$mtn->id?"selected":""}}> {{ $mtn->project_name}}</option>
                                                    @empty
                                                        <option value="">No data found</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        {{-- floor no --}}
                                            <div class="mb-3 col-md-2">
                                                <label for="floorNo" class="form-label">Floor No.</label>
                                                <select class="form-control" name="floorNo" id="floorNo">
                                                    <option value="">Select Floor</option>
                                                    @forelse($floorNo as $fno)
                                                        <option value="{{$fno->id}}" {{ old('floorNo')==$fno->id?"selected":""}}> {{ $fno->floor_no}}</option>
                                                    @empty
                                                        <option value="">No data found</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        {{-- unit name --}}
                                            <div class="mb-3 col-md-2">
                                                <label for="unitName" class="form-label">Material Name</label>
                                                <select class="form-control" name="unitName" id="unitName">
                                                    <option value="">Select Unit</option>
                                                    @forelse($unitName as $uName)
                                                        <option value="{{$uName->id}}" {{ old('unitName')==$uName->id?"selected":""}}> {{ $uName->name}}</option>
                                                    @empty
                                                        <option value="">No data found</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-2">
                                                <label for="quantity" class="form-label">Quantity</label>
                                                <input type="text" id="quantity" name="quantity" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-2">
                                                <label for="mPrice" class="form-label">Market Price</label>
                                                <input type="text" id="mPrice" name="mPrice" class="form-control">
                                            </div>
                                            {{-- automaticaly total budget calculate hobe --}}
                                            {{-- <div class="mb-3 col-md-6">
                                                <label for="tBudget" class="form-label">Total Budget</label>
                                                <input type="text" id="tBudget" name="tBudget" class="form-control">
                                            </div> --}} 
                                            {{-- <div class="mb-3 col-md-2">
                                                <label for="issueDate" class="form-label">Issues Date</label>
                                                <input type="date" id="issueDate" name="issueDate" class="form-control">
                                            </div> --}}
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