<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Generate PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Generate PDF</h1>
                <div class="pull-right">
                    {{-- <a href="{{ route('student.pdf',['download'=>'pdf']) }}">Download PDF</a> --}}
                </div>
            </div>
        </div>
        <br>
        <table class="table table-striped">
            <tr>
                <th>name</th>
                <th>email</th>
                <th>profileimage</th>
            </tr>

            @foreach ($student as $item)
                <tr>
                    <td>{{$item->name}}></td>
                    <td>{{$item->email}}></td>
                    <td>{{$item->profileimage}}></td>
                </tr>

            @endforeach
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>