@extends('layouts.app')
@section('content')
<style>
  .panel-title {
    background-color: #FFEFE6;
  }
  @if (getLangCode()==='ar')
  .radio input[type=radio], .radio-inline input[type=radio], .checkbox input[type=checkbox], .checkbox-inline input[type=checkbox]{
        margin-left: 10px;
  }
  span.select2-selection.select2-selection--multiple{
    width:72% !important;
  }
  @endif
  
  /* Editor Styles */
  .editor-wrapper {
    margin-bottom: 25px;
  }
  .mail-variable{
    margin-top: 20px !important;
  }
  
  /* Simple Rich Text Editor */
  .rich-editor {
    border: 1px solid #ccc;
    min-height: 200px;
    padding: 10px;
    border-radius: 4px;
    background: white;
  }
  
  .editor-toolbar {
    background: #f8f9fa;
    border: 1px solid #ccc;
    border-bottom: none;
    padding: 8px;
    border-radius: 4px 4px 0 0;
  }
  
  .editor-toolbar button {
    background: white;
    border: 1px solid #ddd;
    padding: 5px 10px;
    margin-right: 5px;
    cursor: pointer;
    border-radius: 3px;
  }
  
  .editor-toolbar button:hover {
    background: #e9ecef;
  }
  
  .editor-toolbar button.active {
    background: #007bff;
    color: white;
  }
  
  .rich-editor:focus {
    outline: 2px solid #007bff;
  }
</style>

<!-- page content -->
<div class="right_col" role="main">
  <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-xs-12">
    <div class="page-title">
      <div class="nav_menu">
        <nav>
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars sidemenu_toggle"></i></a><span class="titleup">
              {{ trans('message.Email Templates') }}</span></a>
          </div>
          @include('dashboard.profile')
        </nav>
      </div>
    </div>
    @include('success_message.message')
    <div class="row">
      <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-xs-12">
      </div>
      <div class="col-12 panel-group bg-white p-0">
        <div class="accordion" id="accordionExample">
          @php
          $i = 0;
          @endphp
          @foreach ($mailformat as $mailformats)

          <div class="accordion-item mb-3 mt-3">
            <h4 class="accordion-header" id="#collapse{{ $mailformats->id }}">
              <a class="accordion-button collapsed panel-title" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $mailformats->id }}" aria-expanded="false" aria-controls="collapse{{ $mailformats->id }}">
                {{ trans('message.' . $mailformats->notification_label)}}
              </a>
            </h4>

            <div id="collapse{{ $mailformats->id }}" class="accordion-collapse collapse" aria-labelledby="collapse{{ $mailformats->id }}" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <form class="form-horizontal email-template-form" method="post" action="mail/emailformat/{{ $mailformats->id }}" name="parent_form">

                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="row ">
                    <label for="first_name" class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4 checkpointtext text-end control-label">{{ trans('message.Email Subject') }} <span class="color-danger">*</span> </label>
                    <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-xs-8">
                      <input class="form-control validate[required]" name="subject" id="Member_Registration" placeholder="Enter email subject" value="{{ $mailformats->subject }}" required>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <label for="first_name" class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4 checkpointtext text-end control-label">{{ trans('message.Sender email') }} <span class="color-danger">*</span> </label>
                    <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-xs-8">
                      <input class="form-control validate[required]" name="send_from" id="Member_Registration" placeholder="Enter Sender Email" value="{{ $mailformats->send_from }}" required>
                    </div>
                  </div>

                  <div class="row mt-3"> 
                    <label for="first_name" class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4 control-label checkpointtext text-end">{{ trans('message.Registration Email Template') }}
                      <span class="color-danger">*</span> </label>
                    <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-xs-8">
                      <!-- Rich Text Editor -->
                      <div class="editor-wrapper">
                        <div class="editor-toolbar" id="toolbar_{{ $mailformats->id }}">
                          <button type="button" data-command="bold" title="Bold"><b>B</b></button>
                          <button type="button" data-command="italic" title="Italic"><i>I</i></button>
                          <button type="button" data-command="underline" title="Underline"><u>U</u></button>
                          <button type="button" data-command="insertUnorderedList" title="Bullet List">• List</button>
                          <button type="button" data-command="insertOrderedList" title="Numbered List">1. List</button>
                          <button type="button" data-command="createLink" title="Insert Link">🔗 Link</button>
                          <button type="button" data-command="removeFormat" title="Clear Formatting">✖ Clear</button>
                        </div>
                        <div 
                          class="rich-editor" 
                          id="editor_{{ $mailformats->id }}" 
                          contenteditable="true" 
                          data-template-id="{{ $mailformats->id }}">
                        </div>
                        <textarea 
                          name="notification_text" 
                          id="hidden_editor_{{ $mailformats->id }}" 
                          style="display: none;" 
                          required></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row mt-3 mail-variable">
                    <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4"> </div>
                    <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-xs-8">
                      {{ trans('message.You can use following variables in the email template') }}<br>
                      <label><strong><?php echo $mailformats->description_of_mailformate; ?><br></strong></label>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4"></div>
                    <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-xs-8">
                      {{ trans('message.Is Send') }}<br>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4"> </div>
                    <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-xs-8 ps-0">
                      <label class="radio-inline">
                        <input type="radio" name="is_send" value="0" @if ($mailformats->is_send == 0) checked @endif>{{ trans('message.Enable') }}
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="is_send" value="1" @if ($mailformats->is_send == 1) checked @endif>{{ trans('message.Disable') }}
                      </label>
                    </div>
                  </div>
                  @can('emailtemplate_edit')
                  <div class="row mt-3">
                    <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4"> </div>
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-6 col-xs-6">
                      <input type="submit" value="{{trans('message.Save')}}" class="btn btn-success">
                    </div>
                  </div>
                  @endcan
                </form>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

<!-- Pure JavaScript Rich Text Editor -->
<script nonce="{{ $cspNonce }}">
document.addEventListener('DOMContentLoaded', function() {
  // Email template data
  const emailTemplates = [
    @foreach ($mailformat as $mailformats)
    {
      id: {{ $mailformats->id }},
      content: {!! json_encode($mailformats->notification_text) !!}
    },
    @endforeach
  ];

  // Initialize each editor
  emailTemplates.forEach(function(template) {
    const editor = document.getElementById('editor_' + template.id);
    const hiddenInput = document.getElementById('hidden_editor_' + template.id);
    const toolbar = document.getElementById('toolbar_' + template.id);
    
    if (!editor || !hiddenInput) return;

    // Set initial content
    editor.innerHTML = template.content;
    hiddenInput.value = template.content;

    // Update hidden input when content changes
    editor.addEventListener('input', function() {
      hiddenInput.value = editor.innerHTML;
    });

    // Toolbar button handlers
    const buttons = toolbar.querySelectorAll('button[data-command]');
    buttons.forEach(function(button) {
      button.addEventListener('click', function(e) {
        e.preventDefault();
        const command = this.getAttribute('data-command');
        
        if (command === 'createLink') {
          const url = prompt('Enter the link URL:');
          if (url) {
            document.execCommand(command, false, url);
          }
        } else {
          document.execCommand(command, false, null);
        }
        
        // Update hidden input after command
        hiddenInput.value = editor.innerHTML;
        
        // Keep focus on editor
        editor.focus();
      });
    });

    // Update button states based on current selection
    editor.addEventListener('mouseup', updateToolbar);
    editor.addEventListener('keyup', updateToolbar);
    
    function updateToolbar() {
      buttons.forEach(function(button) {
        const command = button.getAttribute('data-command');
        if (document.queryCommandState(command)) {
          button.classList.add('active');
        } else {
          button.classList.remove('active');
        }
      });
    }
  });

  // Before form submission, ensure all hidden inputs are updated
  document.querySelectorAll('.email-template-form').forEach(function(form) {
    form.addEventListener('submit', function(e) {
      const editors = this.querySelectorAll('.rich-editor');
      editors.forEach(function(editor) {
        const templateId = editor.getAttribute('data-template-id');
        const hiddenInput = document.getElementById('hidden_editor_' + templateId);
        if (hiddenInput) {
          hiddenInput.value = editor.innerHTML;
        }
      });
    });
  });
});
</script>

@endsection