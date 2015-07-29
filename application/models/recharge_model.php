<?php
class Recharge_model extends CI_Model
{ 
    public function getOperator($number){       
        $val = "";
        $code="";
        $state = "";
        $opts = array(
            'http'=>array(
              'method'=>"GET",
              'header'=>"X-Mashape-Key: WAKMswF0P7mshBFHM6ZO98FwSUY4p1ORVSGjsn4W32pUuFu0T1",
              'Accept'=>"application/json"
            )
          );
        $context = stream_context_create($opts);       
        $res = file_get_contents(OPERATOR."?number=$number", false, $context);       
        $responce = json_decode($res, true);
        $operator_type = 1;
        $oper_list = $this->getAllOperator($operator_type);
        foreach($oper_list as $lis){
            if(strtolower($lis->op_name) == strtolower($responce['Operator'])){               
                $val .= "<option value='".$lis->op_name."' op_code='".$lis->code."' selected = 'selected'>".$lis->op_name."</option>";
                $code = "@@".$lis->code;
                $state = "@@".$responce['Telecom circle'];
            }else{
                 $val .= "<option value='".$lis->op_name."' op_code='".$lis->code."'>".$lis->op_name."</option>";
            }
            
        }
      
        return $val.$code.$state;
    }
    
    public function getAllOperator($operator_type){
        $this->db->order_by('op_name');
        $query = $this->db->get_where('hrm_oprator', array('type' => $operator_type));
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return array();
        }
    }
}