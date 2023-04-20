@extends('template')

@section('contenu')
    <div class="col-sm-offset-4 col-sm-4">
        <br>
        <div class="panel panel-primary">
            <div class="panel-heading">Création d'une voiture</div>
            <div class="panel-body">
                <div class="col-sm-12">
                    <form method="POST" action="{{ route('voitures.store') }}" accept-charset="UTF-8"
                        class="form-horizontalpanel">
                        @csrf
                        <div class="form-group {!! $errors->has('marque') ? 'has-error' : '' !!}">
                            <input type="text" name="marque" placeholder="marque" class="form-control">
                            {!! $errors->first('marque', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('type') ? 'has-error' : '' !!}">
                            <input type="text" name="type" placeholder="type" class="form-control">
                            {!! $errors->first('type', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('couleur') ? 'has-error' : '' !!}">
                            <input name="couleur" type="color" value="" class="form-control">
                            {!! $errors->first('couleur', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('cylindree') ? 'has-error' : '' !!}">
                            <input name="cylindree" type="number" value="" class="form-control">
                            {!! $errors->first('cylindree', '<small class="help-block">:message</small>') !!}
                        </div>
                        <input class="btn btn-primary pull-right" type="submit" value="Envoyer">
                    </form>
                </div>
            </div>
        </div>
        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span>Retour
        </a>
    </div>
@endsection
