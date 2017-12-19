@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $member->name }} anketos atnaujinimas</h3>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('members.store') }}" enctype="multipart/form-data">
                        {{csrf_field()}}
                    @if ($errors->has('name'))
                        <div class="form-group has-error">
                    @else
                        <div class="form-group">
                    @endif
                            <label class="col-xs-2 control-label" for="name">Vardas</label>
                            <div class="col-xs-10">
                                <input type="text" id="name" name="name" value="{{ old('name', $member->name) }}" class="form-control" placeholder="Tekstas">
                            @if ($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                            </div>
                        </div>
                    @if ($errors->has('unique_id'))
                        <div class="form-group has-error">
                    @else
                        <div class="form-group">
                    @endif
                            <label class="col-xs-2 control-label" for="unique_id">Unikalus ID</label>
                            <div class="col-xs-10">
                                <input type="number" id="unique_id" name="unique_id" value="{{ old('unique_id', $member->unique_id) }}" class="form-control" placeholder="10 skaitmenų">
                            @if ($errors->has('unique_id'))
                                <span class="help-block">{{ $errors->first('unique_id') }}</span>
                            @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-10 col-xs-offset-2">
                                <button type="submit" class="btn btn-primary">Sukurti</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
