@extends('layouts.main')

@section('content')
    <x-heroku></x-heroku>
    <x-promosi></x-promosi>
   <x-produk-unggulan/>
    <x-tentang></x-tentang>
    <x-team></x-team>
@endsection

{{-- <script type="application/ld+json">
{!! json_encode($product->schemaMarkup(), JSON_UNESCAPED_SLASHES) !!}
</script> --}}