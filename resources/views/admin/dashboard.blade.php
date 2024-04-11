@extends('layouts.app')

@section('content')
<h1>Admin Dashboard</h1>
@php
$users = auth()->user();
@endphp
@endsection