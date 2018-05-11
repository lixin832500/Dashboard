@extends('admin.layouts.modal')
{{-- Content --}}
@section('content')
@if (isset($service))
{!! Form::model($service, array('url' => URL::to('admin/service') . '/' . $service->id, 'method' => 'put', 'class' => 'bf', 'files'=> true)) !!}
@else
{!! Form::open(array('url' => URL::to('admin/service'), 'method' => 'post', 'class' => 'bf', 'files'=> true)) !!}
@endif
<!-- Tabs Content -->
<div class="tab-content">
    <!-- General tab -->
    <div class="tab-pane active" id="tab-general">
        <div class="form-group  {{ $errors->has('service_name') ? 'has-error' : '' }}">
            {!! Form::label('name', trans("admin/services.name"), array('class' => 'control-label')) !!}
            <div class="controls">
                {!! Form::text('name', null, array('class' => 'form-control')) !!}
                {{--<span class="help-block">{{ $errors->first('service_name', ':message') }}</span>--}}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('description', trans("admin/services.description"), array('class' => 'control-label')) !!}
            <div class="controls">
                {!! Form::text('description', null, array('class' => 'form-control')) !!}
                {{--<span class="help-block">{{ $errors->first('service_description', ':message') }}</span>--}}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('link', trans("admin/services.link"), array('class' => 'control-label')) !!}
            <div class="controls">
                {!! Form::text('link', null, array('class' => 'form-control')) !!}
                {{--<span class="help-block">{{ $errors->first('service_description', ':message') }}</span>--}}
            </div>
        </div>

        @if	(isset($category))
            {{ Form::hidden('categorys[]', $category->id) }}
        @else
            <div class="form-group {{ $errors->has('categorys') ? 'has-error' : '' }}">
                {!! Form::label('categorys', trans("admin/services.categorys"), array('class' => 'control-label')) !!}
                <select class="form-control" name="categorys" id="categorys">
                    @foreach ($categorys as $category)
                        @if ($mode == 'create')
                            ##@@@@1
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @else
                            ##@@@@2
                            <option value="{{ $category->id }}" {{ ( $service->category($category->name) ? ' selected="selected"' : '') }}>{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        @endif
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <button type="reset" class="btn btn-sm btn-warning close_popup">
                <span class="glyphicon glyphicon-ban-circle"></span> {{
				trans("admin/modal.cancel") }}
            </button>
            <button type="reset" class="btn btn-sm btn-default">
                <span class="glyphicon glyphicon-remove-circle"></span> {{
				trans("admin/modal.reset") }}
            </button>
            <button type="submit" class="btn btn-sm btn-success">
                <span class="glyphicon glyphicon-ok-circle"></span>
                @if	(isset($service))
                    {{ trans("admin/modal.edit") }}
                @else
                    {{trans("admin/modal.create") }}
                @endif
            </button>
        </div>
    </div>
    {!! Form::close() !!}
    @stop @section('scripts')
        <script type="text/javascript">
            $(function () {
                $("#services").select2()
            });
        </script>
</div>
@stop
