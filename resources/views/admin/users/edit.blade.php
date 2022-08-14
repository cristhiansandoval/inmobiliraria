@extends('backend.layouts.app')

@section('title', 'Editar Usuario')

@push('styles')

    
@endpush


@section('content')

    <div class="block-header">
        <a href="{{route('admin.users.index')}}" class="waves-effect waves-light btn btn-danger right m-b-15">
            <i class="material-icons left">arrow_back</i>
            <span>ATRAS</span>
        </a>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>EDITAR USUARIOS</h2>
                </div>
                <div class="body">
                    <form action="{{route('admin.users.update',$users->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" name="role" class="form-control" value="{{$users->role_id}}">
                                <label class="form-label">Rol: Ingrese 2 para Agente o 3 para Usuario</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" name="cost" class="form-control" value="{{$users->cost}}">
                                <label class="form-label">Precio por visita ($)</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" name="cuota" class="form-control" value="{{$users->cuota}}">
                                <label class="form-label">Valor de la cuota mensual/anual ($)</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" name="views" class="form-control" value="{{$users->views}}">
                                <label class="form-label">Nùmero de visitas al momento</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="date" name="cerca_fin" class="form-control" value="{{$users->cerca_fin}}">
                                <label class="form-label">Fecha cercana al fin de cuota </label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="date" name="fin_cuota" class="form-control" value="{{$users->fin_cuota}}">
                                <label class="form-label">Fecha fin de cuota</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="date" name="fin_plan" class="form-control" value="{{$users->fin_plan}}">
                                <label class="form-label">Fecha fin de plan</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                            <i class="material-icons">update</i>
                            <span>Actualizar</span>
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')



@endpush
