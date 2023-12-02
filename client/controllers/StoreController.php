<?php
require_once "client/models/Stores.php";

class StoreController
{
    public function index()
    {
        $stores = Stores::getAllStores();
        $newstores = Stores::getnewStores();
        include 'client/views/store.php';
    }
}
?>