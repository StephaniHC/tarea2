@extends('layouts.app')

@section('content')
    <div class="container justify-content-center py-4">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-xs|sm|md|lg|xl-1-12">
                <div class="card" style="padding: 30px;">
                    <div class="card-header">
                        <h4 class="fw-bold text-dark">Usuario</h4>
                        <a class="btn btn-outline-success float-end" href="{{ url('/user/create') }}">Usuario Nuevo</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>CI</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Telefono</th>
                                        <th>Genero</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $user)
                                        <tr>
                                            <td>{{ $user->ci }}</td>
                                            <td>{{ $user->nombre }}</td> 
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->telefono }}</td>
                                            <td>
                                                @if ($user->genero == '1')
                                                    Femenino
                                                @else
                                                    Masculino
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ url('/user/' . $user->ci . '/edit') }}"
                                                        class="btn btn-warning">
                                                        Editar
                                                    </a>
                                                    <form action="{{ url('/user/' . $user->ci) }}"
                                                        method="post">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <input type="submit"
                                                            onclick="return confirm('¿Estas Seguro de Eliminarlo?')"
                                                            value="Eliminar" class="btn btn-danger">
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
    </div>
    <div class="card-footer">
        <?php
        session_start();
        if (isset($_SESSION['user_view'])) {
            $_SESSION['user_view'] = $_SESSION['user_view'] + 1;
        } else {
            $_SESSION['user_view'] = 1;
        }
        $x = $_SESSION['user_view'];
        ?>
    </div>
@endsection
