@extends('user.layouts.master')

@section('content')
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> Create New Overtime</h3>
            </div>

            <form class="form-create" role="form" action="{{ route('overtime.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="">User ID</label>
                        @if ($errors->has('user_id'))
                            <p class="input-warning">{{ $errors->first('user_id') }}</p>
                        @endif
                        <input type="text" class="form-control" id="" name="user_id" value="{{ Auth::user()->id }}">
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <label for="">Date</label>
                        @if ($errors->has('day'))
                            <p class="input-warning">{{ $errors->first('day') }}</p>
                        @endif
                        <input type="date" class="form-control" id="" name="day">
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <label for="">Start time</label>
                        @if ($errors->has('start_time'))
                            <p class="input-warning">{{ $errors->first('start_time') }}</p>
                        @endif
                        <input type="time" class="form-control" id="" name="start_time">
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <label for="">End time</label>
                        @if ($errors->has('end_time'))
                            <p class="input-warning">{{ $errors->first('end_time') }}</p>
                        @endif
                        <input type="time" class="form-control" id="" name="end_time">
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <label for="">Total time</label>
                        @if ($errors->has('total_time'))
                            <p class="input-warning">{{ $errors->first('total_time') }}</p>
                        @endif
                        <input type="text" class="form-control" id="" name="total_time">
                    </div>
                </div>

                <div class="box-footer">
                    <a href="{{ route('overtime.index') }}" class="btn btn-primary">Back</a>
                    <button type="submit" class="btn btn-primary" >Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
