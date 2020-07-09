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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/search.js":
/*!********************************!*\
  !*** ./resources/js/search.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("function makeResultCardHTML(result) {\n  var targetURL = \"/locations/\".concat(result.id);\n  console.log(result);\n  return \"\\n<div class=\\\"card\\\">\\n    <div class=\\\"card-body\\\">\\n        <a href=\\\"\".concat(targetURL, \"\\\" class=\\\"card-title\\\">\").concat(result.title, \"</a>\\n        <p class=\\\"card-text\\\">\").concat(result.description, \"</p>\\n        <img src=\\\"\").concat(result.src, \"\\\" class=\\\"card-img\\\" size=\\\"200px\\\"/>\\n    </div>\\n    <div class=\\\"card-footer text-center\\\">\\n        <a class=\\\"btn btn-outline-primary\\\" href=\\\"\").concat(targetURL, \"\\\">Make Appointment</a>\\n    </div>\\n</div>\");\n}\n\nfunction successCallback(data) {\n  var html;\n\n  if (data.length === 0) {\n    html = '<p> Nothing found </p>';\n  } else {\n    html = data.map(makeResultCardHTML).join('\\n');\n  }\n\n  $('#ajax-search-results').html(html);\n}\n\nfunction errorCallback() {\n  console.error('Something went wrong during the AJAX call.');\n}\n\nfunction ajaxSearch() {\n  var count = 15;\n  var inputCat = $('#ajaxInputCategories').val();\n  var inputName = $('#ajaxInputName').val();\n  $.ajax({\n    dataType: 'json',\n    url: \"/api/locations/search?title=\".concat(inputName, \"&category=\").concat(inputCat, \"&count=\").concat(count),\n    success: successCallback,\n    error: errorCallback\n  });\n} // Ajax handlers\n\n\n$(window).on('load', ajaxSearch);\n$('#ajaxInputName').keyup(ajaxSearch);\n$('#ajaxInputCategories').change(ajaxSearch);//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvc2VhcmNoLmpzP2NmNGQiXSwibmFtZXMiOlsibWFrZVJlc3VsdENhcmRIVE1MIiwicmVzdWx0IiwidGFyZ2V0VVJMIiwiaWQiLCJjb25zb2xlIiwibG9nIiwidGl0bGUiLCJkZXNjcmlwdGlvbiIsInNyYyIsInN1Y2Nlc3NDYWxsYmFjayIsImRhdGEiLCJodG1sIiwibGVuZ3RoIiwibWFwIiwiam9pbiIsIiQiLCJlcnJvckNhbGxiYWNrIiwiZXJyb3IiLCJhamF4U2VhcmNoIiwiY291bnQiLCJpbnB1dENhdCIsInZhbCIsImlucHV0TmFtZSIsImFqYXgiLCJkYXRhVHlwZSIsInVybCIsInN1Y2Nlc3MiLCJ3aW5kb3ciLCJvbiIsImtleXVwIiwiY2hhbmdlIl0sIm1hcHBpbmdzIjoiQUFBQSxTQUFTQSxrQkFBVCxDQUE0QkMsTUFBNUIsRUFBb0M7QUFDaEMsTUFBTUMsU0FBUyx3QkFBaUJELE1BQU0sQ0FBQ0UsRUFBeEIsQ0FBZjtBQUNBQyxTQUFPLENBQUNDLEdBQVIsQ0FBWUosTUFBWjtBQUNBLDRGQUdlQyxTQUhmLHFDQUdnREQsTUFBTSxDQUFDSyxLQUh2RCxrREFJMkJMLE1BQU0sQ0FBQ00sV0FKbEMsc0NBS2dCTixNQUFNLENBQUNPLEdBTHZCLGtLQVErQ04sU0FSL0M7QUFXSDs7QUFFRCxTQUFTTyxlQUFULENBQXlCQyxJQUF6QixFQUErQjtBQUMzQixNQUFJQyxJQUFKOztBQUNBLE1BQUlELElBQUksQ0FBQ0UsTUFBTCxLQUFnQixDQUFwQixFQUF1QjtBQUNuQkQsUUFBSSxHQUFHLHdCQUFQO0FBQ0gsR0FGRCxNQUVPO0FBQ0hBLFFBQUksR0FBR0QsSUFBSSxDQUFDRyxHQUFMLENBQVNiLGtCQUFULEVBQTZCYyxJQUE3QixDQUFrQyxJQUFsQyxDQUFQO0FBQ0g7O0FBQ0RDLEdBQUMsQ0FBQyxzQkFBRCxDQUFELENBQTBCSixJQUExQixDQUErQkEsSUFBL0I7QUFDSDs7QUFFRCxTQUFTSyxhQUFULEdBQXlCO0FBQ3JCWixTQUFPLENBQUNhLEtBQVIsQ0FBYyw0Q0FBZDtBQUNIOztBQUVELFNBQVNDLFVBQVQsR0FBc0I7QUFDbEIsTUFBTUMsS0FBSyxHQUFHLEVBQWQ7QUFDQSxNQUFNQyxRQUFRLEdBQUdMLENBQUMsQ0FBQyxzQkFBRCxDQUFELENBQTBCTSxHQUExQixFQUFqQjtBQUNBLE1BQU1DLFNBQVMsR0FBR1AsQ0FBQyxDQUFDLGdCQUFELENBQUQsQ0FBb0JNLEdBQXBCLEVBQWxCO0FBRUFOLEdBQUMsQ0FBQ1EsSUFBRixDQUFPO0FBQ0hDLFlBQVEsRUFBRSxNQURQO0FBRUhDLE9BQUcsd0NBQWlDSCxTQUFqQyx1QkFBdURGLFFBQXZELG9CQUF5RUQsS0FBekUsQ0FGQTtBQUdITyxXQUFPLEVBQUVqQixlQUhOO0FBSUhRLFNBQUssRUFBRUQ7QUFKSixHQUFQO0FBTUgsQyxDQUVEOzs7QUFDQUQsQ0FBQyxDQUFDWSxNQUFELENBQUQsQ0FBVUMsRUFBVixDQUFhLE1BQWIsRUFBcUJWLFVBQXJCO0FBQ0FILENBQUMsQ0FBQyxnQkFBRCxDQUFELENBQW9CYyxLQUFwQixDQUEwQlgsVUFBMUI7QUFDQUgsQ0FBQyxDQUFDLHNCQUFELENBQUQsQ0FBMEJlLE1BQTFCLENBQWlDWixVQUFqQyIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9zZWFyY2guanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyJmdW5jdGlvbiBtYWtlUmVzdWx0Q2FyZEhUTUwocmVzdWx0KSB7XG4gICAgY29uc3QgdGFyZ2V0VVJMID0gYC9sb2NhdGlvbnMvJHtyZXN1bHQuaWR9YDtcbiAgICBjb25zb2xlLmxvZyhyZXN1bHQpXG4gICAgcmV0dXJuIGBcbjxkaXYgY2xhc3M9XCJjYXJkXCI+XG4gICAgPGRpdiBjbGFzcz1cImNhcmQtYm9keVwiPlxuICAgICAgICA8YSBocmVmPVwiJHt0YXJnZXRVUkx9XCIgY2xhc3M9XCJjYXJkLXRpdGxlXCI+JHtyZXN1bHQudGl0bGV9PC9hPlxuICAgICAgICA8cCBjbGFzcz1cImNhcmQtdGV4dFwiPiR7cmVzdWx0LmRlc2NyaXB0aW9ufTwvcD5cbiAgICAgICAgPGltZyBzcmM9XCIke3Jlc3VsdC5zcmN9XCIgY2xhc3M9XCJjYXJkLWltZ1wiIHNpemU9XCIyMDBweFwiLz5cbiAgICA8L2Rpdj5cbiAgICA8ZGl2IGNsYXNzPVwiY2FyZC1mb290ZXIgdGV4dC1jZW50ZXJcIj5cbiAgICAgICAgPGEgY2xhc3M9XCJidG4gYnRuLW91dGxpbmUtcHJpbWFyeVwiIGhyZWY9XCIke3RhcmdldFVSTH1cIj5NYWtlIEFwcG9pbnRtZW50PC9hPlxuICAgIDwvZGl2PlxuPC9kaXY+YDtcbn1cblxuZnVuY3Rpb24gc3VjY2Vzc0NhbGxiYWNrKGRhdGEpIHtcbiAgICBsZXQgaHRtbDtcbiAgICBpZiAoZGF0YS5sZW5ndGggPT09IDApIHtcbiAgICAgICAgaHRtbCA9ICc8cD4gTm90aGluZyBmb3VuZCA8L3A+JztcbiAgICB9IGVsc2Uge1xuICAgICAgICBodG1sID0gZGF0YS5tYXAobWFrZVJlc3VsdENhcmRIVE1MKS5qb2luKCdcXG4nKTtcbiAgICB9XG4gICAgJCgnI2FqYXgtc2VhcmNoLXJlc3VsdHMnKS5odG1sKGh0bWwpO1xufVxuXG5mdW5jdGlvbiBlcnJvckNhbGxiYWNrKCkge1xuICAgIGNvbnNvbGUuZXJyb3IoJ1NvbWV0aGluZyB3ZW50IHdyb25nIGR1cmluZyB0aGUgQUpBWCBjYWxsLicpO1xufVxuXG5mdW5jdGlvbiBhamF4U2VhcmNoKCkge1xuICAgIGNvbnN0IGNvdW50ID0gMTU7XG4gICAgY29uc3QgaW5wdXRDYXQgPSAkKCcjYWpheElucHV0Q2F0ZWdvcmllcycpLnZhbCgpO1xuICAgIGNvbnN0IGlucHV0TmFtZSA9ICQoJyNhamF4SW5wdXROYW1lJykudmFsKCk7XG5cbiAgICAkLmFqYXgoe1xuICAgICAgICBkYXRhVHlwZTogJ2pzb24nLFxuICAgICAgICB1cmw6IGAvYXBpL2xvY2F0aW9ucy9zZWFyY2g/dGl0bGU9JHtpbnB1dE5hbWV9JmNhdGVnb3J5PSR7aW5wdXRDYXR9JmNvdW50PSR7Y291bnR9YCxcbiAgICAgICAgc3VjY2Vzczogc3VjY2Vzc0NhbGxiYWNrLFxuICAgICAgICBlcnJvcjogZXJyb3JDYWxsYmFjayxcbiAgICB9KTtcbn1cblxuLy8gQWpheCBoYW5kbGVyc1xuJCh3aW5kb3cpLm9uKCdsb2FkJywgYWpheFNlYXJjaCk7XG4kKCcjYWpheElucHV0TmFtZScpLmtleXVwKGFqYXhTZWFyY2gpO1xuJCgnI2FqYXhJbnB1dENhdGVnb3JpZXMnKS5jaGFuZ2UoYWpheFNlYXJjaCk7XG4iXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/search.js\n");

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/search.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\studium\4sem\WeTe\htwg-web-tech-dynamic\resources\js\search.js */"./resources/js/search.js");


/***/ })

/******/ });