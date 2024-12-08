<?php
    require '/laragon/www/LAB/tlunews/models/User.php';
    require '/laragon/www/LAB/tlunews/repo/Database.php';

    header('Content-Type: application/json');
    $url = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'] ??'';

    class AdminController
    {
        private $user;
        private $db;

        public function __construct()
        {
            $this -> user = new User();
            $this -> db = new Database();
        }

        public function jsonResponse($header, $data, $status){
            header($header);
            http_response_code($status);
            echo json_encode($data);
            exit();
        }

        public function register()
        {
            $content = json_decode(file_get_contents("php://input"), true);

            if(empty($content['username']) || empty($content['password'])){
                http_response_code(401);
                echo json_encode(['Messages' => 'Thông tin đăng ký không hợp lệ']);
            }
            else
            {
                $conn = $this -> db -> connect();
                $username = $content['username'];
                $passwordhash = password_hash($content['password'], PASSWORD_DEFAULT);

                $result = $conn -> query("select * from users where username=:$username and password=:$passwordhash");
                
                $users = [];

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $users[] = (new User($row['id'], $row['username'], $row['password'], $row['role']))->toArray();
                    }
                    return json_encode([
                        "success" => true,
                        "data" => $users,
                    ]);
                } else {
                    return json_encode([
                        "success" => false,
                        "message" => "Không có bản ghi nào!"
                    ]);
                }

                //$this -> jsonResponse("", $users, 200);
            }
        }
    }

    $controller = new AdminController();

    switch ($url)
    {
        case '/register':
            if($method === 'POST')
            {
                $controller->register();
            }
            else
            {
                http_response_code(401);
                echo json_encode(['error' => 'Lỗi Mã method']);
            }
            break;

        default:
            http_response_code(404);
            echo json_encode(['error' => $url]);
            break;
    }

?>