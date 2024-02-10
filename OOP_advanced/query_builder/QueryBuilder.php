<?php
class QueryBuilder {
    public $table;
    public $select = '*';
    public $where = [];
    public $group_by = '';
    public $having = '';
    public $count = 'COUNT(*)';

    public function setTable($table) {
        $this->table = $table;
        return $this;
    }

    public function select($columns) {
        $this->select = implode(', ', $columns);
        return $this;
    }

    public function where($conditions) {
        $this->where = $conditions;
        return $this;
    }

    public function group_by($column) {
        $this->group_by = $column;
        return $this;
    }

    public function having($column, $operator, $value) {
        $this->having = "$column $operator $value";
        return $this;
    }

    public function getCount() {
        return $this->count;
    }

    public function get() {
        $db = new Database();
        $connection = $db->getConnection();

        $query = "SELECT $this->select FROM $this->table";

        if (!empty($this->where)) {
            $whereConditions = [];
            foreach ($this->where as $key => $value) {
                $whereConditions[] = "$key = '$value'";
            }
            $query .= " WHERE " . implode(' AND ', $whereConditions);
        }

        if ($this->group_by !== '') {
            $query .= " GROUP BY $this->group_by";
        }

        if ($this->having !== '') {
            $query .= " HAVING $this->having";
        }

        $result = $connection->query($query);

        if (!$result) {
            die("Error in query: " . $connection->error);
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $connection->close();

        return $data;
    }
}
?>