# BUD
Este é um sistema web desenvolvido para gestão e visualização de tempos de volta em pistas de kart, dados de utilizadores e outras funcionalidades relacionadas. A aplicação permite aos usuários criarem uma conta, registarem dados pessoais como peso, altura e tempo de pista, além de visualizar estatísticas e imagens das pistas.

## 🚀 Funcionalidades
- Registro e autenticação de usuários (sign in / sign up)

- Atualização e exclusão de dados pessoais (peso, altura, data de nascimento)

- Upload e exibição de tempos de pista

- Página de perfil personalizada

- Visualização de pistas com imagens

- Redefinição de senha por e-mail

- Design responsivo com HTML/CSS/JavaScript

## 🛠️ Tecnologias Utilizadas
### Frontend:

- HTML5, CSS3

- JavaScript (sem frameworks)

### Backend:

- PHP

### Armazenamento de dados:

- MySQL

### Recursos gráficos:

- PNG para logotipos e imagens de pistas

- Fontes personalizadas (em assets/fonts)

## ⚙️ Como Executar Localmente
### 1. Clone o repositório ou extraia os arquivos:
```
git clone https://github.com/icsousa/BUDDIES/WEBSITE
```

### 2. Mova o conteúdo da pasta WEBSITE para o diretório raiz do seu servidor web (ex: htdocs no XAMPP):
```
mv WEBSITE/* /caminho/para/htdocs/
```

### 3. Importe o banco de dados.

### 4. Configure o arquivo config.php com as credenciais do seu banco de dados:
```php
$conn = mysqli_connect("localhost", "usuario", "senha", "nome_banco");
```

### 5. Acesse o site via navegador:
```
http://localhost/index.php
```

## 🔒 Segurança
### Certifique-se de:

- Escapar entradas do usuário contra SQL Injection

- Proteger sessões e cookies

- Usar HTTPS em produção

## 📌 Notas
- O design foi implementado com arquivos CSS e fontes personalizadas.

- As páginas estão estruturadas com base na separação lógica entre público, funções, e páginas privadas
