@if(isset($error))
    <div class="alert alert-danger">{{ $error }}</div>
@endif

@if(isset($info))
    <div class="alert alert-info">{{ $info }}</div>
@endif
