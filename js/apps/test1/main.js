// TEST1 APP
// date     : 19/6/2014
// @package : transparencia
// @file    : main.js
// @version : 0.1
// @author  : elcoruco
// @url     : elcoruco.com

require.config({
  baseUrl : "/js/apps/test1",
  paths : {
    jquery : "/js/vendor/jquery",
    jquery : "/js/vendor/backbone",
    jquery : "/js/vendor/underscore",
    jquery : "/js/vendor/text"
  },

  shim : {
    underscore : {
      exports : "_"
    },
    backbone : {
      deps    : ["jquery", "underscore"],
      exports : "Backbone"
    }
  }
});

// app grants access to the 
// internal Backbone functionality
var app;

require(["controller"], function Controller{
  app = new Controller();
});
