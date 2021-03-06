@extends('layouts.template')

@section('title', '人員管理')

@section('content')


    <div class="col-sm-3 mb-1" >
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">新增人員</button>
    </div>




  <div class="col-lg-15">
    <div class="thumbnail">
    <input class="form-control" id="myInput" type="text" placeholder="Search..">

    <table class="table  table-dark table-striped" id= "table-id" style="text-align:center">
       
    <thead>
        <tr>
            <th >編號</th>
            <th>員工編號</th>
            <th>姓名</th>
            <th>email</th>
            <th>年齡</th>
            <th>性別</th>
            <th>職業</th>
            <th>電話</th>
            <th>編輯</th> 
        </tr>
        </thead>
        <tbody id="myTable">
        
        @foreach ($user as $users)

        <tr>
            <td >{{$users->id}}</td>
            <td >{{$users->user_id}}</td>
            <td>{{$users->name}}</td>
            <td>{{$users->email}}</td>
            <td>{{$users->age}}</td>
            <td>{{$users->sex}}</td>
            <td>{{$users->work}}</td>
            <td>{{$users->phone}}</td>
            <td>
         
   
    

            <form action="{{route('delete')}}" method="POST">
            {{ csrf_field() }}
   

            <button type="submit" class="btn btn-primary" value="{{$users->id}}" name='delete'>刪除</button>
            <button type="button" class="btnSelect  btn btn-danger " value="{{$users->id}}" name='update' data-toggle="modal" data-target="#exampleModalLong1">修改</button></td>
            </tr>
            </form>
    
    @endforeach
        </tbody>
    </table>
    {{ $user->links() }}
</div>
</div>

<!-- 彈窗新增Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="insert">新增</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form class="form-horizontal" action="{{route('insert')}}" method="post">
        {{ csrf_field() }}
        <fieldset>
            <!-- 類別-->
            <div class="control-group">
                <label class="control-label" >類別(0為員工，1為管理者)： 
                <select class="form-control mx-sm-2 " id="type" name="type">
                    <option >0</option>
                    <option >1</option>
                </select>
            </div>
            <!-- 員工編號-->
            <div class="control-group">
                <label class="control-label">員工編號({{$userid->user_id}})：
                <input id="user_id" name="user_id" class="form-control" type="text" placeholder="請輸入員工編號" class="input-large" required="">
            </div>
            <!-- 帳號-->
            <div class="control-group">
                <label class="control-label">帳號： 
                <input id="username" name="username" class="form-control" type="text" placeholder="請輸入帳號" class="input-large" required="">
            </div>
            <!-- 密碼-->
            <div class="control-group">
                <label class="control-label" >密碼： 
                <input id="password" name="password" class="form-control" type="text" placeholder="請輸入密碼" class="input-large" required="">
            </div>
            <!-- 姓名-->
            <div class="control-group">
                <label class="control-label">姓名：
                <input id="name" name="name" class="form-control" type="text" placeholder="請輸入姓名" class="input-large" required="">
            </div>
            <!-- email-->
            <div class="control-group">
                <label class="control-label">email：
                <input id="email" type="email" class="form-control " name="email" value="" required="" placeholder="請輸入email" autocomplete="email">
            </div>
            <!-- 年齡-->
            <div class="control-group">
                <label class="control-label" >年齡： 
                <input id="age" name="age" class="form-control" type="text" placeholder="請輸入年齡" class="input-large" required="">
            </div>
            <!-- 性別-->
            <div class="control-group">
                <label class="control-label" >性別： 
                <select class="form-control mx-sm-2 " id="sex" name="sex">
                    <option >男</option>
                    <option >女</option>
                </select>
            </div>
            <!-- 職位-->
            <div class="control-group">
                <label class="control-label" >職位： 
                <input id="wrok" name="work" class="form-control" type="text" placeholder="請輸入年齡" class="input-large" required="">
            </div>
            <!-- 電話-->
            <div class="control-group">
                <label class="control-label" >電話： 
                <input id=phone name=phone type="text" class="form-control" placeholder="請輸入電話" required="">
            </div>
            <!-- 彈窗按鈕-->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
              <button type="submit" class="btn btn-primary" >確定</button>
            </div>
        </form>
        </div>
    </div>
  </div>
</div>




<!-- 彈窗修改Modal -->
<div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle1">修改</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
          <form class="form-horizontal" action="{{route('update')}}" method="post">
          <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
          <fieldset>
            <!-- 編號-->
            <div class="control-group">
                <label class="control-label" >編號：
                    <input id="id" name="id" class="form-control" type="text"  class="input-large" required="" readonly="readonly">
            </div>
            <!-- 員工編號-->
            <div class="control-group">
                <label class="control-label" >員工編號({{$users->user_id}})：
                    <input id="user_id1" name="user_id1" class="form-control" type="text"  class="input-large" required="" >
            </div>
            <!-- 姓名-->
            <div class="control-group">
                <label class="control-label">姓名：
                <div class="controls">
                    <input id="name1" name="name1" class="form-control" type="text"  class="input-large" required="">
            </div>
            <!-- email-->      
            <div class="control-group">
                <label class="control-label">email：
                <input id="email1" name="email1" class="form-control" type="text"  class="input-large" required="">
            </div>

            <!-- 年齡-->
            <div class="control-group">
                <label class="control-label">年齡： 
                    <input id="age1" name="age1" class="form-control" type="text"  class="input-large" required="">
            </div>
            <!-- 性別-->
            <div class="control-group">
                <label class="control-label" >性別： 
                <input id="sex1" name="sex1" class="form-control" type="text"  class="input-large" required="">
            </div>
            <!-- 職位-->
            <div class="control-group">
                <label class="control-label">職位：
                <input  id="work1" name="work1" class="form-control" type="text" class="input-large" required="">
            </div>
            <!-- 電話-->
            <div class="control-group">
                <label class="control-label" >電話： 
                <input  id="phone1" name="phone1" class="form-control" type="text" class="input-large" required="">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
              <button type="submit" class="btn btn-primary" >確定</button>
            </div>
          </form>
          </div>
    </div>
  </div>
</div>
<script>
 $(document).ready(function(){
   $("#myInput").on("keyup", function() {
     var value = $(this).val().toLowerCase();
     $("#myTable tr").filter(function() {
       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
     });
   });
 });
 </script>
 
 <script>
 $(document).ready(function(){

// code to read selected table row cell data (values).
$("#myTable").on('click','.btnSelect',function(){
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
     $('#id').val(col0);
     $('#user_id1').val(col1);
     $('#name1').val(col2);
     $('#email1').val(col3);
     $('#age1').val(col4);
     $('#sex1').val(col5);
     $('#work1').val(col6);
     $('#phone1').val(col7);


  });
});
</script>
@stop