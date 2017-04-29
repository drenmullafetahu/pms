
  <div class="breadcrumbs-holder">
    <ol class="breadcrumb">
      <li>{{ ucfirst(lang('titles.index.'.$activeController))  }}</li>
      @if($action=='edit' || $action=='create' || $action=='import')

        <li>{{ ucfirst(lang('labels.actions.'.$action))  }}</li>
      @endif
    </ol>
  </div>

