<?php
class Ticket
{
    use Model;
    protected $db_table = 'tickets';
    protected $order_col = "Id";
    protected $order_type = "desc";
    protected $limit = 20;
    protected $offset = 0;
    protected $update_id = 'Id';
    //allowed columns of the db
    protected $allowedColumns = [
        'clientID',
        'Issue',
        'Description',
        'DateOppened',
        'DateClosed',
        'BranchID',
        'UserOpened',
        'UserResolved',
        'History'
    ];

    public function createDatabaseTables()
    {
        $sql = "
                        CREATE TABLE IF NOT EXISTS `tickets` (
                            `Id` int NOT NULL AUTO_INCREMENT,
                            `clientID` int NOT NULL,
                            `Issue` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
                            `Description` varchar(1500) COLLATE utf8mb4_general_ci NOT NULL,
                            `DateOppened` datetime NOT NULL,
                            `DateClosed` datetime NOT NULL,
                            `BranchID` int NOT NULL,
                            `UserOpened` int NOT NULL,
                            `UserResolved` int DEFAULT NULL,
                            `History` varchar(1500) COLLATE utf8mb4_general_ci DEFAULT NULL,
                            PRIMARY KEY (`Id`),
                            KEY `clientID` (`clientID`),
                            KEY `UserOpened` (`UserOpened`),
                            KEY `BranchID` (`BranchID`),
                            KEY `UserResolved` (`UserResolved`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                        ALTER TABLE `tickets`
                            ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`BranchID`) REFERENCES `branch` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
                            ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`clientID`) REFERENCES `clients` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
                            ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`UserOpened`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
                            ADD CONSTRAINT `tickets_ibfk_4` FOREIGN KEY (`UserResolved`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
                ";
        $this->query($sql);
    }
}
