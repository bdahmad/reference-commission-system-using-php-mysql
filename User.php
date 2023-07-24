<?php 


    class User
    {
        private $mysql='';
        function __construct(){
            $this->mysql = new mysqli('localhost','root','','db');
        }

        function insert($all){
            $fullname = $all['fullname'];
            $username = $all['username'];
            $ref_user_id = $all['ref_user_id'];
            $parent_user_id = $all['parent_user_id'];

            
            $this->mysql->query("INSERT INTO `tbl_user`( `fullname`, `username`, `ref_user_id`, `parent_user_id`) VALUES ('$fullname','$username','$ref_user_id','$parent_user_id')");

            return '<div class="alert alert-success">Data insert successfully</div>';
            
        }

        function view(){
            return $this->mysql->query("select * from tbl_user");
        }

        function insertAmount($all){
            $user_id = $all['user_id'];
            $basic_amount = $all['basic_amount'];

            $this->mysql->query("INSERT INTO `tbl_amount`(`user_id`, `basic_amount`) VALUES ('$user_id','$basic_amount')");

            return '<div class="alert alert-success">Data insert successfully</div>';
        }

        function calculateCommission($userId){
            $amt = $this->mysql->query("select basic_amount from tbl_amount where user_id = '$userId'");// main amount
            $rowAmt = $amt->fetch_assoc();
            $b_amt = $rowAmt['basic_amount'];

            $ref = $this->mysql->query("select ref_user_id from tbl_user where id = '$userId'");
            $row = $ref->fetch_assoc();
            $refId = $row['ref_user_id']; //ref=1
            while($refId > 0){

                $com = (float)$b_amt*(5/100);
                $t_amt= (float)$b_amt-(float)$com;

                $this->mysql->query("INSERT INTO `tbl_commission`(`user_id`, `ref_id`, `commission`) VALUES ('$refId','$userId','$com')");
                
                $this->mysql->query("UPDATE `tbl_amount` SET `total_amount`='$t_amt' WHERE user_id = '$userId'");

                $b_amt = $t_amt;
                $refId--;
            }
            
        }
    }