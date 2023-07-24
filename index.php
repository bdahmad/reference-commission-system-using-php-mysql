<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-5 border border-info rounded">
                <div>
                    <?php 
                        include 'User.php';
                        $userObj = new User;
                        if(isset($_POST['saveUserBtn'])){
                            echo $userObj->insert($_POST);
                        }
                    ?>
                    <form action="" method="post">
                        <div class="mb-3 mt-3">
                            <input type="text" name="fullname" required  class="form-control"  placeholder="enter full name">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="username" required  class="form-control"  placeholder="enter username">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="ref_user_id" required class="form-control"  placeholder="enter ref id">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="parent_user_id" required  class="form-control"  placeholder="enter parent id">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" name="saveUserBtn">Submit</button>
                            
                        </div>
                    </form>
                </div>
                <hr>
                <div>
                    <?php 
                        if(isset($_POST['saveAmountBtn'])){
                            
                            echo $userObj->insertAmount($_POST);
                        }
                        

                    ?>
                    <form action="" method="post">
                        <div class="mb-3">
                        <select class="form-select" name="user_id">
                            <option selected>select user</option>
                            <?php 
                                $data = $userObj->view();
                                if($data->num_rows>0){
                                    while($user = $data->fetch_assoc()){
                                        echo '
                                            <option value="'.$user['id'].'">'.$user['fullname'].'</option>';
                                    }
                                }
                            ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="basic_amount" required  class="form-control"  placeholder="enter amount">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" name="saveAmountBtn">Send</button>
                        </div>
                    </form>
                    
                </div>
                <hr>
                <div>
                    <?php 
                        // if(isset($_POST['saveAmountBtn'])){
                            
                        //     echo $userObj->insertAmount($_POST);
                        // }
                        if(isset($_POST['calAmountBtn'])){
                            $userId = $_POST['user_id'];
                            $userObj->calculateCommission($userId);
                        }

                    ?>
                    <form action="" method="post">
                        <div class="mb-3">
                        <select class="form-select" name="user_id">
                            <option selected>select user</option>
                            <?php 
                                $data = $userObj->view();
                                if($data->num_rows>0){
                                    while($user = $data->fetch_assoc()){
                                        echo '
                                            <option value="'.$user['id'].'">'.$user['fullname'].'</option>';
                                    }
                                }
                            ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            
                            <button class="btn btn-primary" name="calAmountBtn">Calculate Commission</button>
                        </div>
                    </form>
                </div>

            </div>
            
            <div class="col-md-7 mt-5 border border-primary mx-1">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Ref User Id</th>
                        <th scope="col">Parent User Id</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $data = $userObj->view(0);
                            if($data->num_rows>0){
                                while($user = $data->fetch_assoc()){
                                    echo '
                                        <tr>
                                            <th scope="row">'.$user['id'].'</th>
                                            <td>'.$user['fullname'].'</td>
                                            <td>'.$user['username'].'</td>
                                            <td>'.$user['ref_user_id'].'</td>
                                            <td>'.$user['parent_user_id'].'</td>
                                        </tr>
                                    ';
                                }
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>








    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>