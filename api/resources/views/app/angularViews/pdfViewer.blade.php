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
            Notes:
            <span style="text-decoration: underline;font-size: 15px;" ng-click="openAddNoteModal('sm')">
                <i>Add Note</i>
            </span>
        </h3>
        <ul class="notes">
            <li ng-repeat="note in selectedBook.notes"
                ng-if="note.page == pageNum">
                <div class="rotate-1 lazur-bg">
                    <!--<small>12:03:28 12-04-2014</small>-->
                    <!--<h4>Awesome title</h4>-->
                    <p>@{{note.note}}</p>
                    <a href="#" class="text-danger pull-right"><i class="fa fa-trash-o "></i></a>
                </div>
            </li>
        </ul>
    </div>
</div>

<script type="text/ng-template" id="myModalContent.html">
    <div class="modal-header">
        <h3 class="modal-title" id="modal-title">New Note</h3>
    </div>
    <div class="modal-body" id="modal-body">
        <form name="newNoteForm">
            <div class="form-group">
                <label for="note">Note:</label>
                <textarea name="note" id="note" cols="30" rows="10" required></textarea>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="button" ng-click="ok()">OK</button>
        <button class="btn btn-warning" type="button" ng-click="cancel()">Cancel</button>
    </div>
</script>
