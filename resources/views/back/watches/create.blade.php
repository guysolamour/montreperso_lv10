@extends(back_view_path('layouts.base'))



@section('title','Ajout montre')


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
                            <li class="breadcrumb-item active" aria-current="page"><a href="#">Ajout</a></li>
                        </ol>
                    </nav>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">Ajout</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                @include('back.watches._form')
                            </div>
                            <div class="col-md-4">
                                    @imagemanager([
        'collection'        => "back-image",
        'model'             =>  $form->getModel(),
        'label'             =>  "Arriere plan",
        'type'              =>  "image"
    ])

                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
