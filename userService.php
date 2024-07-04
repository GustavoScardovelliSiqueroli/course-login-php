<?php
include './connectionDB.php';
include './utilsGS.php';

class UserService
{

    private UserModel|null $userModel;
    private ConnectionDb $connectionDB;

    public function __construct(UserModel $userModel = null)
    {
        $this->userModel = $userModel;
        $this->connectionDB = new ConnectionDB();
    }
    
    public function save($userModel)
    {
        $this->userModel = $userModel;
        $utils = new UtilsGS();
        $pdoConnected = $this->connectionDB->connect();

        $query = 'INSERT INTO users_gs (id, name, password, email) VALUES (:id, :name, :password, :email)';
        $stmt = $pdoConnected->prepare($query);

        $newUUID = $utils->uuidv4();
        $stmt->bindParam(':id', $newUUID);
        $stmt->bindParam(':name', $this->userModel->name);
        $stmt->bindParam(':password', $this->userModel->password);
        $stmt->bindParam(':email', $this->userModel->email);

        $stmt->execute();
    }

    public function get(){
        $pdoConnected = $this->connectionDB->connect();

        $query = 'SELECT * FROM users_gs';
        $stmt = $pdoConnected->query($query);
        return $stmt;
    }
}
