<?php

class OrderRepository extends Repository
{
    public function updateOrder(int $day, array $mealIds){
        //TODO Update last uncomfirmed order || Create a new order if first or last is confirmed
        $orderId = $this->getlastOrderId();

        foreach ($mealIds as $mealId){
            $statement = $this->database->connect()->prepare('
                INSERT INTO order_meal(id_order, id_meal, day) VALUES (?,?,?) 
            ');

            $statement->execute([
                $orderId,
                $mealId,
                $day
            ]);
        }
    }

    public function getLastUnconfirmedOrder(){
        if(!$this->checkIfLastOrderConfirmed()){
            $statement = $this->database->connect()->prepare('
                    SELECT "day",id_meal from order_meal where id_order=?
                ');

            $statement->execute([
                $this->getLastOrderId()
            ]);

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    private function checkIfLastOrderConfirmed() : bool{
        $statement = $this->database->connect()->prepare('
            SELECT decide_if_should_create_new_order as decision from decide_if_should_create_new_order(?)
        ');

        $statement->execute([
            $_SESSION['userID']
        ]);

        $arr = $statement->fetch(PDO::FETCH_ASSOC);
        return $arr['decision'];
    }

    public function createNewOrderIfNeeded(){
        if($this->checkIfLastOrderConfirmed()){
            $statement = $this->database->connect()->prepare('
                INSERT INTO "order"(id_user) VALUES (?) 
            ');

            $statement->execute([
                $_SESSION['userID']
            ]);
        }
    }

    public function getLastOrderId(){
        $statement = $this->database->connect()->prepare('
            Select id_order from "order" where id_user=? order by date_order_placed desc limit 1
        ');

        $statement->execute([
            $_SESSION['userID']
        ]);

        $arr = $statement->fetch(PDO::FETCH_ASSOC);
        return $arr['id_order'];
    }

    public function cleanOrderFromMeals(int $id){
        $statement = $this->database->connect()->prepare('
            delete from order_meal where id_order=?
        ');

        $statement->execute([
            $id
        ]);
    }
}