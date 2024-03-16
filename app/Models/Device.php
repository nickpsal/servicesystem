<?php
class Device
{
    use Model;
    protected $db_table = 'devices';
    protected $order_col = "Id";
    protected $order_type = "desc";
    protected $limit = 20;
    protected $offset = 0;
    protected $update_id = 'Id';
    //allowed columns of the db
    protected $allowedColumns = [
        'Name',
        'Type',
        'SN',
        'Date',
        'ClientID'
    ];

    public function createDatabaseTables()
    {
        $sql = "
                    CREATE TABLE IF NOT EXISTS `devices` (
                        `Id` int NOT NULL AUTO_INCREMENT,
                        `Name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
                        `Type` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
                        `SN` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
                        `Date` datetime NOT NULL,
                        `ClientID` int NOT NULL,
                        PRIMARY KEY (`Id`),
                        KEY `ClientID` (`ClientID`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                    ALTER TABLE `devices`
                        ADD CONSTRAINT `devices_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
                ";
        $this->query($sql);
    }
}
