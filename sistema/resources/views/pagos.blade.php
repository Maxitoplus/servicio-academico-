{{-- resources/views/pagos.blade.php --}}
@extends('layouts.app')

@section('title', 'Control de Pagos y Finanzas')

@section('content')
    <div class="head">
        <div>
            <h1>Control de Pagos y Finanzas</h1>
            <p class="sub">Módulo del Cajero Escolar para auditoría y emisión de fichas.</p>
        </div>
        <div>
            <button class="btn s">Exportar Excel</button>
        </div>
    </div>

    <!-- Indicador Financiero -->
    <section class="kpis" aria-label="Indicadores Financieros">
        <article class="card kpi">
            <b style="color: var(--bad);">$3,600.00</b>
            <span>Total Pendiente en el Sistema</span>
        </article>
    </section>

    <!-- Tabla de Transacciones Financieras -->
    <section class="card tw">
        <table>
            <caption>Historial de Colegiaturas e Inscripciones</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Alumno</th>
                    <th>Concepto</th>
                    <th>Importe</th>
                    <th>Vencimiento</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Ana Torres</td>
                    <td>Colegiatura Octubre</td>
                    <td>$1,800.00</td>
                    <td>31/10/2026</td>
                    <td><span class="st Pagado">Pagado</span></td>
                    <td><button class="btn s" style="min-height:30px;">Ver Recibo</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Luis Pérez</td>
                    <td>Colegiatura Octubre</td>
                    <td>$1,800.00</td>
                    <td>31/10/2026</td>
                    <td><span class="st Pendiente">Pendiente</span></td>
                    <td><button class="btn s p" style="min-height:30px;">Registrar Pago</button></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Marta Ruiz</td>
                    <td>Inscripción</td>
                    <td>$2,500.00</td>
                    <td>15/09/2026</td>
                    <td><span class="st Vencido">Vencido</span></td>
                    <td><button class="btn s p" style="min-height:30px; background-color: var(--bad); border-color: var(--bad);">Reemitir Ficha</button></td>
                </tr>
            </tbody>
        </table>
    </section>
@endsection
