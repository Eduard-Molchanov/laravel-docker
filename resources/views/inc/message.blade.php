@if(session("success"))
    <div class="alert alert-success">
        {{session("success")}}
    </div>
@endif

@if(session("token"))
    <div class="alert alert-info">
        {{session("token")}}
    </div>
@endif

@if(session("message-danger"))
    <div class="alert alert-danger">
        {{session("message-danger")}}
    </div>
@endif

@if(session("warning"))
    <div class="alert alert-warning">
        {{session("warning")}}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
