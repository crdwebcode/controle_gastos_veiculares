# Controle de Gastos Veiculares

Este é um sistema de controle de gastos veiculares desenvolvido para monitorar despesas relacionadas a veículos, incluindo manutenções, combustíveis e outros custos.

## Funcionalidades Principais

1. **Cadastro de Veículos:** Permite ao usuário cadastrar veículos que deseja monitorar.
2. **Registro de Manutenções:** Os usuários podem registrar manutenções realizadas nos veículos.
3. **Geração de Alertas:** O sistema cria alertas automáticos baseados em quilometragem ou tempo para manutenções futuras.
4. **Dashboard:** Visualize todas as informações importantes, incluindo:
   - Distribuição de despesas por tipo.
   - Últimas manutenções realizadas.
   - Próximas manutenções programadas.
5. **Exportação de Dados:** Possibilidade de exportar relatórios para formatos CSV e PDF.

## Tecnologias Utilizadas

- **Frontend:**
  - HTML
  - CSS (com Bootstrap)
  - JavaScript
- **Backend:**
  - PHP
- **Banco de Dados:**
  - MySQL

## Estrutura de Arquivos

```
controle_gastos_veiculares/
├── includes/
│   ├── db.php
│   ├── functions.php
│   ├── header.php
│   ├── footer.php
├── css/
│   ├── styles.css
├── js/
│   ├── scripts.js
├── index.php
├── dashboard.php
├── registro_manutencao.php
├── criar_alerta.php
├── relatorios.php
├── exportar_csv.php
├── exportar_pdf.php
├── README.md
```

## Configuração do Projeto

1. **Requisitos:**
   - PHP >= 7.4
   - MySQL >= 5.7
   - Servidor Apache ou similar

2. **Configuração do Banco de Dados:**

   Execute o seguinte script SQL para criar as tabelas necessárias:

   ```sql
   CREATE TABLE usuarios (
       id INT AUTO_INCREMENT PRIMARY KEY,
       nome VARCHAR(100) NOT NULL,
       email VARCHAR(100) NOT NULL UNIQUE,
       senha VARCHAR(255) NOT NULL,
       criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );

   CREATE TABLE veiculos (
       id INT AUTO_INCREMENT PRIMARY KEY,
       usuario_id INT NOT NULL,
       marca VARCHAR(50) NOT NULL,
       modelo VARCHAR(50) NOT NULL,
       ano INT NOT NULL,
       placa VARCHAR(10) NOT NULL UNIQUE,
       tipo_combustivel VARCHAR(20) NOT NULL,
       criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
       FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
   );

   CREATE TABLE manutencoes (
       id INT AUTO_INCREMENT PRIMARY KEY,
       veiculo_id INT NOT NULL,
       quilometragem INT NOT NULL,
       descricao TEXT NOT NULL,
       custo DECIMAL(10, 2) NOT NULL,
       data DATE NOT NULL,
       criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
       FOREIGN KEY (veiculo_id) REFERENCES veiculos(id) ON DELETE CASCADE
   );

   CREATE TABLE alertas_manutencao (
       id INT AUTO_INCREMENT PRIMARY KEY,
       veiculo_id INT NOT NULL,
       tipo_alerta VARCHAR(100) NOT NULL,
       quilometragem INT NOT NULL,
       data_alerta DATE,
       ativo BOOLEAN DEFAULT TRUE,
       criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
       FOREIGN KEY (veiculo_id) REFERENCES veiculos(id) ON DELETE CASCADE
   );
   ```

3. **Configuração do Arquivo `db.php`:**

   Configure a conexão com o banco de dados no arquivo `includes/db.php`:

   ```php
   <?php
   $host = 'localhost';
   $dbname = 'controle_gastos_veiculares';
   $username = 'root';
   $password = '';

   try {
       $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch (PDOException $e) {
       die("Erro de conexão: " . $e->getMessage());
   }
   ?>
   ```

4. **Configuração Inicial:**
   - Crie um usuário inicial no banco de dados para acesso ao sistema:

   ```sql
   INSERT INTO usuarios (nome, email, senha) VALUES ('Administrador', 'admin@example.com', MD5('admin123'));
   ```

## Uso

1. Faça login usando o email e senha do usuário criado.
2. Cadastre veículos no sistema.
3. Registre manutenções realizadas.
4. Acompanhe as próximas manutenções no dashboard.
5. Exporte relatórios conforme necessário.

## Contribuição

Sinta-se à vontade para contribuir com este projeto. Faça um fork do repositório, crie uma branch para suas alterações e envie um pull request.

## Licença

Este projeto está licenciado sob a licença MIT.

