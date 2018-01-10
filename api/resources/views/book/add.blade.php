@extends('layouts.novus')

@section('content')
<h2>Add To Library</h2>
<div class="row">
    <div class="col-md-2">
        @include('book.partials.menu')
    </div>
    <div class="col-md-10">
        <div class="panel panel-primary widget-shadow">
            <div class="panel-heading customPanel">
                <h2 class="panel-title">Add Book</h2>
            </div>
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Book Name</label>
                        <div class="col-sm-8">
                            <input class="form-control1" id="focusedinput" placeholder="Default Input" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Book File</label>
                        <div class="col-sm-8">
                            <input type="file">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <input type="submit" value="Add Book" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection