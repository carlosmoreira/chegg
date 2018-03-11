<div class="row" ng-controller="PDFCtrl" ng-init="init()">
    <div class="col-md-9">
        <div class="wrapper" >
            <div ng-show="error">
                <div class="alert alert-danger">
                    <i class="fa fa-exclamation-circle"></i> @{{error}}
                </div>
            </div>
            <div ng-show="!documentLoaded && !error">
                <uib-progressbar
                        class="progress-striped active"
                        max="progressBar.max"  value="progressBar.currentValue"
                        type="danger">
                    <i>@{{progressBar.currentValue}} / @{{progressBar.max}}</i>
                </uib-progressbar>
            </div>

            <div style="border-right:1px solid #101010;">
                <ng-pdf
                        ng-show="documentLoaded"
                        scale="page-fit"
                        template-url="views/viewer"
                        page="@{{pageNum}}">
                </ng-pdf>
            </div>
        </div>
    </div>
    <div class="col-md-3" ng-show="documentLoaded">
        <h2 style="font-family: cursive">@{{pdfName}}</h2>
        <h4>Page Number: @{{pageNum}}</h4>
        <hr>
        <h3>
            <a class="" ng-click="openAddNoteModal('lg')">
                <i class="fa fa-plus-circle"></i>
            </a>
            Bookmarks
            <hr>
        </h3>
        <ul class="notes">
            <li ng-repeat="note in selectedBook.notes"
                ng-if="note.page == pageNum">
                <div class="rotate-1 lazur-bg">
                    <p>@{{note.note}}</p>
                    <a href="#" class="text-danger pull-right" style="margin-top:-10px;"><i class="fa fa-trash-o "></i></a>
                </div>
            </li>
        </ul>
    </div>
</div>

<script type="text/ng-template" id="myModalContent.html">
    <div class="modal-header">
        <h3 class="modal-title" id="modal-title">New Bookmark</h3>
    </div>
    <div class="modal-body" id="modal-body">
        <form name="newNoteForm">
            <div class="form-group">
                <label for="note">Bookmark:</label>
                <textarea ng-disabled="running" class="form-control" rows="5" id="bookmark" required ng-model="bookmark.note">
                    Bookmark...
                </textarea>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="button" ng-disabled="running" ng-click="createBookmark()">
            Save <i class="fa fa-spin fa-spinner" ng-show="running"></i>
        </button>
        <button class="btn btn-warning" type="button" ng-click="cancel()">Cancel</button>
    </div>
</script>
