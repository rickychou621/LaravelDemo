@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-bottom:10px;">
            <button id="AddMessage" class="btn btn-primary" data-toggle="modal" data-target="#myModal">新增留言</button>
        </div>
    </div>
    {{ csrf_field() }}
    <div class="row justify-content-center">
        @foreach ($Lists as $List)
        <div class="col-md-8" style="margin-bottom:10px;">
            <div class="card">
                <div class="card-header">
                    {{$List['title']}}
                    <small style="float:right;">
                        {{$List['author']}} - {{$List['created_at']}}
                        <button id="UpdateMessage" onClick="addMessage();" class="btn btn-success btn-sm">修改</button>
                        <button id="DeleteMessage" onClick="deleteMessage({{$List['id']}});" class="btn btn-danger btn-sm" >刪除</button>
                    </small>
                </div>

                <div class="card-body">
                    {{$List['context']}}
                </div>

                
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">新增留言</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>            
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2">標題</div>
                    <div class="col-md-8"><input type="text" id="newTitle" class="form-control"></div>
                </div>
                <div class="row" style="margin-top:10px;">
                    <div class="col-md-2">內容</div>
                    <div class="col-md-8"><textarea id="newContent" class="form-control"></textarea></div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onClick="addMessage();">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function addMessage()
{
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "/demo/add",
        method: "POST",
        data: {
            title: $('#newTitle').val(),
            context: $('#newContent').val()
        }
    }).done(function() {
        alert("新增成功!!");
        // window.location.reload();
    });
}

function updateMessage()
{
    
}

function deleteMessage(Del_ID)
{
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "/demo/"+Del_ID+"/del/",
        method: "DELETE"
    }).done(function() {
        alert("刪除成功!!");
        window.location.reload();
    });
}
</script>

@endsection


