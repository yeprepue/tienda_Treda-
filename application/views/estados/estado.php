<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>Nuevo estado</h4>
                    </div>
                    <div class="card-body">
                        <form id="formEstado">
                            <div class="form-group">
                                <input type="text" name="estado" id="estado" class="form-control">
                            </div>
                            <div class="form-group">
                                <button id="btnGuardarEstado" type="button" class="btn btn-success">Guardar</button>
                            </div>
                            <div class="form-group">
                                <label id="divmsj" style="display: none">No deje campos en blanco</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>js/estado.js"></script>

</html>