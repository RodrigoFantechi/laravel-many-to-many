@extends('layouts.admin')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <form action="{{ route('admin.technologies.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label ps-1">Aggiungi una nuova tecnologia</label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Inserisci nome tecnologia" aria-describedby="helpId">
                    </div>
                    <button type="submit" class="btn btn-primary">Add new technology</button>
                </form>
            </div>
            <!-- /.col -->
            <div class="col">
                <table class="table table-striped table-inverse table-responsive align-middle">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($technologies as $technology)
                            <tr>
                                <td scope="row">{{ $technology->id }}</td>
                                <td>
                                    <form action="{{ route('admin.technologies.update', $technology->id) }}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <div>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="" aria-describedby="helpId" value="{{ $technology->name }}">
                                        </div>

                                    </form>
                                </td>
                                <td>

                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete_technology_{{ $technology->id }}">
                                        Delete
                                    </button>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="delete_technology_{{ $technology->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="modalnameId_{{ $technology->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-name" id="modalnameId_{{ $technology->id }}">Delete
                                                        {{ $technology->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <form action="{{ route('admin.technologies.destroy', $technology->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <input class="btn btn-danger btn-sm" type="submit" value="Delete">

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @empty
                                <td>sorry, no materials here</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection
