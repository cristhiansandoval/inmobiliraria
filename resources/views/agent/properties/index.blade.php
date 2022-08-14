@extends('backend.layouts.app')

@section('styles')
@endsection

@section('content')

    <section class="section">
        <div class="container">
            <div class="row">

                <div class="col s12 m3">
                    <div class="agent-sidebar">
                        @include('agent.sidebar')
                    </div>
                </div>

                <div class="col s12 m9">

                    <h4 class="agent-title">LISTA DE PROPIEDADES</h4>
                    
                    <div class="agent-content">
                        <table class="striped responsive-table">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Titulo</th>
                                    <th>Tipo</th>
                                    <th>Ciudad</th>
                                    <th><i class="material-icons small-star p-t-10">comment</i></th>
                                    <th><i class="material-icons small-star p-t-10">stars</i></th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                                @foreach( $properties as $key => $property )
                                <div hidden>{{DB::table('users')->where('id', $property->agent_id)->increment('images', DB::table('property_image_galleries')->where('id', $property->id)->count())}}</div>
                                <div hidden>{{DB::table('users')->where('id', $property->agent_id)->update(['amount' => DB::raw('(cost * views * images) + cuota')])}}</div>                                    
                                <tr>
                                        <td class="right-align">{{$key+1}}.</td>
                                        <td>
                                            <span class="tooltipped" data-position="bottom" data-tooltip="{{$property->title}}">
                                                {{ str_limit($property->title,30) }}
                                            </span>
                                        </td>
                                        
                                        <td>{{ ucfirst($property->type) }}</td>
                                        <td>{{ ucfirst($property->city) }}</td>

                                        <td class="center">
                                            <span><i class="material-icons small-comment left">comment</i>{{ $property->comments_count }}</span>
                                        </td>

                                        <td class="center">
                                            @if($property->featured == true)
                                                <span class="indigo-text"><i class="material-icons small-star">stars</i></span>
                                            @endif
                                        </td>
    
                                        <td class="center">
                                            <a href="{{route('property.show',$property->slug)}}" target="_blank" class="btn btn-small green waves-effect">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                            <a href="{{route('agent.properties.edit',$property->slug)}}" class="btn btn-small orange waves-effect">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <button type="button" class="btn btn-small deep-orange accent-3 waves-effect" onclick="deleteProperty({{$property->id}})">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            <form action="{{route('agent.properties.destroy',$property->slug)}}" method="POST" id="del-property-{{$property->id}}" style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="center">
                            {{ $properties->links() }}
                        </div>
                    </div>
        
                </div>

            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function deleteProperty(id){
            swal({
            title: 'Esta seguro?',
            text: "No podra reertir esta accion!",
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            buttons: ["Cancelar", "Si, eliminar!"]
            }).then((value) => {
                if (value) {
                    document.getElementById('del-property-'+id).submit();
                    swal(
                    'Eliminado!',
                    'La propiedad ha sido eliminada.',
                    'success',
                    {
                        buttons: false,
                        timer: 1000,
                    })
                }
            })
        }
    </script>
@endsection