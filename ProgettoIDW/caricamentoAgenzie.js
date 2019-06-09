var MongoClient = require('mongodb').MongoClient;
var url = "mongodb://localhost:27017/";

MongoClient.connect(url, function(err, db) {

var dbo = db.db("WalkToWalk");

  //const config = require('./node_modules/config');
  const express = require('express'),
  app = express();
 

  app.get('/load', function (req, res) {

    var nome = req.query.nome; // $_GET["id"]
    var com = req.query.com; // $_GET["id"]
    var pro = req.query.pro; // $_GET["id"]
    var ind = req.query.ind; // $_GET["id"]
    var tel = req.query.tel; // $_GET["id"]
    var f = req.query.fax; // $_GET["id"]
    var tipo = req.query.tipo; // $_GET["id"]


    var agenzia= { nomeAgenzia:nome,provincia: pro,comune :com
        , indirizzo:ind, telefono:tel , fax:f , tipoEnte:tipo};

    dbo.collection("agenzie").insertOne(agenzia, function(err, res) {
        console.log(agenzia);

          });
    
    // DALLLA CITTA CHIAMA UNA QUERY IN JSON E MANDO TUTTO AD UN ALTRA PAGINA PHP PER VISUALIZZARE I DATI DELLA QUERY 
   });

   
app.listen(8500, 'localhost', function() {
    console.log("... port  mode");
 });

});




