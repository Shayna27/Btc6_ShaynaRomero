<?php 
namespace App\Controllers;
use App\Models\LoginModel;
use CodeIgniter\Controller;

class LoginController extends Controller
{
    private $login = '' ;
    public function __construct(){
      
        $this->login = new LoginModel();       
    }
    
    public function index()    {  

        $session = session();  
        $session->setFlashdata('msg', '');
    return view('login');
    }      

    public function login(){
        
        $data['user_name']="user_id";
        $data['password']="password";  
        $data = array('user_name'=>$this->request->getVar('user_id'),'password'=>md5($this->request->getVar('password')));
        $user =  $this->login->where($data); 
        $rows = $this->login->countAllResults();
        $session = session();          
        if($rows==1){
            return view('success');
            return view('user_id');
            return view('password');
        }else{
            $session->setFlashdata('msg', 'Invalid User');
            return view('login');
        } 
     }
}
