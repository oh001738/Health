<?PHP
include "config.php";
delete_value('guest_food', "WHERE session_id = '" . session_id() . "' OR add_time <= '" . (time() - COOKIE_TIME) . "'" );
?>