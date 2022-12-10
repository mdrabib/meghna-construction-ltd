<div class="row d-none" id="project_design">

    <div class="card">
        <div class="card-body">
            <span class="d-flex justify-content-between">
                <h4 class="mt-0 mb-3">Building Design</h4>
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="dripicons-dots-3"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        @if($project->design->count() > 0)

                        <a href="{{ route('design.edit',encrypt($project->design->first()->id))}}" class="dropdown-item">
                            <i class="mdi mdi-pencil me-1"></i>Edit
                        </a>
                        <!-- item-->
                        <a href="{{ route('design.destroy',encrypt($project->design->first()->id))}}" class="dropdown-item">
                            <i class="mdi mdi-delete me-1"></i>Delete
                        </a>
                        <!-- item-->
                        @else
                        <a href="{{ route('design.create',encrypt($project->id))}}" class="dropdown-item">
                            <i class="uil-file-plus-alt  me-1"></i>
                            Add New Design
                        </a>
                        @endif
                        <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-email-outline me-1"></i>Invite</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                    </div>
                </div>
            </span>

            <div class="border border-1 ">
                @if($project->design->count() > 0)
                <img src="{{asset('uploads/design/'.$project->design->first()->document)}}" alt="image" width="100%" class="">
                @else
                <p clas="text-muted text-center">
                    No Design Found!
                </p>
                <img src="{{asset('assets/images/construction.svg')}}" alt="image" width="100%" class="opacity-25">
                @endif

            </div>
        </div> <!-- end card-body-->
    </div>

</div>