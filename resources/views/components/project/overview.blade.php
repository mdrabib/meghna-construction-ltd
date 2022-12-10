<div class="row" id="overview">
    <div class="row col-xl-12">
        <div class="col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="">
                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Start Date</h5>
                            <h3 class="my-2 py-1 d-flex">
                                {{$project->start_date}}
                                <p class="mt-2 p-1 text-muted small">
                                    (Mitter)
                                </p>
                            </h3>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
        <div class="col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="">
                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">End Date</h5>
                            <h3 class="my-2 py-1 d-flex">
                                {{$project->end_date}}
                            </h3>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
        <div class="col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="">
                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="Due Date">Due Date</h5>
                            <h3 class="my-2 py-1 d-flex text-warning">
                                {{ now()->diffInDays($project->end_date) }} Days Left

                            </h3>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <div class="row col-xl-12">
        <div class="col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="">
                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Land Area</h5>
                            <h3 class="my-2 py-1 d-flex">
                                 {{$project->land[0]?->land_area}}
                                <p class="mt-2 p-1 text-muted small">
                                    {{-- ({{$project->land->plot_area_counter}}) --}}
                                </p> 
                            </h3>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
        <div class="col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="text-muted fw-normal mt-0 text-truncate">
                            <h5 class="mt-0" title="Campaign Sent">Building Area</h5>
                            <h3 class="my-2 py-1 d-flex">
                                 {{$project->land[0]?->building_area}}
                                <p class="mt-2 p-1 text-muted small">
                                    ({{$project->land[0]?->Building_area_counter}})
                                </p> 
                            </h3>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
        <div class="col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="">
                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Total Height</h5>
                            <h3 class="my-2 py-1 d-flex">
                                 {{$project->land[0]?->building_height}}
                                <p class="mt-2 p-1 text-muted small">
                                    ({{$project->land[0]?->Building_height_counter}})
                                </p> 
                            </h3>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <div class="row col-xl-12">
        <div class="col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="">
                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Estimate Budget</h5>
                            <h3 class="my-2 py-1 d-flex">
                                 {{$project->budget}}
                                <p class="mt-2 p-1 text-muted small">
                                    ({{__('BDT')}})
                                </p> 
                            </h3>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
        <div class="col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="">
                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Cost</h5>
                            <h3 class="my-2 py-1 d-flex">
                                9,184
                                <p class="mt-2 p-1 text-muted small">
                                    (Mitter)
                                </p>
                            </h3>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
        <div class="col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="">
                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Ownership</h5>
                            <h3 class="my-2 py-1 d-flex">
                                {{$project->ownerShip * 100}} (%)
                                <p class="mt-2 p-1 text-muted small">
                                    (Mitter)
                                </p>
                            </h3>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>

</div>