@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1 bg-white">
                <h2 class="mt-3">Criar evento</h2>
                <form method="post" action="{{ route('api.event.store') }}" class="mb-3">
                    @csrf
                    <div class="mb-3">
                        <label for="txtPhoto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="txtPhoto" name="photo" />
                    </div>
                    <div class="mb-3">
                        <label for="txtTitle" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="txtTitle" name="title" />
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="txtDescription" class="form-label">Descrição</label>
                        <textarea type="text" class="form-control" id="txtDescription" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="txtBody" class="form-label">Corpo</label>
                        <textarea type="email" class="form-control" id="txtBody" name="body"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="txtDatetime" class="form-label">Data do evento</label>
                        <input type="datetime-local" class="form-control" id="txtDatetime" name="event_at" />
                    </div>
                    <button type="submit" class="btn btn-primary">Criar evento</button>
                </form>
            </div>
        </div>
    </div>
@endsection
