<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />

        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                padding: 10px;
                text-align: left;
            }
        </style>
    </head>

    <body>
        
        <div class="col">
            <h2 class="mb-0">Tareas de {{ auth()->user()->name}} {{ auth()->user()->lastname}}</h2> <br>
          </div>

          <table class="table align-items-center table-flush">
            <thead class="thead-light text-dark" >
              <tr>
                {{-- <th scope="col">Id</th> --}}
                <th scope="col">Nombre Tarea</th>
                <th scope="col">Fecha Vencimiento</th>
                <th scope="col">Prioridad</th>
                {{-- <th>Acciones</th> --}}
                 
              </tr>
            </thead>
            <tbody>
              @if(isset($tareas) &&  $tareas->isNotEmpty())
    
                @foreach ($tareas as $tarea)           
              <tr>
                {{-- <th scope="row">
                  {{$tarea->id}}
                </th> --}}
                <td>
                  {{$tarea->nombreTarea}}
                </td>
                <td>
                    {{$tarea->fechaVencimiento}}
                  </td>
                  <td>
                    {{$tarea->prioridad}}
                  </td>
                
                    
              </tr>
              @endforeach
    
              @else
                <tr>
                  <td colspan="5" class="text-center">No tienes tareas creadas.</td>
                </tr>
              @endif
            </tbody>
          </table>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
