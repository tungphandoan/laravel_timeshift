@extends('user.layouts.master')

@section('content')
    <section class="content-header">
        <h1>
            Overtime
        </h1>
    </section>
    <section class="content">
        <div class="box">
        </div>
        <form role="form" action="{{ route('overtime.selectStatistic') }}" method="post">
            {{ csrf_field() }}
            <select class="selectpicker show-tick" name="month">
                <option value="2018-01" {{ ($dateTimeMonth == '2018-01')?'selected':'' }}>January</option>
                <option value="2018-02" {{ ($dateTimeMonth == '2018-02')?'selected':'' }}>February</option>
                <option value="2018-03" {{ ($dateTimeMonth == '2018-03')?'selected':'' }}>March</option>
                <option value="2018-04" {{ ($dateTimeMonth == '2018-04')?'selected':'' }}>April</option>
                <option value="2018-05" {{ ($dateTimeMonth == '2018-05')?'selected':'' }}>May</option>
                <option value="2018-06" {{ ($dateTimeMonth == '2018-06')?'selected':'' }}>June</option>
                <option value="2018-07" {{ ($dateTimeMonth == '2018-07')?'selected':'' }}>July</option>
                <option value="2018-08" {{ ($dateTimeMonth == '2018-08')?'selected':'' }}>August</option>
                <option value="2018-09" {{ ($dateTimeMonth == '2018-09')?'selected':'' }}>September</option>
                <option value="2018-10" {{ ($dateTimeMonth == '2018-10')?'selected':'' }}>October</option>
                <option value="2018-11" {{ ($dateTimeMonth == '2018-11')?'selected':'' }}>November</option>
                <option value="2018-12" {{ ($dateTimeMonth == '2018-12')?'selected':'' }}>December</option>
            </select>
            <button class="btn btn-success" type="submit">Detail</button>
        </form>
        <div class="row justify-content-center">
            <div class="col-xs-12">
                <div class="box box-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-hover table-bordered">
                            <thead>
                            <th width="15%" class="text-center">No.</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Total Hours</th>
                            </thead>
                            <tbody>
                            @php
                                $temp = 1;
                            @endphp
                            @foreach ($overtime as $data)
                                <tr>
                                    <td class="text-center">{{ $temp++ }}</td>
                                    <td class="text-center">{{ $data->day->format('d/m/Y') }}</td>
                                    <td class="text-center">{{ $data->total_time }} hour</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th class="text-center">Total time OT</th>
                                <th></th>
                                <th class="text-center">{{ $sumOvertime }} hours</th>
                            </tr>
                            </tbody>
                        </table>
                    <a href="{{ route('overtime.index') }}" class="btn btn-success">Back</a>
                </div>
            </div>
        </div>
    </section>
@endsection