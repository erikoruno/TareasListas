@extends('layouts.panel')

@section('title', 'Calendario')

@section('content')

<div class="calendario-container">
    <div class="calendario-header">
        <button id="prevMonth" class="nav-button">&lt;</button>
        <h2 id="monthYear"></h2>
        <button id="nextMonth" class="nav-button">&gt;</button>
    </div>
    <div class="calendario-semana">
        <div class="dia-semana">L</div>
        <div class="dia-semana">M</div>
        <div class="dia-semana">X</div>
        <div class="dia-semana">J</div>
        <div class="dia-semana">V</div>
        <div class="dia-semana">S</div>
        <div class="dia-semana">D</div>
    </div>
    <div id="calendario"></div> <!-- Aquí se insertará el calendario -->
    
    <!-- Listado de tareas -->
    <div class="tareas-container">
        <h3>Tareas para el día seleccionado</h3>
        <ul>
            <li>No hay tareas para este día.</li> <!-- Mensaje por defecto -->
        </ul>
    </div>
</div>

<!-- Estilos para el calendario -->
<style>
    .calendario-container {
        max-width: 800px; /* Ancho máximo del calendario */
        margin: 20px auto; /* Centrando el calendario */
        padding: 20px;
        border: 1px solid #888;
        border-radius: 10px; /* Bordes redondeados */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra */
        background-color: #fff; /* Fondo blanco */
    }

    .calendario-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    h2 {
        text-align: center;
        color: #007bff; /* Color del título */
        margin: 0;
    }

    .nav-button {
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .nav-button:hover {
        background-color: #0056b3;
    }

    .calendario-semana {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
        text-align: center;
        margin-bottom: 10px;
    }

    .dia-semana {
        font-weight: bold;
        color: #333;
    }

    #calendario {
        display: grid;
        grid-template-columns: repeat(7, 1fr); /* 7 días en una fila */
        gap: 5px;
    }

    .dia {
        padding: 10px;
        border: 1px solid #007bff; /* Borde azul */
        border-radius: 5px; /* Bordes redondeados */
        background-color: #f0f8ff; /* Fondo azul claro */
        color: #333; /* Color del texto */
        transition: background-color 0.3s; /* Efecto de transición */
        text-align: center;
    }

    .dia:hover {
        background-color: #0056b3; /* Color de fondo al pasar el mouse */
        color: white; /* Color del texto al pasar el mouse */
    }

    .tarea-hoy {
        background-color: #ffcc00; /* Color para marcar días con tareas */
        color: black; /* Color del texto */
    }

    .tareas-container {
        margin-top: 20px; /* Espacio encima del listado de tareas */
    }

    .tareas-container h3 {
        margin-bottom: 10px; /* Espacio debajo del título de tareas */
        color: #007bff; /* Color del título */
    }

    .tareas-container ul {
        list-style-type: none; /* Quitar los puntos de la lista */
        padding: 0; /* Quitar padding */
    }

    .tareas-container li {
        padding: 5px; /* Espacio en cada tarea */
        border-bottom: 1px solid #ccc; /* Línea entre tareas */
    }
</style>

<!-- Script para manejar el calendario -->
<script>
    var monthYear = document.getElementById("monthYear");
    var calendarioDiv = document.getElementById("calendario");
    var tareasContainer = document.querySelector(".tareas-container ul");
    var currentDate = new Date(); // Fecha actual
    var currentMonth = currentDate.getMonth(); // Mes actual
    var currentYear = currentDate.getFullYear();
    var diasConTareas = @json($diasConTareas); // Pasar días con tareas a JavaScript

    const meses = [
        "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", 
        "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
    ];

    function loadCalendar() {
        monthYear.innerText = `${meses[currentMonth]} ${currentYear}`;
        calendarioDiv.innerHTML = '';

        var firstDay = new Date(currentYear, currentMonth, 1);
        var lastDay = new Date(currentYear, currentMonth + 1, 0);
        var totalDays = lastDay.getDate();

        for (let i = 0; i < firstDay.getDay(); i++) {
            var dia = document.createElement("div");
            dia.className = "dia"; 
            calendarioDiv.appendChild(dia); 
        }

        for (let i = 1; i <= totalDays; i++) {
            let dia = document.createElement("div");
            dia.className = "dia";
            dia.innerText = i;
            dia.onclick = function() { // Agregar evento click para cada día
                mostrarTareasPorDia(i);
            };

            const fechaDia = `${currentYear}-${(currentMonth + 1).toString().padStart(2, '0')}-${i.toString().padStart(2, '0')}`;
            if (diasConTareas[fechaDia]) {
                dia.classList.add('tarea-hoy'); // Clase para marcar días con tareas
            }

            calendarioDiv.appendChild(dia); 
        }
    }

    function mostrarTareasPorDia(dia) {
        const fechaSeleccionada = `${currentYear}-${(currentMonth + 1).toString().padStart(2, '0')}-${dia.toString().padStart(2, '0')}`;
        tareasContainer.innerHTML = ''; // Limpiar el listado de tareas

        if (diasConTareas[fechaSeleccionada]) {
            diasConTareas[fechaSeleccionada].forEach(tarea => {
                const li = document.createElement('li');
                li.innerText = `${tarea.nombreTarea} - ${tarea.descripcion} (Prioridad: ${tarea.prioridad}, Usuario: ${tarea.user})`;
                tareasContainer.appendChild(li);
            });
        } else {
            tareasContainer.innerHTML = '<li>No hay tareas para este día.</li>';
        }
    }

    document.getElementById("prevMonth").onclick = function(event) {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11; 
            currentYear--; 
        }
        loadCalendar();
    };

    document.getElementById("nextMonth").onclick = function(event) {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0; 
            currentYear++; 
        }
        loadCalendar();
    };

    loadCalendar();
</script>

@endsection









