@extends(back_view_path('layouts.base'))



@section('title','Forme')




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
                        <li class="breadcrumb-item active" aria-current="page">Forme</li>
                    </ol>
                </nav>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Forme</h3>
                    <div class="btn-group float-right">
                        <a href="{{ route('back.form.create') }}" class="btn  btn-primary"> <i
                                class="fa fa-plus"></i> Ajouter</a>



                        <a href="#" class="btn btn-danger d-none" data-model="\App\Models\Form" id="delete-all">
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
                <th>Date création</th>


                <th>Type</th>
{{-- add fields here --}}
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach($forms as $form)
                            <tr class="tr-shadow">
                        <td>
                    <div class="checkbox-fade fade-in-success ">
                        <label for="check-{{ $form->id }}">
                            <input type="checkbox" data-check data-id="{{ $form->id }}"  id="check-{{ $form->id }}">
                            <span class="cr">
                                <i class="cr-icon ik ik-check txt-success"></i>
                            </span>
                            {{-- <span>Default</span> --}}
                        </label>
                    </div>
                </td>

                <td>{{ $loop->iteration }}</td>
                <td>{{ Str::limit($form->name, 50) }}</td>
                <td>{{ Str::limit($form->description, 50) }}</td>

                <td>{{ format_date($form->created_at) }}</td>

                <td>
                    <a href="{{ route('back.type.show',$form->type ) }}" classs="badge badge-secondary p-2">
                        {{ $form->type->name }}
                    </a>
                </td>
{{-- add values here --}}
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('back.form.show', $form) }}" class="btn btn-primary"
                                             title="Afficher"><i class="fas fa-eye"></i></a>

                                         <a href="{{ route('back.model.clone', get_clone_model_params($form)) }}" class="btn btn-secondary"
                                            title="Cloner"><i class="fas fa-clone"></i></a>

                                          <a href="{{ route('back.form.edit', $form) }}" class="btn btn-info"
                                            title="Editer"><i class="fas fa-edit"></i></a>

                                        <a href="{{ route('back.form.delete', $form) }}" data-method="delete"
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
