@extends('template')
@section('title', 'Contact')
@section('content')
    <div class="container">
        <h1 class="text-center">Formulaire de contact</h1>
        <div class="row justify-content-center">
            @if (session('succes'))
                <div class="col-md-12 alert alert-success">
                    {{session('succes')}}
                </div>
            @endif
            <div class="col-md-6">
                <form action="{{route('contact.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="nom" placeholder="Entrez votre Nom" class="form-control @error('nom') is-invalid @enderror">
                    @error('nom')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Entrez votre Email" class="form-control @error('nom') is-invalid @enderror">
                    @error('email')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="message" class="form-control @error('nom') is-invalid @enderror"></textarea>
                    @error('message')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary " type="submit" name="valider">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


