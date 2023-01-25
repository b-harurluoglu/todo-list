<?php use Carbon\Carbon; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Haftalık Plan</title>
  </head>
  <body>
    <div class="container mt-5">
      <div class="row justify-content-center"> 
        {{-- 
        <div class="col-4">
          <table class="table table-sm table-striped table-hover">
            <thead class="table-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">İşin Adı</th>
                <th scope="col">Zorluk Derecesi</th>
                <th scope="col">Süre</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $task->name }}</td>
                  <td>{{ $task->level }}</td>
                  <td>{{ $task->duration }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        --}}
        <div class="col-8">
          @foreach($plans as $plan)
          <table class="table table-sm table-success table-striped table-hover">
            <thead class="table-gray">
              <tr>
                <th scope="col" class="text-center" colspan="{{ count($developers) }}"> Week {{ $loop->iteration }}</th>
              </tr>
            </thead>
            <thead class="table-dark">
              <tr>
                @foreach ($developers as $developer)
                <th scope="col">{{ $developer->name }}</th>
                @endforeach
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach($developers as $developer)
                  <td>
                    @foreach($plan as $task)
                      @if($task['developer'] == $developer->name)
                      {{ $task['task'] }} <br>
                      @endif
                    @endforeach
                  </td>
                @endforeach
              </tr>
            </tbody>
          </table>
          @endforeach
        </div>
      </div>
    </div>
  </body>
</html>

