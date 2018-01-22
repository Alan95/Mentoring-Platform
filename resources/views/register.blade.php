@extends('layout')
@section('content')
    @if(isset($type))
    <register type='{{ $type }}'></register>
    @else
    <register type='""'></register>
    @endif
@endsection        