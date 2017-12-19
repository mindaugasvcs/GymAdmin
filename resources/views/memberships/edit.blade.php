@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Narystės plano atnaujinimas</h3>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('memberships.update', $membership->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                    @if ($errors->has('title'))
                        <div class="form-group has-error">
                    @else
                        <div class="form-group">
                    @endif
                            <label class="col-xs-2 control-label" for="title">Pavadinimas</label>
                            <div class="col-xs-10">
                                <input type="text" id="title" name="title" value="{{ old('title', $membership->title) }}" class="form-control" placeholder="Tekstas">
                    @if ($errors->has('title'))
                                <span class="help-block">{{ $errors->first('title') }}</span>
                    @endif
                            </div>
                        </div>
                    @if ($errors->has('limit_type'))
                        <div class="form-group has-error">
                    @else
                        <div class="form-group">
                    @endif
                            <label class="col-xs-2 control-label" for="sel1">Tipas</label>
                            <div class="col-xs-10">
                                <select class="form-control" id="sel1" name="limit_type">
                    @if (old('limit_type') == 'days_count' || $membership->limit_type == 'days_count')
                                    <option selected value="days_count">Dienos</option>
                    @else
                                    <option value="days_count">Dienos</option>
                    @endif
                    @if (old('limit_type') == 'visits_count' || $membership->limit_type == 'visits_count')
                                    <option selected value="visits_count">Kartai</option>
                    @else
                                    <option value="visits_count">Kartai</option>
                    @endif
                                </select>
                    @if ($errors->has('limit_type'))
                                <span class="help-block">{{ $errors->first('limit_type') }}</span>
                    @endif
                            </div>
                        </div>
                    @if ($errors->has('limit'))
                        <div class="form-group has-error">
                    @else
                        <div class="form-group">
                    @endif
                            <label class="col-xs-2 control-label" for="limit">Kiekis</label>
                            <div class="col-xs-10">
                                <input type="number" id="limit" name="limit" value="{{ old('limit', $membership->limit) }}" class="form-control" placeholder="Skaičius">
                    @if ($errors->has('limit'))
                                <span class="help-block">{{ $errors->first('limit') }}</span>
                    @endif
                            </div>
                        </div>
                    @if ($errors->has('amount'))
                        <div class="form-group has-error">
                    @else
                        <div class="form-group">
                    @endif
                            <label class="col-xs-2 control-label" for="amount">Kaina</label>
                            <div class="col-xs-10">
                                <input type="text" id="amount" name="amount" value="{{ old('amount', $membership->amount) }}" class="form-control" placeholder="Skaičius">
                    @if ($errors->has('amount'))
                                <span class="help-block">{{ $errors->first('amount') }}</span>
                    @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-10 col-xs-offset-2">
                                <button type="submit" class="btn btn-primary">Atnaujinti</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
