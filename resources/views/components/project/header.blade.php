<div class="row mb-2">
    <div class="col-sm-4">
        <div class="btn-group mb-3 ms-2 d-none d-sm-inline-block">
            <button type="button" class="btn btn-secondary"><i class="dripicons-view-apps"></i></button>
        </div>
        <div class="btn-group mb-3 d-none d-sm-inline-block">
            <a href="{{route('admin.project.overview',$project)}}" type="button" class="btn btn-link text-muted"><i class="dripicons-checklist"></i></a>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="text-sm-end">
            <div class="btn-group mb-3">
                <button type="button" class="btn btn-primary">Overview</button>
            </div>
            <div class="btn-group mb-3 ms-1">
                <a href="{{route('construct.index',$project)}}" class="btn btn-light">Construction</a>
                <button type="button" class="btn btn-light">Managment</button>
            </div>
        </div>
    </div><!-- end col-->
</div>