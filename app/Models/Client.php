<?php
class Client
{
    use Model;
    protected $db_table = 'clients';
    protected $order_col = "Id";
    protected $order_type = "desc";
    protected $limit = 20;
    protected $offset = 0;
    protected $update_id = 'Id';
    //allowed columns of the db
    protected $allowedColumns = [
        'FullName',
        'Email',
        'Address',
        'Telephone',
        'Mobile',
        'ContactPerson',
        'VAT'
    ];

    public function createDatabaseTables()
    {
        $sql = "
                    CREATE TABLE IF NOT EXISTS `clients` (
                        `Id` int NOT NULL AUTO_INCREMENT,
                        `fullname` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
                        `Email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
                        `Address` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
                        `Telephone` int NOT NULL,
                        `Mobile` int NOT NULL,
                        `ContactPerson` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
                        `VAT` int NOT NULL,
                        PRIMARY KEY (`Id`)
                      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                      
                ";
        $this->query($sql);
    }
}
