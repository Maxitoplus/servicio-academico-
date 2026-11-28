
@extends('layouts.app')

@section('title', 'Inicio | Servicio Académico')

@section('content')

<section class="dashboard-page">

    {{-- ENCABEZADO --}}
    <div class="head page-intro">
        <div>
            <span class="eyebrow">PANEL DE CONTROL</span>

            <h1>Bienvenido a Servicio Académico</h1>

            <p class="sub">
                Gestiona la información escolar desde un solo lugar.
            </p>
        </div>

        <span class="dashboard-chip">
            Ciclo escolar 2026–2027
        </span>
    </div>

    {{-- BUSCADOR PRINCIPAL --}}
    <section class="search-hero">
        <div class="search-hero-content">
            <span class="hero-tag">ACCESO RÁPIDO</span>

            <h2>¿A quién necesitas encontrar?</h2>

            <p>
                Busca a cualquier alumno por nombre o matrícula
                y consulta su información escolar.
            </p>

            <form action="{{ route('alumnos') }}"
                  method="GET"
                  class="hero-search">

                <input
                    type="search"
                    name="buscar"
                    placeholder="Ej. Sofía Hernández o ALU0001"
                    aria-label="Buscar alumno"
                    required>

                <button type="submit" class="btn p">
                    Buscar alumno
                </button>
            </form>
        </div>

        <div class="hero-decoration" aria-hidden="true">
            <span>SA</span>
        </div>
    </section>

    {{-- INDICADORES --}}
    <div class="section-heading">
        <h2>Resumen escolar</h2>
        <span>Datos de demostración</span>
    </div>

    <div class="kpis">

        <article class="card kpi dashboard-kpi">
            <div class="kpi-symbol students">A</div>
            <span>Alumnos activos</span>
            <b>4</b>
            <small>Estudiantes registrados</small>
        </article>

        <article class="card kpi dashboard-kpi">
            <div class="kpi-symbol teachers">D</div>
            <span>Docentes</span>
            <b>3</b>
            <small>Personal académico</small>
        </article>

        <article class="card kpi dashboard-kpi">
            <div class="kpi-symbol payments">$</div>
            <span>Pagos pendientes</span>
            <b>2</b>
            <small>Movimientos por revisar</small>
        </article>

    </div>

    {{-- ACCESOS PRINCIPALES --}}
    <div class="section-heading">
        <h2>Accesos rápidos</h2>
        <span>Selecciona un módulo</span>
    </div>

    <div class="module-grid">

        <a href="{{ route('alumnos') }}" class="module-card">
            <span class="module-icon">01</span>
            <h3>Alumnos</h3>
            <p>
                Busca estudiantes y consulta sus expedientes.
            </p>
            <strong>Consultar alumnos →</strong>
        </a>

        <a href="{{ route('docentes') }}" class="module-card">
            <span class="module-icon">02</span>
            <h3>Docentes</h3>
            <p>
                Consulta el personal docente y sus asignaciones.
            </p>
            <strong>Ver docentes →</strong>
        </a>

        <a href="{{ route('grupos') }}" class="module-card">
            <span class="module-icon">03</span>
            <h3>Grupos</h3>
            <p>
                Revisa la organización de los grupos escolares.
            </p>
            <strong>Consultar grupos →</strong>
        </a>

        <a href="{{ route('materias') }}" class="module-card">
            <span class="module-icon">04</span>
            <h3>Materias</h3>
            <p>
                Visualiza la información de las asignaturas.
            </p>
            <strong>Ver materias →</strong>
        </a>

        <a href="{{ route('pagos') }}" class="module-card">
            <span class="module-icon">05</span>
            <h3>Pagos</h3>
            <p>
                Consulta movimientos y pagos escolares.
            </p>
            <strong>Consultar pagos →</strong>
        </a>

    </div>

    <div class="notice-soft">
        Este panel conserva las rutas originales del proyecto.
        Las cifras se muestran como datos de ejemplo hasta
        conectar los módulos con la base de datos.
    </div>

</section>

@endsection
