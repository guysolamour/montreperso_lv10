@extends(back_view_path('layouts.base'))



@section('title','cadre')




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
                        <li class="breadcrumb-item active" aria-current="page">cadre</li>
                    </ol>
                </nav>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">cadre</h3>
                    <div class="btn-group float-right">
                        <a href="{{ route('back.index.create') }}" class="btn  btn-primary"> <i
                                class="fa fa-plus"></i> Ajouter</a>



                        <a href="#" class="btn btn-danger d-none" data-model="\App\Models\Index" id="delete-all">
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
                <th>Forme</th>
                <th>Type</th>
                <th>Description</th>
                <th>Date création</th>

                            {{-- add fields here --}}
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach($indices as $index)
                            <tr class="tr-shadow">
                        <td>
                    <div class="checkbox-fade fade-in-success ">
                        <label for="check-{{ $index->id }}">
                            <input type="checkbox" data-check data-id="{{ $index->id }}"  id="check-{{ $index->id }}">
                            <span class="cr">
                                <i class="cr-icon ik ik-check txt-success"></i>
                            </span>
                            {{-- <span>Default</span> --}}
                        </label>
                    </div>
                </td>

                <td>{{ $loop->iteration }}</td>
                <td>{{ Str::limit($index->name, 50) }}</td>
                <td>{{ $index->form->name }}</td>
                <td>{{ $index->form->type->name }}</td>
                <td>{{ Str::limit($index->description, 50) }}</td>
                <td>{{ format_date($index->created_at) }}</td>
                                {{-- add values here --}}
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('back.index.show', $index) }}" class="btn btn-primary"
                                             title="Afficher"><i class="fas fa-eye"></i></a>

                                         <a href="{{ route('back.model.clone', get_clone_model_params($index)) }}" class="btn btn-secondary"
                                            title="Cloner"><i class="fas fa-clone"></i></a>

                                          <a href="{{ route('back.index.edit', $index) }}" class="btn btn-info"
                                            title="Editer"><i class="fas fa-edit"></i></a>

                                        <a href="{{ route('back.index.delete', $index) }}" data-method="delete"
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
