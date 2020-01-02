@extends('layouts.template')

@section('title', 'check')


@section('content')
<div class="row justify-content-center">
  <div class="col-lg-6">
      <div class="thumbnail">
          <div class="caption">
            <H2>現在時間</H2>
            <body onload="ShowTime()">
              <div id="showbox" name="showbox"></div>
              </body>
              <ul class="nav nav-tabs">
                <li class="active"><a class="nav-link" data-toggle="tab" href="#home">上班</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#menu1">下班</a></li>
              </ul>           
          <div class="tab-content">
              <div id="home" class="tab-pane active">
                      <div class="form-group row">
                          <label style="text-align:right" for="text" class="col-sm-3 col-form-label">員工編號</label>
                          <div class="col-sm-6">
                          <input type="text" class="form-control" id="on_work" name="on_work" placeholder="ID" >
                          <button type="submit" class="btn btn-primary">確定</button>
                          <input type="hidden" name="select" value="1">
                          </div>
                      </div>
              </div>
              <div id="menu1" class="tab-pane fade">
                      <div class="form-group row">
                          <label style="text-align:right" for="text" class="col-sm-3 col-form-label">員工編號</label>
                          <div class="col-sm-6">
                          <input type="text" class="form-control" id="off_work" name="off_work" placeholder="ID" >
                          <button type="submit" class="btn btn-primary">確定</button>
                          <input type="hidden" name="select" value="2">
                          </div>
                      </div>
              </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- 加入現在時間 -->
<script language="JavaScript">
  function ShowTime(){
  　var NowDate=new Date();
    var y=NowDate.getFullYear();
    var M=NowDate.getMonth()+1;
    var d=NowDate.getDate();
  　var h=NowDate.getHours();
  　var m=NowDate.getMinutes();
  　var s=NowDate.getSeconds();　
  　document.getElementById('showbox').innerHTML =y+'年'+M+'月'+d+'日'+ h+'時'+m+'分'+s+'秒';
  　setTimeout('ShowTime()',1000);
  }
</script>


@stop

