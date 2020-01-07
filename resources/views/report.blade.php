@extends('layouts.template')
@section('title', '出缺勤報表')
@section('content')

<div class="thumbnail">

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
                @endif
            @endforeach
            @foreach($leave as $leaves )
             @if((substr($leaves->start_time,0,10))==$on_works&&($leaves->status=="1"))
                <td></td>
                <td></td>
                <td>{{$leaves->type}}</td>  
                @elseif((substr($leaves->start_time,0,10))==$on_works&&($leaves->status=="0"))
                <td></td>
                <td></td>
                <td>缺曠</td>
                @endif 
            @endforeach
            @foreach($travel as $travels)
                @if((substr($travels->start_time,0,10))==$on_works&&($travels->status=="1"))
                <td></td>
                <td></td>
                <td>出差</td> 
                </tr>
                @elseif((substr($travels->start_time,0,10))==$on_works&&($travels->status=="0"))
                <td></td>
                <td></td>
                <td>缺曠</td>
               
                @endif
            @endforeach
           
            
             
            
            @endforeach 
            </table>
</div>




@endsection