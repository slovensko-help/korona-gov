!function(e){function r(t){if(o[t])return o[t].exports;var n=o[t]={i:t,l:!1,exports:{}};return e[t].call(n.exports,n,n.exports,r),n.l=!0,n.exports}var o={};r.m=e,r.c=o,r.d=function(e,o,t){r.o(e,o)||Object.defineProperty(e,o,{configurable:!1,enumerable:!0,get:t})},r.n=function(e){var o=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(o,"a",o),o},r.o=function(e,r){return Object.prototype.hasOwnProperty.call(e,r)},r.p="",r(r.s=0)}([function(e,r,o){"use strict";Object.defineProperty(r,"__esModule",{value:!0});var t=o(1);o.n(t)},function(e,r){var o=function(e,r,o){var t="undefined"===typeof e.className||!e.className;return"core/paragraph"===r.name?Object.assign(e,{className:t?"govuk-body":"govuk-body "+e.className}):e};wp.hooks.addFilter("blocks.getSaveContent.extraProps","wp-block/block-filters",o);var t={"core/paragraph":"gov-blocks"};wp.hooks.addFilter("blocks.registerBlockType","wp-block/change-name",function(e,r){return t[r]&&(e.category=t[r]),e})}]);