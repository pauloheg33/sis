# sis
Sistema de acompanhamento entre Coordenadores escolares e Superintendentes

Este exemplo usa PHP com MySQL para gerenciar usuários e relatórios de aulas.

## Instalação
1. Crie um banco de dados MySQL chamado `sis` e execute o arquivo `init.sql` para criar as tabelas.
2. Ajuste as credenciais no arquivo `config.php` se necessário.
3. A pasta `public` contém os arquivos PHP a serem servidos por um servidor web (ex: Apache).

## Funcionalidades
- Cadastro de usuários (coordenador, superintendente e administrador).
- Login e sessão.
- Coordenador registra data, tipo de relatório, professor acompanhado, observações e pode anexar arquivos PDF ou DOCX. Cada relatório fica salvo em `uploads/<id_da_escola>`.
- Superintendente visualiza todos os registros de sua escola.
- Administrador pode cadastrar ou remover escolas, gerenciar usuários e consultar todos os relatórios.
- Coordenadores são encaminhados diretamente para o envio de relatórios após o cadastro.

Este é apenas um exemplo básico para demonstrar o fluxo descrito. Em produção, lembre-se de habilitar validações adicionais e medidas de segurança.

## Publicar no GitHub
Se quiser armazenar este projeto em um repositório remoto, execute os seguintes passos:

1. Crie um repositório vazio no GitHub.
2. No terminal, adicione o remoto e envie o código:
   ```
   git remote add origin https://github.com/USUARIO/REPO.git
   git push -u origin main
   ```
Substitua `USUARIO/REPO` pelo caminho do seu repositório.

## Acessar o banco pelo phpMyAdmin
Caso tenha o phpMyAdmin instalado localmente, é possível manipular o banco de dados usando um navegador. Acesse:

```
http://localhost/phpmyadmin/index.php?route=/database/structure&db=sis
```

Utilize as mesmas credenciais definidas em `config.php` (por padrão, usuário `root` sem senha). Assim é possível visualizar e editar as tabelas `schools`, `users` e `reports` diretamente pela interface web.

## Executar localmente
Após configurar o banco de dados e os arquivos do projeto, execute um servidor PHP simples apontando para a pasta `public`:

```bash
php -S localhost:8000 -t public
```

Em seguida abra `http://localhost:8000` no navegador para acessar a tela de login e realizar os cadastros.
