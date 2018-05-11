@extends('admin.layouts.default_name_column')

{{-- Web site Title --}}
@section('title') {!! trans("admin/services.services") !!} :: @parent
@stop

{{-- Content --}}
@section('main')
<div class="row">
  <div class="col-lg-12">
    <h4 class="page-header">
      <ol class="breadcrumb">
        <li class=>{{ trans("admin/nav.accounts") }}</li>
        <li class="active">{!! trans("admin/services.service") !!}</li>
      </ol>
    </h4>
  </div>
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <button
        class="btn btn-sm  btn-info refresh" type="button"><span
        class="glyphicon glyphicon-refresh"></span> {{trans("admin/modal.refresh") }}</button>
        @if (!isset($querystring))
          <a href="{!! URL::to('admin/service/create') !!}"
             class="btn btn-sm  btn-primary iframe"><span class="glyphicon glyphicon-plus-sign"></span>
            {{trans("admin/modal.new") }}</a>
        @else
          <a href="{!! URL::to('admin/service/create?'.$querystring) !!}"
             class="btn btn-sm  btn-primary iframe"><span class="glyphicon glyphicon-plus-sign"></span>
            {{trans("admin/modal.new") }}</a>
        @endif
      </div>
      <div class="panel-body">
        <table id="table" class="table table-striped table-hover">
          <thead>
            <tr>
              <th data-name="name">{!! trans("admin/services.name") !!}</th>
              <th data-name="description">{!! trans("admin/services.description") !!}</th>
              <th class="clickable-tr" href="link" data-name="link">{!! trans("admin/services.link") !!}</th>
              <th data-name="category.name">{!! trans("admin/services.category") !!}</th>
              <th data-name="created_at">{!! trans("admin/services.created_at") !!}</th>
              <th data-name="updated_at">{!! trans("admin/services.updated_at") !!}</th>
              <th data-name="actions">{!! trans("admin/services.actions") !!}</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@stop

{{-- Scripts --}}
@section('scripts')
@parent
@stop
