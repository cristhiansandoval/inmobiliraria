@extends('frontend.layouts.app')

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

                    <h4 class="agent-title">MENSAJES</h4>
                    
                    <div class="agent-content">
                        <table class="striped responsive-table">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Mensaje</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                                @foreach( $messages as $key => $message )
                                    <tr>
                                        <td class="right-align">{{$key+1}}.</td>
                                        <td>{{ ucfirst(strtok($message->name,' ')) }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>
                                            <span class="tooltipped" data-position="bottom" data-tooltip="{{$message->message}}">
                                                {{ str_limit($message->message,20) }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($message->status == 0)
                                                <a href="{{route('agent.message.read',$message->id)}}" class="btn btn-small orange waves-effect">
                                                    <i class="material-icons">local_library</i>
                                                </a>
                                            @else 
                                                <a href="{{route('agent.message.read',$message->id)}}" class="btn btn-small green waves-effect">
                                                    <i class="material-icons">done</i>
                                                </a>
                                            @endif
                                            <a href="{{route('agent.message.replay',$message->id)}}" class="btn btn-small indigo waves-effect">
                                                <i class="material-icons">replay</i>
                                            </a>
                                            <button type="button" class="btn btn-small red waves-effect" onclick="deleteMessage({{$message->id}})">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            <form action="{{route('agent.messages.destroy',$message->id)}}" method="POST" id="del-message-{{$message->id}}" style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="center">
                            {{ $messages->links() }}
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
        function deleteMessage(id){
            swal({
            title: 'Estas seguro?',
            text: "Esta accion no se puede eliminar!",
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            buttons: ["Cancelar", "Si, eliminar!"]
            }).then((value) => {
                if (value) {
                    document.getElementById('del-message-'+id).submit();
                    swal(
                    'Eliminado!',
                    'Mensaje eliminado.',
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