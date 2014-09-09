<?php
 Class Model_activiteiten extends CI_Model {
   function Kapoenen() {
     $this->db->select() 
              ->where('Tak', 'Kapoenen')
              ->limit(5);

     $Query = $this->db->get('Activiteiten');
     return $Query->result();
   }

   function Welpen() {
     $this->db->select()
              ->where('Tak', 'Welpen')
              ->limit(5);

     $Query = $this->db->get('Activiteiten');
     return $Query->result(); 
   }

   function JongGivers() {
     $this->db->select()
              ->where('Tak', 'JongGivers')
              ->limit(5);

     $Query = $this->db->get('Activiteiten');
     return $Query->result(); 
   }

   function Givers() {
     $this->db->select()
               ->where('Tak', 'Givers')
               ->limit(5);

     $Query = $this->db->get('Activiteiten');
     return $Query->result(); 
   }

   function Jins() {
     $this->db->select()
              ->where('Tak', 'Jins')
              ->limit(5);

     $Query = $this->db->get('Activiteiten');
     return $Query->result();
   }
 }