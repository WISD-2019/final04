@extends('layouts.template')

@section('title', '審核')

@section('content')
    <form id="send" action="/check" method="POST">
    {{ csrf_field() }}
        <style>
            .closebtn {
                margin-left: 15px;
                color: white;
                font-weight: bold;
                float: right;
                font-size: 22px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
            }

            .closebtn:hover {
                color: black;
            }
        </style>
    </form>



    <table class="table table-bordered" style="color:#000000" >
        <thead>
        <tr>
            <th  scope="col">編號</th>
            <th  scope="col">請假類型</th>
            <th  scope="col">事由</th>
            <th  scope="col">申請時間</th>
        </tr>
        </thead>
        <tbody id="Mytable2">
        @if ($countid > 0)
            @foreach ($leaveall as $leaveall)
                <tr>
                    <td scope="row">{{$leaveall->id}} </td>
                    <td>{{$leaveall->type}} </td>
                    <td>{{$leaveall->reason}} </td>
                    <td>{{$leaveall->apply_time}} </td>
                    <td>
                            <!--彈出修改視窗 Button trigger modal -->
                    <button type="button" class="btnSelect btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
                        修改
                    </button>
                    </td>

                </tr>
            @endforeach
        @endif

        </tbody>

    </table>

    <!--/////////////////////////////////////////// 顯示選取資料 -->
    <div id="output"></div>



    <!--'修改'彈出視窗的內容 Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">申請詳細資訊</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ url("/check_update") }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <label>編號</label>
                        <input type="text" class="form-control" name="update_id" id="update_id" readonly="readonly" >
                        <label >姓名</label>
                        <input type="text" class="form-control" name="update_type" id="update_type" readonly="readonly">
                        <label >電話</label>
                        <input type="text" class="form-control" name="update_reason" id="update_reason" readonly="readonly">
                        <label >性別</label>
                        <input type="text" class="form-control" name="update_apply_time" id="update_apply_time" readonly="readonly">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                            <button type="submit" class="btn btn-primary">確定修改</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- 給'修改'彈出視窗資料的java script -->
    <script>
        $(document).ready(function(){
// code to read selected table row cell data (values).
            $("#Mytable2").on('click','.btnSelect',function(){
                // get the current row
                var currentRow=$(this).closest("tr");
                var col0=currentRow.find("td:eq(0)").html();
                var col1=currentRow.find("td:eq(1)").html(); // get current row 2nd table cell TD value
                var col2=currentRow.find("td:eq(2)").html(); // get current row 3rd table cell  TD value
                var col3=currentRow.find("td:eq(3)").html();

                $('#update_id').val(col0.trim());
                $('#update_type').val(col1.trim());
                $('#update_reason').val(col2.trim());
                $('#update_apply_time').val(col3.trim());
            });
        });
    </script>


@endsection
