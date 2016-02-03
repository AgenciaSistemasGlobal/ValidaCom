<?php

$db = '';

class Database {
    /*
     *
     * -- exemplos de uso.
     *
     * -- $_database = new database("pdo");
     * -- $_database->execute("SELECT * FROM tb_cidade WHERE ncidade = ?", array(10));
     *
     * -- runSQL2("SELECT * FROM tb_cidade WHERE ncidade = 10");
     *
     */

    private $_dbType;
    private $_conn;
    private $_prepare;
    /*private $_host = 'mysql.hostinger.com.br';
    private $_user = 'u905786837_muril';
    private $_pass = 'lilo0202santos';
    private $_db = 'u905786837_dbcon';*/
    
    private $_host = 'localhost';
    private $_user = 'root';
    private $_pass = '';
    private $_db = 'dbcontrole';
    public $_response;

    public function __construct($_dbType = "mysql") {
        try {
            $options = array(
                PDO::ATTR_PERSISTENT => FALSE,
                PDO::ATTR_EMULATE_PREPARES => true,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            );

            $this->_conn = new PDO(
                    'mysql:host=' . $this->_host . ';dbname=' . $this->_db, $this->_user, $this->_pass, $options
            );
        } catch (Exception $exc) {
//            echo 'Não foi possível conectar na base de dados.';
            echo '<p hidden>' . $exc->getTraceAsString() . '</p>';
            echo 'Ocorreu uma falha de comunicação com a base de dados.';
            echo '<br>Se persistir esta mensagem, por favor entre em contato com o administrador do sistema.';
            die;
        }

        $this->_dbType = $_dbType;
    }

    /* public function __construct($_dbType = "mysql") {
      if ($_dbType == "pdo") {
      try {
      $this->_conn = new PDO
      (
      "mysql:host=" . $this->_host . ";dbname=" . $this->_db, $this->_user, $this->_pass, array
      (
      PDO::ATTR_PERSISTENT => FALSE,
      PDO::ATTR_EMULATE_PREPARES => true,
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
      )
      );
      } catch (Exception $exc) {
      //                echo $exc->getTraceAsString();
      echo 'Ocorreu uma falha de comunicação com a base de dados.';
      echo '<br>Se persistir esta mensagem, por favor, entre em contato com o administrador do sistema.';
      die;
      }
      } else {
      $this->_conn = mysql_connect($this->_host, $this->_user, $this->_pass);
      mysql_select_db($this->_db, $this->_conn);

      mysql_set_charset("utf8", $this->_conn);
      }

      $this->_dbType = $_dbType;
      } */

    /**
     * Obter os dados
     * @param string $_query 
     * @param string $tipoRet usado ASSOC ou OBJ
     * @return var
     */
    public function fetchAll($tipoRet = 'assoc') {
//        $query = $this->_conn->query($_query);
//        if (preg_match("/SELECT/i", $_query) == true && preg_match("/(INSERT|DELETE|UPDATE)/i", $_query) == false) {
//            $_response = $this->_prepare->fetchAll(PDO::FETCH_ASSOC);
//        } else if (preg_match("/(SELECT|DELETE|UPDATE)/i", $_query) == false && preg_match("/INSERT/i", $_query) == true) {
//            $_response = $this->_conn->lastInsertId();
//        } else if (preg_match("/SELECT/i", $_query) == false && preg_match("/(INSERT|DELETE|UPDATE)/i", $_query) == true) {
//            $_response = $this->_conn->lastInsertId();
//        }
//        $_response = $query->fetchAll(PDO::$tipoRet);

        $_response = null;
        switch ($tipoRet) {
            case 'obj':
                $_response = $this->_prepare->fetchAll(PDO::FETCH_OBJ);
                break;

            default:
                $_response = $this->_prepare->fetchAll(PDO::FETCH_ASSOC);
                break;
        }

        return $_response;
    }

    public function fetch($tipoRet = 'assoc') {
        $_response = null;
        switch ($tipoRet) {
            case 'obj':
                $_response = $this->_prepare->fetch(PDO::FETCH_OBJ);
                break;

            default:
                $_response = $this->_prepare->fetch(PDO::FETCH_ASSOC);
                break;
        }

        return $_response;
    }

    public function execute($_query, $_params = null) {
        $_response = '';
        if ($this->_dbType == 'pdo') {
            try {
                $error = $this->_prepare = $this->_conn->prepare($_query);
                if (!$error) {
                    echo "\nPDO::errorInfo():\n";
                    print_r($this->_conn->errorInfo());
                }

                $this->_prepare->execute($_params);

                //            echo $this->_prepare->queryString;die;
                //            var_dump($_params);
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        } else {
            $_response = mysql_query($_query);

            if (preg_match("/SELECT/i", $_query) == false && preg_match("/(INSERT|DELETE|UPDATE)/i", $_query) == true) {
                $_response = mysql_insert_id();
            }

            if (mysql_errno() != 0) {
                throw new Exception(mysql_errno());
            }
        }

        return $_response;
    }

    function linhasAfetadas() {
        return $this->_prepare->rowCount();
    }

    function qtdColunas() {
        return $this->_prepare->columnCount();
    }

    function ultimoIdInserido() {
        return $this->_conn->lastInsertId();
    }

    public function __destruct() {
        if ($this->_dbType == "mysql") {
            mysql_close($this->_conn);
        }

        $this->_conn = null;
    }
    
    public function beginTransaction(){
        $this->_conn->beginTransaction();
    }
    
    public function commit(){
        $this->_conn->commit();
    }
    
    public function rollBack(){
        $this->_conn->rollBack();
    }

    /**
     * Excluír registros
     * @param string $table tabela que será executada a exclusão
     * @param string $where os dados devem ser validados antes do chamar a função
     * @return int
     */
    function executeDel($table, $where = null) {
        $query = "DELETE FROM {$table}";
        if (!empty($where)) {
            $query .= " 
            WHERE nempresa_local = {$_SESSION['AVALidEmpLocalSessao']} AND " . $where;
        } else {
            $query .= " 
            WHERE nempresa_local = {$_SESSION['AVALidEmpLocalSessao']} ";
        }

        $this->_prepare = $this->_conn->prepare($query);
        $this->_prepare->execute();

        return $this->linhasAfetadas();
    }

}

/**
 * Exibe o SQL substituindo os parâmetros por seus respectivos valores
 * @param string $sql
 * @param array $params
 */
function exibirSQLParams($sql, $params) {
    foreach ($params as $key => $value) {
        $sql = str_replace(':' . $key, "'{$value}'", $sql);
    }

    echo '<pre>' . $sql;
    die;
}

function abrirConexao() {
    if (!($GLOBALS['db'] instanceof Database)) {
        $GLOBALS['db'] = new Database('pdo');
    }
}

abrirConexao();

//
// -- funcoes antigas.
//

function runDelSQL($_table, $_where) {
    try {
        $_database = new Database;
        $_query = "DELETE FROM " . $_table;

        if ($_where != "")
            $_query .= " WHERE " . $_where;

        return $_database->execute($_query);
    } catch (Exception $e) {
        echo "<!--";
        echo "#" . $e->getMessage() . ": Algum erro ocorreu.";
        echo "<br />";

        print_r($e->getTrace());
        echo "-->";
        exit;
    }
}

function runSQL($_query, $tipo = "pdo") {
    try {
        $_database = new Database;
//        $retorno = $_database->execute($_query);
        $result = mysql_query($_query) or die(mysql_errno() . ": C" . mysql_error() . $_query);
        unset($_database);
        return $result;

        if ($tipo === "pdo") {
            $retorno_temp = array();
            while ($row = mysql_fetch_array($retorno)) {
                $retorno_temp[] = $row;
            }
            $retorno = $retorno_temp;
            unset($retorno_temp);
        }
        return $retorno;
    } catch (Exception $e) {
        echo "<!--";
        echo "#" . $e->getMessage() . ": Algum erro ocorreu.";
        echo "<br />";

        print_r($e->getTrace());
        echo "-->";
        exit;
    }
}

function runSQL2($_query, $param = array()) {
    try {
        $_database = new Database("pdo");
        $retorno = $_database->execute($_query, $param);
        $_database->__destruct();
        return $retorno;
    } catch (Exception $e) {
        echo "<!--";
        echo "#" . $e->getMessage() . ": Algum erro ocorreu.";
        echo "<br />";

        print_r($e->getTrace());
        echo "-->";
        exit;
    }
}

function dataFromDB($_date) {
    if ($_date == "0000-00-00" || $_date == "") {
        return "";
    }

    return date("d/m/Y", strtotime($_date));
}

function countRec($_field, $_table, $_where = false) {
    try {
        $_query = runSQL("SELECT count(" . $_field . ") AS count FROM " . $_table . " " . $_where, "mysql");
        $_response = mysql_fetch_assoc($_query);

        return $_response["count"];
    } catch (Exception $e) {
        echo "#" . $e->getMessage() . ": Algum erro ocorreu.";
        echo "<br />";

        print_r($e->getTrace());
        exit;
    }
}
