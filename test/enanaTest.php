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
        $enana1 = new Enana("ENANA VIVA",1);
        $comprobacion = false;
        $this->assertEquals(($enana1->getSituacion()),"viva");
        $enana1->heridaLeve();
        $this->assertEquals($enana1->getSituacion(),"viva");
    }

    public function testHeridaLeveMuere() {
        #Se probará el efecto de una herida leve a una Enana con puntos de vida insuficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es menor que 0 y además que su situación es muerta
        $enana1 = new Enana("ENANA VIVA",100);
        $enana2 = new Enana("ENANA LIMBO",0);
        $enana3 = new Enana("ENANA MUERTA",-32);
    }

    public function testHeridaGrave() {
        #Se probará el efecto de una herida grave a una Enana con una situación de viva.
        #Se tendrá que probar que la vida es 0 y además que su situación es limbo
        $enana1 = new Enana("ENANA VIVA",100);
        $enana2 = new Enana("ENANA LIMBO",0);
        $enana3 = new Enana("ENANA MUERTA",-32);
    }
    
    public function testPocimaRevive() {
        #Se probará el efecto de administrar una pócima a una Enana muerta pero con una vida mayor que -10 y menor que 0
        #Se tendrá que probar que la vida es mayor que 0 y que su situación ha cambiado a viva
        $enana1 = new Enana("ENANA VIVA",100);
        $enana2 = new Enana("ENANA LIMBO",0);
        $enana3 = new Enana("ENANA MUERTA",-32);
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