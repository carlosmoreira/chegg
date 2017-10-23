var app = angular.module('App', ['pdf', 'ngRoute','ui.bootstrap']);
app.config(function ($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl: "views/library.html",
            controller: "LibraryCtrl"
        })
        .when("/read", {
            templateUrl: "views/pdfViewer.html",
            controller: "PDFCtrl"
        })
        .when("/paris", {
            templateUrl: "paris.htm"
        });
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
        $http.get('data.json').then(function (response) {
            $scope.loading = false;
            $scope.books = response.data;
            Library.setDocuments(response.data);
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

app.controller('PDFCtrl', function ($scope, $location, Library) {
    //$scope.pdfPassword = 'test';
    $scope.progressBar = {'currentValue' :0 , 'max' : 0};
    $scope.scroll = 0;
    $scope.loading = 'loading';
    $scope.documentLoaded = false;

    /**
     * That have a PDF Object
     *
     */
    $scope.$watch('pageNum', function (newVal) {
        console.log('currentValue',newVal);
    });

    $scope.init = function () {
        $scope.documentLoaded = false;
        if (Library.getSelected() === null)
            $location.path('/');
        var selected = Library.getSelected();
        $scope.pdfName = selected.name;
        $scope.pdfUrl = selected.path;
    };

    $scope.getNavStyle = function (scroll) {
        if (scroll > 100) return 'pdf-controls fixed';
        else return 'pdf-controls';
    };

    $scope.onError = function (error) {
        console.log(error);
    };

    $scope.onLoad = function () {
        $scope.loading = '';
        $scope.documentLoaded = true;
    };

    //Updates per every progess
    $scope.onProgress = function (progressData) {
        console.log('ProgressData', progressData);
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
    }
    var isLoaded = function (progressData) {
        return progressData.loaded = progressData.total;
    };
});
