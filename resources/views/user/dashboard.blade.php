@extends('layouts.app')

@section('content')
<h1>User Dashboard</h1>
@php
$users = auth()->user();
@endphp
@endsection