<div class="row d-none" id="project-management">    
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <a href="{{ route('management.create',['id'=> encrypt($project->id)])}}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i>Add Management</a>
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
                                <th>Project Name</th>
                                <th>Project Director</th>
                                <th>Architecht</th>
                                <th>Chivil Engneer Name</th>
                                <th>Team</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- {{$project->management[0]->id }} --}}
                            @forelse ($project->management as $management)
                            {{-- project_director	architecture    civil_engineer	project_id 	team_id company_id --}}
                                <tr>
                                    {{$management}}
                                    <td>{{ ++$loop->index}}</td>
                                    <td>{{ $project?->project_name}}</td>
                                    <td>{{ $management->director?->name}}</td>
                                    <td>{{ $management->architecht?->name}}</td>
                                    <td>{{ $management->civilengineer?->name}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Data not found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>                                          
                </div> <!-- end preview-->
            </div> <!-- end tab-content-->
        </div> <!-- end card body-->
    </div> <!-- end card -->
</div>