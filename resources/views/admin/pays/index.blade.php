@extends('backend.layouts.app')

@section('title', 'Pagos')

@push('styles')

    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}">

@endpush

@section('content')

    <div class="block-header">
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>LISTA DE PAGOS</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Nombre</th>
                                    <th>Fecha Pago</th>
                                    <th>Monto</th>
                                    <th>Impago</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SL.</th>
                                    <th>Nombre</th>
                                    <th>Fecha Pago</th>
                                    <th>Monto</th>
                                    <th>Impago</th>
                                    <th>Accion</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($pays as $key => $pay)
                                <tr>
                                    <td>{{ ++$key }}.</td>
                                    <td>{{ $pay->name }}</td>
                                    <td>{{ $pay->fecha_pago }}</td>
                                    <td>$ {{ $pay->amount }}</td>
                                    <td>$ {{ $pay->impago }}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.pays.edit',$pay->id)}}" class="btn btn-success btn-sm waves-effect">   
                                            <i class="material-icons">edit</i>
                                        </a> 
                                        <button type="button" class="btn btn-danger btn-sm waves-effect" onclick="deletePay({{$pay->id}})">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        <form action="{{route('admin.pays.destroy',$pay->id)}}" method="POST" id="del-pays-{{$pay->id}}" style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection


@push('scripts')

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('backend/js/pages/tables/jquery-datatable.js') }}"></script>

    <script>
        function deletePay(id){
            
            swal({
            title: 'Estas seguro?',
            text: "No se puede deshacer esta accion",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.value) {
                    document.getElementById('del-pay-'+id).submit();
                    swal(
                    'Eliminado!',
                    'El pago se ha eliminado.',
                    'success'
                    )
                }
            })
        }
    </script>


@endpush