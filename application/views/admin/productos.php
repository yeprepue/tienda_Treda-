<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-info bg-light">
        <a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>imagenes/carretilla.png" alt="...." width="50" height="50"></a>
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
            <div class="col-md-4 py-4">
                <div class="card card-primary card-outline">
                    <div class="card-header text-center">
                        <h3 id="reg">AGREGAR PRODUCTO</h3>
                        <h3 id="act" style="display: none">ACTUALIZAR PRODUCTO</h3>
                    </div>
                    <div class="card-body">
                        <?php echo form_open_multipart('cproducto/crearProducto'); ?>
                        <div class="form-group">
                            <input type="text" name="pname" id="pname" class="form-control" placeholder="Ingrese el nombre del producto">
                        </div>
                        <div class="form-group">
                            <textarea name="pdescripcion" id="pdescripcion" class="form-control" placeholder="Ingrese una breve descripción"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="number" name="pvalor" id="pvalor" class="form-control" placeholder="Ingrese valor">
                        </div>
                        <div class="form-group">
                            <select name="ptienda" id="ptienda" class="form-control">
                                <option value="">Seleccione</option>
                                <?php foreach ($tiendas as $tienda) : ?>
                                    <option value="<?php echo $tienda['id'] ?>">
                                        <?php echo $tienda['nombre'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group py-2">
                            <input type="file" name="pimagen" id="pimagen" class="form-control">
                        </div>
                        <div id="divmsj-productos" class="form-group text-danger" style="display: none">
                            <label id="lblproducto">* Ingrese los datos requeridos</label>
                        </div>
                        <div class="form-group">
                            <button id="btnGuardar" type="submit" class="btn btn-success btn-block">Guardar</button>
                            <button id="btnActualizar" style="display: none" type="submit" class="btn btn-success btn-block">Actualizar</button>
                        </div>
                        <input type="hidden" name="sku" id="sku">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <section>
                    <div class="container">
                        <h2>PRODUCTOS</h2>
                        <table class="table table-bordered py-4" id="tblProductos">
                            <thead>
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
                                        <td style="display: none"> <?php echo $activas['idtienda'] ?></td>
                                        <td> <?php echo $activas['tienda'] ?></td>
                                        <td> <img src="<?php echo base_url() ?>uploads/<?php echo $activas['imagen'] ?>" alt="" width="100px"> </td>
                                        <td>
                                            <button class="btn btn-success btn-lg btn-edt py-2">Editar</button>
                                            <button class="btn btn-danger btn-lg btn-desac py-2">Eliminar</button>
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