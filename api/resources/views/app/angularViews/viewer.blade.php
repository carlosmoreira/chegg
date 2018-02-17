<!--<nav ng-class="getNavStyle(scroll)">-->
<!--&lt;!&ndash;<button ng-click="goPrevious()"><span>&lt;</span></button>&ndash;&gt;-->
<!--&lt;!&ndash;<button ng-click="goNext()"><span>&gt;</span></button>&ndash;&gt;-->
<!--&lt;!&ndash;<button ng-click="zoomIn()"><span>+</span></button>&ndash;&gt;-->
<!--&lt;!&ndash;<button ng-click="fit()"><span>100%</span></button>&ndash;&gt;-->
<!--&lt;!&ndash;<button ng-click="zoomOut()"><span>-</span></button>&ndash;&gt;-->
<!--&lt;!&ndash;<button ng-click="rotate()"><span>90</span></button>&ndash;&gt;-->
<!--&lt;!&ndash;<h4>&ndash;&gt;-->
<!--&lt;!&ndash;<span>Page: @{{pageNum}}</span>&ndash;&gt;-->
<!--&lt;!&ndash;</h4>&ndash;&gt;-->
<!--&lt;!&ndash;<input type="text" min=1 ng-model="pageNum">&ndash;&gt;-->
<!--&lt;!&ndash;<span> / @{{pageCount}}</span>s&ndash;&gt;-->
<!--&nbsp;&nbsp;-->
<!--&lt;!&ndash;<span>Document URL: </span>&ndash;&gt;-->
<!--&lt;!&ndash;<input type="text" ng-model="pdfUrl">&ndash;&gt;-->
<!--</nav>-->

@{{loading}}

<div id="pdfNav" class="navbar-fixed-top" style="max-width:55%; margin: auto">
    <div class="">
        <div class="col-md-1">
            <span id="pagePrev"
                  class="changePage"
                  ng-click="goPrevious()">
                <i class="fa fa-arrow-circle-left fa-3x"></i>
            </span>

        </div>
        <div class="col-md-3">
            <div ng-if="selectedBook.chapters">
                <label for="chapters">Chapters</label>
                <select id="chapters" class="form-control" ng-model="bookmark"
                        ng-change="goToBookmarkPage(bookmark.page)"
                        ng-options="bookmark.name for bookmark  in selectedBook.chapters">
                    <option value="">:: SELECT ::</option>
                </select>
            </div>
            <div ng-if="!selectedBook.chapters">
                <h4 class="alert alert-warning">
                    <i class="fa fa-exclamation-circle"></i> No chapters Found
                </h4>
            </div>

        </div>
        <div class="col-md-2 text-center">
            <label align="center" class="" style="margin-top: 0px;">Page: @{{pageNum}}</label>
            <p align="center">
                <i class="fa fa-2x fa-search-plus cursor-pointer" ng-click="zoomIn()"></i>
                <i class="fa fa-2x fa-search-minus cursor-pointer" ng-click="zoomOut()"></i>
            </p>
        </div>
        <div class="col-md-3">
            <label for="inputPageNum">Go to Page:</label>
            <div class="input-group">
                <input id="inputPageNum" type="text" ng-model="inputPageNum" class="form-control"
                       placeholder="Page Number...">
                <span class="input-group-btn">
                    <button ng-click="goToPage(inputPageNum)" class="btn btn-default" type="button">Go!</button>
                </span>
            </div><!-- /input-group -->
        </div>

        <div class="col-md-2">
            <label for="" style="color:rgb(79, 82, 186)">.</label>
            <div class="input-group text-center">
                <button class="btn btn-primary whiteBtn" ng-click="setMaxPage()">Set Max Page</button>
            </div>
        </div>
        <div class="col-md-1">
            <span id="pageNext"
                  class="changePage">
                <i ng-click="goNext()" class="fa fa-arrow-circle-right fa-3x"></i>
            </span>
        </div>
    </div>
</div>
