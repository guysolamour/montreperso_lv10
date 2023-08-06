@extends(back_view_path('layouts.base'))

@section('title', $watch->name)


@section('content')

<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('back.watch.index') }}">Montre</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $watch->name }}</li>
                        </ol>
                    </nav>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">Montre</h3>
                        <div class="btn-group float-right">
                             <a href="{{ route('back.watch.edit', $watch) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i> Editer</a>


                             <a href="{{ route('back.watch.delete', $watch) }}" class="btn btn-danger" data-method="delete"
                                data-confirm="Etes vous sûr de bien vouloir procéder à la suppression ?">
                                <i class="fas fa-trash"></i> Supprimer</a>



                        </div>
                    </div>

                    <div class="card-body row">
                        <div class="col-md-8">
                                                                                        
            <p class="pb-2"><b>Nom: </b>{{ $watch->name }}</p>
            <p class="pb-2"><b>Description: </b>{{ $watch->description }}</p>
                <p class="pb-2">
                    <b>Forme: </b>
                    <a href="{{ route('back.form.show', $watch->form) }}">
                        {{ $watch->form->name }}
                    </a>
                </p>
                <p class="pb-2">
                    <b>Index: </b>
                    <a href="{{ route('back.index.show', $watch->index) }}">
                        {{ $watch->index->name }}
                    </a>
                </p>
            <p class="pb-2"><b>Image index: </b>{{ $watch->index_image_id }}</p>
                <p class="pb-2">
                    <b>Aiguille: </b>
                    <a href="{{ route('back.indicator.show', $watch->indicator) }}">
                        {{ $watch->indicator->name }}
                    </a>
                </p>
                <p class="pb-2">
                    <b>Arrière plan: </b>
                    <a href="{{ route('back.brackground.show', $watch->brackground) }}">
                        {{ $watch->brackground->name }}
                    </a>
                </p>
            <p class="pb-2"><b>Arriere plan image: </b>{{ $watch->brackground_image_id }}</p>
                <p class="pb-2">
                    <b>Bracelet: </b>
                    <a href="{{ route('back.bracelet.show', $watch->bracelet) }}">
                        {{ $watch->bracelet->name }}
                    </a>
                </p>
                <p class="pb-2">
                    <b>Design: </b>
                    <a href="{{ route('back.design.show', $watch->design) }}">
                        {{ $watch->design->name }}
                    </a>
                </p>
                <p class="pb-2">
                    <b>Category: </b>
                    <a href="{{ route('back.design.show', $watch->design) }}">
                        {{ $watch->design->name }}
                    </a>
                </p>
                <p class="pb-2">
                    <b>Auteur: </b>
                    <a href="{{ route('back.user.show', $watch->user) }}">
                        {{ $watch->user->name }}
                    </a>
                </p>
            <p class="pb-2"><b>Text: </b>{{ $watch->text }}</p>
            <p class="pb-2"><b>Background: </b>{{ $watch->background }}</p>
            <p class="pb-2"><b>Date ajout: </b>{{ format_date($watch->created_at) }}</p>
                            {{-- add fields here --}}
                        </div>
                        <div class="col-md-4">
                               @filemanagerShow([
        'model'       =>  $watch,
        'label'       =>  'Arriere plan',
        'collection'  =>  'back-image',
    ])

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
