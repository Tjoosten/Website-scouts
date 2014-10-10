<?php
Class Cron extends CI_Model {
	function Optimize() {
		$this->dbutil->optimize_database();
	}
}