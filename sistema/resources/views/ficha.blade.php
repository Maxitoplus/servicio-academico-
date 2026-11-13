{{-- resources/views/ficha.blade.php --}}
@extends('layouts.app')

@section('title', 'Emisión de Ficha de Pago')

@section('content')
    <div class="head">
        <div>
            <h1>Ficha de Pago Individual</h1>
            <p class="sub">Documento formal de recaudación financiera.</p>
        </div>
        <div class="noprint">
            <button class="btn" onclick="window.print()">🖨️ Imprimir Ficha</button>
        </div>
    </div>

    <center>
    <section class="card ficha" style="max-width:560px; border:2px dashed var(--line); padding:24px; text-align:left;">
        <div style="display:flex; justify-content:between; justify-content:space-between; align-items:center; border-bottom:2px solid var(--line); padding-bottom:12px;">
            <h3>UNIVERSIDAD TECNOLÓGICA DE TORREÓN</h3>
            <strong>Folio: #2026-0084</strong>
        </div>
        
        <br>
        <p><strong>Alumno:</strong> Luis Pérez</p>
        <p><strong>Matrícula:</strong> A002</p>
        <p><strong>Concepto:</strong> Colegiatura Octubre 2026</p>
        <p><strong>Fecha Límite:</strong> 31/10/2026</p>
        <p><strong>Monto Total a Liquidar:</strong> <span style="font-size:1.3rem; color:var(--brand); font-weight:bold;">$1,800.00 MXN</span></p>
        
        <br>
        <div class="flow" style="font-size:.85rem; color:var(--muted); text-align:center;">
            <p>Referencia Bancaria: <strong>00021800202610317492</strong></p>
            <!-- Simulación de Código de Barras-->
            <div class="bar" style="height:56px; background:repeating-linear-gradient(90deg, var(--text) 0 2px, transparent 2px 5px); width:80%; margin:12px auto;"></div>
            <p>* Presentar esta ficha directamente en ventanilla bancaria o caja escolar *</p>
        </div>
    </section>
    </center>
@endsection
