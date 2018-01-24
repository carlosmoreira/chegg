@extends('layouts.novus')

@section('content')
<h2>
    @if($book->id)
        Edit Book
    @else
        Add To Library
    @endif
</h2>
<div class="row">
    <div class="col-md-2">
        @include('book.partials.menu')
    </div>
    <div class="col-md-10">
        <div class="panel panel-primary widget-shadow">
            <div class="panel-heading customPanel">
                <h2 class="panel-title">
                    @if($book->id)
                        Edit Book
                    @else
                        Add Book
                    @endif
                </h2>
            </div>
            <div class="panel-body">
                @if(Session::has('error'))
                    <p class="alert alert-danger">
                        <i class="fa fa-exclamation-circle"></i> {{Session::get('error')}}
                    </p>
                @endif
                <form class="form-horizontal"
                      action="
                            @if($book->id)
                              /books/{{$book->id}}
                            @else
                              /books/
                            @endif
                        " method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if($book->id)
                        {{ method_field('PUT') }}
                    @endif
                    <div>
                        old: {{old('name')}}
                    </div>
                    <div class="form-group">
                        <label for="bookName" class="col-sm-2 control-label">Book Name</label>
                        <div class="col-sm-5">
                            <input name="name"
                                   class="form-control1"
                                   id="bookName" placeholder="Book Name" type="text"
                                   value="{{ ($book->name) ? $book->name : old('name')}}">
                        </div>
                    </div>
                    @if($book->id)
                        <div class="form-group">
                            <label for="pageNum" class="col-sm-2 control-label">Max page Read</label>
                            <div class="col-sm-2">
                                <input name="pageNum"
                                       class="form-control1"
                                       id="pageNum" placeholder="Page Num" type="number"
                                       value="{{$book->pageNum}}">
                            </div>
                        </div>
                    @endif
                    @if(!$book->id)
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Book File</label>
                            <div class="col-sm-8">
                                <input class="btn btn-primary" type="file" name="bookPdfFile">
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <input type="submit" value="
                                @if($book->id)
                                    Update
                                @else
                                    Add
                                @endif
                                Book" class="btn btn-success">
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