# Sistema de Acompanhamento Escolar (`sis`)

Este projeto é uma aplicação web desenvolvida em PHP com MySQL para gerenciar relatórios pedagógicos entre **Coordenadores Escolares** e **Superintendentes**, com acesso administrativo.

## 📦 Funcionalidades

- **Cadastro de usuários** com três níveis de acesso: `coordenador`, `superintendente` e `administrador`.
- **Login com sessão segura** para cada tipo de usuário.
- **Registro de relatórios**:
  - Data do acompanhamento
  - Tipo de relatório
  - Nome do professor acompanhado
  - Observações
  - Upload de documentos (PDF ou DOCX)
  - Os arquivos são salvos em `uploads/<id_da_escola>`
- **Visualização de relatórios**:
  - Superintendentes podem visualizar todos os relatórios de sua respectiva escola.
  - Administradores têm acesso total ao sistema (escolas, usuários e relatórios).

## ⚙️ Instalação

1. **Crie o banco de dados MySQL**:
   - Nome sugerido: `sis`
   - Execute o script `init.sql` para criar as tabelas.

2. **Configure o acesso ao banco de dados**:
   - Edite o arquivo `config.php` com as credenciais corretas do seu MySQL:
     ```php
     $dbHost = 'localhost';
     $dbUser = 'usuario';
     $dbPass = 'senha';
     $dbName = 'sis';
     ```

3. **Organize os arquivos para o servidor web**:
   - Coloque todos os arquivos PHP na pasta que será servida pelo Apache ou Nginx (ex: `/var/www/html/`).
   - Certifique-se de que a pasta `uploads/` existe e tem permissões de escrita:
     ```bash
     mkdir -p uploads
     chmod -R 775 uploads
     ```

4. **Requisitos do servidor**:
   - PHP 7.4+
   - MySQL 5.7+
   - Apache2 ou Nginx (preferencialmente com HTTPS ativado)
   - Extensões PHP: `mysqli`, `fileinfo`, `mbstring`

## 🔒 Considerações de Segurança

> ⚠️ **Importante:** Este projeto é um exemplo funcional, mas **não está pronto para produção sem ajustes de segurança.** Para um ambiente real, recomenda-se:

- Sanitizar e validar todas as entradas do usuário (uso de `htmlspecialchars`, `filter_input`, etc.).
- Utilizar `prepared statements` com `mysqli` ou migrar para `PDO`.
- Implementar autenticação com hashing de senhas (`password_hash`, `password_verify`).
- Habilitar `HTTPS` no servidor.
- Prote
