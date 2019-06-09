var MongoClient = require('mongodb').MongoClient;
var url = "mongodb://localhost:27017/";

MongoClient.connect(url, function(err, db) {

    var dbo = db.db("WalkToWalk");

  //const config = require('./node_modules/config');
  const express = require('express'),
  app = express();
 

  app.get('/sendAgenzie', function (req, res) {

    var pro = req.query.provincia; // $_GET["id"]
    console.log(pro);

    var query = { provincia : pro};

    dbo.collection("agenzie").find(query).toArray(function(err, result) {

    console.log(result);
     
    res.send({result});

    });
    // DALLLA CITTA CHIAMA UNA QUERY IN JSON E MANDO TUTTO AD UN ALTRA PAGINA PHP PER VISUALIZZARE I DATI DELLA QUERY 
   });

   
app.listen(8500, 'localhost', function() {
    console.log("... port  mode");
 });

});

