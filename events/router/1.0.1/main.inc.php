<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
$ROUTES = csl_mvc :: cue_config('routes'); //load routes configs
if (is_array($ROUTES)) {
	if (defined('ROUTER_URI_PROTOCOL') && defined('ROUTER_URI_QUERY_STRING')) {
		/* receive route */
		if (csl_mvc :: is_cli()) {
			$route = ($_SERVER['argc'] > 1 ? $_SERVER['argv'][1] : '');
		} else {
			switch (ROUTER_URI_PROTOCOL) {
				case 'QUERY_STRING':
					$route = (isset ($_GET[ROUTER_URI_QUERY_STRING]) ? $_GET[ROUTER_URI_QUERY_STRING] : '');
					break;
				case 'PATH_INFO':
					$route = csl_browser :: info('pathinfo');
					$route = (!is_null($route) ? ltrim($route, '/') : '');
					break;
			}
		}
		/* call route script */
		if (isset ($route) && isset ($ROUTES[$route])) {
			$event = (isset ($ROUTES[$route]['-e']) && is_string($ROUTES[$route]['-e']) ? trim(csl_path :: norm($ROUTES[$route]['-e']), '/') : null);
			$args = (isset ($ROUTES[$route]['-a']) && is_array($ROUTES[$route]['-a']) ? array_values($ROUTES[$route]['-a']) : array ());
			if (isset ($event { 0 }) && csl_mvc :: is_event($event) && $event != csl_mvc :: script_event()) {
				csl_mvc :: import_event($event);
				if (isset ($ROUTES[$route]['-c'])) {
					if (!is_string($ROUTES[$route]['-c'])) {
						csl_error :: cast('Router failed - invalid class index at route \'' . $route . '\'', E_USER_NOTICE, 3);
					}
					elseif (!class_exists($ROUTES[$route]['-c'])) {
						csl_error :: cast('Router failed - class object not found at route \'' . $route . '\'', E_USER_NOTICE, 3);
					}
					elseif (!isset ($ROUTES[$route]['-f'])) {
						csl_error :: cast('Router failed - undefined object function index at route \'' . $route . '\'', E_USER_NOTICE, 3);
					}
					elseif (!is_string($ROUTES[$route]['-f'])) {
						csl_error :: cast('Router failed - invalid object function index at route \'' . $route . '\'', E_USER_NOTICE, 3);
					}
					elseif (!in_array($ROUTES[$route]['-f'], get_class_methods($ROUTES[$route]['-c']))) {
						csl_error :: cast('Router failed - object function not found at route \'' . $route . '\'', E_USER_NOTICE, 3);
					} else {
						$class = $ROUTES[$route]['-c'];
						$function = $ROUTES[$route]['-f'];
						$class = new $class ();
						call_user_func_array(array (
							$class,
							$function
						), $args);
					}
				}
				elseif (isset ($ROUTES[$route]['-f'])) {
					if (!is_string($ROUTES[$route]['-f'])) {
						csl_error :: cast('Router failed - invalid function index at route \'' . $route . '\'', E_USER_NOTICE, 3);
					}
					elseif (!function_exists($ROUTES[$route]['-f'])) {
						csl_error :: cast('Router failed - function not found at route \'' . $route . '\'', E_USER_NOTICE, 3);
					} else {
						$function = $ROUTES[$route]['-f'];
						call_user_func_array($function, $args);
					}
				}
			} else {
				csl_error :: cast('Router failed - invalid event script at route \'' . $route . '\'', E_USER_NOTICE, 3);
			}
		}
		elseif (!csl_debug :: is_display()) {
			csl_mvc :: view_template('error/400'); //Http Error 400
		}
		elseif (!isset ($route)) {
			csl_error :: cast('Router failed - invalid router URI protocol \'' . ROUTER_URI_PROTOCOL . '\'', E_USER_NOTICE, 3);
		}
		elseif (!isset ($ROUTES[$route])) {
			csl_error :: cast('Router failed - route goal \'' . $route . '\' not found', E_USER_NOTICE, 3);
		}
	} else {
		if (!defined('ROUTER_URI_PROTOCOL')) {
			csl_error :: cast('Router failed - undefined constant ROUTER_URI_PROTOCOL', E_USER_NOTICE, 3);
		}
		if (!defined('ROUTER_URI_QUERY_STRING')) {
			csl_error :: cast('Router failed - undefined constant ROUTER_URI_QUERY_STRING', E_USER_NOTICE, 3);
		}
	}
} else {
	csl_error :: cast('Router failed - unknown routes configuration file', E_USER_NOTICE, 3);
}
?>