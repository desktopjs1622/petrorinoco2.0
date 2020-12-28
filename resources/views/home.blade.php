@extends("layouts.base")

@section('title')
| Home
@endsection


@section('ruta')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a>Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
</nav>
@endsection

@section('contenido')

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Listado General de Usuarios</h5>
            <div class="box-header">
                <a href="{{ url('registro-de-personal') }}" class="btn btn-success float-right" title="Registrar"><span class="fa fa-fw fa-plus-circle"></span></a>
            </div>
            
            <br />
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre y Apellido</th>
                            <th>Institución</th>
                            <th>Fecha de Ingreso</th>
                            <th>Fecha de Egreso</th>
                            <th>Tipo de Personal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Colleen Hurst</td>
                            <td>Javascript Developer</td>
                            <td>San Francisco</td>
                            <td>39</td>
                            <td>2009/09/15</td>
                            <td>
                            <button return onclick="abrir_modal('{{ url('home/visualizar') }}')" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-eye"></i></button>
                            <a href="javascript:void(0)" role="button" class="btn btn-primary btn-xs" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                            <a href="javascript:void(0)" role="button" class="btn btn-warning btn-xs" title="Prestaciones"><i class="fas fa-calculator"></i></span></a>
                            <a href="javascript:void(0)" role="button" class="btn btn-danger btn-xs" title="Eliminar registro"><i class="fas fa-trash"></i></span></a>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot>
                </table>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"></div>
            </div>
        </div>
    </div>
</div>

@endsection
