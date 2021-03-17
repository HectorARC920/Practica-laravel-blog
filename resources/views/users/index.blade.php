@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuarios
                    <a href="{{ route('users.create')}}" class="btn btn-sm btn-primary float-right">Crear</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>email</th>
                            <th>Num posts</th>
                            <th colspan="2">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)  
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ count($user->posts) }}</td>
                                <td>{{ $user->postsTitles()->get()  }}</td>
                                <td><a href=""></a></td>
                                <td>
                                    <a href="{{ route('users.edit',$user) }}" class="btn btn-primary btn-sm">
                                    Editar</a>
                                </td> 
                                <td>
                                    <form action="{{route('users.destroy',$user)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" 
                                        value="Eliminar" 
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Desea eliminar...?')">
                                    </form>
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