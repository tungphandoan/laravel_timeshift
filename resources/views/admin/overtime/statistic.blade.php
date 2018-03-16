@extends('admin.layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Overtime Today, @php echo date('d-m/Y'); @endphp</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-6">
                                </div>
                                <div class="col-sm-6">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th width="5%" class="sorting_asc text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Date</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Start time</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">End time</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Total time</th></tr>
                                        </thead>

                                        @php
                                            $temp = 1;
                                        @endphp
                                        @foreach($overTimeDay as $data)
                                            <tbody>
                                            <td class="text-center">{{ $temp++ }}</td>
                                            <td class="text-center">{{ $data->user->name }}</td>
                                            <td class="text-center">{{ $data->day->format('d/m/Y') }}</td>
                                            <td class="text-center">{{ $data->start_time->format('H:i:s') }}</td>
                                            <td class="text-center">{{ $data->end_time->format('H:i:s') }}</td>
                                            <td class="text-center">{{ $data->total_time }}</td>
                                        @endforeach
                                        <tfoot>
                                        <tr>
                                            <th class="text-center" rowspan="1" colspan="1">General: {{ --$temp }}</th>
                                            <th rowspan="1" colspan="1"></th>
                                            <th rowspan="1" colspan="1"></th>
                                            <th rowspan="1" colspan="1"></th>
                                            <th rowspan="1" colspan="1"></th>
                                            <th class="text-center" rowspan="1" colspan="1">Total: {{ $sumOverTimeToday }} hour</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    {{ $overTimeDay->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Overtime Of Month, @php echo date('m/Y'); @endphp</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th width="5%" class="sorting_asc text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 297px;">Name</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 361px;">Date</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 322px;">Start time</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 257px;">End time</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 190px;">Total time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $temp = 1;
                                            @endphp
                                            @foreach($overTimeMonth as $data)
                                                <tbody>
                                                    <td class="text-center">{{ $temp++ }}</td>
                                                    <td class="text-center">{{ $data->user->name }}</td>
                                                    <td class="text-center">{{ $data->day->format('d/m/Y') }}</td>
                                                    <td class="text-center">{{ $data->start_time->format('H:i:s') }}</td>
                                                    <td class="text-center">{{ $data->end_time->format('H:i:s') }}</td>
                                                    <td class="text-center">{{ $data->total_time }}</td>
                                                </tbody>
                                            @endforeach
                                            <tfoot>
                                                <tr>
                                                    <th class="text-center" rowspan="1" colspan="1">Gereral: {{ --$temp }}</th>
                                                    <th rowspan="1" colspan="1"></th>
                                                    <th rowspan="1" colspan="1"></th>
                                                    <th rowspan="1" colspan="1"></th>
                                                    <th rowspan="1" colspan="1"></th>
                                                    <th class="text-center" rowspan="1" colspan="1">Total: {{ $sumOverTimeMonth }} hour</th>
                                                </tr>
                                            </tfoot>
                                         </tbody>
                                    </table>
                                    {{ $overTimeMonth->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div><div class="row docs-premium-template">
                <div class="col-sm-12 col-md-6">
                    <div class="box box-solid">
                        <div class="box-body">
                            <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                                STATISTIC OVERTIME EMPLOYEE TODAY, @php echo date('d-m/Y'); @endphp
                            </h4>
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                <tr role="row">
                                    <th width="5%" class="sorting_asc text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 297px;">Name</th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 190px;">Total time</th></tr>
                                </thead>
                                <tbody>
                                @php
                                    $temp = 1;
                                @endphp
                                @foreach($dataName as $data)
                                    <tbody>
                                        <td class="text-center">{{ $temp++ }}</td>
                                        <td class="text-center">{{ $data->user->name }}</td>
                                        <td class="text-center">{{ $data->total_times }}</td>
                                    </tbody>
                                @endforeach
                                <tfoot>
                                    <tr>
                                        <th class="text-center" rowspan="1" colspan="1">Gereral: {{ --$temp }}</th>
                                        <th rowspan="1" colspan="1"></th>
                                        <th class="text-center" rowspan="1" colspan="1">Total: {{ $dataSumRollCallToDay }} hour</th>
                                    </tr>
                                </tfoot>
                            </table>
                            {{ $dataName->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="box box-solid">
                        <div class="box-body">
                            <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                                STATISTIC OVERTIME EMPLOYEE OF MONTH, @php echo date('m/Y'); @endphp
                            </h4>
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th width="5%" class="sorting_asc text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 297px;">Name</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 190px;">Total time</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 25px;">Show</th></tr>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $temp = 1;
                                @endphp
                                @foreach($dataNameMonth as $data)
                                    <tbody>
                                        <td class="text-center">{{ $temp++ }}</td>
                                        <td class="text-center">{{ $data->user->name }}</td>
                                        <td class="text-center">{{ $data->total_times }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.overtime.showOvertime', $data->user_id) }}">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-th-list"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tbody>
                                @endforeach
                                <tfoot>
                                    <tr>
                                        <th class="text-center" rowspan="1" colspan="1">Gereral: {{ --$temp }}</th>
                                        <th rowspan="1" colspan="1"></th>
                                        <th class="text-center" rowspan="1" colspan="1">Total: {{ $dataSumRollCallMonth }} hour</th>
                                    </tr>
                                </tfoot>
                            </table>
                            {{ $dataNameMonth->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div></section>
@endsection