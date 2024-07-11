<?php

class UserService
{

    private UserModel|null $userModel;
    private ConnectionDb $connectionDB;
    private string $dbUserTable = "users_gs"; 

    public function __construct(UserModel $userModel = null, string|null  $dbUserTable = null)
    {
        $this->userModel = $userModel;
        $this->connectionDB = new ConnectionDB();
        if(!$dbUserTable == null){
            $this->dbUserTable = $dbUserTable;
        }
    }

    public function regiser(UserModel $userModel = null)
    {
        $this->userModel = $userModel;
        $utils = new UtilsGS();
        $pdoConnected = $this->connectionDB->connect();

        $query = 'INSERT INTO users_gs (id, name, password, email) VALUES (:id, :name, :password, :email)';
        $stmt = $pdoConnected->prepare($query);
        
        $newUUID = $utils->uuidv4();
        $hashedPassword = password_hash($this->userModel->password, PASSWORD_DEFAULT);

        $stmt->bindParam(':id', $newUUID);
        $stmt->bindParam(':name', $this->userModel->name);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':email', $this->userModel->email);

        $stmt->execute();
    }

    public function getAll()
    {
        $pdoConnected = $this->connectionDB->connect();

        $query = 'SELECT * FROM users_gs';
        $stmt = $pdoConnected->query($query);
        return $stmt;
    }

    public function login($userModel)
    {
        $this->userModel = $userModel;
        $utils = new UtilsGS();
        $pdoConnected = $this->connectionDB->connect();

        $query = "SELECT * FROM {$this->dbUserTable} WHERE name = " .'"' .  $this->userModel->name . '"';

        $stmt = $pdoConnected->prepare($query);
        $stmt->execute();
        $userInDB = $stmt->fetch((PDO::FETCH_ASSOC));

        if(!$userInDB){
            throw new Exception("login failed");
        }
        if (!password_verify($this->userModel->password, $userInDB["password"])){
            throw new Exception("login failed");
        }
        session_start();
        $_SESSION["user"] = $userInDB["id"];
        header("Location: taskslist.php");
    }
}
