<?php

namespace App\Interfaces;

interface ControllerFabricInterface
{
    public function index();
    public function create();
    public function update($id);
    public function delete($id);
    public function show($id);
}