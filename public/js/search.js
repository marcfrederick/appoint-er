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

eval("function makeResultCardHTML(result) {\n  var targetURL = \"/locations/\".concat(result.id);\n  console.log(result);\n  return \"\\n<div class=\\\"card\\\">\\n    <div class=\\\"card-body\\\">\\n        <a href=\\\"\".concat(targetURL, \"\\\" class=\\\"card-title\\\">\").concat(result.title, \"</a>\\n        <p class=\\\"card-text\\\">\").concat(result.description, \"</p>\\n    </div>\\n    <div class=\\\"card-footer text-center\\\">\\n        <a class=\\\"btn btn-outline-primary\\\" href=\\\"\").concat(targetURL, \"\\\">Make Appointment</a>\\n    </div>\\n</div>\");\n}\n\nfunction successCallback(data) {\n  var html;\n\n  if (data.length === 0) {\n    html = '<p> Nothing found </p>';\n  } else {\n    html = data.map(makeResultCardHTML).join('\\n');\n  }\n\n  $('#ajax-search-results').html(html);\n}\n\nfunction errorCallback() {\n  console.error('Something went wrong during the AJAX call.');\n}\n\nfunction ajaxSearch() {\n  var count = 15;\n  var inputCat = $('#ajaxInputCategories').val();\n  var inputName = $('#ajaxInputName').val();\n  $.ajax({\n    dataType: 'json',\n    url: \"/api/locations/search?title=\".concat(inputName, \"&category=\").concat(inputCat, \"&count=\").concat(count),\n    success: successCallback,\n    error: errorCallback\n  });\n} // Ajax handlers\n\n\n$(window).on('load', ajaxSearch);\n$('#ajaxInputName').keyup(ajaxSearch);\n$('#ajaxInputCategories').change(ajaxSearch);//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvc2VhcmNoLmpzP2NmNGQiXSwibmFtZXMiOlsibWFrZVJlc3VsdENhcmRIVE1MIiwicmVzdWx0IiwidGFyZ2V0VVJMIiwiaWQiLCJjb25zb2xlIiwibG9nIiwidGl0bGUiLCJkZXNjcmlwdGlvbiIsInN1Y2Nlc3NDYWxsYmFjayIsImRhdGEiLCJodG1sIiwibGVuZ3RoIiwibWFwIiwiam9pbiIsIiQiLCJlcnJvckNhbGxiYWNrIiwiZXJyb3IiLCJhamF4U2VhcmNoIiwiY291bnQiLCJpbnB1dENhdCIsInZhbCIsImlucHV0TmFtZSIsImFqYXgiLCJkYXRhVHlwZSIsInVybCIsInN1Y2Nlc3MiLCJ3aW5kb3ciLCJvbiIsImtleXVwIiwiY2hhbmdlIl0sIm1hcHBpbmdzIjoiQUFBQSxTQUFTQSxrQkFBVCxDQUE0QkMsTUFBNUIsRUFBb0M7QUFDaEMsTUFBTUMsU0FBUyx3QkFBaUJELE1BQU0sQ0FBQ0UsRUFBeEIsQ0FBZjtBQUNBQyxTQUFPLENBQUNDLEdBQVIsQ0FBWUosTUFBWjtBQUNBLDRGQUdlQyxTQUhmLHFDQUdnREQsTUFBTSxDQUFDSyxLQUh2RCxrREFJMkJMLE1BQU0sQ0FBQ00sV0FKbEMsZ0lBTytDTCxTQVAvQztBQVVIOztBQUVELFNBQVNNLGVBQVQsQ0FBeUJDLElBQXpCLEVBQStCO0FBQzNCLE1BQUlDLElBQUo7O0FBQ0EsTUFBSUQsSUFBSSxDQUFDRSxNQUFMLEtBQWdCLENBQXBCLEVBQXVCO0FBQ25CRCxRQUFJLEdBQUcsd0JBQVA7QUFDSCxHQUZELE1BRU87QUFDSEEsUUFBSSxHQUFHRCxJQUFJLENBQUNHLEdBQUwsQ0FBU1osa0JBQVQsRUFBNkJhLElBQTdCLENBQWtDLElBQWxDLENBQVA7QUFDSDs7QUFDREMsR0FBQyxDQUFDLHNCQUFELENBQUQsQ0FBMEJKLElBQTFCLENBQStCQSxJQUEvQjtBQUNIOztBQUVELFNBQVNLLGFBQVQsR0FBeUI7QUFDckJYLFNBQU8sQ0FBQ1ksS0FBUixDQUFjLDRDQUFkO0FBQ0g7O0FBRUQsU0FBU0MsVUFBVCxHQUFzQjtBQUNsQixNQUFNQyxLQUFLLEdBQUcsRUFBZDtBQUNBLE1BQU1DLFFBQVEsR0FBR0wsQ0FBQyxDQUFDLHNCQUFELENBQUQsQ0FBMEJNLEdBQTFCLEVBQWpCO0FBQ0EsTUFBTUMsU0FBUyxHQUFHUCxDQUFDLENBQUMsZ0JBQUQsQ0FBRCxDQUFvQk0sR0FBcEIsRUFBbEI7QUFFQU4sR0FBQyxDQUFDUSxJQUFGLENBQU87QUFDSEMsWUFBUSxFQUFFLE1BRFA7QUFFSEMsT0FBRyx3Q0FBaUNILFNBQWpDLHVCQUF1REYsUUFBdkQsb0JBQXlFRCxLQUF6RSxDQUZBO0FBR0hPLFdBQU8sRUFBRWpCLGVBSE47QUFJSFEsU0FBSyxFQUFFRDtBQUpKLEdBQVA7QUFNSCxDLENBRUQ7OztBQUNBRCxDQUFDLENBQUNZLE1BQUQsQ0FBRCxDQUFVQyxFQUFWLENBQWEsTUFBYixFQUFxQlYsVUFBckI7QUFDQUgsQ0FBQyxDQUFDLGdCQUFELENBQUQsQ0FBb0JjLEtBQXBCLENBQTBCWCxVQUExQjtBQUNBSCxDQUFDLENBQUMsc0JBQUQsQ0FBRCxDQUEwQmUsTUFBMUIsQ0FBaUNaLFVBQWpDIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL3NlYXJjaC5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbImZ1bmN0aW9uIG1ha2VSZXN1bHRDYXJkSFRNTChyZXN1bHQpIHtcclxuICAgIGNvbnN0IHRhcmdldFVSTCA9IGAvbG9jYXRpb25zLyR7cmVzdWx0LmlkfWA7XHJcbiAgICBjb25zb2xlLmxvZyhyZXN1bHQpXHJcbiAgICByZXR1cm4gYFxyXG48ZGl2IGNsYXNzPVwiY2FyZFwiPlxyXG4gICAgPGRpdiBjbGFzcz1cImNhcmQtYm9keVwiPlxyXG4gICAgICAgIDxhIGhyZWY9XCIke3RhcmdldFVSTH1cIiBjbGFzcz1cImNhcmQtdGl0bGVcIj4ke3Jlc3VsdC50aXRsZX08L2E+XHJcbiAgICAgICAgPHAgY2xhc3M9XCJjYXJkLXRleHRcIj4ke3Jlc3VsdC5kZXNjcmlwdGlvbn08L3A+XHJcbiAgICA8L2Rpdj5cclxuICAgIDxkaXYgY2xhc3M9XCJjYXJkLWZvb3RlciB0ZXh0LWNlbnRlclwiPlxyXG4gICAgICAgIDxhIGNsYXNzPVwiYnRuIGJ0bi1vdXRsaW5lLXByaW1hcnlcIiBocmVmPVwiJHt0YXJnZXRVUkx9XCI+TWFrZSBBcHBvaW50bWVudDwvYT5cclxuICAgIDwvZGl2PlxyXG48L2Rpdj5gO1xyXG59XHJcblxyXG5mdW5jdGlvbiBzdWNjZXNzQ2FsbGJhY2soZGF0YSkge1xyXG4gICAgbGV0IGh0bWw7XHJcbiAgICBpZiAoZGF0YS5sZW5ndGggPT09IDApIHtcclxuICAgICAgICBodG1sID0gJzxwPiBOb3RoaW5nIGZvdW5kIDwvcD4nO1xyXG4gICAgfSBlbHNlIHtcclxuICAgICAgICBodG1sID0gZGF0YS5tYXAobWFrZVJlc3VsdENhcmRIVE1MKS5qb2luKCdcXG4nKTtcclxuICAgIH1cclxuICAgICQoJyNhamF4LXNlYXJjaC1yZXN1bHRzJykuaHRtbChodG1sKTtcclxufVxyXG5cclxuZnVuY3Rpb24gZXJyb3JDYWxsYmFjaygpIHtcclxuICAgIGNvbnNvbGUuZXJyb3IoJ1NvbWV0aGluZyB3ZW50IHdyb25nIGR1cmluZyB0aGUgQUpBWCBjYWxsLicpO1xyXG59XHJcblxyXG5mdW5jdGlvbiBhamF4U2VhcmNoKCkge1xyXG4gICAgY29uc3QgY291bnQgPSAxNTtcclxuICAgIGNvbnN0IGlucHV0Q2F0ID0gJCgnI2FqYXhJbnB1dENhdGVnb3JpZXMnKS52YWwoKTtcclxuICAgIGNvbnN0IGlucHV0TmFtZSA9ICQoJyNhamF4SW5wdXROYW1lJykudmFsKCk7XHJcblxyXG4gICAgJC5hamF4KHtcclxuICAgICAgICBkYXRhVHlwZTogJ2pzb24nLFxyXG4gICAgICAgIHVybDogYC9hcGkvbG9jYXRpb25zL3NlYXJjaD90aXRsZT0ke2lucHV0TmFtZX0mY2F0ZWdvcnk9JHtpbnB1dENhdH0mY291bnQ9JHtjb3VudH1gLFxyXG4gICAgICAgIHN1Y2Nlc3M6IHN1Y2Nlc3NDYWxsYmFjayxcclxuICAgICAgICBlcnJvcjogZXJyb3JDYWxsYmFjayxcclxuICAgIH0pO1xyXG59XHJcblxyXG4vLyBBamF4IGhhbmRsZXJzXHJcbiQod2luZG93KS5vbignbG9hZCcsIGFqYXhTZWFyY2gpO1xyXG4kKCcjYWpheElucHV0TmFtZScpLmtleXVwKGFqYXhTZWFyY2gpO1xyXG4kKCcjYWpheElucHV0Q2F0ZWdvcmllcycpLmNoYW5nZShhamF4U2VhcmNoKTtcclxuIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/search.js\n");

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
