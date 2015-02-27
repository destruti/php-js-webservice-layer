<?php
namespace ModelMapper;
use ModelUserInterface;
 
interface UserMapperInterface
{
    public function fetchById($id);    
    public function fetchAll(array $conditions = array());
     
    public function insert(UserInterface $user);
    public function delete($id);
}
