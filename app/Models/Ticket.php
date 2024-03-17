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
}
