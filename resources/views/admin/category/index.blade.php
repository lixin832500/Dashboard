@extends('admin.layouts.default_name_column')

{{-- Web site Title --}}
@section('title') {!! trans("admin/categorys.categorys") !!} :: @parent
@stop

{{-- Content --}}
@section('main')
<div class="row">
  <div class="col-lg-12">
    <h4 class="page-header">
      <ol class="breadcrumb">
        <li class=>{{ trans("admin/nav.accounts") }}</li>
        <li class="active">{!! trans("admin/categorys.category") !!}</li>
      </ol>
    </h4>
  </div>
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <button
        class="btn btn-sm  btn-info refresh" type="button"><span
        class="glyphicon glyphicon-refresh"></span> {{trans("admin/modal.refresh") }}</button>
        <a href="{!! URL::to('admin/category/create') !!}"
        class="btn btn-sm  btn-primary iframe"><span
        class="glyphicon glyphicon-plus-sign"></span> {{trans("admin/modal.new") }}</a>
      </div>
      <div class="panel-body">
        <table id="table" class="table table-striped table-hover">
          <thead>
            <tr>
              <th data-name="name">{!! trans("admin/categorys.name") !!}</th>
              <th data-name="description">{!! trans("admin/categorys.description") !!}</th>
              <th data-name="created_at">{!! trans("admin/categorys.created_at") !!}</th>
              <th data-name="updated_at">{!! trans("admin/categorys.updated_at") !!}</th>
              <th data-name="actions">{!! trans("admin/admin.action") !!}</th>
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
