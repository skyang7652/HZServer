<?php


namespace HZ\Repositories;

use Doctrine\Common\Collections\Collection;
use HZ\Employee;

class EmployeeR implements EmployeeRI
{
    
    /** @var Employee 注入的 Employee model */
    protected $Employee;
    
    /**
     * EmployeeRepository constructor.
     *
     * @param User $Employee
     */
     
     public function __construct(Employee $Employee) {
         
         $this ->Employee = $Employee;
     }
     
     
    
    public function getEmployeeAll(){
        
        return $this->Employee->all();
        
    }
    
    public function getEmployee($id){
        return $this->Employee->findOrFail($id);
    }
    
    
    public function searchEmployee($qChar){
        
        return $this->Employee
                    ->where('lastName','like','%'.$qChar.'%')
                    ->orWhere('firstName','like','%'.$qChar.'%')
                    ->get();
    }
    
    
}