@extends(back_view_path('layouts.base'))



@section('title','Edition ' . $watch->name)

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
                            <li class="breadcrumb-item">
                                <a href="{{ route('back.watch.show', $watch) }}">{{ $watch->name }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="#">Edition</a></li>
                        </ol>
                    </nav>




                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">Edition</h3>
                        <div class="btn-group float-right">
                            <a href="{{ route('back.watch.delete', $watch) }}" class="btn btn-danger" data-method="delete"
                                data-confirm="Etes vous sûr de bien vouloir procéder à la suppression ?">
                                <i class="fas fa-trash"></i> Supprimer</a>



                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @include('front.partials._watch', [
                                    'watch'     => $watch,
                                    'adminEdit' => true,
                                    'routes'    => [
                                        'create' => route('back.watch.create'),
                                        'edit' => route('back.watch.update', $watch),
                                    ]
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





