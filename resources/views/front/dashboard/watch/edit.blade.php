@extends('front.layouts.dashboard')

<x-administrable::seotags :force="true" title="Tableau de bord" />

@section('content')

<div class="content">
    <!-- Top Statistics -->
    <div class="row">
       <div class="col-md-12">
            <div class="card card-success mb-4">
                <div class="card-header card-header-border-bottom">
                    <h2>Edition de montre</h2>
                </div>
                <div class="card-body">
                    @include('front.partials._watch', ['watch' => $watch])
                </div>
            </div>
       </div>
    </div>

</div>

@endsection
