<?php
function DBconnect()
{
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $database = "ToDoList";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
};

function GetList($id)  //<--
{
    $conn = DBconnect();
    $query = $conn->prepare("SELECT * FROM lists WHERE id=:id");
    $query->bindParam(":list_id", $list_id);
    $query->execute();
    $result = $query->fetch();
    return $result;
}

function CleanupInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function AddList($data)   //<--
{
    $conn = DBconnect();
    $query = $conn->prepare("INSERT INTO lists (list_name) VALUES (:list_name)");
    $query->bindParam(":list_name", $data['list_name']);
    $query->execute();
}

function GetAllLists()
{
    $conn = DBconnect();
    $query = $conn->prepare("SELECT * FROM lists");
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}

function DeleteLists($data)  //<--
{
    $conn = DBconnect();
    $query = $conn->prepare("DELETE FROM `lists` WHERE `list_id`= :list");
    $query->bindParam(":list", $data);
    $query->execute();
}

function DeleteTask($data)  //<--
{
    $conn = DBconnect();
    $query = $conn->prepare("DELETE FROM `tasks` WHERE `task_list_id`= :list");
    $query->bindParam(":list", $data);
    $query->execute();
    Deletelists($data);  //<--
}

function Delete1Task($data)  //<--
{
    $conn = DBconnect();
    $query = $conn->prepare("DELETE FROM `tasks` WHERE `task_id`= :id");
    $query->bindParam(":id", $data);
    $query->execute();
}

function GetAllTasks()
{
    $conn = DBconnect();
    $query = $conn->prepare("SELECT * FROM tasks");
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}

function AddTask($data)  //<--
{
    $conn = DBconnect();
    $query = $conn->prepare("INSERT INTO tasks (task_list_id, task_name, task_duration, task_status) VALUES (:task_list_id, :task_name, :task_duration, :task_status)");
    $query->bindParam(":task_list_id", $data['task_list_id']);
    $query->bindParam(":task_name", $data['task_name']);
    $query->bindParam(":task_duration", $data['task_duration']);
    $query->bindParam(":task_status", $data['task_status']);
    $query->execute();
}

function EditTask($data)
{
    $data['task_id'] = $_GET['task_id'];
    $conn = DBconnect();
    $query = $conn->prepare("UPDATE tasks SET task_list_id = :task_list_id , task_name = :task_name , task_duration = :task_duration , task_status = :task_status WHERE task_id= :task_id;");
    $query->bindValue(":task_list_id", $data['task_list_id'], PDO::PARAM_INT);
    $query->bindValue(":task_name", $data['task_name'], PDO::PARAM_STR);
    $query->bindValue(":task_duration", $data['task_duration'], PDO::PARAM_INT);
    $query->bindValue(":task_status", $data['task_status'], PDO::PARAM_STR);
    $query->bindValue(":task_id", $data['task_id'], PDO::PARAM_INT);
    $result = $query->execute();
}

function EditList($data)
{
    $data['list_id'] = $_GET['list_id'];
    $conn = DBconnect();
    $query = $conn->prepare("UPDATE lists SET list_name = :list_name  WHERE list_id=:list_id");
    $query->bindValue(":list_id", $data['list_id'], PDO::PARAM_INT);
    $query->bindValue(":list_name", $data['list_name'], PDO::PARAM_STR);
    $query->execute();
}

function GetSpecificList($data)
{
    $conn = DBconnect();
    $query = $conn->prepare("SELECT * FROM lists WHERE list_id = :list_id");
    $query->bindParam(":list_id", $data);
    $query->execute();
    $result = $query->fetch();
    return $result;
}

function GetSpecificTask($data)
{
    $conn = DBconnect();
    $query = $conn->prepare("SELECT * FROM tasks WHERE task_id = :task_id");
    $query->bindParam(":task_id", $data);
    $query->execute();
    $result = $query->fetch();
    return $result;
}

function GetTasksForLists($data)
{
    $conn = DBconnect();
    $query = $conn->prepare("SELECT * FROM tasks WHERE task_list_id = :task_id ORDER BY task_status");
    $query->bindParam(":task_id", $data);
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}