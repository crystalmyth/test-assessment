@extends('layouts.app')

@section('section')
    <property-edit :property='@json($property)' :property_types='@json($property_types)' />
@endsection