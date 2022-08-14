
<!-- SEARCH SECTION -->

<section class="indigo darken-2 white-text center">
    <div class="container">
        <div class="row m-b-0">
            <div class="col s12">
                <form action="{{ route('search')}} " method="GET">
                    <div class="searchbar">
                        <div class="input-field col s12 m2">
                            <input type="text" name="city" id="autocomplete-input" class="autocomplete custominputbox" autocomplete="off">
                            <label for="autocomplete-input">Buscar Ciudad</label>
                        </div>

                        <div class="input-field col s12 m2">
                            <select name="type" class="browser-default">
                                <option value="" disabled selected>Propiedad</option>
                                <option value="apartment">Departamento</option>
                                <option value="house">Casa</option>
                            </select>
                        </div>

                        <div class="input-field col s12 m2">
                            <select name="purpose" class="browser-default">
                                <option value="" disabled selected>Condición</option>
                                <option value="rent">Alquiler</option>
                                <option value="sale">Venta</option>
                            </select>
                        </div>

                        <div class="input-field col s12 m1">
                            <select name="bedroom" class="browser-default">
                                <option value="" disabled selected>Habs</option>
                                @if(isset($bedroomdistinct))
                                    @foreach($bedroomdistinct as $bedroom)
                                        <option value="{{$bedroom->bedroom}}">{{$bedroom->bedroom}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="input-field col s12 m2">
                            <input type="text" name="maxprice" id="maxprice" class="custominputbox">
                            <label for="maxprice">Precio</label>
                        </div>

                        <div class="input-field col s12 m2">
                            <input type="text" name="mail" id="mail" class="custominputbox">
                            <label for="mail">Ingrese Correo</label>
                        </div>

                        <div class="input-field col s12 m1">
                            <button class="btn btnsearch waves-effect waves-light w100" type="submit">
                                <i class="material-icons">search</i>
                            </button>
                        </div>
                    </div>
                </form>
                <form action="{{ route('agentsearch')}} " method="GET">
                    <div class="searchbar">
                        <div class="input-field col s12 m4">
                            <input type="text" name="agent" id="agent" class="custominputbox">
                            <label for="agent">Buscar Agente</label>
                        </div>
                        
                        <div class="input-field col s12 m1">
                            <button class="btn btnsearch waves-effect waves-light w100" type="submit">
                                <i class="material-icons">search</i>
                            </button>
                        </div>
                     </div>
                </form>
            </div>
        </div>
    </div>
</section>