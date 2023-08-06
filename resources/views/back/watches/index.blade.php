@extends(back_view_path('layouts.base'))



@section('title', 'Montres')




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
                        <li class="breadcrumb-item active" aria-current="page">Montres</li>
                    </ol>
                </nav>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Montres</h3>
                    <div class="btn-group float-right">
                        {{-- <a href="{{ route('back.watch.create') }}" class="btn  btn-primary"> <i
                                class="fa fa-plus"></i> Ajouter</a> --}}

                        <a href="#" class="btn btn-danger d-none" data-model="\App\Models\Watch" id="delete-all">
                            <i class="fa fa-trash"></i> Tous supprimer</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-vcenter card-table" id='list'>
                        <thead>
                            <th>
                                <div class="checkbox-fade fade-in-success ">
                                    <label for="check-all">
                                        <input type="checkbox" value=""  id="check-all">
                                        <span class="cr">
                                            <i class="cr-icon ik ik-check txt-success"></i>
                                        </span>
                                    </label>
                                </div>
                            </th>
                            <th>#</th>

                            <th>Nom</th>
                            <th>Description</th>
                            <th>Auteur</th>
                            {{-- <th>Montant</th> --}}
                            <th>Date création</th>

                            {{-- add fields here --}}
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach($watches as $watch)
                            <tr class="tr-shadow">
                                <td>
                                    <div class="checkbox-fade fade-in-success ">
                                        <label for="check-{{ $watch->id }}">
                                            <input type="checkbox" data-check data-id="{{ $watch->id }}"  id="check-{{ $watch->id }}">
                                            <span class="cr">
                                                <i class="cr-icon ik ik-check txt-success"></i>
                                            </span>
                                            {{-- <span>Default</span> --}}
                                        </label>
                                    </div>
                                </td>

                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $watch->name }}</td>
                            <td>{{ $watch->description }}</td>
                            {{-- <td>
                                <a href="{{ route('back.design.show',$watch->form ) }}" classs="badge badge-secondary p-2">
                                    {{ $watch->form->name }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('back.index.show',$watch->index ) }}" classs="badge badge-secondary p-2">
                                    {{ $watch->index->name }}
                                </a>
                            </td>
                            <td>{{ $watch->index_image_id }}</td>
                            <td>
                                <a href="{{ route('back.indicator.show',$watch->indicator ) }}" classs="badge badge-secondary p-2">
                                    {{ $watch->indicator->name }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('back.background.show',$watch->brackground ) }}" classs="badge badge-secondary p-2">
                                    {{ $watch->brackground->name }}
                                </a>
                            </td>
                            <td>{{ $watch->brackground_image_id }}</td> --}}
                    {{-- <td>
                        <a href="{{ route('back.bracelet.show',$watch->bracelet ) }}" classs="badge badge-secondary p-2">
                            {{ $watch->bracelet->name }}
                        </a>
                    </td> --}}
                    {{-- <td>
                        <a href="{{ route('back.design.show',$watch->design ) }}" classs="badge badge-secondary p-2">
                            {{ $watch->design->name }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('back.designcategory.show',$watch->design ) }}" classs="badge badge-secondary p-2">
                            {{ $watch->design->name }}
                        </a>
                    </td>--}}
                    <td>
                        <a href="{{ route('back.user.show', $watch->user ) }}" classs="badge badge-secondary p-2">
                            {{ $watch->user->name }}
                        </a>
                    </td>
                {{-- <td>{{ Str::limit($watch->text, 50) }}</td> --}}
                {{-- <td>{{ Str::limit($watch->background, 50) }}</td> --}}
                <td>{{ format_date($watch->created_at) }}</td>
                                {{-- add values here --}}
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('back.watch.show', $watch) }}" class="btn btn-primary"
                                             title="Afficher"><i class="fas fa-eye"></i></a>

                                        {{-- index clone link --}}
                                          <a href="{{ route('back.watch.edit', $watch) }}" class="btn btn-info"
                                            title="Editer"><i class="fas fa-edit"></i></a>

                                        <a href="{{ route('back.watch.delete', $watch) }}" data-method="delete"
                                            data-confirm="Etes vous sûr de bien vouloir procéder à la suppression ?" class="btn btn-danger"
                                            title="Supprimer"><i class="fas fa-trash"></i></a>

                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    </div>
</div>

<x-administrable::datatable />
@deleteAll

@endsection
