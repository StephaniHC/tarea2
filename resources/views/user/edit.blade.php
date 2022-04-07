@extends('layouts.app')

@section('content')
    <div class="container justify-content-center py-4">
        <div class="row">
            <div class="col-xs|sm|md|lg|xl-1-12">
                <div class="card bg-light border border-2" style="padding: 30px;">
                    <div class="card-header">
                        <h4 class="fw-bold">Editar Usuario: {{ $user->ci }}</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/user/' . $user->ci) }}" class="row g-3">
                            @csrf
                            {{ method_field('PUT') }}

                            <br>

                            <br />
                            <div class="row mb-3">
                                <label for="nombre" class="col-md-2 col-form-label ">Nombre</label>
                                <div class="col-md-10">
                                    <input type="text" name="nombre" id="nombre" class="form-control" required
                                        value="{{ $user->nombre }}">
                                </div>
                            </div>
                            <br>
                            <br />
                            <div class="row mb-3">
                                <label for="email" class="col-md-2 col-form-label ">Email</label>
                                <div class="col-md-10">
                                    <input type="email" name="email" id="email" class="form-control" required
                                        value="{{ $user->email }}">
                                        @if ($errors->has('email'))
                                        <span class= "error text-danger" for = "input-email"> {{$errors->first('email')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <br />
                            <div class="row mb-3">
                                <label for="telefono" class="col-md-2 col-form-label ">Telefono</label>
                                <div class="col-md-10">
                                    <input type="number" name="telefono" id="telefono" class="form-control" required
                                        value="{{ $user->telefono }}">
                                </div>
                            </div> 
                            <div class="row mb-0">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <div class="col-md-10 offset-md-2">
                                        <input type="submit" value="Guardar Datos" class="btn btn-success">
                                        <a href="{{ url('/user') }}" class="btn btn-primary">
                                            Cancelar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <?php
        session_start();
        if (isset($_SESSION['user_view_edit'])) {
            $_SESSION['user_view_edit'] = $_SESSION['user_view_edit'] + 1;
        } else {
            $_SESSION['user_view_edit'] = 1;
        }
        $x = $_SESSION['user_view_edit'];
        ?>
    </div>
@endsection
