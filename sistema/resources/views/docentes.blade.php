
@extends('layouts.app')

@section('title', 'Docentes | Servicio Académico')

@section('content')

@php
    $docentes = [
        ['clave' => 'DOC001', 'nombre' => 'María González',
         'grupo' => '1° A', 'cargo' => 'Docente titular'],

        ['clave' => 'DOC002', 'nombre' => 'Juan Rodríguez',
         'grupo' => '2° B', 'cargo' => 'Docente titular'],

        ['clave' => 'DOC003', 'nombre' => 'Ana Martínez',
         'grupo' => '3° A', 'cargo' => 'Docente titular'],

        ['clave' => 'DOC004', 'nombre' => 'Carlos Ramírez',
         'grupo' => '4° B', 'cargo' => 'Docente titular'],

        ['clave' => 'DOC005', 'nombre' => 'Laura Hernández',
         'grupo' => '5° A', 'cargo' => 'Docente titular'],

        ['clave' => 'DOC006', 'nombre' => 'Pedro López',
         'grupo' => '6° B', 'cargo' => 'Docente titular'],
    ];
@endphp

<section class="directory-page">

    <div class="head page-intro">
        <div>
            <span class="eyebrow">PERSONAL ACADÉMICO</span>

            <h1>Directorio de docentes</h1>

            <p class="sub">
                Consulta a los docentes y sus grupos asignados.
            </p>
        </div>

        <span class="dashboard-chip">
            Personal académico
        </span>
    </div>

    <div class="directory-summary">
        <div class="summary-tile">
            <span>Docentes de ejemplo</span>
            <strong>{{ count($docentes) }}</strong>
        </div>

        <div class="summary-tile">
            <span>Grupos asignados</span>
            <strong>6</strong>
        </div>

        <div class="summary-tile">
            <span>Estado</span>
            <strong>Activos</strong>
        </div>
    </div>

    <div class="card directory-card">

        <div class="directory-heading">
            <div>
                <h2>Personal docente</h2>
                <p class="sub">
                    Busca por nombre, clave o grupo asignado.
                </p>
            </div>
        </div>

        <div class="directory-filters">

            <div class="form-field search-field">
                <label for="buscarDocente">Buscar docente</label>

                <input
                    type="search"
                    id="buscarDocente"
                    placeholder="Nombre, clave o grupo...">
            </div>

            <div class="form-field">
                <label for="grupoDocente">Grado asignado</label>

                <select id="grupoDocente">
                    <option value="">Todos</option>

                    @for($i = 1; $i <= 6; $i++)
                        <option value="{{ $i }}">
                            {{ $i }}°
                        </option>
                    @endfor
                </select>
            </div>

        </div>

        <div class="tw">

            <table class="directory-table">

                <thead>
                    <tr>
                        <th>CLAVE</th>
                        <th>DOCENTE</th>
                        <th>GRUPO</th>
                        <th>CARGO</th>
                        <th>ESTADO</th>
                    </tr>
                </thead>

                <tbody id="tablaDocentes">

                    @foreach($docentes as $docente)
                        <tr
                            class="docente-fila"
                            data-grado="{{ substr($docente['grupo'], 0, 1) }}">

                            <td>
                                <span class="code-label">
                                    {{ $docente['clave'] }}
                                </span>
                            </td>

                            <td>
                                <div class="person-cell">
                                    <span class="person-avatar">
                                        {{ mb_substr($docente['nombre'], 0, 1) }}
                                    </span>

                                    <strong>{{ $docente['nombre'] }}</strong>
                                </div>
                            </td>

                            <td>{{ $docente['grupo'] }}</td>
                            <td>{{ $docente['cargo'] }}</td>

                            <td>
                                <span class="status-pill">
                                    Activo
                                </span>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>

        <p id="docentesVacio"
           class="empty-message"
           hidden>
            No se encontraron docentes.
        </p>

    </div>

</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const buscar = document.getElementById('buscarDocente');
    const grado = document.getElementById('grupoDocente');
    const filas = document.querySelectorAll('.docente-fila');
    const vacio = document.getElementById('docentesVacio');

    function filtrarDocentes() {
        const texto = buscar.value.toLocaleLowerCase().trim();
        let visibles = 0;

        filas.forEach(fila => {
            const coincideTexto = fila.textContent
                .toLocaleLowerCase().includes(texto);

            const coincideGrado = !grado.value ||
                fila.dataset.grado === grado.value;

            const mostrar = coincideTexto && coincideGrado;

            fila.hidden = !mostrar;
            fila.style.display = mostrar ? '' : 'none';

            if (mostrar) visibles++;
        });

        vacio.hidden = visibles !== 0;
    }

    buscar.addEventListener('input', filtrarDocentes);
    grado.addEventListener('change', filtrarDocentes);
});
</script>
@endpush
