<?php

	class Search extends PDO {

		public $data;

    public function __construct() {
      parent::__construct(DB_DSN, DB_USERNAME, DB_PASSWORD);
      return true;
    }

    public function search_data(string $cols_to_select, string $tbl_name, string $where) {
    	$stmt = $this->prepare("SELECT {$cols_to_select} FROM {$tbl_name} WHERE {$where}");
			$stmt->execute();
			return $stmt->rowCount();
    }

		public function show($col_index) {
			foreach ($this->data as $u) {
				return $u[$col_index];
			}
		}

	}
