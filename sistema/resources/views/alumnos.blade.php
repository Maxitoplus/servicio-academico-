
@extends('layouts.app')

@section('title', 'Alumnos | Servicio Académico')

@section('content')

@php
    // DATOS DE PRUEBA
    // Posteriormente se conectarán a la base de datos.

    $nombres = [
        'Sofía Hernández',
        'Mateo García',
        'Valentina Ramírez',
        'Santiago López',
        'Camila Torres',
        'Diego Martínez',
        'Renata Flores',
        'Emiliano Ruiz',
        'Lucía Castro',
        'Sebastián Pérez',
        'Regina Morales',
        'Daniel Ortega',
        'Ximena Cruz',
        'Leonardo Vázquez',
        'Isabella Navarro',
        'Andrés Jiménez',
        'Natalia Romero',
        'Gael Castillo',
        'Mariana Reyes',
        'Rodrigo Silva',
        'Ana Medina',
        'Joaquín Aguilar',
        'Paola Mendoza',
        'Bruno Ríos'
    ];

    $alumnos = [];

    foreach ($nombres as $i => $nombre) {
        $alumnos[] = [
            'matricula' => 'ALU' . str_pad(
                $i + 1, 4, '0', STR_PAD_LEFT
            ),
            'nombre' => $nombre,
            'grado' => ($i % 6) + 1,
            'grupo' => $i % 2 === 0 ? 'A' : 'B',
            'estado' => 'Activo'
        ];
    }
@endphp

<section class="directory-page" id="directorioAlumnos">

    {{-- ENCABEZADO --}}
    <div class="head page-intro">
        <div>
            <span class="eyebrow">GESTIÓN ESCOLAR</span>

            <h1>Directorio de alumnos</h1>

            <p class="sub">
                Encuentra estudiantes de forma rápida
                y consulta su información.
            </p>
        </div>

        <span class="dashboard-chip">
            {{ count($alumnos) }} registros de ejemplo
        </span>
    </div>

    {{-- ESTADÍSTICAS --}}
    <div class="directory-summary">

        <div class="summary-tile">
            <span>Total de alumnos</span>
            <strong>{{ count($alumnos) }}</strong>
        </div>

        <div class="summary-tile">
            <span>Grados escolares</span>
            <strong>6</strong>
        </div>

        <div class="summary-tile">
            <span>Grupos disponibles</span>
            <strong>12</strong>
        </div>

    </div>

    {{-- DIRECTORIO --}}
    <div class="card directory-card">

        <div class="directory-heading">
            <h2>Buscar estudiante</h2>

            <p class="sub">
                Filtra los resultados por nombre,
                matrícula, grado o grupo.
            </p>
        </div>

        {{-- FORMULARIO DE BÚSQUEDA --}}
        <form id="formBuscarAlumnos"
              class="directory-filters"
              autocomplete="off">

            <div class="form-field search-field">

                <label for="buscarAlumno">
                    Nombre o matrícula
                </label>

                <input
                    type="search"
                    id="buscarAlumno"
                    placeholder="Escribe un nombre o matrícula..."
                    value="{{ request('buscar', '') }}">

            </div>

            <div class="form-field">

                <label for="gradoFiltro">
                    Grado
                </label>

                <select id="gradoFiltro">

                    <option value="">
                        Todos los grados
                    </option>

                    @for($grado = 1; $grado <= 6; $grado++)
                        <option value="{{ $grado }}">
                            {{ $grado }}° grado
                        </option>
                    @endfor

                </select>

            </div>

            <div class="form-field">

                <label for="grupoFiltro">
                    Grupo
                </label>

                <select id="grupoFiltro">

                    <option value="">
                        Todos los grupos
                    </option>

                    <option value="A">Grupo A</option>
                    <option value="B">Grupo B</option>

                </select>

            </div>

            <button
                type="submit"
                id="btnBuscarAlumnos"
                class="btn p">
                Buscar
            </button>

            <button
                type="button"
                id="btnLimpiarAlumnos"
                class="btn">
                Limpiar filtros
            </button>

        </form>

        {{-- MENSAJE DE FILTROS --}}
        <div id="mensajeFiltros"
             style="display:none;margin-bottom:18px;
                    padding:12px 15px;background:#e0f2fe;
                    color:#075985;border-radius:9px;
                    font-size:13px;">
        </div>

        {{-- TABLA DE ALUMNOS --}}
        <div class="tw">

            <table class="directory-table">

                <thead>
                    <tr>
                        <th>MATRÍCULA</th>
                        <th>ALUMNO</th>
                        <th>GRADO</th>
                        <th>GRUPO</th>
                        <th>ESTADO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>

                <tbody id="tablaAlumnos">

                    @foreach($alumnos as $alumno)

                        <tr
                            class="alumno-fila"
                            data-nombre="{{ $alumno['nombre'] }}"
                            data-matricula="{{ $alumno['matricula'] }}"
                            data-grado="{{ $alumno['grado'] }}"
                            data-grupo="{{ $alumno['grupo'] }}">

                            <td>
                                <span class="code-label">
                                    {{ $alumno['matricula'] }}
                                </span>
                            </td>

                            <td>
                                <div class="person-cell">

                                    <span class="person-avatar">
                                        {{ mb_substr($alumno['nombre'], 0, 1) }}
                                    </span>

                                    <strong>
                                        {{ $alumno['nombre'] }}
                                    </strong>

                                </div>
                            </td>

                            <td>
                                {{ $alumno['grado'] }}°
                            </td>

                            <td>
                                {{ $alumno['grupo'] }}
                            </td>

                            <td>
                                <span class="status-pill">
                                    {{ $alumno['estado'] }}
                                </span>
                            </td>

                            <td>
                                <button
                                    type="button"
                                    class="btn s"
                                    data-nombre="{{ $alumno['nombre'] }}"
                                    data-matricula="{{ $alumno['matricula'] }}"
                                    data-grado="{{ $alumno['grado'] }}"
                                    data-grupo="{{ $alumno['grupo'] }}"
                                    onclick="abrirFichaAlumno(this)">
                                    Ver ficha
                                </button>
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        {{-- MENSAJE SI NO HAY RESULTADOS --}}
        <div id="alumnosVacio"
             class="empty-message"
             style="display:none;">

            <h3>No encontramos alumnos</h3>

            <p>
                Intenta cambiar el nombre, la matrícula,
                el grado o el grupo.
            </p>

        </div>

        {{-- PAGINACIÓN --}}
        <div class="directory-pagination">

            <span id="alumnosConteo">
                Mostrando alumnos...
            </span>

            <div class="pagination-controls">

                <button
                    type="button"
                    id="alumnosAnterior"
                    class="btn s">
                    ← Anterior
                </button>

                <span id="alumnosPagina">
                    Página 1
                </span>

                <button
                    type="button"
                    id="alumnosSiguiente"
                    class="btn p s">
                    Siguiente →
                </button>

            </div>

        </div>

    </div>

</section>


{{-- FICHA DEL ALUMNO --}}
<div id="modalAlumno"
     class="student-modal"
     style="display:none;">

    <div class="student-modal-card"
         role="dialog"
         aria-modal="true"
         aria-labelledby="modalTitulo">

        <div class="modal-top">

            <h2 id="modalTitulo">
                Ficha del alumno
            </h2>

            <button
                type="button"
                class="modal-close"
                onclick="cerrarFichaAlumno()"
                aria-label="Cerrar ficha">
                ×
            </button>

        </div>

        <div class="student-profile">

            <div class="profile-avatar"
                 id="fichaInicial">
            </div>

            <div>
                <h3 id="fichaNombre"></h3>

                <span class="status-pill">
                    Activo
                </span>
            </div>

        </div>

        <div class="profile-details">

            <div>
                <span>Matrícula</span>
                <strong id="fichaMatricula"></strong>
            </div>

            <div>
                <span>Grado</span>
                <strong id="fichaGrado"></strong>
            </div>

            <div>
                <span>Grupo</span>
                <strong id="fichaGrupo"></strong>
            </div>

            <div>
                <span>Estado</span>
                <strong>Activo</strong>
            </div>

        </div>

        <p class="modal-note">
            Información de demostración.
        </p>

        <button
            type="button"
            class="btn p"
            onclick="cerrarFichaAlumno()">
            Cerrar ficha
        </button>

    </div>

</div>


{{-- JAVASCRIPT INTEGRADO --}}
<script>
(function () {

    function iniciarDirectorio() {

        const formulario =
            document.getElementById('formBuscarAlumnos');

        if (!formulario) return;

        const buscar =
            document.getElementById('buscarAlumno');

        const grado =
            document.getElementById('gradoFiltro');

        const grupo =
            document.getElementById('grupoFiltro');

        const limpiar =
            document.getElementById('btnLimpiarAlumnos');

        const anterior =
            document.getElementById('alumnosAnterior');

        const siguiente =
            document.getElementById('alumnosSiguiente');

        const conteo =
            document.getElementById('alumnosConteo');

        const paginaTexto =
            document.getElementById('alumnosPagina');

        const vacio =
            document.getElementById('alumnosVacio');

        const mensajeFiltros =
            document.getElementById('mensajeFiltros');

        const filas = Array.from(
            document.querySelectorAll('#tablaAlumnos .alumno-fila')
        );

        // CONFIGURACIÓN
        const POR_PAGINA = 10;

        let paginaActual = 1;

        // FILTROS APLICADOS
        let filtros = {
            texto: '',
            grado: '',
            grupo: ''
        };

        // NORMALIZAR TEXTO
        function normalizar(valor) {
            return String(valor || '')
                .toLocaleLowerCase('es')
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .trim();
        }

        // OBTENER RESULTADOS
        function obtenerResultados() {

            return filas.filter(function (fila) {

                const nombre = normalizar(
                    fila.dataset.nombre
                );

                const matricula = normalizar(
                    fila.dataset.matricula
                );

                const coincideTexto =
                    nombre.includes(filtros.texto) ||
                    matricula.includes(filtros.texto);

                const coincideGrado =
                    filtros.grado === '' ||
                    fila.dataset.grado === filtros.grado;

                const coincideGrupo =
                    filtros.grupo === '' ||
                    fila.dataset.grupo === filtros.grupo;

                return (
                    coincideTexto &&
                    coincideGrado &&
                    coincideGrupo
                );
            });
        }

        // ACTUALIZAR TABLA
        function actualizarTabla() {

            const resultados = obtenerResultados();

            const total = resultados.length;

            const totalPaginas = Math.max(
                1,
                Math.ceil(total / POR_PAGINA)
            );

            // VALIDAR NÚMERO DE PÁGINA
            paginaActual = Math.max(
                1,
                Math.min(paginaActual, totalPaginas)
            );

            // OCULTAR TODOS LOS REGISTROS
            filas.forEach(function (fila) {
                fila.style.display = 'none';
            });

            // CALCULAR RANGO
            const inicio =
                (paginaActual - 1) * POR_PAGINA;

            const fin = inicio + POR_PAGINA;

            // MOSTRAR SOLO LOS REGISTROS DE LA PÁGINA
            resultados
                .slice(inicio, fin)
                .forEach(function (fila) {
                    fila.style.display = '';
                });

            // MOSTRAR CONTEO
            const desde = total === 0 ? 0 : inicio + 1;
            const hasta = Math.min(fin, total);

            conteo.textContent =
                'Mostrando ' + desde + '-' +
                hasta + ' de ' + total + ' alumnos';

            paginaTexto.textContent =
                'Página ' + paginaActual +
                ' de ' + totalPaginas;

            // BOTONES
            anterior.disabled = paginaActual <= 1;

            siguiente.disabled =
                paginaActual >= totalPaginas;

            // SIN RESULTADOS
            vacio.style.display =
                total === 0 ? 'block' : 'none';
        }

        // APLICAR BÚSQUEDA
        function aplicarBusqueda() {

            filtros.texto = normalizar(buscar.value);
            filtros.grado = grado.value;
            filtros.grupo = grupo.value;

            paginaActual = 1;

            const hayFiltros =
                filtros.texto !== '' ||
                filtros.grado !== '' ||
                filtros.grupo !== '';

            if (hayFiltros) {

                mensajeFiltros.style.display = 'block';

                mensajeFiltros.textContent =
                    'Filtros aplicados. Puedes pulsar ' +
                    '"Limpiar filtros" para mostrar ' +
                    'nuevamente todos los alumnos.';

            } else {
                mensajeFiltros.style.display = 'none';
            }

            actualizarTabla();
        }

        // EVITAR QUE EL FORMULARIO RECARGUE
        formulario.addEventListener(
            'submit',
            function (evento) {

                evento.preventDefault();

                aplicarBusqueda();
            }
        );

        // LIMPIAR FILTROS
        limpiar.addEventListener(
            'click',
            function () {

                buscar.value = '';
                grado.value = '';
                grupo.value = '';

                filtros = {
                    texto: '',
                    grado: '',
                    grupo: ''
                };

                paginaActual = 1;

                mensajeFiltros.style.display = 'none';

                actualizarTabla();
            }
        );

        // SIGUIENTE
        siguiente.addEventListener(
            'click',
            function () {

                paginaActual++;

                actualizarTabla();
            }
        );

        // ANTERIOR
        anterior.addEventListener(
            'click',
            function () {

                paginaActual--;

                actualizarTabla();
            }
        );

        // SI VIENES DEL BUSCADOR DEL HOME
        if (buscar.value.trim() !== '') {
            aplicarBusqueda();
        } else {
            actualizarTabla();
        }
    }

    // INICIALIZAR
    if (document.readyState === 'loading') {
        document.addEventListener(
            'DOMContentLoaded',
            iniciarDirectorio
        );
    } else {
        iniciarDirectorio();
    }

})();


// ABRIR FICHA DEL ALUMNO
function abrirFichaAlumno(boton) {

    document.getElementById('fichaNombre')
        .textContent = boton.dataset.nombre;

    document.getElementById('fichaInicial')
        .textContent = boton.dataset.nombre.charAt(0);

    document.getElementById('fichaMatricula')
        .textContent = boton.dataset.matricula;

    document.getElementById('fichaGrado')
        .textContent = boton.dataset.grado + '°';

    document.getElementById('fichaGrupo')
        .textContent = boton.dataset.grupo;

    document.getElementById('modalAlumno')
        .style.display = 'flex';
}


// CERRAR FICHA
function cerrarFichaAlumno() {

    document.getElementById('modalAlumno')
        .style.display = 'none';
}


// CERRAR CON ESCAPE
document.addEventListener('keydown', function (evento) {

    if (evento.key === 'Escape') {
        cerrarFichaAlumno();
    }
});


// CERRAR AL HACER CLIC FUERA
document.addEventListener('click', function (evento) {

    const modal = document.getElementById('modalAlumno');

    if (modal && evento.target === modal) {
        cerrarFichaAlumno();
    }
});
</script>

@endsection
