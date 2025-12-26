@can('observationlibrary_edit')
<?php foreach ($sub_data as $sub_datas) { ?>
  <div class="items">

    <div class="row form-group  form_group_error">
      <!-- <label class="control-label col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4">
        {{ trans('message.Check Point') }}<label class="color-danger">&nbsp;&nbsp;*</label></label> -->
      <?php $checkout_point = $sub_datas->checkout_point;
      if ($sub_datas->create_by == 0) {
        $checkout_point = trans('message.' . $sub_datas->checkout_point);
      }
      ?>
      <input type="hidden" name="check_point_id" class="check_point_id" value="<?php echo $id; ?>" />
      <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-xs-12 mb-2">
        <lable>{{ trans('Enter Checkpoint') }}<label class="color-danger">&nbsp;&nbsp;*</label>
        <input id="sub_ch" placeholder="{{ trans('message.Enter Checkpoint Name') }}" name="checkpoint[]" type="text" maxlength="30" class="form-control chekpoint_sub model_input" value="<?php echo $checkout_point; ?>" />

        <span id="checkpoints_edit_error" class="help-block error-help-block color-danger" style="display: none">{{ trans('message.Start should be alphabets only after supports alphanumeric, space, dot, @, _, and - are allowed.') }}</span>

        <span id="checkpoints_edit_error1" class="help-block error-help-block color-danger" style="display: none">{{ trans('message.field is required') }}</span>

      </div>
      <!-- Service Charge Field -->
      <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-xs-12 mb-2">
        <lable>{{ trans('message.Service Charge') }}<label class="color-danger">&nbsp;&nbsp;*</label>
        <input type="number" 
               name="service_charge[]" 
               class="form-control service_charge" 
               placeholder="{{ trans('message.Enter Service Charge') }}" 
               value="<?php echo isset($sub_datas->service_charge) ? $sub_datas->service_charge : 0; ?>" 
               min="0" />
      </div>

      <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-4 col-xs-4">
        <button class="btn btn-success submit_edit checkpoint_update input_submit m-0">{{ trans('message.UPDATE') }}</button>
      </div>
    </div>
  </div>
<?php } ?>
@endcan