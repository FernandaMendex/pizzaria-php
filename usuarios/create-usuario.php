<?php 
    //Includes
    include('../includes/functions.php');

    //Valores padrão
    $nome = '';
    $endereco = '';
    $senha = '';
    $confirmacao = '';

    //Variáveis de controle de erro:
    $nomeOk = true; //Não queremos já começar dizendo que os dados estão incorretos
    $enderecoOk = true;
    $senhaOk = true;
    $confirmacaoOk = true;
    $imagem = null;

    if($_POST){
        //Para verificar se o usuário enviou o formulário, o bloco abaixo só será executado se o usuário enviou

        $nome = $_POST['nome'];
        //Guardando o dado cadastrado na variável na variável $nome

        $endereco = $_POST['endereco'];
        //Guardando o dado cadastrado na variável na variável $endereco

        $senha = $_POST['senha'];
        $confirmacao = $_POST['confirmacao'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];

        //Verificar se $_FILES está vindo (se foi adicionada a imagem)
        if ($_FILES) {
            //Separando informações úteis do $_FILES
            $tmpName = $_FILES['foto']['tmp_name'];
            $fileName = uniqid()."-". $_FILES['foto']['name']; 
            $error = $_FILES['foto']['error'];

            //Salvar o arquivo numa pasta do meu sistema
            move_uploaded_file($tmpName, '../img/usuarios/'.$fileName);

            //Salvar o nome do arquivo em img/usuarios/
            $imagem = '../img/usuarios/'.$fileName;
        } else {
            $imagem = null;
        }

        
        // Validando o nome
        if(strlen($_POST['nome']) < 5){ //Valida se o texto digitado tem pelo menos 5 carac
            $nomeOk = false;
            // Quando desejarmos redirecionar o usuário para uma outra página
            // header("location: erro.php");
        }
        if(strlen($endereco) < 20){ //Valida se o texto digitado tem pelo menos 20 carac
            $enderecoOk = false;
        }
        if(strlen($senha) < 5 || $senha != $confirmacao){ //Valida se o texto digitado nos campos Senha e Confirmação são iguais e tem pelo menos 5 caracteres
            $senhaOk = false;
        }

        // Se tudo estiver ok, salva o usuário e redireciona para um dado endereço
        if ($nomeOk && $enderecoOk && $senhaOk) {

            //Salvando o usuário novo
            addUsuario($nome, $telefone, $email, $endereco, $senha, $imagem);
            
            //Redirecionando usuário para a lista de usuários
            header('location: list-usuarios.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pizzaria Fantástica</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../css/styles.css">
</head>
<body>
	<link rel="stylesheet" href="../css/form-usuario.css">
	<form id="form-usuario" method="POST" enctype="multipart/form-data">
		<label>
            Nome:
            <input type="text" name="nome" id="nome" placeholder="Digite seu nome" value="<?= $nome ?>">
            <?= ($nomeOk?'':'<span class="erro">Preencha o campo com um nome válido</span>');  ?>
        </label>
		<label>
            Telefone:
            <input type="text" name="telefone" id="telefone" placeholder="Digite seu telefone">
        </label>
		<label>
            E-mail:
            <input type="email" name="email" id="email" placeholder="Digite seu email">
        </label>
		<label>
            Endereço:
            <input type="text" name="endereco" id="endereco" placeholder="Digite seu endereco" value="<?= $endereco ?>">
            <?= ($enderecoOk?'':'<span class="erro">Preencha o campo com pelo menos 20 caracteres</span>');  ?>
        </label>
		<label>
            Senha:
            <input type="password" name="senha" id="senha" placeholder="Digite uma senha" value="<?= $senha ?>">
            <?= ($senhaOk?'':'<span class="erro">Senha inválida</span>');  ?>
        </label>
		<label>
            Confirmação:
            <input type="password" name="confirmacao" id="confirmacao" placeholder="Confirme a senha digitada" value="<?= $confirmacao ?>">
        </label>
		<label>
            <img src="../img/no-image.png" id="foto-carregada">
            <div>Clique para selecionar sua foto</div>
            <input type="file" name="foto" id="foto">
        </label>
        <div class="controles">
            <button type="reset" class="secondary">Resetar</button>
            <button type="submit" class="primary">Cadastrar-se!</button>
        </div>
    </form>
    <script>
        document.getElementById("foto").onchange = (evt) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("foto-carregada").src = e.target.result;
            };
            reader.readAsDataURL(evt.target.files[0]);
        };
    </script>
</body>
</html>