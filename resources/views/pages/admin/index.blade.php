@extends('layouts.parent')

@section('title', 'Dashbord')

@section('content')
    Hello {{ Auth::user()->name }}
@endsection