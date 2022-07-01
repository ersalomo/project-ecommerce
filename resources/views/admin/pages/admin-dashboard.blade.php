@extends('admin.layouts.layout-admin')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Dashboard Admin')
@section('content')
    @livewire('admin.score-card')
    @livewire('admin.dashboard-admin')
@endsection
