@extends('layouts.app')

@section('content')
<h1>Operator Dashboard</h1>
@php
$users = auth()->user();
@endphp
@endsection