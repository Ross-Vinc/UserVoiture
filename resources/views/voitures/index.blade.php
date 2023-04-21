@extends('template')

@section('contenu')
    <br>
    <div class="col-sm-offset-4 col-sm-4">
        @if (session()->has('ok'))
            <div class="alert alert-success alert-dismissible">
                {!! session('ok') !!}
            </div>
        @endif
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Liste des voitures</h3>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Marque</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($voitures as $voiture)
                    <tr>
                        <td>{!! $voiture->id !!}</td>
                        <td class="text-primary"><strong>{!! $voiture->marque !!}</strong></td>
                        <td><a href="{{ route('voitures.show', [$voiture->id]) }}"
                               class="btn btn-success btn-block">Voir</a>
                        </td>
                        @can('update', $voiture)
                            <td>
                                <a href="{{ route('voitures.edit', [$voiture->id]) }}"
                                   class="btn btn-warning btn-block">Modifier</a>
                            </td>
                        @endcan
                        @can('delete', $voiture)
                            <td>
                                <form method="POST" action="{{ route('voitures.destroy', [$voiture->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Supprimer" class="btn btn-danger btn-block"
                                           onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')">
                                </form>
                            </td>
                        @endcan

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('voitures.create') }}" class="btn btn-info pull-right">Ajouter une voiture</a>
        {!! $links !!}
    </div>
@endsection
