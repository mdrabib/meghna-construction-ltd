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

                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form class="form" method="post" enctype="multipart/form-data" action="{{ route('floorBudget.update',$floorBudget->id)}}">
                                        @csrf
                                        @method('patch')
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="floorNo" class="form-label">Floor No.</label>
                                                <select class="form-control" name="floorNo" id="floorNo">
                                                    <option value="">Select floor no.</option>
                                                    @forelse($fbudgets as $fbudget)
                                                        <option value="{{$fbudget->id}}" {{ old('floorNo',$floorBudget->floor_details_id)==$fbudget->id?"selected":""}}> {{ $fbudget->floor_no}}</option>
                                                    @empty
                                                        <option value="">No data found</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="tworkingday" class="form-label">Total Working Day</label>
                                                <input type="text" value="{{ old('tworkingday',$floorBudget->Total_working_day)}}" id="tworkingday" name="tworkingday" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="tworker" class="form-label">Total Worker</label>
                                                <input type="text" value="{{ old('tworker',$floorBudget->Total_worker)}}" id="tworker" name="tworker" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="issueDate" class="form-label">Issues Date</label>
                                                <input type="datetime-local" value="{{ old('issueDate',$floorBudget->issues_date)}}" id="issueDate" name="issueDate" class="form-control">
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