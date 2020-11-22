<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-info bg-light py-4">
        <a class="navbar-brand" href=""><img src="<?php echo base_url(); ?>imagenes/carretilla.png" alt="...."  width="50" height="50"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                
                    <a class="nav-link" href="<?php echo base_url(); ?>cproducto">Productos<span class="sr-only">(current)<span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>ctienda">Tiendas</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-primary card-outline py-4">
                    <div class="card-header text-center">
                        <h3 id="reg">AGREGAR TIENDA</h3>
                        <h3 id="act" style="display: none">ACTUALIZAR TIENDA</h3>
                    </div>
                    <div class="card-body">
                        <form id="formtienda">
                            <div class="form-group">
                                <input type="text" name="tname" id="tname" class="form-control" placeholder="Ingrese el nombre de la tienda">
                            </div>
                            <div class="form-group">
                                <input type="text" name="tfecha" id="tfecha" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Ingrese fecha">
                                </select>
                            </div>
                            <div id="divmsj-tienda" class="form-group text-danger" style="display: none">
                                <label id="lbltienda">* Ingrese los datos requeridos</label>
                            </div>
                            <div class="form-group">
                                <button id="btnGuardar" type="button" class="btn btn-success btn-block">Guardar</button>
                                <button id="btnActualizar" style="display: none" type="button" class="btn btn-success btn-block">Actualizar</button>
                            </div>
                        </form>
                        <input type="hidden" name="idtienda" id="idtienda">
                    </div>
                </div>
            </div>
            <div class="col-md-8 py-4">
                <section>
                    <div class="container">
                        <h2>TIENDAS</h2>
                        <table class="table table-bordered" id="tblTiendas">
                            <thead>
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
                                            <button class="btn btn-danger btn-sm btn-desac">Eliminar</button>
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

    <script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
    <script src="<?php echo base_url(); ?>js/tiendas.js"></script>
</body>

</html>