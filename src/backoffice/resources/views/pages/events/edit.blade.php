@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1 bg-white">
                <h2 class="mt-3">Editar evento</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam doloremque eum fuga hic illo magni nihil odit repellendus suscipit veniam. Consectetur maiores, officiis. Accusantium, dolor magni necessitatibus repellendus sequi soluta!
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit ipsum iusto magni nesciunt repudiandae? Commodi corporis magni placeat? Consequatur cumque explicabo impedit magni natus officia praesentium quia rerum tempore voluptate?
                </p>
                <form method="post" action="{{ route('views.event.update', $event->slug) }}" class="mb-3">
                    @csrf
                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/x-png,image/gif,image/jpeg" />
                        @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Titulo</label>
                        <input type="text" value="{{ $event->title }}" class="form-control" id="title" name="title" />
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="txtDescription" class="form-label">Descrição</label>
                        <textarea type="text" class="form-control" id="txtDescription" name="description">{{ $event->description }}</textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="txtBody" class="form-label">Corpo</label>
                        <textarea type="email" class="form-control" id="txtBody" name="body">{{ $event->body }}</textarea>
                        @error('body') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="txtDatetime" class="form-label">Data do evento</label>
                        <input type="datetime-local" class="form-control" id="txtDatetime" name="event_at" value="{{ $event->event_at }}" />
                        @error('event_at') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary ml-auto">Editar evento</button>
                </form>
            </div>
        </div>
    </div>
@endsection
