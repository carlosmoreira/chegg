var app = angular.module('App', ['pdf', 'ngRoute', 'ui.bootstrap']);
app.config(function ($routeProvider,$httpProvider) {
    $httpProvider.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';
    $routeProvider
        .when("/", {
            templateUrl: "views/library",
            controller: "LibraryCtrl"
        })
        .when("/read", {
            templateUrl: "views/read",
            controller: "PDFCtrl"
        })
        .when("/paris", {
            templateUrl: "paris.htm"
        });
});
app.run(function ($rootScope, $templateCache) {
    // $rootScope.$on('$viewContentLoaded', function () {
    //     $templateCache.removeAll();
    // });
    //Listen for route change and clear server Data!
});
app.service('Library', function () {
    var documents = [];
    var selected = null;
    var setDocuments = function (docs) {
        documents = docs;
    };
    var getDocuments = function () {
        return documents;
    };
    var getSelected = function () {
        return selected;
    };
    var setSelected = function (doc) {
        selected = doc;
    };
    return {
        getDocuments: getDocuments,
        setDocuments: setDocuments,
        getSelected: getSelected,
        setSelected: setSelected
    }
});
app.controller('LibraryCtrl', function ($scope, $location, Library, HttpService) {
    $scope.books = [];
    $scope.pageLoaded = false;

    var loadDocuments = function () {
        $scope.loading = true;
        HttpService.get('books' ,function (response) {
            $scope.pageLoaded = true;
            $scope.loading = false;
            $scope.books = response.data;
            Library.setDocuments(response.data);
        });
    };

    $scope.init = function () {
        if (Library.getDocuments().length === 0)
            loadDocuments();
        else{
            $scope.books = Library.getDocuments();
            $scope.pageLoaded = true;
        }

    };

    $scope.selectBook = function (book) {
        Library.setSelected(book);
        $location.path('/read')
    };

    $scope.getImage = function (document) {
        if (!document.image || document.image === null)
            return "https://fakeimg.pl/150x200/";
        return "/images/pdf/" + document.image;
    }
});
app.controller('PDFCtrl', function ($scope, $location,$interval,$uibModal, Library, BookHttpService) {

    var maxPageRead = null;
    var pageCheckIntervalSeconds = 5;
    var pageCheckInterval = null;
    var selected = null;

    //$scope.pdfPassword = 'test';
    $scope.progressBar = {'currentValue': 0, 'max': 100};
    $scope.scroll = 0;
    $scope.loading = 'loading';
    $scope.documentLoaded = false;
    $scope.pageNum = "1";

    $scope.$watch('pageNum', function (newVal) {
        //console.log('currentValue', newVal);
        //On page update, call ajax request and save to
        window.scroll(0, 0);
    });

    var setChangePageListeners = function(){
        angular.element(document).bind('keyup', function (e) {
            if (e.keyCode == 39)
                $scope.goNext();
            else if (e.keyCode == 37)
                $scope.goPrevious();
        });
    };

    $scope.init = function () {
        if(pageCheckInterval)
            $interval.cancel(pageCheckInterval);
        $scope.documentLoaded = false;
        if (Library.getSelected() === null) {
            $location.path('/');
            return;
        }
        selected = Library.getSelected();
        $scope.pdfName = selected.name;
        $scope.pdfUrl =  "/file/pdf/" + selected.file;//"/pdf/cleancode.pdf";//
        $scope.pageNum = selected.pageNum;
        $scope.selectedBook = selected;
        maxPageRead = selected.pageNum;
        setChangePageListeners();
    };

    $scope.setMaxPage = function () {
        BookHttpService
            .updateBook(
                selected.id,
                {'_method' : 'PUT','pageNum' : $scope.pageNum},
                function (response) {
                    console.log('updateBook',response.data);
                    if(response.data.Success){
                        alert('Max Page Updated');
                        selected.pageNum = $scope.pageNum;
                    }
                },
                function (error) {
                    console.log('updateBook',error);
                }); 
    };

    $scope.getNavStyle = function (scroll) {
        if (scroll > 100) return 'pdf-controls fixed';
        else return 'pdf-controls';
    };

    $scope.onError = function (error) {
        console.log(error);
        $scope.error = error;
        $scope.$apply();
    };

    var maxPageCheck = function(){
        pageCheckInterval = $interval(function () {
            var currentPageNumber = $scope.pageNum;
            //console.log('current page is ' , currentPageNumber);
            //console.log('Our max page is', maxPageRead);
            if(currentPageNumber > maxPageRead){
                maxPageRead = currentPageNumber;
                BookHttpService
                    .updateBook(
                        selected.id,
                        {'_method' : 'PUT','pageNum' : currentPageNumber},
                        function (response) {
                            console.log('updateBook',response.data);
                        },
                        function (error) {
                            console.log('updateBook',error);
                        });
            }

            //Call HttpService and update the server with the page
        },pageCheckIntervalSeconds);
    };

    $scope.onLoad = function () {
        $scope.loading = '';
        $scope.documentLoaded = true;
        maxPageCheck();
    };

    //Updates per every progress
    $scope.onProgress = function (progress) {
        console.log('ProgressData', progress);
        $scope.progressBar.currentValue = progress.loaded;
        $scope.progressBar.max = progress.total;
        $scope.$apply();
    };

    $scope.onPassword = function (updatePasswordFn, passwordResponse) {
        if (passwordResponse === PDFJS.PasswordResponses.NEED_PASSWORD) {
            updatePasswordFn($scope.pdfPassword);
        } else if (passwordResponse === PDFJS.PasswordResponses.INCORRECT_PASSWORD) {
            console.log('Incorrect password')
        }
    };

    $scope.goToPage = function (pageNum) {
        $scope.pageNum = pageNum;
    };

    $scope.goToBookmarkPage = function (pageNum) {
        //console.log('Bookmark page', pageNum);
        $scope.goToPage(pageNum);
    };

    $scope.openAddNoteModal = function (size, parentSelector) {
        var parentElem = parentSelector ?
            angular.element($document[0].querySelector('.modal-demo ' + parentSelector)) : undefined;
        var modalInstance = $uibModal.open({
            animation: true,
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: 'myModalContent.html',
            controller: 'PDFCtrl',
            controllerAs: '$ctrl',
            size: size,
            appendTo: parentElem,
            resolve: {
                items: function () {
                    return [];
                }
            }
        });

        modalInstance.result.then(function (selectedItem) {
            //$ctrl.selected = selectedItem;
        }, function () {
            //$log.info('Modal dismissed at: ' + new Date());
        });
    };
});

app.service('BookHttpService', function (HttpService) {
    var updateBook = function (id, data, success, fail) {
        console.log('calling', '/books/' + id);
        return HttpService.post('/books/' + id , data, success, fail);
    };
    return {
        updateBook : updateBook
    }
});