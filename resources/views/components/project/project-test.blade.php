<div class="row d-none" id="project_test">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <a href="{{ route('testDetail.create')}}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i>Add Test Detail</a>
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
                                <th>Project Name</th>
                                <th>Test Name</th>
                                <th>Test Status</th>
                                <th>Comments</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($project?->testDetails as $tdetail)
                            <tr>
                                <td scope="row">{{ ++$loop->index }}</td>
                                <td>{{ $tdetail?->project?->project_name}}</td>

                                <td>{{ $tdetail->test_name}}</td>
                                <td>{{ $tdetail->test_status}}</td>
                                <td>{{ $tdetail->comments}}</td>
                                <td>
                                @if ($tdetail->status === 1)
                                <span class="badge badge-success-lighten">Active</span>
                                @else                                   
                                    <span class="badge badge-danger-lighten">Blocked</span>
                                
                                @endif
                            </td>
                                <td class="table-action">
                                    <a href="{{ route('testDetail.edit',$tdetail)}}" class="action-icon"> <i class="mdi mdi-pencil"></i> </a>                                            
                                    <a href="javascript:void()" onclick="$('#form{{$tdetail->id}}').submit()">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                    <form id="form{{$tdetail->id}}" action="{{ route('testDetail.destroy',$tdetail->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>                                      
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No Data Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>                                          
                </div> <!-- end preview-->
            </div> <!-- end tab-content-->
        </div> <!-- end card body-->
    </div> <!-- end card -->
</div><!-- end col-->