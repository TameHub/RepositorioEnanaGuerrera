<?php

use PHPUnit\Framework\TestCase;
include './src/Enana.php';



class enanaTest extends TestCase {

    public function testCreandoEnana() {
        #Se probará la creación de enanas vivas, muertas y en limbo y se comprobará tanto la vida como el estado
        $enana1 = new Enana("ENANA VIVA",100);
        $enana2 = new Enana("ENANA LIMBO",0);
        $enana3 = new Enana("ENANA MUERTA",-32);
        $this->assertEquals(($enana1->getSituacion()),"viva");
        $this->assertEquals(($enana2->getSituacion()),"limbo");
        $this->assertEquals(($enana3->getSituacion()),"muerta");
    }
    public function testHeridaLeveVive() {
        #Se probará el efecto de una herida leve a una Enana con puntos de vida suficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es mayor que 0 y además que su situación es viva
        $enana1 = new Enana("ENANA VIVA",100);
        $Puntos = $enana1->getPuntosVida();
        $check = false;
        if($Puntos>0){$check = true;}

        $this->assertEquals($check,"true");
        $enana1->heridaLeve();
        $this->assertEquals(($enana1->getSituacion()),"viva");      
    }

    public function testHeridaLeveMuere() {
        #Se probará el efecto de una herida leve a una Enana con puntos de vida insuficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es menor que 0 y además que su situación es muerta
        $enana1 = new Enana("ENANA",1);        
        $Puntos = $enana1->getPuntosVida();
        $check = false;
        if($Puntos>0){$check = true;}
        
        $this->assertEquals($check,"true");
        $enana1->heridaLeve();
        $this->assertEquals(($enana1->getSituacion()),"muerta"); 
    }

    public function testHeridaGrave() {
        #Se probará el efecto de una herida grave a una Enana con una situación de viva.
        #Se tendrá que probar que la vida es 0 y además que su situación es limbo
        $enana1 = new Enana("ENANA VIVA",100);
        $Puntos = $enana1->getPuntosVida();
        $check = false;
        if($Puntos>0){$check = true;}

        $this->assertEquals($check,"true");
        $this->assertEquals(($enana1->getSituacion()),"viva");
        $enana1->heridaGrave();
        $this->assertEquals(($enana1->getSituacion()),"limbo");


    }
    
    public function testPocimaRevive() {
        #Se probará el efecto de administrar una pócima a una Enana muerta pero con una vida mayor que -10 y menor que 0
        #Se tendrá que probar que la vida es mayor que 0 y que su situación ha cambiado a viva
        $enana3 = new Enana("ENANA MUERTA",-5);
        $Puntos = $enana3->getPuntosVida();
        $check = false;
        if((-10)<=$Puntos<=(-1)){$check = true;} //COMPROBACION PUNTOS ENTRE -10 y 0
        $this->assertEquals($check,"true");
        $enana3->pocima(); //AÑADIDO DE 10

        if($Puntos>=1){$check = true;} //COMPROBACION DE MAYOR DE 0
        $this->assertEquals($check,"true");

        $this->assertEquals(($enana3->getSituacion()),"viva"); //COMPROBACION DE LIMBO
    }

    public function testPocimaNoRevive() {
        #Se probará el efecto de administrar una pócima a una Enana en el libo
        #Se tendrá que probar que la vida y situación no ha cambiado

    }

    public function testPocimaExtraLimbo() {
        #Se probará el efecto de administrar una pócima Extra a una Enana en el limbo.
        #Se tendrá que probar que la vida es 50 y la situación ha cambiado a viva.

    }
}
?>