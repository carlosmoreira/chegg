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
                    <p id="formError" class="alert alert-danger" style="display: none;">
                        <i class="fa fa-exclamation-circle"></i> <span id="errorText"></span>
                    </p>
                    <form id="addEditForm" class="form-horizontal"
                          @if($book->id)
                          action="/books/{{$book->id}}"
                          @endif
                          method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if($book->id)
                            {{ method_field('PUT') }}
                        @endif
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
                        <div id="progressbar" class="progress" style="display: none;">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                                 aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                <span id="progress-text"></span> Complete (success)
                            </div>
                        </div>
                        <div style="display: none"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerScripts')
    <link rel="stylesheet" href="/libs/jquery-ui-1.12.1/jquery-ui.min.css">
    <script src="/libs/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script src="/libs/jquery-form/jquery.form.min.js"></script>
    <script>

        var formError = $('#formError');

        // pre-submit callback
        function showRequest(formData, jqForm, options) {
            $("#progressbar").show();
            $('#progressbar .progress-bar').css('width', "0%");
            $('#progressbar .progress-bar #progress-text').text("0%");
            formError.hide();
            var queryString = $.param(formData);
            return true;
        }

        //Handle Error
        function handleError(response) {
            $("#progressbar").hide();
            var formError = $('#formError');
            formError.show();
            var reason = "";
            if(response.error)
                reason += " - " + response.error;
            $('#errorText').text("There was an error submitting the form " + reason);
        }

        // post-submit callback
        function showResponse(response, statusText, xhr, $form) {
            if (response.success)
                window.location.href = "/" + response.redirectUrl;
            else
                handleError(response);
        }

        $(document).ready(function () {
            var options = {
                beforeSubmit: showRequest,  // pre-submit callback
                success: showResponse,  // post-submit callback
                error: handleError,
                url: '/books',
                uploadProgress: function (event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    $('#progressbar .progress-bar').css('width', percentVal);
                    $('#progressbar .progress-bar #progress-text').text(percentVal);

                },
                complete: function (response) {
                }
            };
            $('form#addEditForm').ajaxForm(options);
        });
    </script>
@endsection