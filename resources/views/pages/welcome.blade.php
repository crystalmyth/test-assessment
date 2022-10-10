@extends('layouts.app')

@section('section')
    <property-index :properties='@json($properties)' />
@endsection