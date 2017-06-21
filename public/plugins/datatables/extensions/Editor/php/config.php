<?php if (!defined('DATATABLES')) exit(); // Ensure being used in DataTables env.

// Enable error reporting for debugging (remove for production)
error_reporting(E_ALL);
ini_set('display_errors', '1');


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Database user / pass
 */
$sql_details = array(
	/*
	"type" => "Sqlserver",  		// Database type: "Mysql", "Postgres", "Sqlite" or "Sqlserver"
	"user" => "conteudo_2",       	// Database user name
	"pass" => "d2qsfs8g",       	// Database password
	"host" => "www.conteudoesportivo.com.br",       // Database host
	"port" => "",       			// Database connection port (can be left empty for default)
	"db"   => "conteudo_2",       	// Database name
	"dsn"  => ""        			// PHP DSN extra information. Set as `charset=utf8` if you are using MySQL
	*/
	"type" => "Sqlserver",  		// Database type: "Mysql", "Postgres", "Sqlite" or "Sqlserver"
	"user" => env( "DB_USERNAME", 'xgol_06'), 					// Database user name
	"pass" => env( "DB_PASSWORD", '2014@gol'),  					// Database password
	"host" => env( "DB_HOST", 'mssql.xgol.com.br'),        	    // Database host
	"db"   => env( "DB_DATABASE", 'xgol_06'),       				// Database name

	"port" => "",       			// Database connection port (can be left empty for default)
	"dsn"  => ""        			// PHP DSN extra information. Set as `charset=utf8` if you are using MySQL
);


