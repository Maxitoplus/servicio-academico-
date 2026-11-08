{{-- resources/views/grupos.blade.php --}}
@extends('layouts.app')

@section('title', 'Gestión de Grupos')

@section('content')
    <div class="head">
        <div>
            <h1>Módulo de Grupos</h1>
            <p class="sub">Control de secciones, capacidades y tutores asignados.</p>
        </div>
        <button class="btn p">+ Nuevo Grupo</button>
    </div>

    <!-- Asignación Rápida de Tutor (Requerimiento de la Rúbrica) -->
    <section class="card">
        <caption><h3>Asignación Rápida de Tutor</h3></caption>
        <form>
            <div class="g">
                <label>Seleccionar Grupo
                    <select required>
                        <option value="">-- Selecciona --</option>
                        <option>1° A</option>
                        <option>2° B</option>
                        <option>3° A</option>
                    </select>
                </label>
                <label>Elegir Maestro Tutor
                    <select required>
                        <option value="">-- Selecciona --</option>
                        <option>Laura Ramos</option>
                        <option>Pedro Gil</option>
                        <option>Sofía Luna</option>
                    </select>
                </label>
            </div>
            <br>
            <button type="submit" class="btn">Confirmar Asignación</button>
        </form>
    </section>

    <!-- Tabla de Grupos (Datos del prototipo) -->
    <section class="card tw">
        <table>
            <caption>Lista de Grupos Activos</caption>
            <thead>
                <tr>
                    <th>Grado y Grupo</th>
                    <th>Alumnos Inscritos</th>
                    <th>Maestro Tutor Asignado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1° A</td>
                    <td>28 alumnos</td>
                    <td>Laura Ramos</td>
                </tr>
                <tr>
                    <td>2° B</td>
                    <td>25 alumnos</td>
                    <td>Pedro Gil</td>
                </tr>
                <tr>
                    <td>3° A</td>
                    <td>30 alumnos</td>
                    <td>Sofía Luna</td>
                </tr>
            </tbody>
        </table>
    </section>
@endsection
