
        <?php
        $name =  isset($_POST['name']) ? $_POST['name'] : '';
        $mobile =  isset($_POST['mobile']) ? $_POST['mobile'] : '';
        $gender =  isset($_POST['gender']) ? $_POST['gender'] : '';
        $errorMsg = '';
        
        if(empty($name) || empty($mobile) || empty($gender)){
            //Has empty fields
            $errorMsg .= "Fields cannot be empty<br/>";
        }
        if(preg_match('/[^a-zA-Z\s]/', $name)){
            // Name contains symbols or numbers
            $errorMsg .= "Name can only contain alphabets.<br/>";
        }
        if(preg_match('/[\D]/', $mobile)){
            // Mobile contains symbols or letters
            $errorMsg .= "Mobile can only contain numbers.";
        }
        
        
        
        if(strlen($errorMsg) > 1){
            //Has error
            echo "<h1>Registration failed.</h1>";
            echo "<h4>A few errors occured</h4>";
            echo $errorMsg;
        } 
        else{
            echo "<h1>Registration successful.</h1>";
            echo "<h3>" . ($gender == "f" ? "Ms." : "Mr.") . " $name</h3>";
            echo "Mobile number: $mobile";
        }
                
        ?>
        
