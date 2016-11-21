@extends('layouts.master')

@section('title')
    {{trans('suppliers.index.title')}} | @parent
@stop

@push('styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endpush

@section('page-title')
    @pageHeader('suppliers.index.title', 'suppliers.index.description', 'suppliers.index.icon')
@stop


@section('main-content')
    <div class="box">
      <div class="box-header with-border">
            <h3 class="box-title">
                <i class="fa fa-search"></i>&nbsp;
                {{trans('cms::user.index.search')}}
                <small>search and filter records.</small>
            </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <div style="margin-top: 20px;">
                <div class="row">
                    <div class="col-md-12">
                        {!! $dataTable->table(['class' => 'table table-hover']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
{!! $dataTable->scripts() !!}
@endpush