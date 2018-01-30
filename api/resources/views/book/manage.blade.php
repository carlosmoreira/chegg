@extends('layouts.novus')

@section('content')
    <h2>Manage Library</h2>
    @if(Session::has('success'))
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <p class="alert alert-success">
                    <i class="fa fa-exclamation-circle"></i>  {{Session::get('success')}}
                </p>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-2">
            @include('book.partials.menu')
        </div>
        <div class="col-md-10">
            <div class="panel panel-primary widget-shadow">
                <div class="panel-heading customPanel">
                    <h2 class="panel-title">Library</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Books</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($books as $book)
                            <tr>
                                <td>{{$book->name}}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="/books/{{$book->id}}/edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger"
                                            onclick="document.getElementById('deleteBook{{$book->id}}').submit();">
                                        <i class="fa fa-bug">
                                        </i>
                                    </button>
                                    <form action="/books/{{$book->id}}" method="POST" id="deleteBook{{$book->id}}">
                                        {{ csrf_field() }}
                                        @if($book->id)
                                            {{ method_field('DELETE') }}
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection