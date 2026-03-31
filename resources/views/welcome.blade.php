@extends('frontend')
@section('content')
    <livewire:hero-section />
    <livewire:divider :title="__('Features')" :id="__('features')" />
    <livewire:feature-section />
    <livewire:divider :title="__('Testimonials')" :id="__('testimonials')" />
    <livewire:testimonials-section />
@endsection
