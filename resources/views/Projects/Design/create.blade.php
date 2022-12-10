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
                    <h4 class="page-title">Form Elements</h4>
                </div>                     
            </div>
        </div>                                                                 
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Design</h4>
                    <hr>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('design.store')}}">
                                        @csrf
                                        @method('POST')
                                        <input type="text" name="project" value="{{$id}}" id="" hidden>
                                        <div class="row">
                                           <div class="mb-3 col-xl-4">
                                            <label for="desiname" class="form-label">{{__('Designer')}}: </label>
                                            <select  class="form-control select2" data-toggle="select2" name="desiname" required>
                                                <option value="" >Select</option>
                                                @forelse ($employee as $em)
                                                <option value="{{$em->id}}">{{$em->name}} - {{$em->email}} - {{$em->phone}}</option>
                                                
                                                @empty
                                                <option value="" disabled>{{__('Not found!')}}</option>
                                                    
                                                @endforelse
                                            </select>
                                            </div> 
                                            <div class="mb-3 col-xl-4">
                                                <label for="bsfeet" class="form-label">Building squire feet</label>
                                                <input type="number" id="bsfeet" name="bsfeet" class="form-control">
                                            </div>
                                            <div class="mb-3 col-xl-4">
                                                <label for="tfnumber" class="form-label">Total floor number</label>
                                                <input type="number" id="tfnumber" name="tfnumber" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-xl-6">
                                                <label for="designdetails" class="form-label">design details</label>
                                                <textarea class="form-control" id="designdetails" name="designdetails" rows="5"></textarea>
                                            </div>
                                            <div class="col-3 col-xl-6">                                            
                                                    <label for="document">Document</label>
                                                    <input class="form-control" name="document" id="document" type="file">
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