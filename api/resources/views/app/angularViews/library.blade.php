<div class="appContainer" id="books" ng-controller="LibraryCtrl" ng-init="init()">
    <div class="row">
        <div ng-repeat="book in books" class="col-lg-3 col-md-4 col-sm-6 portfolio-item" ng-click="selectBook(book)">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">@{{book.name}}</a>
                    </h4>
                    <!--<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>-->
                    <a href="">
                        <img ng-src="@{{getImage(book)}}" alt="">
                    </a>
                </div>
            </div>
        </div>

        <!--<div class="col-md-2"-->
        <!--ng-repeat="book in books">-->
        <!--<div  style="cursor: pointer">-->

        <!---->
        <!--</div>-->
        <!--</div>-->
    </div>
</div>
