<?php

function isLogged(): bool
{
     if(isset($_SESSION{'usuario'})){
       return false;
    }
    return true;    
}