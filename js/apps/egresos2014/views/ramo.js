// EGRESOS2014 APP
// @package: transparencia
// @location: /js/apps/egresos2014/views/
// @file: ramo.js
// @author: elcoruco
// @url: elcoruco.com


define(function(require){

  //
  //  L O A D   T H E   A S S E T S
  //
  var Backbone = require("backbone"),
      View     = require("text!templates/ramo.html");
  
  var ramo = Backbone.View.extend({

    //
    //  S E T   T H E   C O N T A I N E R
    //
    tagName : "li",

    template : _.template(View),

    //
    //  T H E   I N I T I A L I Z E   F U N C T I O N
    //
    initialize : function(){
    },

    //
    //  T H E   M A I N   R E N D E R
    //
    render : function(model){
      this.$el.append(this.template(model));
      return this;
    }
    
  });

  //
  //  R E T U R N   T H E   V I E W
  //
  return ramo;
});