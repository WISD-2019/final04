@extends('layouts.template')

@section('title', 'user')

@section('content')

<form style="text-align:left" class="form-inline" action="{{route('insert')}}" method="POST">
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
<div class="col-lg-12">
    <div class="thumbnail">
        <div class="form-group mx-sm-3 mb-2">
            <div class="row">
            <div class="col-sm-1" >
                <select class="form-control sm-2 mb-1" id="type" name="type">
                <option >0</option>
                <option >1</option>
                </select>
            </div>（0為員工，1為管理者）
    
            <div class="col-sm-3 mb-1" >
                <div class="controls mx-sm-2 mb-1">
                    <input id="user_id" name="user_id" class="form-control" type="text" placeholder="請輸入員工編號" class="input-large" required="">
                </div>
            </div>

            <div class="col-sm-3 mb-1" >
                <div class="controls">
                    <input id="username" name="username" class="form-control" type="text" placeholder="請輸入帳號" class="input-large" required="">
                </div>
            </div>

            <div class="col-sm-3 mb-1" >
                <div class="controls">
                    <input id="password" name="password" class="form-control" type="text" placeholder="請輸入密碼" class="input-large" required="">
                </div>
            </div>

            <div class="col-sm-3 mb-1" >
                <div class="controls">
                    <input id="name" name="name" class="form-control" type="text" placeholder="請輸入姓名" class="input-large" required="">
                </div>
            </div>

            <div class="col-sm-3 mb-1" >
                <div class="controls">
                    <input id="email" type="email" class="form-control " name="email" value="" required="" placeholder="請輸入email" autocomplete="email">
                </div>
            </div>

            <div class="col-sm-3 mb-1" >
                <div class="controls">
                    <input id="age" name="age" class="form-control" type="text" placeholder="請輸入年齡" class="input-large" required="">
                </div>
            </div>

            <div class="col-sm-1.5 mb-1" >
                <select class="form-control mx-sm-2 " id="sex" name="sex">
                    <option >男</option>
                    <option >女</option>
                </select>
            </div>
            
            <div class="col-sm-3 mb-1" >
                <div class="controls">
                    <input id="work" name="work" class="form-control" type="text" placeholder="請輸入職位" class="input-large" required="">
                </div>
            </div>

            <div class="col-sm-3 mb-1" >
                <input id=phone name=phone type="text" class="form-control" placeholder="請輸入手機號碼">
            </div>

            <div class="col-sm-3 mb-1" >
                <button type="submit" class="btn btn-primary">新增</button>
            </div>
            </div>
        </div>
    </div>
</div>
</form>
@stop