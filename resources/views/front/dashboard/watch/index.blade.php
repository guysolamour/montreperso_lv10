@extends('front.layouts.dashboard')

<x-administrable::seotags :force="true" title="Tableau de bord" />

@section('content')

<div class="content">
    <!-- Top Statistics -->
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="d-flex justify-content-end">
                <a href="{{ route('front.user.dashboard.watch.create') }}" class="btn btn-info">Ajouter une montre</a>
            </div>
        </div>
       <div class="col-md-12">
            <div class="card card-success mb-4">
                <div class="card-header card-header-border-bottom">
                    <h2>Vos differentes montres</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Description</th>
                            <th scope="col">Créée le</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($watches as $watch)
                            <tr>
                              <th scope="row">{{ $loop->iteration }}</th>
                              <td>{{ $watch->name }}</td>
                              <td>{{ Str::limit($watch->description, 100) }}</td>
                              <td>{{ $watch->created_at->diffForHumans()}}</td>
                              <td>
                                <div class="btn-group">
                                    <a href="{{ route('front.user.dashboard.watch.update', $watch) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Editer</a>
                                    <button type="submit" form="deletewatch-{{ $watch->id }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Supprimer</button>
                                    <form
                                        id="deletewatch-{{ $watch->id }}"
                                        action="{{ route('front.user.dashboard.watch.delete', $watch) }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                        @method("DELETE")
                                        @honeypot
                                    </form>
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

@endsection
