@if(session("success"))
    <div class="alert alert-success">
        {{session("success")}}
    </div>
@endif

@if(session("token"))
    <div class="alert alert-success">
        {{session("token")}}
    </div>
@endif

@if(session("message-danger"))
    <div class="alert alert-danger">
        {{session("message-danger")}}
    </div>
@endif
