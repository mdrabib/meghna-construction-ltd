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
                    <li class="breadcrumb-item active">Material Details</li>
                </ol>
            </div>
            <h4 class="page-title">Material Details</h4>
        </div>
    </div>
</div>      
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="{{route('materialDetails.create')}}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Materials</a>
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
                                        <th>#SL</th>
                                        <th>Brand Name</th>
                                        <th>Material Name</th>
                                        <th>Quantity</th>
                                        <th>Cost per item</th>
                                        <th>Total Cost</th>
                                        <th>Voucher</th>
                                        <th>Satus</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($materialDetail as $mDetail)
                                    <tr>
                                        {{-- flat_id --}}
                                        <td scope="row">{{ ++$loop->index }}</td>
                                        <td>{{ $mDetail->brand_name}}</td>
                                        <td>{{ $mDetail->material?->material_name}}</td>
                                        <td>{{ $mDetail->quantity}}</td>
                                        <td>{{ $mDetail->cost_per_items}}</td>
                                        <td>{{ $mDetail->quantity * $mDetail->cost_per_items}}</td>

                                        <td>
                                            <img width="50px" src="{{ asset('uploads/materialVoucher/'.$mDetail->voucher_image)}}" alt="">
                                        </td>

                                        <td>
                                            @if ($mDetail->status === 1)
                                            <span class="badge badge-success-lighten">Active</span>
                                            @else                                   
                                                <span class="badge badge-danger-lighten">Blocked</span>
                                            
                                            @endif
                                        </td>
                                        <td class="table-action">
                                            <a href="{{ route('materialDetails.edit',$mDetail->id)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i><a>
                                            <a href="javascript:void()" onclick="$('#form{{$mDetail->id}}').submit()">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                            <form id="form{{$mDetail->id}}" action="{{ route('materialDetails.destroy',$mDetail->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>                                      
                                    @empty
                                        <tr>
                                            <td colspan="11" class="text-center">No Data Found <td>
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