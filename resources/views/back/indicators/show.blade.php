@extends(back_view_path('layouts.base'))

@section('title', $indicator->name)


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
                                <a href="{{ route('back.indicator.index') }}">Aiguille</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $indicator->name }}</li>
                        </ol>
                    </nav>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">Aiguille</h3>
                        <div class="btn-group float-right">
                             <a href="{{ route('back.indicator.edit', $indicator) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i> Editer</a>


                             <a href="{{ route('back.indicator.delete', $indicator) }}" class="btn btn-danger" data-method="delete"
                                data-confirm="Etes vous sûr de bien vouloir procéder à la suppression ?">
                                <i class="fas fa-trash"></i> Supprimer</a>



                        </div>
                    </div>

                    <div class="card-body row">
                        <div class="col-md-8">
                                        
            <p class="pb-2"><b>Nom: </b>{{ $indicator->name }}</p>
            <p class="pb-2"><b>Description: </b>{{ $indicator->description }}</p>
            <p class="pb-2"><b>Date ajout: </b>{{ format_date($indicator->created_at) }}</p>
                            {{-- add fields here --}}
                        </div>
                        <div class="col-md-4">
                               @filemanagerShow([
        'model'       =>  $indicator,
        'label'       =>  'image',
        'collection'  =>  'front-image',
    ])

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
