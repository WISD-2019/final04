@extends('layouts.template')

@section('title', '請假出差')

@section('content')
<div class="row">
    <div class="col-lg">
        <div class="thumbnail">
            <div class="caption">
              <H2>請假出差管理</H2>
                <form action="/action_page.php">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="customRadio" name="example" value="leave">
                        <label class="custom-control-label" for="customRadio">請假</label>
                    </div>    
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="customRadio2" name="example" value="travel">
                        <label class="custom-control-label" for="customRadio2">出差</label>
                    </div> 
                    <br>
                    
                    <div class="add"></div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
        $("input[type='radio']").click(function(){
            var radioValue = $("input[name='example']:checked").val();
            // alert("Your are a - " + radioValue);
            switch (radioValue){
                case "leave":
                    $( ".add" ).empty();
                    var str='';
                    // str+=("<div class=\"form-group row\" id=\"tsdbserver\" >");
                    // str+=("<label class=\"col-sm-2 col-form-label\" >"+"TSDBSERVER"+"</label>");
                    // str+=("<div class=\"col-sm-10\" >");
                    // str+=("<input name=\"TSDBSERVER\" class=\"form-control\" type=\"text\" value=\"192.168.5.17:8086\" disabled>");
                    // str+=("</div>");
                    // str+=("</div>");

                    str+=("<div class=\"form-group row\" id=\"type\" >");
                    str+=("<label class=\"col-sm-2 col-form-label\" >"+"假別"+"</label>");
                    str+=("<div class=\"col-sm-10\" >");
                    str+=("<select id=\"type\" class=\"form-control\" type=\"text\" name=\"type\">");
                    str+=("<option value=\"none\" selected=\"\">"+"請選擇一個"+"</option>");
                    str+=("<option value=\"事假\">事假</option>");
                    str+=("<option value=\"病假\">病假</option>");
                    str+=("<option value=\"公假\">公假</option>");
                    str+=("<option value=\"喪假\">喪假</option>");
                    str+=("<option value=\"育嬰假\">育嬰假</option>");
                    str+=("</select>");
                    str+=("</div>");
                    str+=("</div>");

                    str+=("<div class=\"form-group row\" id=\"start_time\" >");
                        str+=("<label class=\"col-sm-2 col-form-label\" >請假時間起</label>");
                        str+=("<div class=\"col-sm-3\" >");
                            str+=("<div class=\"input-group date\" id=\"datetimepicker1\" data-target-input=\"nearest\" >");
                                str+=("<input id=\"start_time\" name=\"start_time\" class=\"form-control datetimepicker-input\" type=\"text\" data-target=\"#datetimepicker1\" required=\"\">");
                                str+=("<div class=\"input-group-append\" data-target=\"#datetimepicker1\" data-toggle=\"datetimepicker\" >");
                                    str+=("<div class=\"input-group-text\"><i class=\"fa fa-calendar\"></i></div>");
                                str+=("</div>");
                            str+=("</div>");
                        str+=("</div>");
                    str+=("</div>");

                    str+=("<div class=\"form-group row\" id=\"end_time\" >");
                        str+=("<label class=\"col-sm-2 col-form-label\" >請假時間迄</label>");
                        str+=("<div class=\"col-sm-3\" >");
                            str+=("<div class=\"input-group date\" id=\"datetimepicker2\" data-target-input=\"nearest\" >");
                                str+=("<input id=\"end_time\" name=\"end_time\" class=\"form-control datetimepicker-input\" type=\"text\" data-target=\"#datetimepicker2\" required=\"\">");
                                str+=("<div class=\"input-group-append\" data-target=\"#datetimepicker2\" data-toggle=\"datetimepicker\" >");
                                    str+=("<div class=\"input-group-text\"><i class=\"fa fa-calendar\"></i></div>");
                                str+=("</div>");
                            str+=("</div>");
                        str+=("</div>");
                    str+=("</div>");

                    str+=("<div class=\"form-group row\" id=\"reason\" >");
                    str+=("<label class=\"col-sm-2 col-form-label\" >"+"請假理由"+"</label>");
                    str+=("<div class=\"col-sm-10\" >");
                    str+=("<input name=\"reason\" class=\"form-control\" type=\"text\" value=\"\" required=\"\">");
                    str+=("</div>");
                    str+=("</div>");

                    str+=("<div class=\"form-group row\" id=\"prove\" >");
                    str+=("<label class=\"col-sm-2 col-form-label\" >"+"證明"+"</label>");
                    str+=("<div class=\"col-sm-10\" >");
                    str+=("<input name=\"prove\" class=\"form-control\" type=\"text\" value=\"\" required=\"\">");
                    str+=("</div>");
                    str+=("</div>");

                    

                    // <div class="form-group row">
                    //     <label class="col-sm-2 col-form-label">開始時間</label>
                    //     <div class="col-sm-3">
                    //         <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    //             <input id='start_time' style="text-align: center" name="start_time" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" required/>
                    //             <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                    //                 <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    //             </div>
                    //         </div>
                    //     </div>
                    // </div>
                    $( ".add" ).append(str);
                break;
                case "travel":
                break;
            }
        });
    });
// function tt() {
//     console.log(document.getElementsByName('example')[0].value);

// }
</script>
@stop