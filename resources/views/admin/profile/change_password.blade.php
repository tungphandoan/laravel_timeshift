@extends('admin.layouts.master')

@section('content')
    <section class="content-header">
        <h1>
            Change password admin
        </h1>
    </section>

    <div class="row">
        <div class="box">
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('admin.changepassword.update', $admin->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group{{ $errors->has('current-password') ? 'has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">
                                Current Password
                            </label>
                            <div class="col-md-6">
                                <input id="current-password" type="password" class="form-control" name="current-password" required>
                                @if($errors->has('current-password'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('current-password') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('new-password') ? 'has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">
                                New Password
                            </label>
                            <div class="col-md-6">
                                <input id="new-password" type="password" class="form-control" name="new-password" required>
                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('new-password') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="new-password-confirm" class="col-md-4 control-label">
                                Confirm New Password
                            </label>
                            <div class="col-md-6">
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password-confirmation" required>
                                @if ($errors->has('new-password-confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password-confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group horizontal">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Change Password
                                </button>
                                <a href="{{ route('admin.changepassword.index') }}" class="btn btn-success">Back</a>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection