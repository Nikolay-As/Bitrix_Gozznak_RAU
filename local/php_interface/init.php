<?
/**
 * Contain some php codes for functionality of a portal
 */
 
CModule::AddAutoloadClasses(
	'',
	array(
		'MuseumHelpers' => '/local/php_interface/museum_functions/helpers.php',		
	)
);

if(file_exists(__DIR__.'/museum_functions/handlers.php'))
{
	include(__DIR__.'/museum_functions/handlers.php');
}

if(file_exists(__DIR__.'/agents/fetch_excursions.php'))
{
    include(__DIR__.'/agents/fetch_excursions.php');
}

/**
*
* Some constants
*/



?>