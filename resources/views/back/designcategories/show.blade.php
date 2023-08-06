@extends(back_view_path('layouts.base'))

@section('title', $designcategory->name)


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
                                <a href="{{ route('back.designcategory.index') }}">Categorie design</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $designcategory->name }}</li>
                        </ol>
                    </nav>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">Categorie design</h3>
                        <div class="btn-group float-right">
                             <a href="{{ route('back.designcategory.edit', $designcategory) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i> Editer</a>


                             <a href="{{ route('back.designcategory.delete', $designcategory) }}" class="btn btn-danger" data-method="delete"
                                data-confirm="Etes vous sûr de bien vouloir procéder à la suppression ?">
                                <i class="fas fa-trash"></i> Supprimer</a>



                        </div>
                    </div>

                    <div class="card-body row">
                        <div class="col-md-8">
                                                
            <p class="pb-2"><b>Nom: </b>{{ $designcategory->name }}</p>
            <p class="pb-2"><b>Price: </b>{{ $designcategory->price }}</p>
            <p class="pb-2"><b>Description: </b>{{ $designcategory->description }}</p>
                <p class="pb-2">
                    <b>Design_id: </b>
                    <a href="{{ route('back.design.show', $designcategory->design) }}">
                        {{ $designcategory->design->name }}
                    </a>
                </p>
            <p class="pb-2"><b>Date ajout: </b>{{ format_date($designcategory->created_at) }}</p>
                            {{-- add fields here --}}
                        </div>
                        <div class="col-md-4">
                           
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
