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
