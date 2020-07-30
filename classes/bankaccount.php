
<?php 
   $filepath= realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helpers/format.php');

 ?>

 <?php 
    /**
     * 
     */
    class bankaccount
    {
    	private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}
	    public function get($data)
      {
    		$cardcode = mysqli_real_escape_string($this->db->link, $data['cardcode']);
	      $query = "SELECT * FROM tbl_bankaccount WHERE cardcode = '$cardcode'";
		    $result = $this->db->select($query);		
		    return $result;
	    }
	    public function withdraw($data,$id)
    	{
           
            $cardcode = mysqli_real_escape_string($this->db->link, $data['cardcode']);
            $cardPass = mysqli_real_escape_string($this->db->link, $data['cardPass']);
            $amount = mysqli_real_escape_string($this->db->link, $data['amount']);
            
            if($cardcode=="" || $cardPass=="" || $amount==""){
            	$alert= "<span class='error' > Must be not empty</span>";
            	return $alert;
            }
            else{ 
		            $query = "SELECT * FROM tbl_bankaccount WHERE cardcode = '$cardcode' AND cardPass = '$cardPass'";
                $result = $this->db->select($query);
		            if($result){
			             $x=$result->fetch_assoc();
			             $balance=$x['cardBalance'];
			             if($balance<$amount){
				              $alert="<span class ='error'> Not enough money</span>";
                      return $alert;
			             }
			             else{
				              $new = $balance-$amount;
                      $query = "UPDATE tbl_bankaccount SET cardBalance=$new WHERE cardcode = '$cardcode' AND cardPass = '$cardPass'";
                      $result = $this->db->update($query);
				              $alert="<span  style='color:green;font-size:25px;'> Deposit successful</span>";
                      return $alert;
			             }
                }
                else{
                    $alert="<span class ='error'> Card not correct</span>";
                    return $alert;
                }
            }
    	}
       
      public function compare($data,$id)
      {
           
            $cardcode = mysqli_real_escape_string($this->db->link, $data['cardcode']);
            $cardPass = mysqli_real_escape_string($this->db->link, $data['cardPass']);
            $amount = mysqli_real_escape_string($this->db->link, $data['amount']);
            $query = "SELECT * FROM tbl_bankaccount WHERE cardcode = '$cardcode' AND cardPass = '$cardPass'";
            $result = $this->db->select($query);
            if($result){
                $x=$result->fetch_assoc();
                $balance=$x['cardBalance'];
                if($balance<$amount){
                    return false;
                }
                else{
                    return true;
                }
            }
      }
    }
 ?>