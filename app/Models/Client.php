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
}
