<?php
   
 namespace App\Interfaces;   

   interface permissionRepositoryInterface
   {
    public function view();
    public function create();
    public function insert();
    public function edit();
    public function update();
    public function destroy();
   }