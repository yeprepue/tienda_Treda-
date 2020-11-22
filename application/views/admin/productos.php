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
                        <h3 id="reg">Nuevo producto</h3>
                        <h3 id="act" style="display: none">Actualizar producto</h3>
                    </div>
                    <div class="card-body">
                        <form id="formproducto">
                            <div class="form-group">
                                <input type="text" name="pname" id="pname" class="form-control" placeholder="Ingrese el nombre del producto">
                            </div>
                            <div class="form-group">
                                <textarea name="pdescripcion" id="pdescripcion" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="number" name="pvalor" id="pvalor" class="form-control" placeholder="Ingrese valor">
                            </div>
                            <div class="form-group">
                                <select name="ptiendas" id="ptiendas" class="form-control">
                                    <option value="">Seleccione</option>
                                    <?php foreach ($tiendas as $tienda) : ?>
                                        <option value="<?php echo $tienda['id'] ?>">
                                            <?php echo $tienda['nombre'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="file" name="pimagen" id="pimagen" class="form-control" placeholder="Ingrese valor">
                            </div>
                            <div id="divmsj-productos" class="form-group text-danger" style="display: none">
                                <label id="lblproducto">* Ingrese los datos requeridos</label>
                            </div>
                            <div class="form-group">
                                <button id="btnGuardar" type="button" class="btn btn-success btn-block">Guardar</button>
                                <button id="btnActualizar" style="display: none" type="button" class="btn btn-success btn-block">Actualizar</button>
                            </div>
                        </form>
                        <input type="hidden" name="sku" id="sku">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <section>
                    <div class="container">
                        <table class="table table-responsive" id="tblProductos">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">SKU</th>
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col">DESCRIPCION</th>
                                    <th scope="col">VALOR</th>
                                    <th scope="col">TIENDA</th>
                                    <th scope="col">IMAGEN</th>
                                    <th scope="col">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($productos as $activas) : ?>
                                    <tr>
                                        <td> <?php echo $activas['sku'] ?></td>
                                        <td> <?php echo $activas['nombre'] ?></td>
                                        <td> <?php echo $activas['description'] ?></td>
                                        <td> <?php echo $activas['valor'] ?></td>
                                        <td> <?php echo $activas['tienda '] ?></td>
                                        <td> <?php echo $activas['imagen'] ?></td>
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
    <script src="<?php echo base_url(); ?>js/productos.js"></script>
</body>

</html>