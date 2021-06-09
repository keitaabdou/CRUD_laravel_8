@extends('template')
@section('title', 'Edit')
@section('content')
    <div class="container">
        <h1 class="text-center">Modification</h1>
        <div class="row justify-content-center">
            @if (session('succes'))
                <div class="col-md-12 alert alert-success">
                    {{session('succes')}}
                </div>
            @endif
            <div class="col-md-6">
                <form action="{{route('contact.update', $contact->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="nom" placeholder="Entrez votre Nom"  value="{{$contact->nom}}" class="form-control @error('nom') is-invalid @enderror">
                    @error('nom')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Entrez votre Email" value="{{$contact->email}}" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="message" class="form-control @error('message') is-invalid @enderror">{{$contact->message}}</textarea>
                    @error('message')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary " type="submit" name="valider">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


