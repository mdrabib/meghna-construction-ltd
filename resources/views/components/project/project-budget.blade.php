{{--  project budget start --}}
<div class="row d-none project_budget" id="project_budget">
    <div class="col-12">
        <div class="row">
            <div class="col-auto">
                <button  class="btn btn-success btn-sm mb-2" 
                onclick="$('.add_new_budget').toggleClass('d-none');$('.budget_table').toggleClass('d-none');$('.add_bgt').toggleClass('d-none');$('.close_budget').toggleClass('d-none');$(this).toggleClass('bg-danger')">
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
                            <label class="form-label" >
                                {{__('Floor No')}}
                            </label>
                            <select name="floorno" id="" class="form-select">
                                <option value="">Select</option>
                                @forelse ($floor as $f)
                                <option value="{{$f->id}}">{{$f->floor_no}}</option>
                                
                                @empty
                                <option value="{{$f->id}}">{{__('No Data Founds!')}}</option>
                                    
                                @endforelse
                            </select>
                        </div>                           
                        <div class="mb-3 d-none" id="piler">
                            @php
                                $foundations = DB::table('foundations')->get()
                            @endphp
                            <label class="form-label d-flex" >
                                {{__('Piler No')}}
                                <span class="text-danger mx-2">*</span>
                            </label>
                            <select name="foundation" id="" class="form-select">
                                <option value="">Select</option>
                                @forelse ($foundations as $f)
                                <option value="{{$f->id}}">{{$f->piler_name}}</option>
                                
                                @empty
                                <option value="{{$f->id}}">{{__('No Data Founds!')}}</option>
                                    
                                @endforelse
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
                                        <label for=""  class="form-label">Material Name</label>
                                    <select name="unit_id" class="form-select" >
                                        <option value="">Select Item</option>
                                        @forelse ($materials as $material)
                                        <option value="{{$material->id}}" 
    
                                            data-quantity_name="{{$material->quantity_name}}"
                                            data-quantity="{{$material->quantity}}"
                                            
                                            >
                                            {{$material->name}} - {{$material->quantity}} {{$material->quantity_name}}
                                        </option>
                                            
                                        @empty
                                        <option value="">{{__('No data Founds!')}}</option> 
                                        @endforelse
                                        
                                    </select>
                                    <!-- </div> -->
                                </div>
                                <div class="col-2 p-0 mx-2">
                                    <label for=""  class="form-label">Market Price</label>
                                    <input type="text" class="form-control price" name="price" onkeyup="getPriceCount(this)" id="market_price">
                                </div>
                                <div class="col-2 p-0 mx-2">
                                    <label for=""  class="form-label">Quantity</label>
                                    {{-- <input type="numbet" onkeyup="get_quintity(this)" class="form-control price" name="quantity" id="quantity" value="1"> --}}
                                    <input data-toggle="touchspin" class="form-control quantity" data-bts-max="500" value="1" onkeyup="getQuintity(this)" name="quantity"data-btn-vertical="true" type="text" >
                                </div>
                                <div class="col-2 p-0 mx-2">
                                    <label for=""  class="form-label">Sub Total</label>
                                    {{-- <input type="numbet" onkeyup="get_quintity(this)" class="form-control price" name="quantity" id="quantity" value="1"> --}}
                                    <input data-toggle="touchspin" class="form-control sub"  value="1" onkeyup="sub_amount(this)" name="quantity" type="text" >
                                </div>
                                
                            </div>
                        </div>
                        <div class="row justify-content-center">                                
                            <div class="col-xl-4 p-0 mx-2 m-2 ">
                                <input type="text" id="total" onkeyup="totalCount(this)" class="form-control total" name="total" disabled>
                                <label for=""  class="form-label p-2 text-center">Total</label>
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
    
            {{-- {{$project->budgets}}  --}}
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
                    @forelse ($project->budgetDetails as $item)
                    @php
                        $total += $item->total_budget; 
                    @endphp
                        <tr>
                            <td>{{++$loop->index}}</td>
                            <td>{{$item->floor_details_id}}</td>
                            <td>{{$item->unit}}</td>
                            <td>{{$item->budget_quantity}}</td>
                            <td>{{$item->market_price}}</td>
                            <td>{{$item->total_budget}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td>No data Founds!</td>
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
    
    
    function handleBudgetChange(e){
    if(e.value === "piler"){
    // $('#indentity_budget').text("{{__('Piler No')}}") ;
    $('#piler').removeClass('d-none');
    $('#floor').addClass('d-none');
    }else if (e.value === "floor"){
    $('#piler').addClass('d-none');
    $('#floor').removeClass('d-none');
    
    }
    }
    
    
    
    </script>
    
    
    {{-- adjust --}}
    <script>
    function totalCount(){
    let marketPrice = parseFloat($('.price').val());
    let quantityfield = parseFloat($('.quantity').val());
    let totalField =$('.sub');
    if(!marketPrice)marketPrice=0;
    if(!quantityfield)quantityfield=0;
    
    
    var total=(marketPrice * quantityfield);
    totalField.val(total);
    }
    
    function sub_amount(){
    var sub_amount=0;
    $('.sub').each(function(){
    sub_amount+=parseFloat($(this).val());
    console.log(sub_amount);
    });
    
    // $('.sub').val(sub_amount);
    $('.total').val(sub_amount);
    totalCount();
    }
    </script>
    <script>
    
    
    function getQuintity(e){
    var price=parseFloat($(e).closest('.row').find('.price').val());
    var qty=parseFloat($(e).closest('.row').find('.quantity').val());
    var sub=price * qty; // qty*price
    $(e).closest('.row').find('.sub').val(sub);
    
    sub_amount();
    totalCount();
    }
    
    
    
    
    
    function getPriceCount(e){
    var price=parseFloat($(e).val());
    var qty=parseFloat($(e).closest('.row').find('.quantity').val());
    
    var sub=price * qty; // qty*price
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
    
