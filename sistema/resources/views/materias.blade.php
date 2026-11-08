{{-- resources/views/materias.blade.php --}}
@extends('layouts.app')

@section('title', 'Gestión de Materias')

@section('content')
    <div class="head">
        <div>
            <h1>Módulo de Materias</h1>
            <p class="sub">Catálogo de asignaturas y asignación por grados.</p>
        </div>
        <button class="btn p">+ Nueva Materia</button>
    </div>

    <!-- Formulario de Registro de Asignaturas -->
    <section class="card">
        <caption><h3>Registrar Nueva Asignatura</h3></caption>
        <form>
            <div class="g">
                <label>Clave de la Materia
                    <input type="text" placeholder="Ej. MAT-3A" required>
                </label>
                <label>Nombre de la Asignatura
                    <input type="text" placeholder="Ej. Matemáticas III" required>
                </label>
                <label>Grado al que aplica
                    <select required>
                        <option>1° Grado</option>
                        <option>2° Grado</option>
                        <option>3° Grado</option>
                    </select>
                </label>
            </div>
            <br>
            <button type="submit" class="btn p">Guardar Materia</button>
        </form>
    </section>

    <!-- Tabla de Materias (Datos extraídos del prototipo de tu equipo) -->
    <section class="card tw">
        <table>
            <caption>Asignaturas Vigentes</caption>
            <thead>
                <tr>
                    <th>Nombre de la Materia</th>
                    <th>Grado Destino</th>
                    <th>Docente Titular Asignado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Matemáticas</td>
                    <td>3° Grado</td>
                    <td>Sofía Luna</td>
                </tr>
                <tr>
                    <td>Español</td>
                    <td>3° Grado</td>
                    <td>Laura Ramos</td>
                </tr>
                <tr>
                    <td>Ciencias</td>
                    <td>2° Grado</td>
                    <td>Pedro Gil</td>
                </tr>
            </tbody>
        </table>
    </section>
@endsection
