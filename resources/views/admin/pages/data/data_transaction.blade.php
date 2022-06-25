@extends('admin.layouts.layout-admin')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Transaction')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="page-body">
            @livewire('data.data-transactions')

        </div>
    </div>


@endsection
