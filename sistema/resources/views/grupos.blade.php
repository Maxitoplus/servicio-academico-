
@extends('layouts.app')

@section('title', 'Grupos | Servicio Académico')

@section('content')

@php
$grupos = [];

for ($grado = 1; $grado <= 6; $grado++) {
    foreach (['A', 'B'] as $letra) {
        $grupos[] = [
            'clave' => 'GRP-' . $grado . $letra,
            'grado' => $grado,
            'grupo' => $letra,
            'nombre' => $grado . '° ' . $letra,
            'turno' => 'Matutino',
            'alumnos' => 18 + (($grado * 3 + ord($letra)) % 8),
            'estado' => 'Activo'
        ];
    }
}
@endphp

<section class="directory-page" id="moduloGrupos">

    <div class="head page-intro">
        <div>
            <span class="eyebrow">ORGANIZACIÓN ACADÉMICA</span>
            <h1>Grupos escolares</h1>
            <p class="sub">
                Consulta los grados y grupos de la institución.
            </p>
        </div>

        <span class="dashboard-chip">
            Ciclo escolar 2026–2027
        </span>
    </div>

    <div class="directory-summary">
        <div class="summary-tile">
            <span>Grupos registrados</span>
            <strong>{{ count($grupos) }}</strong>
        </div>

        <div class="summary-tile">
            <span>Grados escolares</span>
            <strong>6</strong>
        </div>

        <div class="summary-tile">
            <span>Turno</span>
            <strong style="font-size:21px">Matutino</strong>
        </div>
    </div>

    <div class="card directory-card">

        <div class="directory-heading">
            <h2>Consultar grupos</h2>
            <p class="sub">
                Encuentra un grupo por grado, letra o clave.
            </p>
        </div>

        <form id="formBuscarGrupos"
              class="directory-filters">

            <div class="form-field search-field">
                <label for="buscarGrupo">
                    Nombre o clave del grupo
                </label>
                <input id="buscarGrupo"
                       type="search"
                       placeholder="Ej. 3° A o GRP-3A">
            </div>

            <div class="form-field">
                <label for="filtroGradoGrupo">Grado</label>
                <select id="filtroGradoGrupo">
                    <option value="">Todos los grados</option>
                    @for($i = 1; $i <= 6; $i++)
                        <option value="{{ $i }}">
                            {{ $i }}° grado
                        </option>
                    @endfor
                </select>
            </div>

            <div class="form-field">
                <label for="filtroLetraGrupo">Grupo</label>
                <select id="filtroLetraGrupo">
                    <option value="">Todos</option>
                    <option value="A">Grupo A</option>
                    <option value="B">Grupo B</option>
                </select>
            </div>

            <button type="submit" class="btn p">
                Buscar
            </button>

            <button type="button"
                    class="btn"
                    id="limpiarGrupos">
                Limpiar filtros
            </button>
        </form>

        <div class="grupos-grid" id="listaGrupos">

            @foreach($grupos as $grupo)

                <article class="grupo-card"
                         data-nombre="{{ $grupo['nombre'] }}"
                         data-clave="{{ $grupo['clave'] }}"
                         data-grado="{{ $grupo['grado'] }}"
                         data-grupo="{{ $grupo['grupo'] }}">

                    <div class="grupo-card-top">
                        <span class="grupo-avatar">
                            {{ $grupo['grado'] }}{{ $grupo['grupo'] }}
                        </span>
                        <span class="status-pill">
                            Activo
                        </span>
                    </div>

                    <h3>{{ $grupo['grado'] }}° {{ $grupo['grupo'] }}</h3>
                    <p>Grupo de educación primaria</p>

                    <div class="grupo-info">
                        <span>Clave</span>
                        <strong>{{ $grupo['clave'] }}</strong>
                    </div>

                    <div class="grupo-info">
                        <span>Turno</span>
                        <strong>{{ $grupo['turno'] }}</strong>
                    </div>

                    <div class="grupo-info">
                        <span>Alumnos</span>
                        <strong>{{ $grupo['alumnos'] }}</strong>
                    </div>

                    <button type="button"
                            class="btn p grupo-ver"
                            data-grupo='@json($grupo)'>
                        Ver detalles
                    </button>

                </article>

            @endforeach

        </div>

        <p id="gruposSinResultados"
           class="empty-message"
           hidden>
            No encontramos grupos con esos filtros.
        </p>

        <div class="directory-pagination">
            <span id="contadorGrupos"></span>
            <span class="dashboard-chip">
                Información de demostración
            </span>
        </div>

    </div>

</section>

{{-- VENTANA DE DETALLES --}}
<div class="student-modal"
     id="modalGrupo"
     hidden>

    <div class="student-modal-card"
         role="dialog"
         aria-modal="true"
         aria-labelledby="tituloModalGrupo">

        <div class="modal-top">
            <h2 id="tituloModalGrupo">
                Detalles del grupo
            </h2>

            <button type="button"
                    class="modal-close"
                    id="cerrarModalGrupo"
                    aria-label="Cerrar">
                ×
            </button>
        </div>

        <div class="student-profile">
            <span class="profile-avatar" id="grupoInicial">
            </span>

            <div>
                <h3 id="grupoNombre"></h3>
                <span class="status-pill">Activo</span>
            </div>
        </div>

        <div class="profile-details">
            <div>
                <span>Clave</span>
                <strong id="grupoClave"></strong>
            </div>
            <div>
                <span>Grado</span>
                <strong id="grupoGrado"></strong>
            </div>
            <div>
                <span>Turno</span>
                <strong id="grupoTurno"></strong>
            </div>
            <div>
                <span>Alumnos</span>
                <strong id="grupoTotal"></strong>
            </div>
        </div>

        <p class="modal-note">
            Esta información es de ejemplo.
            Los alumnos reales se consultarán
            cuando se conecte la base de datos.
        </p>

        <button type="button"
                class="btn p"
                id="botonCerrarGrupo">
            Cerrar
        </button>

    </div>
</div>

<style>
.grupos-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 18px;
    margin-top: 10px;
}

.grupo-card {
    background: #ffffff;
    border: 1px solid #dce5ec;
    border-radius: 15px;
    padding: 22px;
    transition: box-shadow .2s, transform .2s;
}

.grupo-card:hover {
    box-shadow: 0 8px 24px rgba(15, 50, 70, .08);
    transform: translateY(-2px);
}

.grupo-card-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
}

.grupo-avatar {
    display: grid;
    place-items: center;
    background: #e0f2fe;
    color: #075985;
    width: 51px;
    height: 51px;
    border-radius: 13px;
    font-weight: 800;
    font-size: 18px;
}

.grupo-card h3 {
    font-size: 22px;
    margin: 18px 0 5px;
}

.grupo-card p {
    color: #718096;
    font-size: 13px;
    margin-bottom: 20px;
}

.grupo-info {
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #edf2f7;
    padding: 11px 0;
    gap: 12px;
}

.grupo-info span {
    color: #718096;
}

.grupo-info strong {
    color: #203447;
}

.grupo-ver {
    width: 100%;
    margin-top: 19px;
}

#modalGrupo[hidden],
#gruposSinResultados[hidden] {
    display: none !important;
}

@media(max-width:1050px) {
    .grupos-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media(max-width:650px) {
    .grupos-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
(function () {
    function iniciarGrupos() {

        const form = document.getElementById('formBuscarGrupos');
        if (!form) return;

        const buscar = document.getElementById('buscarGrupo');
        const grado = document.getElementById('filtroGradoGrupo');
        const letra = document.getElementById('filtroLetraGrupo');
        const limpiar = document.getElementById('limpiarGrupos');
        const contador = document.getElementById('contadorGrupos');
        const vacio = document.getElementById('gruposSinResultados');
        const modal = document.getElementById('modalGrupo');

        const tarjetas = Array.from(
            document.querySelectorAll('.grupo-card')
        );

        function normalizar(texto) {
            return String(texto || '')
                .toLocaleLowerCase('es')
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .trim();
        }

        function aplicarFiltros() {
            const texto = normalizar(buscar.value);
            let visibles = 0;

            tarjetas.forEach(tarjeta => {
                const nombre = normalizar(tarjeta.dataset.nombre);
                const clave = normalizar(tarjeta.dataset.clave);

                const coincideTexto =
                    nombre.includes(texto) ||
                    clave.includes(texto);

                const coincideGrado =
                    !grado.value ||
                    tarjeta.dataset.grado === grado.value;

                const coincideLetra =
                    !letra.value ||
                    tarjeta.dataset.grupo === letra.value;

                const mostrar =
                    coincideTexto && coincideGrado && coincideLetra;

                tarjeta.hidden = !mostrar;
                tarjeta.style.display = mostrar ? '' : 'none';

                if (mostrar) visibles++;
            });

            contador.textContent =
                `Mostrando ${visibles} de ${tarjetas.length} grupos`;

            vacio.hidden = visibles > 0;
        }

        form.addEventListener('submit', evento => {
            evento.preventDefault();
            aplicarFiltros();
        });

        limpiar.addEventListener('click', () => {
            buscar.value = '';
            grado.value = '';
            letra.value = '';
            aplicarFiltros();
        });

        function cerrarModal() {
            modal.hidden = true;
        }

        document.querySelectorAll('.grupo-ver')
            .forEach(boton => {
                boton.addEventListener('click', () => {
                    const datos = JSON.parse(boton.dataset.grupo);

                    document.getElementById('grupoNombre').textContent =
                        datos.nombre;
                    document.getElementById('grupoInicial').textContent =
                        datos.grado + datos.grupo;
                    document.getElementById('grupoClave').textContent =
                        datos.clave;
                    document.getElementById('grupoGrado').textContent =
                        datos.grado + '° ' + datos.grupo;
                    document.getElementById('grupoTurno').textContent =
                        datos.turno;
                    document.getElementById('grupoTotal').textContent =
                        datos.alumnos;

                    modal.hidden = false;
                });
            });

        document.getElementById('cerrarModalGrupo')
            .addEventListener('click', cerrarModal);

        document.getElementById('botonCerrarGrupo')
            .addEventListener('click', cerrarModal);

        modal.addEventListener('click', evento => {
            if (evento.target === modal) cerrarModal();
        });

        document.addEventListener('keydown', evento => {
            if (evento.key === 'Escape') cerrarModal();
        });

        aplicarFiltros();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', iniciarGrupos);
    } else {
        iniciarGrupos();
    }
})();
</script>

@endsection
