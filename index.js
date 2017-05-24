var server = require('ws').Server;

var mysql = require('mysql');
require('events').EventEmitter.defaultMaxListeners = 0;


// Подключение к базе файл mysql.js
// var pool = require('mysql').createPool({
// 	  host     : 'localhost',
// 	  user     : 'root',
// 	  password : '',
// 	  database : 'vc'
// 	//socketPath: '/var/run/mysqld/mysqld.sock',  // общаемся с mysql через сокеты
//     //connectionLimit: '100'
// });

var mysql = require('mysql');
// Initialize pool
var pool      =    mysql.createPool({
    connectionLimit : 10,
    host     : 'localhost',
    user     : 'root',
    password : '',
    database : 'vc',
    debug    :  false
}); 

// exports.query = function (sql, props) {
//     return new Promise(function (resolve, reject) {
//         pool.getConnection(function (err, connection) {
//             connection.query(
//                 sql, props,
//                 function (err, res) {
//                     if (err) reject(err);
//                     else resolve(res);
//                 }
//             );
//             connection.release();
//         });
//     });
// };

// var query = require('mysql').query;


var executeQuery = function(query,callback){
    pool.getConnection(function(err,connection){
        if (err) {
          connection.release();
          throw err;
        }   
        connection.query(query,function(err,rows){
            connection.release();
            if(!err) {
                callback(null, {rows: rows});
            }           
        });
        connection.on('error', function(err) {      
              throw err;
              return;     
        });
    });
}

function getResult(query,callback) {
  executeQuery(query, function (err, rows) {
     if (!err) {
        callback(null,rows);
     }
     else {
        callback(true,err);
     }
   });
}








var s = new server({ port: 5001 });

s.on('connection', function(ws){
	ws.on('message', function(message){
		console.log("Received: "+message);

		// query('SELECT * FROM users', function(err, rows, fields) {
		//   if (err) throw err;
		//   console.log('causing uncaught exception: ', rows);
		// });


		if(message == "hello") {


getResult("select * from users",function(err,rows){
    if(!err){

    	ws.send(JSON.stringify(rows));
        //console.log(rows);
    }else{
        console.log(err);
    }
  });
			//var query = require('mysql').query;

			// query('SELECT * FROM users').then(function (res) {
			// 	pool.query('SELECT 1 + 1 AS solution', function(err, rows, fields) {
			//     // здесь код будет выполнятся после запроса
			//     console.log('Result');
			//     console.log(res);
			// }).catch(function (err) {
			//     // здесь будет сообщение об ошибке
			//     console.log('Error');
			//     console.log(err);
			// });


			
		}


	});
});