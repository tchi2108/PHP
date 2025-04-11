<?php
class Car {
    public $license_plate;
    public $color;
    public $engine_status; 
    public function __construct($license_plate=null, $color=null, $engine_status=null)
    {
        $this->license_plate = $license_plate;
        // A=B
        $this->color = $color;
        $this->engine_status = $engine_status;

    }
    public function AddUser()
    {
        // Connect to database.
        $dsn = "mysql:host=localhost;dbname=Carql;port=4306";

        // khai bao ra mot bien dsn, bien nay co gtri la "mysql:host=localhost;dbname=Carql";
        // localhost la dchi may, Carql la ten DB
        $conn = new PDO($dsn, "root","");
        // ta khoi tao 1 doi tuong $conn voi thong tin chuoi dsn, username, password 

         
        //câu lệnh insert vào bảng 
        //insert into tablename(colum1, colum2) values() 
        // Insert query.
        $sql = "INSERT INTO `Car`
        (
            `color`,
            `engine_status`,
            `license_plate`
        )
        VALUES
        (
            :color,
            :engine_status,
            :license_plate 
        );";

        // Prepare statement.
        $stmt = $conn->prepare($sql);

        // Execute the statement.
        $stmt->execute(array(
            ":color" => $this->color,
            ":engine_status" => $this->engine_status,
            ":license_plate" => $this->license_plate 
        ));


        // Close the database connection.   
        $conn = NULL;
        // Return the id.
        return 0;
    }

   

}

//$x1=new Car("123","Do","hoat dong");
//$x1->AddUser();
$x2=new Car("345","Vang","hong");
$x2->AddUser();
// x1 la the hien cua lop Car
?>
