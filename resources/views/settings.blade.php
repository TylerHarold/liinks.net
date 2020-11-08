@extends("layouts.master")

@section("body")
    <div class="container">
        <div class="row p-3">
            <div class="col-md-3 col-sm-12">
                <form method="POST" action="/settings/upload-avatar" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <label for="avatar">Upload Avatar</label>
                    <input type="file" name="avatar" id="avatar" accept=".png,.jpg">
                    <input type="submit" class="btn btn-primary btn-block" value="Upload Avatar" />
                </form>
            </div>
        </div>
    </div>
@endsection
