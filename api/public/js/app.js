var app = angular.module('App', ['pdf', 'ngRoute', 'ui.bootstrap']);
app.config(function ($routeProvider) {
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

app.controller('LibraryCtrl', function ($scope, $location, Library, $http) {
    $scope.books = [];

    var loadDocuments = function () {
        $scope.loading = true;
        $http.get('books')
            .then(function (response) {
            $scope.loading = false;
            $scope.books = response.data;
            Library.setDocuments(response.data);
            })
            .catch(function(error){
                console.log('catch', error);
            });
    };

    $scope.init = function () {
        if (Library.getDocuments().length === 0)
            loadDocuments();
        else
            $scope.books = Library.getDocuments();
    };

    $scope.selectBook = function (book) {
        Library.setSelected(book);
        $location.path('/read')
    };

    $scope.getImage = function (document) {
        if (!document.image || document.image === null)
            return "https://fakeimg.pl/150x200/";
        return document.image;
    }
});

app.controller('PDFCtrl', function ($scope, $location, $uibModal, Library) {
    //$scope.pdfPassword = 'test';
    $scope.progressBar = {'currentValue': 0, 'max': 0};
    $scope.scroll = 0;
    $scope.loading = 'loading';
    $scope.documentLoaded = false;
    $scope.pageNum = "1";

    $scope.$watch('pageNum', function (newVal) {
        console.log('currentValue', newVal);
        //On page update, call ajax request and save to
    });

    /**
     @todo:
     Setup Api Service
     Save Pages on change
     Setup page notes
     + Add Notes
     ++ Modal
     Picture of shelf for library
     If no option to display chapters, see if possible to ready whe loading PDF
     */

    $scope.init = function () {
        $scope.documentLoaded = false;
        if (Library.getSelected() === null) {
            $location.path('/');
            return;
        }
        var selected = Library.getSelected();
        $scope.pdfName = selected.name;
        $scope.pdfUrl = selected.path;
        $scope.pageNum = selected.pageNum;
        $scope.selectedBook = selected;
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

    $scope.onLoad = function () {
        $scope.loading = '';
        $scope.documentLoaded = true;
    };

    //Updates per every progess
    $scope.onProgress = function (progressData) {
        //console.log('ProgressData', progressData);
        $scope.progressBar.currentValue = progressData.loaded;
        $scope.progressBar.max = progressData.total;
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
