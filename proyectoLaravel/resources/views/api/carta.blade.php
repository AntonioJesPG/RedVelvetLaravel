
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::to('css/api.css') }}">
    <title>Red Velvet</title>
</head>
<body>

<div class="container containerTitle">
    <h2 style="text-align: center">Carta Red Velvet</h2>
    <div class="container">
        <div class="card cardIndex">
            <img	src="{{URL::to('storage/img/'.$producto->imagen)}}"	style="width:150px; height:150px"/>

                <h4	style="min-height:45px;margin:5px	0	5px	0">
                    {{$producto->nombre}}
                </h4>
                <p	style="min-height:45px;margin:5px	0	10px	0">
                    Precio : {{$producto->precio}} €
                </p>
            <div>
                <a href="{{url('/api/carta/anterior/'.$producto->id)}}"><button class="btn btnIndex">Anterior</button></a>
                <a href="{{url('/api/carta/siguiente/'.$producto->id)}}"><button class="btn btnIndex">Siguiente</button></a>
            </div>


        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>