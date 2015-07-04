<?php

/**
 * returns a mysqli instance connected to the url redirection DB
 */
class MysqliUrl extends mysqli{
	
	function __construct()
	{
		return parent::mysqli("10.5.1.125", "urltest11", "urltest11", "urltest11");
	}
}
