/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 38);
/******/ })
/************************************************************************/
/******/ ({

/***/ 38:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(39);


/***/ }),

/***/ 39:
/***/ (function(module, exports) {

$(document).ready(function () {
    $(".createCommitToCommit").click(function (event) {
        $this = $(this);
        event.preventDefault();
        var url = $this.parent('form').attr('action');
        var method = $this.parent('form').attr('method');
        var data = $this.parent('form').serialize();
        var commitId = $this.parent('form').find("input[name=commentId]").val();
        console.log('commitId');
        console.log('here');
        $.ajax({
            url: url,
            type: method,
            data: data,
            success: function success(data) {
                $('#CommitToCommit-' + commitId).append(data);
                console.log('commitId');
                $this.parent('form').find("textarea[name=text]").val('');
            },
            error: function error(err) {
                console.log(err);
            }
        });
    });

    $("#createCommitToPost").click(function (event) {
        $this = $(this);
        event.preventDefault();
        var url = $this.parent('form').attr('action');
        var method = $this.parent('form').attr('method');
        var data = $this.parent('form').serialize();
        var author = $this.parent('form').find("input[name=user]").val();
        var content = $this.parent('form').find("textarea[name=text]").val();
        $.ajax({
            url: url,
            type: method,
            data: data,
            success: function success(data) {
                $('#CommitToPost').append(data);
                $this.parent('form').find("textarea[name=text]").val('');
            },
            error: function error(err) {
                console.log(err);
            }
        });
    });

    function func() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({

            /* the route pointing to the post function */
            url: '/ajax/updateUserLastVisit',
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: { _token: CSRF_TOKEN, do: 'updateUserLastVisit' },
            dataType: 'JSON',
            /* remind that 'data' is the response of the AjaxController */
            success: function success(data) {
                console.log('here - update');
            },
            errors: function errors(error) {
                console.log(error);
            }
        });
    }
    setInterval(func, 100000);
});

/***/ })

/******/ });