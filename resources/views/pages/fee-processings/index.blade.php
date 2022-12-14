@extends('layouts.master')

@section('title')
    {{ __('trans.list', ['name' => __('fee.fee_exclusion')]) }}
@stop

@section('breadcrum')
    {{ __('fee.fee_exclusion') }}@endsection

@section('breadcrum_home')
    {{ __('trans.list', ['name' => __('fee.fee_exclusion')]) }}
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr class="alert-success">
                                    <th>#</th>
                                    <th>{{ __('fee.student_name') }}</th>
                                    <th>{{ __('fee.amount') }}</th>
                                    <th>{{ __('fee.report') }}</th>
                                    <th>{{ __('buttons.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feeProcessings as $feeProcessing)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $feeProcessing->student->name }}</td>
                                        <td>{{ number_format($feeProcessing->amount, 2) }}</td>
                                        <td>{{ $feeProcessing->description }}</td>
                                        <td>
                                            <a href="{{ route('fee-processings.edit', $feeProcessing) }}"
                                                class="btn btn-outline-info btn-sm" role="button" aria-pressed="true"><i
                                                    class="fas fa-edit"></i></a>
                                            <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $feeProcessing->id }}"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                    {{-- delete fee processing --}}
                                    <x-delete-modal :id="$feeProcessing->id" :title="__('msgs.delete', ['name' => __('fee.fee_exclusion')])" :action="route('fee-processings.destroy', $feeProcessing)" />
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
