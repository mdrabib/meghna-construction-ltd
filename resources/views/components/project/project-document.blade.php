{{-- project documents start --}}
<div class="row d-none" id="project-document">
    <div class="col-12">
        <div class="row">
            <div class="col-auto">
                <a href="{{ route('document.create',['id'=> encrypt($project->id)])}}" class="btn btn-danger mb-2">
                    Add Document
                </a>
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
        <div class="table-responsive">
                            <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                                <tr>
                                    <th>#SL</th>
                                    <th>Name</th>
                                    <th>Document</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse ($project->document as $docu)
                                    <tr>
                                        <td scope="row">{{ ++$loop->index }}</td>
                                        <td>{{ $docu->docu_name}}</td>
                                        <td>
                                            @foreach(json_decode($docu->doc_attachment) as $img)
                                                <img width="50px" src="{{ asset('uploads/document/'.$img)}}" alt="">
                                            @endforeach
                                            
                                        </td>
                                        <td>{{ $docu->description}}</td>
                                        <td>
                                            @if ($docu->status === 1)
                                            <span class="badge badge-success-lighten">Active</span>
                                            @else
                                            <span class="badge badge-danger-lighten">Blocked</span>

                                            @endif
                                        </td>
                                        <td class="table-action">
                                            <a href="{{ route('document.edit',$docu->id)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i> </a>
                                            <a href="javascript:void()" onclick="$('#form{{$docu->id}}').submit()">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                            <form id="form{{$docu->id}}" action="{{ route('document.destroy',$docu->id)}}" method="post">
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
    </div>

    @push('scripts')
    <script src="{{asset('assets/js/jquery.repeater.min.js')}}"></script>

    <script>
        // varibles


        function handleBudgetChange(e) {
            if (e.value === "piler") {
                // $('#indentity_budget').text("{{__('Piler No')}}") ;
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



    {{-- ******project document******  --}}