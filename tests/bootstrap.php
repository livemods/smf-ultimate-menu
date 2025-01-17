<?php

declare(strict_types=1);

require_once './src/ManageUltimateMenu.php';
require_once './src/Subs-UltimateMenu.php';
require_once './src/Class-UltimateMenu.php';
require_once './vendor/autoload.php';

// What are you doing here, SMF?
define('SMF', 1);

$user_info = ['is_admin' => true ,'groups' => []];

$smcFunc['db_query'] = function($name, $query, $args)
{
	global $current_item, $modSettings;

	$current_item = 0;

	if (isset($args['variable']) && $args['variable'] == 'integrate_menu_buttons')
		return [[$modSettings[$args['variable']] ?? null]];

	return [['']];
};
$smcFunc['db_fetch_assoc'] = function($request)
{
	global $current_item;

	return $request[$current_item++] ?? null;
};
$smcFunc['db_fetch_row'] = function($request)
{
	global $current_item;

	return $request[$current_item++] ?? null;
};
$smcFunc['db_free_result'] = function(): void
{
};
$smcFunc['db_insert'] = function(): void
{
};
require_once './vendor/simplemachines/smf/Sources/Load.php';
require_once './vendor/simplemachines/smf/Sources/Security.php';
require_once './vendor/simplemachines/smf/Sources/Subs.php';