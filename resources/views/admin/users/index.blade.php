@extends('backend.layouts.app')

@section('title', 'Usuarios')

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
                    <h2>LISTA DE USUARIOS</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Cobrar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SL.</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Cobrar</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($users as $key => $user)
                                <div hidden>{{DB::table('users')->where('id', $user->id)->update(['amount' => DB::raw('(cost * views * images) + cuota')])}}</div>
                                <tr>
                                    <td>{{ ++$key }}.</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->name }}</td>
                                    <td>$ {{ $user->amount }}</td>
                                    <td class="text-center">
                                        @if (date('Y-m-d', time()) >= $user->fin_cuota)
                                            <a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-danger btn-sm waves-effect">
                                        @endif
                                        @if (date('Y-m-d', time()) >= $user->cerca_fin && date('Y-m-d', time()) < $user->fin_cuota)
                                            <a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-warning btn-sm waves-effect">
                                        @elseif (date('Y-m-d', time()) < $user->cerca_fin && date('Y-m-d', time()) < $user->fin_cuota)
                                            <a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-success btn-sm waves-effect">   
                                        @endif 
                                        <i class="material-icons">edit</i>
                                            </a> 
                                        <button type="button" class="btn btn-danger btn-sm waves-effect" onclick="deleteUser({{$user->id}})">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        <form action="{{route('admin.users.destroy',$user->id)}}" method="POST" id="del-user-{{$user->id}}" style="display:none;">
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
        function deleteUser(id){
            
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
                    document.getElementById('del-user-'+id).submit();
                    swal(
                    'Eliminado!',
                    'El usuario se ha eliminado.',
                    'success'
                    )
                }
            })
        }
    </script>


@endpush