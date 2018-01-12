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
                                    <a href="/books/edit/{{$book->id}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection