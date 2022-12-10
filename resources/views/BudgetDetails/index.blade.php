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
                    <li class="breadcrumb-item active">Floor Budget Details</li>
                </ol>
            </div>
            <h4 class="page-title">Floor Budget Details</h4>
        </div>
    </div>
</div>      
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="{{route('floorBudgetDetail.create')}}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Floor Budget</a>
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
                                        <th>Building Name</th>
                                        <th>Floor</th>
                                        <th>Material Name</th>
                                        <th>Quantity</th>
                                        <th>Market Price</th>
                                        <th>Total</th>
                                        {{-- <th>Issues Date</th> --}}
                                        <th>Satus</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($BudgetDetails as $fBudgetDetails)
                                    <tr>
                                        <td scope="row">{{ ++$loop->index }}</td>
                                        {{-- material_id  budget_quantity 	market_price 	total_budget 	issues_date  (material_name)--}}
                                        <td>{{ $fBudgetDetails->projectname?->project_name}}</td>
                                        <td>{{ $fBudgetDetails->floorno?->floor_no}}</td>
                                        <td>{{ $fBudgetDetails->unit?->name}}</td>
                                        <td>{{ $fBudgetDetails->budget_quantity}}</td>
                                        <td>{{ $fBudgetDetails->market_price}}</td>
                                        <td>{{ $fBudgetDetails->budget_quantity * $fBudgetDetails->market_price}}</td>
                                        {{-- <td>{{ $fBudgetDetails->issues_date}}</td> --}}
                                        <td>
                                            @if ($fBudgetDetails->status === 1)
                                            <span class="badge badge-success-lighten">Active</span>
                                            @else                                   
                                                <span class="badge badge-danger-lighten">Blocked</span>
                                            @endif
                                        </td>
                                        <td class="table-action">
                                            <a href="{{ route('floorBudgetDetail.edit',$fBudgetDetails->id)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i><a>
                                                
                                            <a href="javascript:void()" onclick="$('#form{{$fBudgetDetails->id}}').submit()">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                            <form id="form{{$fBudgetDetails->id}}" action="{{ route('floorBudgetDetail.destroy',$fBudgetDetails->id)}}" method="post">
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