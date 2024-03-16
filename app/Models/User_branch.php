<?php
class User_branch
{
    use Model;
    protected $db_table = 'user_branch';
    protected $order_col = "Id";
    protected $order_type = "desc";
    protected $limit = 20;
    protected $offset = 0;
    protected $update_id = 'Id';
    //allowed columns of the db
    protected $allowedColumns = [
        'BranchId',
        'UserId'
    ];

    public function createDatabaseTables()
    {
        $sql = "
                        CREATE TABLE IF NOT EXISTS `user_branch` (
                            `Id` int NOT NULL AUTO_INCREMENT,
                            `BranchId` int NOT NULL,
                            `UserId` int NOT NULL,
                            PRIMARY KEY (`Id`),
                            KEY `BranchId` (`BranchId`),
                            KEY `UserId` (`UserId`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                        ALTER TABLE `user_branch`
                            ADD CONSTRAINT `user_branch_ibfk_1` FOREIGN KEY (`BranchId`) REFERENCES `branch` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
                            ADD CONSTRAINT `user_branch_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
                ";
        $this->query($sql);
    }
}
