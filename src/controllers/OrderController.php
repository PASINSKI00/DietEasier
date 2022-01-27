<?php
require_once 'AppController.php';
require_once __DIR__.'/../repository/OrderRepository.php';

class OrderController extends AppController
{
    private OrderRepository $orderRepository;

    public function __construct()
    {
        parent::__construct();
        $this->orderRepository = new OrderRepository();
    }

    public function getLastUnconfirmedOrder(){
        http_response_code(401);
        if(!isset($_SESSION)){
            session_start();
        }

        if(!isset($_SESSION['userID'])){
            echo "Please log in if you want to save your order";
            die();
        }

        header('Content-type: application/json');
        http_response_code(200);

        echo json_encode($this->orderRepository->getLastUnconfirmedOrderIfExists());

    }

    public function updateOrder(){
        http_response_code(401);
        if(!isset($_SESSION)){
            session_start();
        }

        if(!isset($_SESSION['userID'])){
            echo "Please log in if you want to save your order";
            die();
        }

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            $this->orderRepository->createNewOrderIfNeeded();
            $this->orderRepository->cleanOrderFromMeals($this->orderRepository->getlastOrderId());

            foreach ($decoded as $value)
                $this->orderRepository->updateOrder($value[0], $value[1]);

            echo json_encode("success");
        }
    }
}