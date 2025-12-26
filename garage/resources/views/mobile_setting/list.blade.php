@extends('layouts.app')
@section('content')
<style>.table-responsive::-webkit-scrollbar {
    height: 8px; /* Height of the horizontal scrollbar */
}

.table-responsive::-webkit-scrollbar-track {
    background:rgb(196, 194, 193); /* Background of the scrollbar track */
}

.table-responsive::-webkit-scrollbar-thumb {
    background:rgb(214, 214, 213); /* Scrollbar thumb color */
    border-radius: 4px; /* Rounded edges for thumb */
}

.table-responsive::-webkit-scrollbar-thumb:hover {
    background: grey; /* Change color on hover for better visibility */
}
.control-label{
    text-wrap: nowrap;
}
.note-message{
    font-size: 16px;
    font-weight: bold;
    line-height: 30px;
}
.note-message i{
    color:green;
    font-size: 20px;
    padding:10px;
}
</style>
<!-- page content -->
<div class="right_col" role="main">

    <div class="page-title">
      <div class="nav_menu">
        <nav>
          <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars sidemenu_toggle"></i></a><a href="{!! url('setting/general_setting/list') !!}" id=""><i class=""><img src="{{ URL::asset('public/supplier/Back Arrow.png') }}" class="back-arrow"></i><span class="titleup">
                {{ trans('message.Mobile Settings') }}</span></a>
          </div>
          @include('dashboard.profile')
        </nav>
      </div>
    </div>
    <!-- @include('success_message.message') -->
      <!-- Error Message Display Code -->
    @if (session('message'))
    <div class="row massage">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="checkbox checkbox-success checkbox-circle mb-2 alert alert-success alert-dismissible fade show">
                @if (session('message') == '1')
                <label for="checkbox-10 colo_success" style="margin-left: 20px;font-weight: 600;"> {{ trans('message.Please enter correct purchase key') }}</label>
                @elseif(session('message') == '2')
                <label for="checkbox-10 colo_success" style="margin-left: 20px;font-weight: 600;"> {{ trans('message.This purchase key is already registered. If you have any issue please contact us at sales@mojoomla.com') }}</label>
                @elseif(session('message') == '3')
                <label for="checkbox-10 colo_success" style="margin-left: 20px;font-weight: 600;"> {{ trans('message.Please enter correct domain name.') }}</label>
                @elseif(session('message') == '4')
                <label for="checkbox-10 colo_success" style="margin-left: 20px;font-weight: 600;"> {{ trans('License Already Activated') }}</label>
                @elseif(session('message') == '5')
                <label for="checkbox-10 colo_success" style="margin-left: 20px;font-weight: 600;"> {{ trans('message.Connection Problem occurs because server is down.') }}</label>
                @elseif(session('message') == '6')
                <label for="checkbox-10 colo_success" style="margin-left: 20px;font-weight: 600;"> {{ trans('License registered successfully') }}</label>
                @endif
            </div>
        </div>
    </div>
    <br>
    @endif
    <!-- Error Message Display Code End-->
    <div class="x_content table-responsive">
      @include('settings_navbar.settings_nav')
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="control-label col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-xs-12 mt-2"><a data-toggle="tooltip" data-placement="bottom" title="Information" class="text-primary"><i class="fa fa-info-circle" style="color:#D9D9D9"></i></a> Note :<span style="color:#e78604">{{ trans('Purchase Garage Mobile App first. Check Sidemenu->settings->Addons->Garagemaster Mobile App') }}</span></div>
    </div>

    @if(!empty($purchaseData))
    <div class="row mt-3 note-message d-flex justify-content-center"><span>{{ trans('Your License is registered.Please check on Mobile App') }}<i class="fa fa-check"></i></span></div>
    @endif
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content mt-3">
                <form id="colorAdd-Form" method="post" action="{!! url('/setting/mobile_setting/list') !!}" enctype="multipart/form-data" class="form-horizontal upperform colorAddForm">
                    <div class="row row-mb-0">
                        <div class="row col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-xs-8">
                            <label class="control-label col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4" for="first-name">{{ trans('Domain URL') }} <label class="text-danger">*</label></label>
                            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-6 col-xs-6">
                            <input type="text" id="domain_name" name="domain_name" class="form-control" value="{{ $_SERVER['SERVER_NAME'] }}" required readonly>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row row-mb-0">
                        <div class="row col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-xs-8">
                            <label class="control-label col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4" for="first-name">{{ trans('Mobile App Purchase Key') }} <label class="text-danger">*</label></label>
                            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-6 col-xs-6">
                            <input type="text" id="purchase_key" name="purchase_key" class="form-control" value="{{$purchaseData->app_licence_key ?? ''}}" placeholder="{{ trans('Enter Mobile App Purchase Key') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row row-mb-0">
                    <div class="row col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-xs-8">
                        <label class="control-label col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4" for="first-name">{{ trans('E-Mail') }} <label class="text-danger">*</label></label>
                        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-6 col-xs-6">
                        <input type="email" id="purchase_email" name="purchase_email" class="form-control" value="{{ $purchaseData->app_email ?? ''}}" placeholder="{{ trans('Enter E-Mail') }}" required>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-6 col-xs-6 my-2 mx-0">
                        <button type="submit" class="btn btn-success colorname colorAddSubmitButton">{{ trans('message.SUBMIT') }}</button>
                    </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- page content end -->

<script nonce="{{ $cspNonce }}"src="{{ URL::asset('vendors/jquery/dist/jquery.min.js') }}"></script>
<script nonce="{{ $cspNonce }}">

</script>


@endsection