@extends(back_view_path('layouts.base'))



@section('title','Categorie design')




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
                        <li class="breadcrumb-item active" aria-current="page">Categorie design</li>
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
                        <a href="{{ route('back.designcategory.create') }}" class="btn  btn-primary"> <i
                                class="fa fa-plus"></i> Ajouter</a>



                        <a href="#" class="btn btn-danger d-none" data-model="\App\Models\DesignCategory" id="delete-all">
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
                <th>Price</th>
                <th>Description</th>
                <th>Design</th>
                <th>Date création</th>

                            {{-- add fields here --}}
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach($designcategories as $designcategory)
                            <tr class="tr-shadow">
                            <td>
                    <div class="checkbox-fade fade-in-success ">
                        <label for="check-{{ $designcategory->id }}">
                            <input type="checkbox" data-check data-id="{{ $designcategory->id }}"  id="check-{{ $designcategory->id }}">
                            <span class="cr">
                                <i class="cr-icon ik ik-check txt-success"></i>
                            </span>
                            {{-- <span>Default</span> --}}
                        </label>
                    </div>
                </td>

                <td>{{ $loop->iteration }}</td>
                <td>{{ Str::limit($designcategory->name, 50) }}</td>
                <td>{{ Str::limit($designcategory->price, 50) }}</td>
                <td>{{ Str::limit($designcategory->description, 50) }}</td>
                <td>
                    <a href="{{ route('back.design.show',$designcategory->design ) }}" classs="badge badge-secondary p-2">
                        {{ $designcategory->design->name }}
                    </a>
                </td>
                <td>{{ format_date($designcategory->created_at) }}</td>
                                {{-- add values here --}}
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('back.designcategory.show', $designcategory) }}" class="btn btn-primary"
                                             title="Afficher"><i class="fas fa-eye"></i></a>

                                        {{-- index clone link --}}
                                          <a href="{{ route('back.designcategory.edit', $designcategory) }}" class="btn btn-info"
                                            title="Editer"><i class="fas fa-edit"></i></a>

                                        <a href="{{ route('back.designcategory.delete', $designcategory) }}" data-method="delete"
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
