<?php

namespace App\Components\Vypis;


use Nette,
	App\Model;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VypisControl
 *
 * @author Jago
 */
class VypisControl extends \Nette\Application\UI\Control{
    //put your code here
     private $db;
        
        public function __construct(Nette\Database\Context $db) {
            $this->db = $db;
            //dump ($db);
            parent::__construct();
        }
            
    public function render(){
        echo '<h3 class="cente">SEARCH FROM DATABASE</h2>';
        $this->template->setFile(__DIR__."/templates/default.latte");
        $this->template->render();
    }
    protected function createComponentForm(){
        $form = new \Nette\Application\UI\Form;

        $form->addText('jmeno', 'Jméno:');
            
        $form->addText('mesto', 'Město:');
        
        $form->addSubmit('send', 'Search')
                ->setAttribute('class', 'sender');
        $form->onSuccess[]=$this->procesForm;
        return $form;
        
        }
    public function procesForm($form,$values){
        dump ($values);
        
        $selection = $this->db->table('tabulka')->where('jmeno', array("values" => 'jmeno'));
        $this->presenter->template->selection = $selection;
        $this->presenter->template->values = $values;
        
    }
}
        

   

