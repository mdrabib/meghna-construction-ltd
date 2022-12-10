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
                            <li class="breadcrumb-item active">Floor Budget Update</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Floor Budget Update</h4>
                </div>
            </div>
        </div>      
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <hr>
                    {{-- project_id(building_name) floor_details_id(floor_no) material_id  budget_quantity market_price 	total_budget 	issues_date  (material_name)--}}

                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form class="form" method="post" enctype="multipart/form-data" action="{{ route('floorBudgetDetail.update',$floorBudgetDetail->id)}}">
                                        @csrf
                                        @method('patch')
                                        <div class="row">
                                            {{-- building name --}}
                                            <div class="mb-3 col-md-2">
                                                <label for="buildingName" class="form-label">Building Name</label>
                                                <select class="form-control select2" data-toggle="select2" name="buildingName" id="buildingName">
                                                    @forelse($buildingName as $mtn)
                                                        <option value="{{$mtn->id}}" {{ old('buildingName',$floorBudgetDetail->project_id)==$mtn->id?"selected":""}}> {{ $mtn->project_name}}</option>
                                                    @empty
                                                        <option value="">No data found</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                            {{-- floor no --}}
                                            <div class="mb-3 col-md-2">
                                                <label for="floorNo" class="form-label">Floor No.</label>
                                                <select class="form-control select2" data-toggle="select2" name="floorNo" id="floorNo">
                                                    @forelse($floorNo as $fno)
                                                        <option value="{{$fno->id}}" {{ old('floorNo',$floorBudgetDetail->floor_details_id)==$fno->id?"selected":""}}> {{ $fno->floor_no}}</option>
                                                    @empty
                                                        <option value="">No data found</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        {{-- unit name --}}
                                            <div class="mb-3 col-md-2">
                                                <label for="unitName" class="form-label">Material Name</label>
                                                <select class="form-control select2" data-toggle="select2" name="unitName" id="unitName">
                                                    @forelse($unitName as $uName)
                                                        <option value="{{$uName->id}}" {{ old('unitName',$floorBudgetDetail->units_id)==$uName->id?"selected":""}}> {{ $uName->name}}</option>
                                                    @empty
                                                        <option value="">No data found</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-2">
                                                <label for="quantity" class="form-label">Quantity</label>
                                                <input type="text" id="quantity" value="{{$floorBudgetDetail->budget_quantity}}" name="quantity" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-2">
                                                <label for="mPrice" class="form-label">Market Price</label>
                                                <input type="text" id="mPrice" value="{{$floorBudgetDetail->market_price}}" name="mPrice" class="form-control">
                                            </div>
                                            {{-- <div class="mb-3 col-md-2">
                                                <label for="issueDate" class="form-label">Issues Date</label>
                                                <input type="datetime-local" id="issueDate" value="{{$floorBudgetDetail->issues_date}}" name="issueDate" class="form-control">
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