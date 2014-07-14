// EGRESOS2014 APP
// date     : 4/7/2014
// @package : transparencia
// @file    : main.js
// @version : 0.1
// @author  : elcoruco
// @url     : elcoruco.com

require.config({
  baseUrl : "/js/apps/egresos2014",
  paths : {
    jquery     : "/js/vendor/jquery",
    backbone   : "/js/vendor/backbone",
    underscore : "/js/vendor/underscore",
    text       : "/js/vendor/text"
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

require(["controller"], function (Controller){
  app = new Controller();
});