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
                @if(Session::has('error'))
                    <p class="alert alert-danger">
                        <i class="fa fa-exclamation-circle"></i> {{Session::get('error')}}
                    </p>
                @endif
                <form class="form-horizontal" action="/books/" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="bookName" class="col-sm-2 control-label">Book Name</label>
                        <div class="col-sm-8">
                            <input name="bookName" class="form-control1" id="focusedinput" placeholder="Book Name" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Book File</label>
                        <div class="col-sm-8">
                            <input class="btn btn-primary" type="file" name="bookPdfFile">
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

@section('footerScripts')

@endsection