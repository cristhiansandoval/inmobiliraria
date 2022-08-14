@extends('backend.layouts.app')

@section('title', 'Editar Servicio')

@push('styles')

    
@endpush


@section('content')

    <div class="block-header">
        <a href="{{route('admin.testimonials.index')}}" class="waves-effect waves-light btn btn-danger right m-b-15">
            <i class="material-icons left">arrow_back</i>
            <span>ATRAS</span>
        </a>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>EDITAR SERVICIO</h2>
                </div>
                <div class="body">
                    <form action="{{route('admin.services.update',$service->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="title" class="form-control" value="{{ $service->title }}">
                                    <label class="form-label">Titulo</label>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="description" rows="4" class="form-control no-resize">{{ $service->description }}</textarea>
                                    <label class="form-label">Descripcion</label>
                                </div>
                            </div>
    
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="icon" class="form-control" value="{{ $service->icon }}">
                                    <label class="form-label">Icono de servicio</label>
                                </div>
                                <small>Para obtener la lista de nombres de iconos, simplemente haga clic en el enlace: <a href="https://materializecss.com/icons.html" target="_blank">Materialize Icon</a></small>
                            </div>
    
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" name="service_order" class="form-control" min="1" value="{{ $service->service_order }}">
                                    <label class="form-label">Orden de servicio</label>
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
