@extends('layouts.template')

@section('content')

<!-- 選擇日期時間 -->
<form id="send" action="{{route('attend')}}" method="POST">
            {{ csrf_field() }}
            <div class="row" >
                <div class="col-xs-6 col-md-2">
                    <span id="arg">開始時間:</span>
                </div>
                <div class="form-group" style="margin-left: 2%" >
                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                        <input id='start_time' style="text-align: center" name="start_time" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" required/>
                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
               
                <div class="col-xs-6 col-md-2">
                    <span id="arg">結束時間:</span>
                </div>
                <div class="form-group" style="margin-left: 2%">
                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                        <input id='end_time' style="text-align: center" name="end_time" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2" required/>
                        <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 抓取資料庫資料 -->
            <div class="row">
                <div class="col-md-6"></div><input id='sub_btn' style="margin: 2% ; margin-left : 80%"  class="btn-lg btn-success btn" type="submit" value="送出"/>
            </div>
            <table class="table table-dark table-striped" style="text-align:center">

            <tr>
            <td>{{Auth::user()->name}}</td>
            <td>日期</td>
            <td>上班時間</td>
            <td>下班時間 </td>
             <td>狀態</td>
            </tr>
            @foreach($on_work as $on_works) 
            <tr>
                <td></td>
                <td>{{$on_works}}</td>
            @foreach($query as $users) 
            @if(substr($users->on_work,0,10)==$on_works)
                <td>{{substr($users->on_work,10,18)}}</td>
                <td>{{substr($users->off_work,10,18)}}</td>
                <td></td>
             </tr>
             @endif
             @endforeach
            @endforeach 
            </table>
        </form>


    </div>
</div>



<!-- 時間選擇器 -->
<!-- datetimepicker1 物件  -->
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({
            locale:'zh-tw',
            format: 'YYYY-MM-DD HH:mm:ss ',
            weekStart: 1,
            autoclose: 0,
            todayHighlight: 1,
            // sideBySide:true,
            stepping:0,
            minView:0,
            maxView:0,
            startView: 0,  // 0 ＝月曆   1＝月份  2 =年份
        });
    });
</script>

<!-- datetimepicker2 物件  -->
<script type="text/javascript">
    $(function () {
        $('#datetimepicker2').datetimepicker({
            locale:'zh-tw',
            format: 'YYYY/MM/DD HH:mm:ss ',
            weekStart: 1,
            autoclose: 0,
            todayHighlight: 1,
            // sideBySide:true,
            stepping:0,
            minView:0,
            maxView:0,

            startView: 0,  // 0 ＝月曆   1＝月份  2 =年份
        });
    });
</script>
@endsection