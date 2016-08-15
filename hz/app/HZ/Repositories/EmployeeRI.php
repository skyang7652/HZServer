<?php


namespace HZ\Repositories;

interface EmployeeRI
{
    
    public function getEmployeeAll();
    
    public function getEmployee($id);
    
    public function searchEmployee($qChar);
    
}