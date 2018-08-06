<?php

//namespace Model;

class Model_Database extends Model
{
	
	var $table = array();
	var $db_name;

	var $form;
	var $lastId;
	
	var $pdo;
	
	function __construct($conf=array()) {
		
		if(empty($conf)) {
			$conf = Config::get("C.database");
		}
		
		$this -> connect($conf);
		
	}
	
	public function connect($conf) {

		//Debug::dump($conf);
		//exit;
		
		try{
			$this -> pdo = new PDO('mysql:host='.$conf["host"].';dbname='.$conf["dbname"].';charset=utf8',$conf["user"],$conf["pw"]);
			$this -> pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			print $e->getMessage();
		}
		
	}


/*───────────────────────────────────────

	■テーブル構造の取得
		
───────────────────────────────────────*/
	
	public function get_table_structure($t_name) {
	
		$db = $this -> pdo;
		
		$hush 	= array();
		$table	= array();
		$t_str	= array();
				
		if(empty($this -> table[$t_name])) {

			$q = $db->query("show columns from $t_name");
			while($hush = $q->fetch()){
				$array = explode("(",$hush["Type"]);
				$table[$hush["Field"]] = $array[0];
			}
			
			$this -> table[$t_name] = $table;
						
		} else {
			
			$table = $this -> table[$t_name];
			
		}
			
		return $table;
		
	}

		
		
/*───────────────────────────────────────

	テーブルのデータ認証

───────────────────────────────────────*/
	public function select($t_name,$ninsyo) {
	
		$db 		= $this -> pdo;
		$t_hush 	= $this -> get_table_structure($t_name);
	
		$where 	= "where";
		$and		= "";
		foreach($ninsyo as $k => $v) {
			$where .= $and.sprintf(" %s = :%s",$k,$k);
			$and = " and";
		}
		
		try {

			$stm	= $db->prepare(sprintf("select * from %s %s",$t_name,$where));
			foreach($ninsyo as $k => $v) {
				$dataType = PDO::PARAM_STR;			
				if($t_hush[$k] == "int") {
					$dataType = PDO::PARAM_INT;
				}
				$stm->bindValue(":".$k,$v,$dataType);
			}
		
			if($stm->execute()) {
				if($r = $stm->fetch()) {
					return $r;
				}
			}

		} catch(PDOException $e) {
			print $cn.":".$value.":".$dataType."<br>";
			print $e->getMessage()."<br><br>";
		}

		return false;
		
	}


/*───────────────────────────────────────

	テーブルにレコード追加

───────────────────────────────────────*/
	public function insert($t_name,$hush,$get_lastId=false) {

		$db = $this -> pdo;
		
		$lastId = "";
		$db->beginTransaction();
		
		$qm 		= array();
		$columns	= array();
		$values	= array();
		
		$t_hush = $this -> get_table_structure($t_name);
		
		foreach($t_hush as $cn => $ct) {	//cn = colum name ct = colum type
			
			if(!isset($hush[$cn])) {
				continue;
			} else if(empty($hush[$cn]) and $hush[$cn] !== 0) {
				continue;
			}
			
			$v = $this -> arrange_for_record($hush[$cn]);
			
			/*
			if($ct == "int") {
				$v = sprintf("%d",$v);
			} else {
				$v = DB::escape($v);
			}
			*/
			
			$qm[] 		= "?";
			$columns[] 	= $cn;
			$values[]	= $v;
			
		}
	
		try {
			
			$stm	= $db->prepare(sprintf("INSERT INTO %s (%s) VALUES(%s)",$t_name,implode(",",$columns),implode(",",$qm)));
			$stm->execute($values);

			if($get_lastId) {

				$q = $db->query("SELECT LAST_INSERT_ID()");
				if(!$r = $q -> fetch()) {
					return false;
				}
				$lastId = $r["LAST_INSERT_ID()"];
			}

			$db->commit();

			if($get_lastId) {
				return $lastId;
			}
			
		} catch(PDOException $e) {
			print $e->getMessage();
		}
	
	}



	/*───────────────────────────────────────
	
		テーブル更新
	
		パラメータ
		$t_name			-> テーブル名
		$data				-> データ格納連想配列
		$ninsyo			-> 認証データ(連想配列)
		$update_colums	-> 更新するカラム
		$all				-> 全てのカラムを更新するか
		
	───────────────────────────────────────*/
	public function update($t_name,$data,$ninsyo,$update_colums=array(),$all=false) {
	
		$db = $this -> pdo;
		
		$t_hush = "";
		
		$db->beginTransaction();

		$t_hush 	= $this -> get_table_structure($t_name);
	
		$and 		= "";
		$where 	= "where";
		foreach($ninsyo as $k => $v) {
			$where .= $and.sprintf(" %s = :%s",$k,$k);
			$and = " and";
		}
		
		//Debug::dump($update_colums);
		//exit;
		
		foreach($t_hush as $cn => $ct) {	//cn = colum name ct = colum type
	
			$null = false;
			
			if(!isset($data[$cn]) and (!$all or !in_array($cn,$update_colums))) {
				continue;
			}
			
			$dataType = PDO::PARAM_STR;
			if($ct == "int") {
				$dataType = PDO::PARAM_INT;
			}
			
			if(empty($data[$cn])) {
				if($ct == "int") {
					$value 	= 0;
				} else {
					$null		= true;
				}
			} else {
				$value = $this -> arrange_for_record($data[$cn]);
			}
			
			try {
								
				$stm	= $db->prepare(sprintf("update %s set %s=:value %s",$t_name,$cn,$where));
				//die(sprintf("update %s set %s=:value %s",$t_name,$cn,$where));
				if($null) {
					$stm->bindValue(":value",null,PDO::PARAM_NULL);										
				} else {
					$stm->bindValue(":value",$value,$dataType);					
				}
				foreach($ninsyo as $k => $v) {
					$stm->bindValue(":".$k,$v,PDO::PARAM_INT);					
				}
				$stm->execute();
				
			} catch(PDOException $e) {
				print $cn.":".$value.":".$dataType."<br>";
				print $e->getMessage()."<br><br>";
			}
			
		}
	
		$db->commit();
	
	
	}



	/*───────────────────────────────────────

		レコード削除

		パラメータ
		$t_name	-> テーブル名
		$ninsyo	-> 認証用 カラム名

	───────────────────────────────────────*/
	
	public function delete($t_name,$ninsyo) {

		$db = $this -> pdo;

		$and 		= "";
		$where 	= "where";
		foreach($ninsyo as $k => $v) {
			$where .= $and.sprintf(" %s = :%s",$k,$k);
			$and = " and";
		}
		
		try {

			$stm	= $db->prepare(sprintf("delete from %s %s",$t_name,$where));
			foreach($ninsyo as $k => $v) {
				$stm->bindValue(":".$k,$v,PDO::PARAM_INT);					
			}
			$stm->execute();

		} catch(PDOException $e) {
			print $e->getMessage();
		}

	}


	/*────────────────────────────────────────	

		保存用に危険文字を削除

	────────────────────────────────────────	*/
	private function arrange_for_record($str) {
		
		// 出力文字エンコーディングに存在しない文字コードを出力させない
		mb_substitute_character('none');
		
		// 対象文字列を、指定の出力文字エンコードに変換する
		$str = mb_convert_encoding($str, 'UTF-8', 'auto');
		
		// 正規表現で絵文字コードを抜き出し、一括削除したものを返り値として出力する
		preg_match_all("/[\xF0-\xF7][\x80-\xBF][\x80-\xBF][\x80-\xBF]/", $str, $matched);
		$str = str_replace($matched[0], array(), $str);
		
		return $str;
		
		
	}
	
	
}

?>
