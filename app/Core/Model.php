<?php   
    trait Model{
        use Database;

        public function find_all_data_from_db() {
            $query = "SELECT * FROM $this->db_table ORDER BY $this->order_col $this->order_type limit $this->limit offset $this->offset";
            return $this->query($query);
        }

        public function get_annakoinoseis_home_page() {
            $query = "SELECT * FROM $this->db_table ORDER BY $this->order_col $this->order_type limit $this->limit2 offset $this->offset";
            return $this->query($query);
        }

        public function find_all_prosfores_from_db() {
            $query = "SELECT * FROM $this->db_table WHERE ending_date_prosforas >= CURDATE() ORDER BY $this->order_col $this->order_type limit $this->limit offset $this->offset";
            return $this->query($query);
        }

        public function where_query_db($data, $data_not  =  []) {
            $keys = array_keys($data); 
            $keys_not = array_keys($data_not);
            $query = "SELECT * FROM $this->db_table  where ";
            foreach($keys as $key){
                $query .= $key . "=:" . $key .  " && ";
            }
            foreach($keys_not as $key){
                $query .= $key . "!=:" . $key .  " && ";
            }
            $query = trim($query, " &&");
            $query .= " limit $this->limit offset $this->offset";
            $data = array_merge($data, $data_not);
            return $this->query($query,$data);
        }

        public function get_first_query_db($data, $data_not  =  []) {
            $keys = array_keys($data); 
            $keys_not = array_keys($data_not);
            $query = "SELECT * FROM $this->db_table  where ";
            foreach($keys as $key){
                $query .= $key . "=:" . $key .  " && ";
            }
            foreach($keys_not as $key){
                $query .= $key . " !=:" . $key .  " && ";
            }
            $query = trim($query, " &&");
            $query .= " limit $this->limit offset $this->offset";
            $data = array_merge($data, $data_not);
            $result = $this->query($query, $data);
            if ($result) {
                return $result[0];
            }
            return false;
        }

        public function get_prosfora_from_user($data, $data_not  =  []) {
            $keys = array_keys($data); 
            $keys_not = array_keys($data_not);
            $query = "SELECT * FROM $this->db_table  where ";
            foreach($keys as $key){
                $query .= $key . "=:" . $key .  " && ";
            }
            foreach($keys_not as $key){
                $query .= $key . " !=:" . $key .  " && ";
            }
            $query = trim($query, " &&");
            $query .= " ORDER BY $this->order_col2 $this->order_type2 limit $this->limit offset $this->offset";
            $data = array_merge($data, $data_not);
            $result = $this->query($query, $data);
            if ($result) {
                return $result[0];
            }
            return false;
        }
        
        public function join_tables_from_db($columns, $field, $table, $data) {
            $keys = array_keys($data); 
            $query = "SELECT " . implode(", ", $columns) . " FROM $this->db_table ";
            $query .= "JOIN $table ON $this->db_table.$field = $table.$field WHERE ";
            //κατασκευή του query πεδιο=:τιμη
            foreach($keys as $key){
                $query .= $this->db_table. "." . $key . "=:" . $key;
            }
            return $this->query($query, $data);
        }

        public function get_min_and_max_from_db($item_table, $item, $arg) {
            $query = "SELECT $item_table, MIN($item) as min_price, MAX($item) as max_price FROM $this->db_table WHERE $arg >= CURDATE() GROUP BY $item_table";
            return $this->query($query);
        }

        public function get_avg_from_db($item_table, $item, $arg) {
            $query = "SELECT $item_table, AVG($item) as avg FROM $this->db_table WHERE $arg >= CURDATE() GROUP BY $item_table";
            return $this->query($query);
        }

        public function insert_data_to_db($data){
            //αφαίρεση fields που δεν επιτρέπονται απο την data
            if (!empty($this->allowedColumns)) {
                foreach($data as $key=>$value) {
                    if (!in_array($key, $this->allowedColumns)) {
                        unset($data[$key]);
                    }
                }
            }
            if ($this->db_table === 'user') {
                $data['password_user'] = password_hash($data['password_user'],PASSWORD_DEFAULT);
                $data['role_user'] = 1;
            }
            $keys = array_keys($data);
            $query = "insert into $this->db_table (" . implode(",", $keys) . ") values (:" .implode(",:", $keys) . ")";
            $this->query($query, $data);
            return false;
        }

        public function update_data_to_db($id, $data) {
            if (!empty($this->allowedColumns)) {
                foreach($data as $key=>$value) {
                    if (!in_array($key, $this->allowedColumns)) {
                        unset($data[$key]);
                    }
                }
            }
            $id_column = $this->update_id;
            $keys = array_keys($data); 
            $query = "UPDATE $this->db_table SET ";
            foreach($keys as $key){
                $query .= $key . "=:" . $key .  ", ";
            }
            $query = trim($query, ", ");
            $query .= " where $id_column = :$id_column ";
            $data[$id_column] = $id;
            if ($this->db_table === 'user' && !empty($data['password_user'])) {
                $data['password_user'] = password_hash($data['password_user'],PASSWORD_DEFAULT);
            }
            $this->query($query, $data);
            return false;
        }

        public function delete_data_from_db($id) {
            $id_column = $this->update_id;
            $data[$id_column] = $id;
            $query = "DELETE FROM $this->db_table where $id_column = :$id_column";
            $this->query($query, $data);
            return false;
        }
    }