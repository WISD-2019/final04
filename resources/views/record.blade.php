@extends('layouts.template')

@section('title', '請假紀錄查詢')

@section('content')
<div class="row">
    <div class="col-lg">
        <div class="thumbnail">
            <div class="caption">
                <H2>請假紀錄查詢</H2>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{Auth::user()->name}}</th>
                        <th>假別</th>
                        <th>理由</th>
                        <th>申請時間</th>
                        <th>審核狀況</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($query as $data)
                    <tr>
                        <td></td>
                        <td>{{$data->type}}</td>
                        <td>{{$data->reason}}</td>
                        <td>{{$data->apply_time}}</td>
                        <td>
                            @if($data->status==1)
                                已通過
                            @else
                                未通過
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $query->links() }}
        </div>
    </div>
</div>
@stop
