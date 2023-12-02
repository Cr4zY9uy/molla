<?php
require_once "config/connect.php";
class Stores
{
    public static function getAllStores()
    {
        global $cont;
        $sql = "SELECT * FROM store";
        $result = $cont->query($sql);
        $stores = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $store = [
                    'id' => $row['id'],
                    'namestore' => $row['namestore'],
                    'address' => $row['address'],
                    'ulr' => $row['ulr'],
                    'phonestore' => $row['phonestore'],
                ];
                $stores[] = $store;
            }
        }

        return $stores;
    }
    public static function getnewStores()
    {
        global $cont;
        $sql = "SELECT * FROM store order by id desc limit 3";
        $result = $cont->query($sql);
        $stores = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $store = [
                    'id' => $row['id'],
                    'namestore' => $row['namestore'],
                    'address' => $row['address'],
                    'ulr' => $row['ulr'],
                    'phonestore' => $row['phonestore'],
                ];
                $stores[] = $store;
            }
        }

        return $stores;
    }
}