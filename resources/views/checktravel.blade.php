@extends('layouts.template')

@section('title', '出差申請審核')

@section('content')
    <form id="send" action="/checkTravel" method="POST">
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


    <h1>出差申請</h1>
    <table class="table table-bordered" style="color:#000000" >
        <thead>
        <tr>
            <th  scope="col">編號</th>
            <th  scope="col">申請人姓名</th>
            <th  scope="col">出差地點</th>
            <th  scope="col">事由</th>
            <th  scope="col">申請時間</th>
            <th  scope="col">審核狀態</th>
        </tr>
        </thead>
        <div class="panel-body" >
            <tbody id="Mytable2">
                @foreach ($travel as $travels)
                    <tr>
                        <td scope="row">{{$travels->id}} </td>
                        <td>{{$travels->user->username}} </td>
                        <td>{{$travels->location}} </td>
                        <td>{{$travels->reason}} </td>
                        <td>{{$travels->apply_time}} </td>
                        <td style="display:none">{{$travels->start_time}} </td>
                        <td style="display:none">{{$travels->end_time}} </td>
                        <td style="display:none">{{$travels->updated_at}} </td>
                        @if($travels->status == "1")
                            <td>已審核</td>
                            <td>
                                <button type="button" class="btnSelect btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
                                    詳細資料
                                </button>
                            </td>
                        @else
                            <td>未審核</td>
                            <td>
                                <!--彈出修改視窗 Button trigger modal -->
                                <button type="button" class="btnSelect btn btn-primary" data-toggle="modal" data-target="#exampleModal1" >
                                    審核
                                </button>
                            </td>
                        @endif
                    </tr>
        @endforeach
    </table>
    {{ $travel->links() }}
    </div>

    <!--/////////////////////////////////////////// 顯示選取資料 -->
    <div id="output"></div>
    <!--未審核'彈出視窗的內容 Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">申請詳細資訊</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url("/updateTravelStatus") }}" method="POST">
                    {{ csrf_field() }}
                    <p class="modal-body">
                        <label>編號<input type="text" class="form-control" name="id" id="id" readonly="readonly" ></label>
                        <label>申請人姓名<input type="text" class="form-control" name="user_id" id="user_id" readonly="readonly" ></label>
                        <label>出差地<input type="text" class="form-control" name="type" id="type" readonly="readonly"></label>
                        <label>申請時間<input type="text" class="form-control" name="apply_time" id="apply_time" readonly="readonly"></label>
                        <label>開始時間<input type="text" class="form-control" name="start_time" id="start_time" readonly="readonly"></label>
                        <label>結束時間<input type="text" class="form-control" name="end_time" id="end_time" readonly="readonly"></label>
                        <br>
                        <label>事由</label>
                        <input type="text" class="form-control" name="reason" id="reason" readonly="readonly">
                    <div style="text-align:right" >
                        <pre><input type="checkbox" name="update_status" value="1">核准         </pre><br></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary">確定</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="output"></div>
    <!--'已審核'彈出視窗的內容 Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">申請詳細資訊</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ url("/updateTravelStatus") }}" method="POST">
                    {{ csrf_field() }}
                    <p class="modal-body">
                        <label>編號<input type="text" class="form-control" name="id1" id="id1" readonly="readonly" ></label>
                        <label>申請人姓名<input type="text" class="form-control" name="user_id1" id="user_id1" readonly="readonly" ></label>
                        <label>假別<input type="text" class="form-control" name="type1" id="type1" readonly="readonly"></label>
                        <label>申請時間<input type="text" class="form-control" name="apply_time1" id="apply_time1" readonly="readonly"></label>
                        <label>開始時間<input type="text" class="form-control" name="start_time1" id="start_time1" readonly="readonly"></label>
                        <label>結束時間<input type="text" class="form-control" name="end_time1" id="end_time1" readonly="readonly"></label>
                        <br>
                        <label>事由</label>
                        <input type="text" class="form-control" name="reason1" id="reason1" readonly="readonly">
                        已核准 核准時間:
                        <input type="text" class="form-control" name="update_time1" id="update_time1" readonly="readonly">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">確定</button>
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
                var col4=currentRow.find("td:eq(4)").html();
                var col5=currentRow.find("td:eq(5)").html();
                var col6=currentRow.find("td:eq(6)").html();
                var col7=currentRow.find("td:eq(7)").html();

                $('#id').val(col0.trim());
                $('#user_id').val(col1.trim());
                $('#type').val(col2.trim());
                $('#reason').val(col3.trim());
                $('#apply_time').val(col4.trim());
                $('#start_time').val(col5.trim());
                $('#end_time').val(col6.trim());


                $('#id1').val(col0.trim());
                $('#user_id1').val(col1.trim());
                $('#type1').val(col2.trim());
                $('#reason1').val(col3.trim());
                $('#apply_time1').val(col4.trim());
                $('#start_time1').val(col5.trim());
                $('#end_time1').val(col6.trim());
                $('#update_time1').val(col7.trim());


            });
        });
    </script>

@endsection
