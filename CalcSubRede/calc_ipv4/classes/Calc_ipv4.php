<?php

class calc_ipv4{

    public $endereco;

    public $cidr;

    public $endereco_completo;

    public function __construct( $endereco_completo ) {
        $this->endereco_completo = $endereco_completo;
        $this->valida_endereco();
    }

    public function valida_endereco() {

        // Expressão regular - posição dos end de rede... os 4 bits + cidr
        $regexp = '/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\/[0-9]{1,2}$/';
        
        // Verifica o IP/CIDR
        if ( ! preg_match( $regexp, $this->endereco_completo ) ) {  //Executar uma correspondência de expressão regular
            return false;
        }

        $endereco = explode( '/', $this->endereco_completo );

        $this->cidr = (int) $endereco[1];

        $this->endereco = $endereco[0];

        if ( $this->cidr > 32 ) {
            return false;
        }
        
        // Faz um loop e verifica cada número do IP
        foreach( explode( '.', $this->endereco ) as $numero ) {
            $numero = (int) $numero;
            if ( $numero > 255 and $numero < 0 ) {
                return false;
            }
        }
        return true;
    }

    //IPv4/CIDR
    public function endereco_completo() { 
        return ( $this->endereco_completo ); 
    }

    //end IPv4
    public function endereco() { 
        return ( $this->endereco ); 
    }

    //CIDR
    public function cidr() {
        return ( $this->cidr );
    }

    //máscara de sub-rede
    public function mascara() {
        if ( $this->cidr() == 0 ) {
            return '0.0.0.0';
        }
        return ( 
            long2ip(
                ip2long("255.255.255.255") << ( 32 - $this->cidr ) 
            )
        );
    }

    //IP de rede
    public function rede() {
        if ( $this->cidr() == 0 ) {
            return '0.0.0.0';
        }
        return (
            long2ip( 
                ( ip2long( $this->endereco ) ) & ( ip2long( $this->mascara() ) )
            )
        );
    }

    //IP de broadcast
    public function broadcast() {
        if ( $this->cidr() == 0 ) {
            return '255.255.255.255';
        }
        return (
            long2ip( ip2long($this->rede() ) | ( ~ ( ip2long( $this->mascara() ) ) ) )
        );
    }
    
    //total de IPs (rede + broadcast)
    public function total_ips() {
        return( pow(2, ( 32 - $this->cidr() ) ) );
    }
    
    //quantidade de hosts
    public function ips_rede() {
        if ( $this->cidr() == 32 ) {
            return 0;
        } elseif ( $this->cidr() == 31 ) {
            return 0;
        }
        
        return( abs( $this->total_ips() - 2 ) );
    }

    //quantidade de sub-redes
    public function qtd_sub(){
        $qtd_sub = 256/$this->total_ips();
        return $qtd_sub;
    }
    
    //primeiro IP
    public function primeiro_ip() {
        if ( $this->cidr() == 32 ) {
            return null;
        } elseif ( $this->cidr() == 31 ) {
            return null;
        } elseif ( $this->cidr() == 0 ) {
            return '0.0.0.1';
        }
        
        return (
            long2ip( ip2long( $this->rede() ) | 1 )
        );
    }
    
    //ultimo IP
    public function ultimo_ip() {
        if ( $this->cidr() == 32 ) {
            return null;
        } elseif ( $this->cidr() == 31 ) {
            return null;
        }
    
        return (long2ip( ip2long( $this->rede() ) | ( ( ~ ( ip2long( $this->mascara() ) ) ) - 1 ) ));
    }

    public function private_public(){
        $partes = explode(".", $this->endereco_completo() );

        if ($partes[0] == 10){
            $ip = "Rede Privada";
            return $ip;
        }elseif ($partes[0] == 192 and $partes[1] == 168){
            $ip = "Rede Privada";
            return $ip;
        }elseif (($partes[0] == 172) and ($partes[1] >=16 and $partes[1] <= 31)){
            $ip = "Rede Privada";
            return $ip;
        }elseif ($partes[0] == 127){
            $ip = "Localhost";
            return $ip;
        }elseif ($partes[0] == 169 and $partes[1] == 254){
            $ip = "Zero Config";
            return $ip;
        }else{
            return "Rede Pública";
        }
    }

    public  function classe(){
        if ($this->endereco() < 128){
            $classe = "Classe A";
            return $classe;
        }elseif ($this->endereco() >= 128 AND $this->endereco() < 192){
            $classe = "Classe B";
            return $classe;
        }elseif ($this->endereco() >= 192 AND $this->endereco() < 224){
            $classe = "Classe C";
            return $classe;
        }elseif ($this->endereco() >= 224 AND $this->endereco() < 240){
            $classe = "Classe D";
            return $classe;
        }else{
            $classe = "Classe E";
            return $classe;
        }
    }

}