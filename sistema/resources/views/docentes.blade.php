{{-- resources/views/docentes.blade.php --}}
@extends('layouts.app')

@section('title', 'Gestión de Docentes')

@section('content')
    <div class="head">
        <div>
            <h1>Módulo de Docentes</h1>
            <p class="sub">Registro y asignación de la plantilla de profesores.</p>
        </div>
    </div>

    <!-- Formulario de Registro de Profesores -->
    <section class="card">
        <caption><h3>Registrar Nuevo Docente</h3></caption>
        <form>
            <div class="g">
                <label>Nombre Completo
                    <input type="text" placeholder="Nombre del maestro" required>
                </label>
                <label>Materia Principal
                    <input type="text" placeholder="Ej. Matemáticas, Ciencias..." required>
                </label>
                <label>Estatus
                    <select>
                        <option>Activo</option>
                        <option>Inactivo</option>
                    </select>
                </label>
            </div>
            <br>
            <button type="submit" class="btn p">Guardar Docente</button>
        </form>
    </section>

    <!-- Tabla de Docentes -->
    <section class="card tw">
        <table>
            <caption>Lista de Profesores Activos</caption>
            <thead>
                <tr>
                    <th>Nombre del Docente</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Laura Ramos</td>
                    <td><span class="st Activo">Activo</span></td>
                </tr>
                <tr>
                    <td>Pedro Gil</td>
                    <td><span class="st Activo">Activo</span></td>
                </tr>
                <tr>
                    <td>Sofía Luna</td>
                    <td><span class="st Activo">Activo</span></td>
                </tr>
            </tbody>
        </table>
    </section>
@endsection
