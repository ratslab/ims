<?php
require_once 'connect.php';
class m_login {
	function check($uname, $password) {
		$password = md5 ( $password );
		$query = "select * from login where id=$uname and password='$password'";
		$result = mysql_query ( $query );
		$r = mysql_fetch_array ( $result );
		return $r;
	}
}
?>