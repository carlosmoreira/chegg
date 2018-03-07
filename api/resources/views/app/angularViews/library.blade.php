<div class="appContainer" id="books" ng-controller="LibraryCtrl" ng-init="init()">
    <div class="panel panel-primary widget-shadow">
        <div class="panel-heading">
            <h2 class="panel-title">Library</h2>
        </div>
        <div class="panel-body">
            <div ng-show="!pageLoaded">
                Loading...
            </div>
            <div ng-show="pageLoaded" id="books" class="row" ng-show="pageLoaded">
                <div ng-repeat="book in books">
                    <div class="clearfix" ng-if="($index) % 4 == 0"></div>
                    <div class="col-md-3 col-xs-6 bookBlock book">
                        <a class="thumbnail" ng-click="selectBook(book)">
                            <img ng-src="@{{getImage(book)}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
