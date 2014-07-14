// EGRESOS2014 APP
// @package: transparencia
// @location: /js/apps/egresos2014/
// @file: controller.js
// @author: elcoruco
// @url: elcoruco.com


define(function(require){
  
  //
  //  L O A D   T H E   A S S E T S (require)
  //
  var Backbone  = require("backbone");

      // load the data
      var Ramos = require("../data/ramos"),
          Ramo  = require("views/ramo");
      

      // load views
      

  
  // this controller acts as an event dispatcher
  var controller = Backbone.View.extend({
    
    //
    //  S E T   T H E   C O N T A I N E R
    //
    el: "#main.egresos2014",

    //
    //  T H E   I N I T I A L I Z E   F U N C T I O N
    //
    initialize : function(){
      
      // CREATE THE COLLECTIONS
      this.ramos = new Backbone.Collection(Ramos.ramos);   

      // ADD THE VIEWS

      // ADD THE LISTENERS

    },

    render : function(){
      this.ramos.each(function(r){
        var ramo = new Ramo();
        this.$("#ramos-list").append(ramo.render(r.attributes).el);
      }, this);
    }
    
  });

  return controller;
});
