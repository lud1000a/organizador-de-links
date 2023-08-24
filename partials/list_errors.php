<?php //dicionario de erro -- sistema de alertas! 
$message = [
    'droped' => 'Item deletado com sucesso',
    'not_found' => 'Nada encontrado',
    'edited' => 'Editado com sucesso',
    'edit_erro' => 'Erro. Edição NÃO concluída',
    'password_erro' => 'Erro. Coloque uma senha',
];
$code = isset($_GET['code']) ? $_GET['code'] : false;
?>
<?php if ($code) : ?>
    <script>
        alert('<?= $message[$code]; ?>')
    </script>
<?php endif; ?>