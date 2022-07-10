@extends('admin.layouts.layout-admin')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Deta Users')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="page-body">
            @livewire('user.index-user')
        </div>
    </div>
@endsection
