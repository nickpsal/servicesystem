<?php
class User
{
    use Model;
    protected $db_table = 'users';
    protected $order_col = "Id";
    protected $order_type = "desc";
    protected $limit = 20;
    protected $offset = 0;
    protected $update_id = 'Id';
    //allowed columns of the db
    protected $allowedColumns = [
        'Username',
        'FullName',
        'Email',
        'Image'
    ];

    public function createDatabaseTables()
    {
        $sql = "
                    CREATE TABLE IF NOT EXISTS `users` (
                        `Id` int NOT NULL AUTO_INCREMENT,
                        `Username` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
                        `FullName` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
                        `Email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
                        `Image` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
                        PRIMARY KEY (`Id`)
                      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                ";
        $this->query($sql);
    }
}
