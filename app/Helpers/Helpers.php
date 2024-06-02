<?php

if (! function_exists('formataCpf')) {
    function formataCpf($cpf)
    {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        if (strlen($cpf) !== 11) {
            return $cpf;
        }

        return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '\1.\2.\3-\4', $cpf);
    }
}

if (! function_exists('formataTelefone')) {
    function formataTelefone($telefone)
    {
        $telefone = preg_replace('/[^0-9]/', '', $telefone);
        if (strlen($telefone) == 10) {
            return preg_replace('/(\d{2})(\d{4})(\d{4})/', '(\1) \2-\3', $telefone);
        } elseif (strlen($telefone) == 11) {
            return preg_replace('/(\d{2})(\d{5})(\d{4})/', '(\1) \2-\3', $telefone);
        } else {
            return $telefone;
        }
    }
}

if (! function_exists('formataDecimalDb')) {
    function formataDecimalDb($valor)
    {
        $cleanedValue = preg_replace('/[^\d,]/', '', $valor);
        $cleanedValue = str_replace(',', '.', $cleanedValue);
        if (!preg_match('/^\d+(\.\d{1,2})?$/', $cleanedValue)) {
            return $valor;
        }
        return $cleanedValue;
    }
}

if (! function_exists('formataDecimal')) {
    function formataDecimal($valor)
    {
        $floatValue = (float) $valor;
        return number_format($floatValue, 2, ',', '.');
    }
}

if (! function_exists('formataDataView')) {
    function formataDataView($data)
    {
        return date('d/m/Y H:i', strtotime($data));
    }
}
