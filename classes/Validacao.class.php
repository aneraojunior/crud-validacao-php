<?php

class Validacao
{
    private $cpf;
    private $email;

    public function setCPF($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getCPF()
    {
        return $this->cpf;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public static function validarCPF($cpf)
    {
        if(empty($cpf)) {
            return false;
        }

        $cpf = preg_match('/[0-9]/', $cpf)?$cpf:0;

        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);


        if (strlen($cpf) != 11) {
            echo "length";
            return false;
        }

        else if ($cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999') {
            return false;

        } else {

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }

            return true;
        }
    }

    public function validarEmail($email)
    {
        if (filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE)
        {
            return false;
        }

        else
        {
            $strAfterAt  = substr(strstr($email, '@'), 1);
            $chunks      = explode('.', $strAfterAt);
            $cntChunks   = count($chunks) - 1;

            $strDomain = $chunks[($cntChunks-1)] . '.' . $chunks[$cntChunks];

            if (!getmxrr( $strDomain, $mxhosts ))
            {
                return false;
            }

            else
            {
                return true;
            }
        }
    }
}