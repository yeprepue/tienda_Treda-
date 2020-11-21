<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">TIENDA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Productos<span class="sr-only">(current)<span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tiendas</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-header text-center">
                    <h3 id="rRol">Nuevo tienda</h3>
                    <h3 id="aRol" style="display: none">Actualizar tienda</h3>
                </div>
                <div class="card-body">
                    <form id="formtienda">
                        <div class="form-group">
                            <input type="text" name="tname" id="tname" class="form-control" placeholder="Ingrese el nombre de la tienda">
                        </div>
                        <div class="form-group">
                        <input type="date" name="tfecha" id="tfecha" class="form-control" placeholder="Ingrese fecha">
                          
                            </select>
                        </div>
                        <div id="divmsj-tienda" class="form-group text-danger" style="display: none">
                            <label id="lbltienda">* Ingrese el nombre del tienda</label>
                        </div>
                        <div class="form-group">
                            <button id="btnGuardartienda" type="button" class="btn btn-success btn-block">Guardar</button>
                            <button id="btnActualizartienda" style="display: none" type="button" class="btn btn-success btn-block">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
            <div class="col-md-8">
                <section>                    
                    <div class="container">
                        <table class="table ">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">SKU</th>
                                    <th scope="col">NOMBRE</th>
                                    
                                    <th scope="col">Fecha de apertua</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tiendas as $activas) : ?>
                                    <tr>
                                        <td> <?php echo $activas['id'] ?></td>
                                        <td> <?php echo $activas['nombre'] ?></td>
                                        <td> <?php echo $activas['fecha_apertura'] ?></td>
                                        <td>
                                            <button class="btn btn-success btn-sm btn-edt">Editar</button>
                                            <button class="btn btn-danger btn-sm btn-desac">Desactivar</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>js/tiendas.js"></script>
</body>

</html>