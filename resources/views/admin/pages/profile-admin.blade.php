@extends('admin.layouts.layout-admin')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Profile Admin')
@section('content')
    @livewire('admin.profile-admin')
@endsection
