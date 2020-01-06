@extends('layouts.template')

@section('title', '請假出差')

@section('content')

<div class="row">
    <div class="col-lg">
        <div class="thumbnail">
            <div class="caption">
              <H2>請假出差管理</H2>
                <form id="form" method="POST" action="{{route('submit')}}" enctype="multipart/form-data">
                @csrf
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
                    
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
        $("input[type='radio']").click(function(){
            var radioValue = $("input[name='example']:checked").val();

            switch (radioValue){
                case "leave":
                    $( ".add" ).empty();
                    var str='';

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
                        str+=("<label class=\"col-sm-2 col-form-label\" >"+"請假事由"+"</label>");
                        str+=("<div class=\"col-sm-10\" >");
                        str+=("<input name=\"reason\" class=\"form-control\" type=\"text\" value=\"\" required=\"\">");
                        str+=("</div>");
                    str+=("</div>");

                    str+=("<div class=\"form-group row\" id=\"prove\" >");
                    str+=("<label class=\"col-sm-2 col-form-label\" >"+"證明"+"</label>");
                    str+=("<div class=\"col-sm-10 custom-file\">");
                        str+=("<input type=\"file\" class=\"custom-file-input\" id=\"customFile\" name=\"filename\" required>");
                        str+=("<label class=\"custom-file-label\" for=\"customFile\">Choose file</label>");
                    str+=("</div>");
                    str+=("</div>");

                    str+=("<input type=\"hidden\" name=\"select\" value=\"leave\">");

                    str+=("<button type=\"submit\" class=\"btn btn-primary\">提交申請</button>");
 
                    $( ".add" ).append(str);
                break;

                case "travel":
                    $( ".add" ).empty();
                    var str='';

                    str+=("<div class=\"form-group row\" id=\"location\" >");
                    str+=("<label class=\"col-sm-2 col-form-label\" >"+"地點"+"</label>");
                    str+=("<div class=\"col-sm-10\" >");
                    str+=("<select id=\"location\" class=\"form-control\" type=\"text\" name=\"location\">");
                    str+=("<option value=\"none\" selected=\"\">"+"請選擇一個"+"</option>");
                    str+=("<option value=\"基隆市\">基隆市</option>");
                    str+=("<option value=\"台北市\">台北市</option>");
                    str+=("<option value=\"新北市\">新北市</option>");
                    str+=("<option value=\"桃園縣\">桃園縣</option>");
                    str+=("<option value=\"新竹市\">新竹市</option>");
                    str+=("<option value=\"新竹縣\">新竹縣</option>");
                    str+=("<option value=\"苗栗縣\">苗栗縣</option>");
                    str+=("<option value=\"台中市\">台中市</option>");
                    str+=("<option value=\"彰化縣\">彰化縣</option>");
                    str+=("<option value=\"南投縣\">南投縣</option>");
                    str+=("<option value=\"雲林縣\">雲林縣</option>");
                    str+=("<option value=\"嘉義市\">嘉義市</option>");
                    str+=("<option value=\"嘉義縣\">嘉義縣</option>");
                    str+=("<option value=\"台南市\">台南市</option>");
                    str+=("<option value=\"高雄市\">高雄市</option>");
                    str+=("<option value=\"屏東縣\">屏東縣</option>");
                    str+=("<option value=\"台東縣\">台東縣</option>");
                    str+=("<option value=\"花蓮縣\">花蓮縣</option>");
                    str+=("<option value=\"宜蘭縣\">宜蘭縣</option>");
                    str+=("<option value=\"澎湖縣\">澎湖縣</option>");
                    str+=("<option value=\"金門縣\">金門縣</option>");
                    str+=("<option value=\"連江縣\">連江縣</option>");
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
                    str+=("<label class=\"col-sm-2 col-form-label\" >"+"出差事由"+"</label>");
                    str+=("<div class=\"col-sm-10\" >");
                    str+=("<input name=\"reason\" class=\"form-control\" type=\"text\" value=\"\" required=\"\">");
                    str+=("</div>");
                    str+=("</div>");

                    str+=("<input type=\"hidden\" name=\"select\" value=\"travel\">");

                    str+=("<button type=\"submit\" class=\"btn btn-primary\">提交申請</button>");

                    $( ".add" ).append(str);
                break;
            }
        });
    });

</script>
<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@stop