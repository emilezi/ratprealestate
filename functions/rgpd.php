<?php
/**
    * RGPD management class.
    *
    * @author Emile Z.
    */
class RGPD{

    public function RGPDacceptance($IP,$db) {

        $q = $db->prepare("INSERT INTO rgpd(ip,machine,agent) VALUES (:ip,:machine,:agent)");
        $q->execute([
            'ip' => $IP->getIp(),
            'machine' => $IP->getMachine(),
            'agent' => $IP->getAgent()
        ]);

    }

}

$RGPD = new RGPD();