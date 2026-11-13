<{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'Inicio - Sistema de Gestión Escolar')

@section('content')
    <div class="head">
        <div>
            <h1>Panel principal</h1>
            <p class="sub">Resumen general del estado escolar.</p>
        </div>
    </div>

    <!-- Indicadores KPIs del prototipo -->
    <section class="kpis" aria-label="Indicadores">
        <article class="card kpi">
            <b>4</b>
            <span>Alumnos activos</span>
        </article>
        <article class="card kpi">
            <b>2</b>
            <span>Pagos pendientes</span>
        </article>
        <article class="card kpi">
            <b>3</b>
            <span>Docentes</span>
        </article>
    </section>

    <section class="card">
        <h2>Accesos rápidos del sistema</h2>
        <p>Utiliza el menú lateral para gestionar los expedientes, revisar las materias asignadas o auditar el estado de los pagos vigentes.</p>
    </section>
@endsection
