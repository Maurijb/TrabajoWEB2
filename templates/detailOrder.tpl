<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Gestion de Pedidos</title>
</head>
<body>


  <div class="position-sticky sticky-top">
          
            <div class="card" style= "width: 50rem">
            <h1> Detalle del Pedido N° {$id} </h1>
              
              <div class="card-body">
                <h5 class="card-subtitle mt-3"><strong><u>Empresa/Cliente:</strong></u> ( {$id_c} ) - {$customer}</h5><br>
                <h5 class="card-subtitle mt-3"><strong><u>Forma de Pago:</strong></u> {$payment}</h5><br>
                <h5 class="card-subtitle mt-3"><strong><u>Fecha del Pedido:</strong></u> {$date}</h5><br>
                <h5 class="card-subtitle mt-3"><strong><u>Detalle del Pedido:</strong></u></h5>
                <textarea name="details" class="form-control mt-3" rows="5" >{$detail}</textarea>
              </div>           
              <a onclick="history.back()" type='button' class='btn btn-dark'>Cerrar</a> 
            </div>
           

          
  </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>



