@extends('layouts.master')

@section('title')
    {{trans('user.index.title')}} | @parent
@stop

@push('styles')
@endpush

@section('page-title')
    @pageHeader('user.index.title', 'user.index.description', 'user.index.icon')
@stop


@section('main-content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                <i class="fa fa-search"></i>&nbsp;
                {{trans('user.index.search')}}
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
                        {!! $dataTable->table(['id' => 'users-table', 'class' => 'table table-hover']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
<script src="/js/custom.datatables.js"></script>
{!! $dataTable->scripts() !!}
@endpush