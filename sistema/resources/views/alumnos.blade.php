{{-- resources/views/alumnos.blade.php --}}
@extends('layouts.app')

@section('title', 'Gestión de Alumnos')

@section('content')
    <div class="head">
        <div>
            <h1>Módulo de Alumnos</h1>
            <p class="sub">Registro y control de la matrícula escolar.</p>
        </div>
    </div>

    <!-- Formulario de Registro (Reutilizando el CSS de tu equipo) -->
    <section class="card">
        <caption><h3>Registrar Nuevo Alumno</h3></caption>
        <form>
            <div class="g">
                <label>Matrícula
                    <input type="text" placeholder="Ej. A005" required>
                </label>
                <label>Nombre Completo
                    <input type="text" placeholder="Nombre del alumno" required>
                </label>
                <label>Grupo
                    <select>
                        <option>1° A</option>
                        <option>2° B</option>
                        <option>3° A</option>
                    </select>
                </label>
            </div>
            <br>
            <button type="submit" class="btn p">Guardar Alumno</button>
        </form>
    </section>

    <!-- Tabla de Alumnos (Reutilizando el CSS de tu equipo) -->
    <section class="card tw">
        <table>
            <caption>Lista de Alumnos Inscritos</caption>
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Nombre</th>
                    <th>Grupo</th>
                    <th>Estado de Pago</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>A001</td>
                    <td>Ana Torres</td>
                    <td>3° A</td>
                    <td><span class="st Pagado">Pagado</span></td>
                </tr>
                <tr>
                    <td>A002</td>
                    <td>Luis Pérez</td>
                    <td>3° A</td>
                    <td><span class="st Pendiente">Pendiente</span></td>
                </tr>
                <tr>
                    <td>A003</td>
                    <td>Marta Ruiz</td>
                    <td>2° B</td>
                    <td><span class="st Vencido">Vencido</span></td>
                </tr>
            </tbody>
        </table>
    </section>
@endsection
