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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                            <li class="breadcrumb-item active">Gantt</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Projects</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- mini header -->
        <!-- Path: view/components/project/header -->
        <x-project.header :project="$project" />
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <!-- mini side bar -->
                    <!-- Path: view/components/project/sidebar -->
                    <!-- start projects-->
                    <x-project.sidebar :project="$project" />
                    <!-- end projects -->
                    <!-- gantt view -->
                    <div class="col-xxl-9 mt-4 mt-xl-0 col-lg-8">
                        <div class="ps-xl-3">

                            @if(Session::has('response'))
                            {!!Session::get('response')['message']!!}
                            @endif
                            <!-- Path: view/components/project/ -->
                            <x-project.overview :project="$project" />
                            <x-project.project-info :project="$project" />
                            <x-project.project-test :project="$project" />
                            <x-project.project-design :project="$project" />
                            <x-project.project-management :project="$project" />
                            <x-project.project-document :project="$project" />
                            {{-- <x-project.project-budget :project="$project" /> --}}

                            <!-- Test Budget start-->

                            {{-- project budget start******  --}}
                            <div class="row project_budget" id="project_budget">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-auto">
                                            <button class="btn btn-success btn-sm mb-2" onclick="$('.add_new_budget').toggleClass('d-none');$('.budget_table').toggleClass('d-none');$('.add_bgt').toggleClass('d-none');$('.close_budget').toggleClass('d-none');$(this).toggleClass('bg-danger')">
                                                <span class="add_bgt">
                                                    Add New Budget
                                                </span>
                                                <span class="d-none close_budget">Close</span>
                                            </button>
                                        </div>
                                        <div class="col text-sm-end">
                                            <div class="btn-group btn-group-sm mb-2" data-bs-toggle="buttons" id="modes-filter">
                                                <label class="btn btn-primary d-none d-sm-inline-block">
                                                    <input class="btn-check" type="radio" name="modes" id="qday" value="Quarter Day"> Quarter Day
                                                </label>
                                                <label class="btn btn-primary">
                                                    <input class="btn-check" type="radio" name="modes" id="hday" value="Half Day"> Half Day
                                                </label>
                                                <label class="btn btn-primary">
                                                    <input class="btn-check" type="radio" name="modes" id="day" value="Day"> Day
                                                </label>
                                                <label class="btn btn-primary active">
                                                    <input class="btn-check" type="radio" name="modes" id="week" value="Week" checked> Week
                                                </label>
                                                <label class="btn btn-primary">
                                                    <input class="btn-check" type="radio" name="modes" id="month" value="Month"> Month
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card d-none add_new_budget">
                                        <h5 class="mb-3 text-uppercase bg-light p-2 mt-4"><i class="mdi mdi-office-building me-1"></i> {{__('Project Budget')}} :</h5>
                                        <div class="form-group">
                                            <div class="card-body">
                                                <form action="{{route('budget.store')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('post')
                                                    <input type="number" value="{{$project?->id}}" name="project" hidden>
                                                    <div class="row">
                                                        <div class="col-xl-4 mb-3">
                                                            <label for="projectname" class="form-label">{{__('Budget For')}}</label>
                                                            <select name="budgetfor" id="" class="form-select" onchange="handleBudgetChange(this)">
                                                                <option value="">Select Budget Options</option>
                                                                <option value="floor">Floor</option>
                                                                <option value="piler">Pilar</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-0 col-xl-4 col-6">
                                                            <div class="mb-3" id="floor">
                                                                @php
                                                                $floor = DB::table('floor_details')->get()
                                                                @endphp
                                                                <label class="form-label">
                                                                    {{__('Floor No')}}
                                                                </label>
                                                                <select name="floorno" id="" class="form-select">
                                                                    <option value="">Select</option>
                                                                    @if($floor->count() > 0)
                                                                    @forelse ($floor as $flr)
                                                                    <option value="{{$flr->id}}">{{$flr->floor_no}}</option>

                                                                    @empty
                                                                    <option value="{{$flr->id}}">{{__('No Data Founds!')}}</option>

                                                                    @endforelse
                                                                    @endif
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 d-none" id="piler">
                                                                @php
                                                                
                                                                $foundations = DB::table('foundations')->get()
                                                                @endphp
                                                                <label class="form-label d-flex">
                                                                    {{__('Piler No')}}
                                                                    <span class="text-danger mx-2">*</span>
                                                                </label>
                                                                <select name="foundation" id="" class="form-select">
                                                                    <option value="">Select</option>
                                                                    @if($foundations->count() > 0)
                                                                    @forelse ($foundations as $fnd)
                                                                    <option value="{{$f->id}}">{{$fnd->piler_name}}</option>

                                                                    @empty
                                                                    <option value="{{$f->id}}">{{__('No Data Founds!')}}</option>

                                                                    @endforelse
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mb-0 col-xl-4 col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">
                                                                    {{__('Total Working Day')}}
                                                                </label>
                                                                <input data-toggle="touchspin" data-bts-max="500" name="working_day" data-btn-vertical="true" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="mb-0 col-xl-4 col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">
                                                                    {{__('Total Worker')}}
                                                                </label>
                                                                <input data-toggle="touchspin" data-bts-max="500" name="worker" data-btn-vertical="true" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="mb-0 col-xl-4 col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">
                                                                    {{__('Issues Date')}}
                                                                </label>
                                                                <input class="form-select" type="date" name="issus_date">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- <div class="row bg-light p-2 rounded-top">
                                                            <div class="col-2"></div>
                                                            <div class="col-3">
                                                                <label for="">Material Name</label>
                                                            </div>
                                                            <div class="col-2"><label for="">Market Price</label></div>
                                                            <div class="col-2"><label for="">Quantity</label></div>
                                                            <div class="col-3"><label for="">Total</label></div>
                                                        </div> --}}
                                                    <!-- outer repeater -->
                                                    @php
                                                    $materials = DB::table('units')->get();
                                                    @endphp
                                                    <hr>
                                                    <div class="repeater bg-light p-2 justify-content-center text-center">
                                                        <div data-repeater-list="outer_list">
                                                            <div data-repeater-item class="row mt-2 offset-2">

                                                                <div class="col-1 mx-2">
                                                                    <button class="btn bg-danger text-white btn-sm mt-4" data-repeater-delete type="button">
                                                                        <i class="mdi mdi-minus-circle"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="col-3 mr-2">
                                                                    <!-- <div class="p-0"> -->
                                                                    <label for="" class="form-label">Material Name</label>
                                                                    <select name="unit_id" class="form-select">
                                                                        <option value="">Select Item</option>
                                                                        @forelse ($materials as $material)
                                                                        <option value="{{$material->id}}" data-quantity_name="{{$material->quantity_name}}" data-quantity="{{$material->quantity}}">
                                                                            {{$material->name}} - {{$material->quantity}} {{$material->quantity_name}}
                                                                        </option>

                                                                        @empty
                                                                        <option value="">{{__('No data Founds!')}}</option>
                                                                        @endforelse

                                                                    </select>
                                                                    <!-- </div> -->
                                                                </div>
                                                                <div class="col-2 p-0 mx-2">
                                                                    <label for="" class="form-label">Market Price</label>
                                                                    <input type="text" class="form-control price" name="price" onkeyup="getPriceCount(this)" id="market_price">
                                                                </div>
                                                                <div class="col-2 p-0 mx-2">
                                                                    <label for="" class="form-label">Quantity</label>
                                                                    {{-- <input type="numbet" onkeyup="get_quintity(this)" class="form-control price" name="quantity" id="quantity" value="1"> --}}
                                                                    <input data-toggle="touchspin" class="form-control quantity" data-bts-max="500" value="1" onkeyup="getQuintity(this)" name="quantity" data-btn-vertical="true" type="text">
                                                                </div>
                                                                <div class="col-2 p-0 mx-2">
                                                                    <label for="" class="form-label">Sub Total</label>
                                                                    {{-- <input type="numbet" onkeyup="get_quintity(this)" class="form-control price" name="quantity" id="quantity" value="1"> --}}
                                                                    <input data-toggle="touchspin" class="form-control sub" value="1" onkeyup="sub_amount(this)" name="quantity" type="text">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-center">
                                                            <div class="col-xl-4 p-0 mx-2 m-2 ">
                                                                <input type="text" id="total" onkeyup="totalCount(this)" class="form-control total" name="total" disabled>
                                                                <label for="" class="form-label p-2 text-center">Total</label>
                                                            </div>
                                                            <div class="col-2">
                                                                <button class="btn bg-primary m-2 text-white btn-sm" data-repeater-create type="button">
                                                                    <i class="mdi mdi-plus-circle"></i> New
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </div>
                                            </div>


                                            <!-- end row -->
                                            <!-- Plot Documents -->
                                            <div class="col-10 offset-1 d-flex justify-content-end">

                                                <button type="reset" class="btn btn-warning mt-2 mx-1"><i class="mdi mdi-content-save"></i> Reset</button>
                                                <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save mx-1"></i> Save</button>
                                            </div>
                                            </form>

                                        </div> <!-- end card-body -->
                                    </div> <!-- end card-->

                                    <div class="card budget_table">
                                        <div class="card-body">
                                            @php
                                            $total = null

                                            @endphp
                                            <div class="card-body">
                                                <table class="table table-responsive">
                                                    <thead>
                                                        <th>SL</th>
                                                        <th>Identity</th>
                                                        <th>Material</th>
                                                        <th>Total unit</th>
                                                        <th>per Item Cost</th>
                                                        <th>Sub Total</th>
                                                        <th>Isuess Date</th>
                                                        <th>Actions</th>
                                                    </thead>
                                                    <tbody>

                                                        @forelse($project->budgetDetails as $item)
                                                        @php
                                                        $total += $item->total_budget;
                                                        @endphp
                                                        <tr>
                                                            <td>{{++$loop->index}}</td>
                                                            <td>{{$item->floor_details_id}}</td>
                                                            <td></td>
                                                            <td>{{$item->budget_quantity}}</td>
                                                            <td>{{$item->market_price}}</td>
                                                            <td>{{$item->total_budget}}</td>
                                                            <td>{{$item->created_at}}</td>
                                                            <td>

                                                            </td>
                                                        </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="8" class="text-center">No data Founds!</td>
                                                            </tr>
                                                        @endforelse

                                                        @if($project->budgets->count() > 0)
                                                            <tr>
                                                                <td colspan="7" class="text-end">Total :</td>
                                                                <td>{{$total}}</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @push('scripts')
                                <script src="{{asset('assets/js/jquery.repeater.min.js')}}"></script>

                                <script>
                                    // varibles


                                    function handleBudgetChange(e) {
                                        if (e.value === "piler") {
                                            // // $('#indentity_budget').text("{{__('Piler No')}}") ;
                                            $('#piler').removeClass('d-none');
                                            $('#floor').addClass('d-none');
                                        } else if (e.value === "floor") {
                                            $('#piler').addClass('d-none');
                                            $('#floor').removeClass('d-none');

                                        }
                                    }
                                </script>


                                {{-- adjust --}}
                                <script>
                                    function totalCount() {
                                        let marketPrice = parseFloat($('.price').val());
                                        let quantityfield = parseFloat($('.quantity').val());
                                        let totalField = $('.sub');
                                        if (!marketPrice) marketPrice = 0;
                                        if (!quantityfield) quantityfield = 0;


                                        var total = (marketPrice * quantityfield);
                                        totalField.val(total);
                                    }

                                    function sub_amount() {
                                        var sub_amount = 0;
                                        $('.sub').each(function() {
                                            sub_amount += parseFloat($(this).val());
                                            console.log(sub_amount);
                                        });

                                        // $('.sub').val(sub_amount);
                                        $('.total').val(sub_amount);
                                        totalCount();
                                    }
                                </script>
                                <script>
                                    function getQuintity(e) {
                                        var price = parseFloat($(e).closest('.row').find('.price').val());
                                        var qty = parseFloat($(e).closest('.row').find('.quantity').val());
                                        var sub = price * qty; // qty*price
                                        $(e).closest('.row').find('.sub').val(sub);

                                        sub_amount();
                                        totalCount();
                                    }





                                    function getPriceCount(e) {
                                        var price = parseFloat($(e).val());
                                        var qty = parseFloat($(e).closest('.row').find('.quantity').val());

                                        var sub = price * qty; // qty*price
                                        $(e).closest('.row').find('.sub').val(sub);
                                        sub_amount();
                                        totalCount();
                                    }
                                </script>


                                <script>
                                    $('.repeater').repeater({
                                        // (Required if there is a nested repeater)
                                        // Specify the configuration of the nested repeaters.
                                        // Nested configuration follows the same format as the base configuration,
                                        // supporting options "defaultValues", "show", "hide", etc.
                                        // Nested repeaters additionally require a "selector" field.
                                        repeaters: [{
                                            // (Required)
                                            // Specify the jQuery selector for this nested repeater
                                            selector: '.inner-repeater'
                                        }]
                                    });
                                </script>

                                @endpush



                                {{-- ******project budget end******  --}}

                                <!-- Test Budget end-->

                            </div>
                        </div>
                        <!-- end gantt view -->
                    </div>
                </div>
            </div>

        </div> <!-- End Content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Hyper - Coderthemes.com
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-md-block">
                            <a href="javascript: void(0);">About</a>
                            <a href="javascript: void(0);">Support</a>
                            <a href="javascript: void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div> <!-- content-page -->

    @endsection


    @push('scripts')
    <script src="{{asset('assets/js/vendor/apexcharts.min.js')}}"></script>

    <script src="{{asset('assets/js/pages/demo.dashboard-crm.js')}}"></script>
    <script>
        // content button
        let overbtn = $('#overbtn');
        let projectInfoBtn = $('#project_info_btn');
        let projectTestBtn = $('#project_test_btn');
        let projectDesignBtn = $('#project_design_btn');
        let projectBudgetBtn = $('#project_budget_btn');
        let projectManagementBtn = $('#project-management-btn');
        let projectDocumentsBtn = $('#project_document_btn');

        // content 
        let overview = $('#overview');
        let projectInfo = $('#project-info');
        let projectTest = $('#project_test');
        let projectDesign = $('#project_design');
        let projectBudget = $('.project_budget');
        let projectManagement = $('#project-management');
        let projectDocument = $('#project-document');



        // button action function
        // overview
        overbtn.click(function(e) {
            overview.removeClass('d-none');
            overbtn.addClass('bg-light');
            projectDocument.removeClass('d-none');
            projectDocumentsBtn.addClass('bg-light')

            projectInfo.addClass('d-none');
            projectInfoBtn.removeClass('bg-light');
            projectTest.addClass('d-none');
            projectTestBtn.removeClass('bg-light');
            projectBudget.addClass('d-none');
            projectBudgetBtn.removeClass('bg-light');
            projectManagement.addClass('d-none');
            projectDocument.addClass('d-none');
            projectDocumentsBtn.removeClass('bg-light')

        });
        // project info
        projectInfoBtn.click(function(e) {
            projectInfo.removeClass('d-none');
            projectInfoBtn.addClass('bg-light');
            projectDocument.removeClass('d-none');
            projectDocumentsBtn.addClass('bg-light')

            overview.addClass('d-none');
            overbtn.removeClass('bg-light');
            projectTest.addClass('d-none');
            projectTestBtn.removeClass('bg-light');
            projectBudget.addClass('d-none');
            projectBudgetBtn.removeClass('bg-light');            
            projectManagement.addClass('d-none');
            projectDocument.addClass('d-none');
            projectDocumentsBtn.removeClass('bg-light')
        });

        // project test
        projectTestBtn.click(function(e) {
            projectTest.removeClass('d-none');
            projectTestBtn.addClass('bg-light');
            projectDocument.removeClass('d-none');
            projectDocumentsBtn.addClass('bg-light')

            overview.addClass('d-none');
            overbtn.removeClass('bg-light');
            projectInfo.addClass('d-none');
            projectInfoBtn.removeClass('bg-light');
            projectDesign.addClass('d-none');
            projectDesignBtn.removeClass('bg-light');
            projectBudget.addClass('d-none');
            projectBudgetBtn.removeClass('bg-light');
            projectManagement.addClass('d-none');
            projectDocument.addClass('d-none');
            projectDocumentsBtn.removeClass('bg-light')
        });

        projectDesignBtn.click(function(e) {
            projectDesign.removeClass('d-none');
            projectDesignBtn.addClass('bg-light');
            projectDocument.removeClass('d-none');
            projectDocumentsBtn.addClass('bg-light')

            overview.addClass('d-none');
            overbtn.removeClass('bg-light');
            projectInfo.addClass('d-none');
            projectInfoBtn.removeClass('bg-light');
            projectTest.addClass('d-none');
            projectTestBtn.removeClass('bg-light');
            projectBudget.addClass('d-none');
            projectBudgetBtn.removeClass('bg-light');
            projectDocument.addClass('d-none');
            projectDocumentsBtn.removeClass('bg-light')            
            projectManagement.addClass('d-none');
        });

        // project budget
        projectBudgetBtn.click(function(e) {
            projectBudget.removeClass('d-none');
            projectBudgetBtn.addClass('bg-light');
            
            projectDocument.removeClass('d-none');
            projectDocumentsBtn.addClass('bg-light')

            projectDesign.addClass('d-none');
            projectDesignBtn.removeClass('bg-light');

            overview.addClass('d-none');
            overbtn.removeClass('bg-light');
            projectInfo.addClass('d-none');
            projectInfoBtn.removeClass('bg-light');
            projectTest.addClass('d-none');
            projectTestBtn.removeClass('bg-light');
            projectManagement.addClass('d-none');
            projectDocument.addClass('d-none');
            projectDocumentsBtn.removeClass('bg-light')

        });

        projectManagementBtn.click(()=>{
            projectManagement.removeClass('d-none');

            projectDocument.addClass('d-none');
            projectDocumentsBtn.removeClass('bg-light')

            projectDesign.addClass('d-none');
            projectDesignBtn.removeClass('bg-light');
            
            overview.addClass('d-none');
            overbtn.removeClass('bg-light');
            projectInfo.addClass('d-none');
            projectInfoBtn.removeClass('bg-light');
            projectTest.addClass('d-none');
            projectTestBtn.removeClass('bg-light');
            projectBudget.addClass('d-none');
            projectBudgetBtn.removeClass('bg-light');
            projectDocument.addClass('d-none');
            projectDocumentsBtn.removeClass('bg-light')
        })

        projectDocumentsBtn.click(()=>{
            projectDocument.removeClass('d-none');
            projectDocumentsBtn.addClass('bg-light')
            projectManagement.addClass('d-none');

            projectDesign.addClass('d-none');
            projectDesignBtn.removeClass('bg-light'); 

            overview.addClass('d-none');
            overbtn.removeClass('bg-light');

            projectInfo.addClass('d-none');
            projectInfoBtn.removeClass('bg-light');

            projectTest.addClass('d-none');
            projectTestBtn.removeClass('bg-light');

            projectBudget.addClass('d-none');
            projectBudgetBtn.removeClass('bg-light');
        })

        
        // data-leftbar-compact-mode="condensed"
    </script>



    @endpush