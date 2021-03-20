/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/index.js":
/*!*******************************!*\
  !*** ./resources/js/index.js ***!
  \*******************************/
/***/ (() => {

eval("\nconst App = {\n    data() {\n        return {\n            placeholderString: 'Введите название заметки',\n            title: 'Список заметок',\n            inputValue: '',\n            notes: ['Заметка 1', 'Заметка 2', 'Заметка 122']\n        }\n    },\n    methods: {\n       \n        addNewNote() {\n            if(this.inputValue !== ''){\n            this.notes.push(this.inputValue)\n            this.inputValue = ''\n            }\n        },\n        inputKeyPress(event) {\n            if (event.key == 'Enter')\n                this.addNewNote()\n\n        },\n        deleteNote(index ) {\n            this.notes.splice(index,1)\n        }\n    },\n    watch: {\n        inputValue(value) {\n            if (value.length > 10){\n                this.inputValue =''\n            }\n        }\n    }\n}\n\n\nVue.createApp(App).mount('#app') \n\n\n//# sourceURL=webpack://yasl/./resources/js/index.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/index.js"]();
/******/ 	
/******/ })()
;