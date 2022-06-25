@extends('admin.layouts.layout-admin')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Detail Transaction')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="page-body">
            @livewire('data.detail-transaction')

        </div>
    </div>
@endsection
