<?php 
   $DATABASE_HOST = 'localhost:3307';
   $DATABASE_USER = 'root';
   $DATABASE_PASS = '';
   $DATABASE_NAME = 'registration';

   $conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

   if(!$conn){
      die("Awaiting Resources");
      }
   ?>