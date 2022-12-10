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
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="{{ route('designation.create')}}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i>Add Designations</a>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog"></i></button>
                                <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                <button type="button" class="btn btn-light mb-2">Export</button>
                            </div>
                        </div><!-- end col-->
                    </div>
    
                    <div class="table-responsive">
                        <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                                    <thead>
                                        <tr>
                                            <th>SL No</th>
                                            <th>Designation Name</th>
                                            <th>Identify</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($designation as $desig)
                                        <tr>
                                            <td scope="row">{{ ++$loop->index }}</td>
                                            <td>{{ $desig->designation}}</td>
                                            <td>{{ $desig->identify}}</td>
                                            <td>
                                            @if ($desig->status === 1)
                                            <span class="badge badge-success-lighten">Active</span>
                                            @else                                   
                                                <span class="badge badge-danger-lighten">Blocked</span>
                                            
                                            @endif
                                        </td>
                                            <td class="table-action">
                                                <a href="{{ route('designation.edit',$desig)}}" class="action-icon"> <i class="mdi mdi-pencil"></i> </a>                                            
                                                <a href="javascript:void()" onclick="$('#form{{$desig->id}}').submit()">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                                <form id="form{{$desig->id}}" action="{{ route('designation.destroy',$desig->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                        </tr>                                      
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">No Data Found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>                                          
                            </div> <!-- end preview-->
                        </div> <!-- end tab-content-->
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div>
@endsection