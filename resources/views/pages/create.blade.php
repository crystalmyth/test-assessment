@extends('layouts.app')

@section('section')
    <property-create :property_types='@json($property_types)' />
@endsection