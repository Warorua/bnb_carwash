@extends('layouts.app')
@section('content')
<style>
    @media screen and (max-width:540px) {
        div#sales_part_info {
            margin-top: -179px;
        }
ler
        span.titleup {
            margin-left: -10px;
        }
    }
</style>
<!-- page content -->
<div class="right_col" role="main">
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h4 id="myLargeModalLabel" class="modal-title">{{ trans('message.Invoice') }}</h4> -->
                    <h3> {{ getNameSystem() }}</h3>
                    <a href=""><button type="button" class="btn-close"></button></a>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="page-title">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        @if (getActiveCustomer(Auth::user()->id) == 'yes' || getActiveEmployee(Auth::user()->id) == 'yes' || getBranchadminsactive(Auth::user()->id) == 'yes')
                        <a id="menu_toggle"><i class="fa fa-bars sidemenu_toggle"></i></a><span class="titleup">{{ trans('message.Part Sells') }}
                            @can('salespart_add')
                            <a href="{!! url('/sales_part/add') !!}" id="" class="addbotton">
                                <img src="{{ URL::asset('public/img/icons/plus Button.png') }}" class="mb-2">
                            </a>
                            @endcan
                        </span>
                        @else
                        <a id="menu_toggle"><i class="fa fa-bars sidemenu_toggle"></i></a><span class="titleup">{{ trans('message.Purchase') }}
                        </span>
                        @endif
                    </div>
                    @include('dashboard.profile')
                </nav>
            </div>
        </div>
        @include('success_message.message')
        <div class="row">
        @if(!empty($sales) && count($sales) > 0)
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel table_up_div">
                    <table id="supplier" class="table jambo_table ">
                        <thead>
                            <tr>
                                @can('salespart_delete')
                                <th> </th>
                                @endcan
                                <th>{{ trans('message.Bill Number') }}</th>
                                <th>{{ trans('message.Customer Name') }}</th>
                                <th>{{ trans('message.Date') }}</th>
                                <!-- <th>{{ trans('message.Part Brand') }}</th> -->
                                <th>{{ trans('message.Salesman') }}</th>
                                <th>{{ trans('message.Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($sales as $sale)
                            <tr data-user-id="{{ $sale->id }}">
                                @can('salespart_delete')
                                <td>
                                    <label class="container checkbox">
                                    <input type="checkbox" name="chk">
                                    <span class="checkmark"></span>
                                    </label>
                                </td>
                                @endcan
                                <td>{{ $sale->bill_no }}</td>
                                <td>{{ getCustomerName($sale->customer_id) }}</td>
                                <td>{{ date(getDateFormat(), strtotime($sale->date)) }}</td>
                                <td>{{ getAssignedName($sale->salesmanname) }}</td>
                                <td>
                                    <div class="dropdown_toggle">
                                        <img src="{{ URL::asset('public/img/list/dots.png') }}" 
                                            class="btn dropdown-toggle border-0" 
                                            type="button" 
                                            id="dropdownMenuButton{{ $sale->id }}" 
                                            data-bs-toggle="dropdown" 
                                            aria-expanded="false">

                                        <ul class="dropdown-menu heder-dropdown-menu action_dropdown shadow py-2" 
                                            aria-labelledby="dropdownMenuButton{{ $sale->id }}">
                                            
                                            <?php $sales_invoice = getInvoiceNumbers($sale->id); ?>
                                            <?php $user_role = getUserRoleFromUserTable(Auth::User()->id); ?>
                                            
                                            @if (in_array($user_role, ['admin', 'supportstaff', 'accountant', 'employee', 'branch_admin']))
                                                
                                                {{-- Invoice related actions --}}
                                                @if ($sales_invoice == 'No data')
                                                    @can('salespart_add')
                                                        @can('invoice_add')
                                                        <li>
                                                            <a href="{{ url('invoice/sale_part_invoice/add/' . $sale->id) }}" 
                                                            class="dropdown-item ms-2">
                                                                <img src="{{ URL::asset('public/img/list/create.png') }}" class="me-3">
                                                                {{ trans('message.Create Invoice') }}
                                                            </a>
                                                        </li>
                                                        @endcan
                                                    @else
                                                        @can('salespart_view')
                                                            <li>
                                                                <a href="{{ url('invoice/add/') }}" 
                                                                class="dropdown-item ms-2">
                                                                    <img src="{{ URL::asset('public/img/list/Vector.png') }}" class="me-3">
                                                                    {{ trans('message.View Invoices') }}
                                                                </a>
                                                            </li>
                                                        @endcan
                                                    @endcan
                                                @else
                                                    @can('salespart_view')
                                                        <li>
                                                            <button type="button" 
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#myModal" 
                                                                    saleid="{{ $sale->id }}" 
                                                                    invoice_number="{{ getInvoiceNumbers($sale->id) }}" 
                                                                    url="{{ url('/sales_part/list/modal') }}" 
                                                                    class="dropdown-item save ms-2">
                                                                <img src="{{ URL::asset('public/img/list/Vector.png') }}" class="me-3">
                                                                {{ trans('message.View Invoices') }}
                                                            </button>
                                                        </li>
                                                    @endcan
                                                @endif

                                                {{-- Edit action --}}
                                                @if ($sales_invoice == 'No data')
                                                @can('salespart_edit')
                                                    <li>
                                                        <a href="{{ url('sales_part/edit/' . $sale->id) }}" 
                                                        class="dropdown-item ms-2">
                                                            <img src="{{ URL::asset('public/img/list/Edit.png') }}" class="me-3">
                                                            {{ trans('message.Edit') }}
                                                        </a>
                                                    </li>
                                                @endcan
                                                @endif
                                                @can('salespart_delete')
                                                <div class="dropdown-divider"></div>
                                                <li c><a class="dropdown-item deletedatas ms-2" url="{!! url('/sales_part/delete/' . $sale->id) !!}" style="color:#FD726A"><img src="{{ URL::asset('public/img/list/Delete.png') }}" class="me-3">{{ trans('message.Delete') }}</a></li>
                                                @endcan

                                            @endif
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                    @can('salespart_delete')
                    <button id="select-all-btn" class="btn select_all"><input type="checkbox" name="selectAll"> {{ trans('message.Select All') }}</button>
                    <button id="delete-selected-btn" class="btn btn-danger text-white border-0" data-url="{!! url('/sales_part/delete') !!}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    @endcan
                </div>
            </div>
        @else
            <p class="d-flex justify-content-center mt-5 pt-5"><img src="{{ URL::asset('public/img/dashboard/No-Data.png') }}" width="300px"></p>
        @endif
        </div>
    </div>
</div>
<!-- /page content -->


<!-- Scripts starting -->
<script nonce="{{ $cspNonce }}" src="{{ URL::asset('vendors/jquery/dist/jquery.min.js') }}"></script>

<script nonce="{{ $cspNonce }}">
    $(document).ready(function() {

        var search = "{{ trans('message.Search...') }}";
        var info = "{{ trans('message.Showing page _PAGE_ - _PAGES_') }}";
        var zeroRecords = "{{ trans('message.No Data Found') }}";
        var infoEmpty = "{{ trans('message.No records available') }}";

        /*language change in user selected*/
        $('#supplier').DataTable({
            columnDefs: [{
                width: 2,
                targets: 0
            }],
            fixedColumns: true,
            paging: true,
            scrollCollapse: true,
            scrollX: true,
            // scrollY: 300,

            responsive: true,
            "language": {
                lengthMenu: "_MENU_ ",
                info: info,
                zeroRecords: zeroRecords,
                infoEmpty: infoEmpty,
                infoFiltered: '(filtered from _MAX_ total records)',
                searchPlaceholder: search,
                search: '',
                paginate: {
                    previous: "<",
                    next: ">",
                }
            },
            aoColumnDefs: [{
                bSortable: false,
                aTargets: [-1]
            }],
            order: [
                [2, 'asc']
            ]
        });

        $(document).on('click', '#select-all-btn', function () {
            let $checkbox = $(this).find('input[type="checkbox"]');
            let isChecked = !$checkbox.prop('checked'); // toggle the value
            $checkbox.prop('checked', isChecked); // update checkbox
            $('input[name="chk"]').prop('checked', isChecked); // select/deselect all rows
        });
        
        $(document).on('change', 'input[name="chk"]', function () {
        console.log($('input[name="chk"]:checked').length);
        let total = $('input[name="chk"]').length;
        let checked = $('input[name="chk"]:checked').length;
        
        // if all checkboxes are checked manually, check the main checkbox
        $('input[name="selectAll"]').prop('checked', total === checked);
        });
        // When the user directly clicks the checkbox (optional, same logic to keep consistent)
        $(document).on('click', '#select-all-btn input[type="checkbox"]', function (e) {
            e.stopPropagation(); // prevent triggering the button click again
            $('input[name="chk"]').prop('checked', $(this).prop('checked'));
        });
        $('body').on('click', '.deletedatas', function() {
            var url = $(this).attr('url');

            var msg1 = "{{ trans('message.Are You Sure?') }}";
            var msg2 = "{{ trans('message.You will not be able to recover this data afterwards!') }}";
            var msg3 = "{{ trans('message.Cancel') }}";
            var msg4 = "{{ trans('message.Yes, delete!') }}";
            swal({
                title: msg1,
                text: msg2,
                icon: 'warning',
                cancelButtonColor: '#C1C1C1',
                buttons: [msg3, msg4],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = url;
                }
            });

        });


        $('body').on('click', '.save', function() {

            $('.modal-body').html("");
            var saleid = $(this).attr("saleid");
            var invoice_number = $(this).attr("invoice_number");
            var url = $(this).attr('url');

            var currentPageAction = getParameterByName('page_action');
            // Construct the URL for AJAX request with page_action parameter
            if (currentPageAction) {
                url += '?page_action=' + currentPageAction;
            }
            var msg14 = "{{ trans('message.An error occurred :') }}";

            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    saleid: saleid,
                    invoice_number: invoice_number
                },
                dataType:'json',
                success: function(data) {
                    $('.modal-body').html(data.html);
                },
                beforeSend: function() {
                    $(".modal-body").html(
                        "<center><h2 class=text-muted><b>Loading...</b></h2></center>");
                },
                error: function(e) {
                    alert(msg14 + " " + e.responseText);
                    console.log(e);
                }
            });
        });
    });
    // For get getParameterByName
    function getParameterByName(name, url = window.location.href) {
      name = name.replace(/[\[\]]/g, '\\$&');
      var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
      results = regex.exec(url);
      if (!results) return null;
      if (!results[2]) return '';
      return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }
</script>
@endsection