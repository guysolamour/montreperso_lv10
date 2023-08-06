@extends('front.layouts.default')

<x-administrable::seotags :model="$page" />

@section('content')
@include('front.partials._header')
<div class="container" style="margin-top: 90px;margin-bottom: 90px" >
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success">
                <h4 class="text-center">Personnalisation de montre</h4>

            </div>
            @include('front.partials._watch')
        </div>
    </div>
</div>
@endsection



