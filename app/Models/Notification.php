<?php
class Notification
{
    use Model;
    protected $db_table = 'notifications';
    protected $order_col = "Id";
    protected $order_type = "desc";
    protected $limit = 20;
    protected $offset = 0;
    protected $update_id = 'Id';
    //allowed columns of the db
    protected $allowedColumns = [
        'Name',
        'Description',
        'Date',
        'BranchID',
        'isReaded'
    ];

    public function createDatabaseTables()
    {
        $sql = "
                    CREATE TABLE IF NOT EXISTS `notifications` (
                        `Id` int NOT NULL AUTO_INCREMENT,
                        `Name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
                        `Description` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
                        `Date` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
                        `BranchID` int NOT NULL,
                        `isReaded` tinyint(1) NOT NULL,
                        PRIMARY KEY (`Id`),
                        UNIQUE KEY `BranchID` (`BranchID`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                    ALTER TABLE `notifications`
                        ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`BranchID`) REFERENCES `branch` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
                ";
        $this->query($sql);
    }
}
