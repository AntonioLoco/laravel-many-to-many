@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Tutti i progetti con tecnologia {{ $technology->name }}</h1>
        <div class="row justify-content-center mt-5">
            <div class="col-9">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Progetto</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($technology->projects as $project)
                            <tr>
                                <th scope="row">{{ $project->title }}</th>
                                <td>
                                    <a class="btn btn-success" href="{{ route('admin.projects.show', $project->slug) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project->slug) }}">
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
                        @empty
                            <th scope="row">Nessun progetto</th>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @include('partials.delete-modal')
    </div>
@endsection
