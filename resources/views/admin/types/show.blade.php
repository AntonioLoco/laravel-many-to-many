@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h3 class="text-center">La lista dei progetti con tipologia {{ $type->name }}</h3>
        <div class="row justify-content-center">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="col-8">
                @if (count($type->projects) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th>Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($type->projects as $project)
                                <tr>
                                    <th scope="row">{{ $project->title }}</th>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('admin.projects.show', $project->slug) }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a class="btn btn-warning"
                                            href="{{ route('admin.projects.edit', $project->slug) }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger delete-btn"
                                                data-project-title="{{ $project->title }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h5 class="text-center mt-5">Nessun progetto</h5>
                @endif
            </div>
        </div>
        @include('partials.delete-modal')
    </div>
@endsection
