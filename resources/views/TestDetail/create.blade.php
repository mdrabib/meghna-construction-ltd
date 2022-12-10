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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Form Elements</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Create Test Detail</h4>
                </div>                     
            </div>
        </div>   
                                                               
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Add Test Detail</h4>
                    <hr>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form class="form" enctype="multipart/form-data" method="post" action="{{ route('testDetail.store')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-md-4">
                                                <h4 class="mt-0">Project Name</h4>

                                                <select class="form-control select2" data-toggle="select2" name="projectname" id="projectname">
                                                    <option value="">Select Name</option>
                                                    @forelse($projectName as $pName)
                                                        <option value="{{$pName->id}}" {{ old('projectname')==$pName->id?"selected":""}}> {{ $pName->project_name}}</option>
                                                    @empty
                                                        <option value="">No data found</option>
                                                    @endforelse
                                                </select>
                                                
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <h4 class="mt-0">Test Name</h4>
                                                <input type="text" id="tname" name="tname" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <h4 class="mt-0">Test Status</h4>
                                                <input type="text" id="tstatus" name="tstatus" class="form-control">
                                            </div>                                            
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <h4 class="mt-0">Comments</h4>
                                                <input type="text" id="com" name="com" class="form-control">
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