@extends('layouts.app')

@section('content')
    <div class="container justify-content-center py-4">
        <div class="row">
            <div class="col-xs|sm|md|lg|xl-1-12">
                <div class="card bg-light border border-2" style="padding: 30px;">
                    <div class="card-header">
                        <h4 class="fw-bold">Registrar Usuario</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/user') }}">
                            @csrf
                            <div class="row mb-2">
                                <label for="ci" class="col-md-2 col-form-label ">CI </label>
                                <div class="col-md-10">
                                    <input type="number" name="ci" placeholder="8479154" class="form-control" min="1"
                                        step="1" required>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="nombre" class="col-md-2 col-form-label ">Nombre </label>
                                <div class="col-md-10">
                                    <input type="text" name="nombre" id="nombre" placeholder="Pepito Perez"
                                        class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="email" class="col-md-2 col-form-label ">Email </label>
                                <div class="col-md-10">
                                    <input type="email" name="email" id="email" placeholder="Pepito@gmail.com"
                                        class="form-control" required>
                                    @if ($errors->has('email'))
                                        <span class= "error text-danger" for = "input-email"> {{$errors->first('email')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="telefono" class="col-md-2 col-form-label ">Telefono </label>
                                <div class="col-md-10">
                                    <input type="number" name="telefono" id="telefono" placeholder="74874877"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="genero" class="col-md-2 col-form-label ">Genero </label>
                                <div class="col-md-10">
                                    <select class="form-control" id="genero" name="genero" required>
                                        <option value="1">Femenino</option>
                                        <option value="2">Masculino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="contrasenia" class="col-md-2 col-form-label ">Contraseña </label>
                                <div class="col-md-10">
                                    <input type="password" name="password" id="password" placeholder="*********"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-10 offset-md-2">
                                    <input type="submit" value="Guardar Datos" class="btn btn-success" required>
                                    <a href="{{ url('/user') }}" class="btn btn-primary">
                                        Cancelar
                                    </a>
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
        if (isset($_SESSION['user_view_create'])) {
            $_SESSION['user_view_create'] = $_SESSION['user_view_create'] + 1;
        } else {
            $_SESSION['user_view_create'] = 1;
        }
        $x = $_SESSION['user_view_create'];
        ?>
    </div>
@endsection
