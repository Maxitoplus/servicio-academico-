
@extends('layouts.app')

@section('title', 'Materias | Servicio Académico')

@section('content')

@php
$materias = [
    [
        'clave' => 'MAT001',
        'nombre' => 'Lenguajes',
        'area' => 'Comunicación',
        'grados' => [1, 2, 3, 4, 5, 6],
        'descripcion' => 'Desarrollo de habilidades de comunicación, lectura, escritura y expresión.'
    ],
    [
        'clave' => 'MAT002',
        'nombre' => 'Saberes y Pensamiento Científico',
        'area' => 'Ciencias',
        'grados' => [1, 2, 3, 4, 5, 6],
        'descripcion' => 'Exploración, razonamiento matemático y comprensión del entorno.'
    ],
    [
        'clave' => 'MAT003',
        'nombre' => 'Ética, Naturaleza y Sociedades',
        'area' => 'Sociedad',
        'grados' => [1, 2, 3, 4, 5, 6],
        'descripcion' => 'Reflexión ética, convivencia y relación con la naturaleza y la sociedad.'
    ],
    [
        'clave' => 'MAT004',
        'nombre' => 'De lo Humano y lo Comunitario',
        'area' => 'Comunidad',
        'grados' => [1, 2, 3, 4, 5, 6],
        'descripcion' => 'Bienestar personal, identidad, participación y vida comunitaria.'
    ],
];
@endphp

<section class="directory-page">

    <div class="head page-intro">
        <div>
            <span class="eyebrow">PLAN ACADÉMICO</span>
            <h1>Materias y campos formativos</h1>
            <p class="sub">
                Consulta la organización académica de la escuela.
            </p>
        </div>

        <span class="dashboard-chip">
            Educación primaria
        </span>
    </div>

    <div class="directory-summary">

        <div class="summary-tile">
            <span>Campos formativos</span>
            <strong>{{ count($materias) }}</strong>
        </div>

        <div class="summary-tile">
            <span>Grados escolares</span>
            <strong>6</strong>
        </div>

        <div class="summary-tile">
            <span>Estado del catálogo</span>
            <strong style="font-size:21px">Activo</strong>
        </div>

    </div>

    <div class="card directory-card">

        <div class="directory-heading">
            <h2>Catálogo académico</h2>
            <p class="sub">
                Busca campos formativos por nombre, clave o área.
            </p>
        </div>

        <form id="formMaterias"
              class="directory-filters">

            <div class="form-field search-field">
                <label for="buscarMateria">
                    Nombre o clave
                </label>

                <input type="search"
                       id="buscarMateria"
                       placeholder="Buscar materia...">
            </div>

            <div class="form-field">
                <label for="gradoMateria">
                    Grado
                </label>

                <select id="gradoMateria">
                    <option value="">Todos los grados</option>
                    @for($i = 1; $i <= 6; $i++)
                        <option value="{{ $i }}">
                            {{ $i }}° grado
                        </option>
                    @endfor
                </select>
            </div>

            <button type="submit" class="btn p">
                Buscar
            </button>

            <button type="button"
                    class="btn"
                    id="limpiarMaterias">
                Limpiar filtros
            </button>

        </form>

        <div class="tw">
            <table class="directory-table">

                <thead>
                    <tr>
                        <th>CLAVE</th>
                        <th>NOMBRE</th>
                        <th>ÁREA</th>
                        <th>GRADOS</th>
                        <th>ESTADO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>

                <tbody id="tablaMaterias">

                    @foreach($materias as $materia)
                        <tr class="materia-fila"
                            data-clave="{{ $materia['clave'] }}"
                            data-nombre="{{ $materia['nombre'] }}"
                            data-area="{{ $materia['area'] }}"
                            data-grados="{{ implode(',', $materia['grados']) }}">

                            <td>
                                <span class="code-label">
                                    {{ $materia['clave'] }}
                                </span>
                            </td>

                            <td>
                                <strong>{{ $materia['nombre'] }}</strong>
                            </td>

                            <td>{{ $materia['area'] }}</td>

                            <td>1° a 6°</td>

                            <td>
                                <span class="status-pill">
                                    Activa
                                </span>
                            </td>

                            <td>
                                <button type="button"
                                        class="btn s ver-materia"
                                        data-materia='@json($materia)'>
                                    Ver detalles
                                </button>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <p class="empty-message"
           id="materiasVacio"
           hidden>
            No se encontraron materias.
        </p>

        <div class="directory-pagination">
            <span id="contadorMaterias"></span>

            <span class="dashboard-chip">
                Catálogo demostrativo
            </span>
        </div>

    </div>

</section>

{{-- VENTANA DE DETALLES --}}
<div class="student-modal"
     id="modalMateria"
     hidden>

    <div class="student-modal-card"
         role="dialog"
         aria-modal="true"
         aria-labelledby="tituloMateria">

        <div class="modal-top">

            <h2 id="tituloMateria">
                Detalles de la materia
            </h2>

            <button type="button"
                    class="modal-close"
                    id="cerrarMateria"
                    aria-label="Cerrar">
                ×
            </button>

        </div>

        <div class="student-profile">
            <span class="profile-avatar">M</span>

            <div>
                <h3 id="materiaNombre"></h3>
                <span class="status-pill">Activa</span>
            </div>
        </div>

        <div class="profile-details">

            <div>
                <span>Clave</span>
                <strong id="materiaClave"></strong>
            </div>

            <div>
                <span>Área</span>
                <strong id="materiaArea"></strong>
            </div>

            <div>
                <span>Grados</span>
                <strong id="materiaGrados"></strong>
            </div>

            <div>
                <span>Estado</span>
                <strong>Activa</strong>
            </div>

        </div>

        <h3>Descripción</h3>

        <p id="materiaDescripcion"
           class="sub">
        </p>

        <button type="button"
                class="btn p"
                id="cerrarMateriaAbajo">
            Cerrar
        </button>

    </div>

</div>

<style>
#modalMateria[hidden],
#materiasVacio[hidden] {
    display: none !important;
}

#tablaMaterias td:nth-child(2) {
    min-width: 240px;
}

#tablaMaterias .ver-materia {
    white-space: nowrap;
}

#materiaDescripcion {
    line-height: 1.7;
}
</style>

<script>
(function () {

    function iniciarMaterias() {

        const formulario = document.getElementById('formMaterias');
        if (!formulario) return;

        const buscar = document.getElementById('buscarMateria');
        const grado = document.getElementById('gradoMateria');
        const limpiar = document.getElementById('limpiarMaterias');
        const contador = document.getElementById('contadorMaterias');
        const vacio = document.getElementById('materiasVacio');
        const modal = document.getElementById('modalMateria');

        const filas = Array.from(
            document.querySelectorAll('.materia-fila')
        );

        function normalizar(texto) {
            return String(texto || '')
                .toLocaleLowerCase('es')
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .trim();
        }

        function filtrar() {
            const texto = normalizar(buscar.value);
            let visibles = 0;

            filas.forEach(fila => {
                const nombre = normalizar(fila.dataset.nombre);
                const clave = normalizar(fila.dataset.clave);
                const area = normalizar(fila.dataset.area);
                const grados = fila.dataset.grados.split(',');

                const coincideTexto =
                    nombre.includes(texto) ||
                    clave.includes(texto) ||
                    area.includes(texto);

                const coincideGrado =
                    !grado.value ||
                    grados.includes(grado.value);

                const mostrar = coincideTexto && coincideGrado;

                fila.hidden = !mostrar;
                fila.style.display = mostrar ? '' : 'none';

                if (mostrar) visibles++;
            });

            contador.textContent =
                `Mostrando ${visibles} de ${filas.length} registros`;

            vacio.hidden = visibles > 0;
        }

        formulario.addEventListener('submit', evento => {
            evento.preventDefault();
            filtrar();
        });

        limpiar.addEventListener('click', () => {
            buscar.value = '';
            grado.value = '';
            filtrar();
        });

        function cerrarModal() {
            modal.hidden = true;
        }

        document.querySelectorAll('.ver-materia')
            .forEach(boton => {
                boton.addEventListener('click', () => {
                    const materia = JSON.parse(
                        boton.dataset.materia
                    );

                    document.getElementById('materiaNombre')
                        .textContent = materia.nombre;

                    document.getElementById('materiaClave')
                        .textContent = materia.clave;

                    document.getElementById('materiaArea')
                        .textContent = materia.area;

                    document.getElementById('materiaGrados')
                        .textContent = materia.grados.join('°, ') + '°';

                    document.getElementById('materiaDescripcion')
                        .textContent = materia.descripcion;

                    modal.hidden = false;
                });
            });

        document.getElementById('cerrarMateria')
            .addEventListener('click', cerrarModal);

        document.getElementById('cerrarMateriaAbajo')
            .addEventListener('click', cerrarModal);

        modal.addEventListener('click', evento => {
            if (evento.target === modal) cerrarModal();
        });

        document.addEventListener('keydown', evento => {
            if (evento.key === 'Escape') cerrarModal();
        });

        filtrar();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', iniciarMaterias);
    } else {
        iniciarMaterias();
    }

})();
</script>

@endsection
