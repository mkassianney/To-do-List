# 📋 Lista de Tarefas (PT - BR)

Um projeto de lista de tarefas (To-Do List) desenvolvido para praticar conceitos de Front-end e Back-end, integrando HTML, Tailwind CSS, JavaScript, PHP e PostgreSQL.

O objetivo do projeto é permitir que o usuário crie, visualize, atualize e exclua tarefas, salvando tudo no banco de dados de forma persistente!

## 🚀 Tecnologias Utilizadas

- HTML5 → Estrutura do projeto

- Tailwind CSS → Estilização responsiva e rápida

- JavaScript (ES6) → Interatividade no front-end

- PHP 8+ → Lógica do back-end e conexão com o banco

- PostgreSQL → Banco de dados relacional para armazenamento das tarefas

## ⚙️ Funcionalidades

- ✅ Adicionar novas tarefas;
- ✅ Marcar tarefas como concluídas;
- ✅ Editar descrições das tarefas;
- ✅ Excluir tarefas;
- ✅ Exibir estado vazio quando não houver tarefas;
- ✅ Interface responsiva com Tailwind.

## 🛠️ Como Rodar o Projeto Localmente

1. Clone este repositório:

``` 
git clone https://github.com/seu-usuario/seu-repositorio.git
```

2. Entre na pasta do projeto:

``` 
cd seu-repositorio
```

3. Configure o banco PostgreSQL:

``` 
CREATE DATABASE todolist;
\c todolist;

CREATE TABLE list (
  id SERIAL PRIMARY KEY,
  description VARCHAR(255) NOT NULL,
  completed BOOLEAN DEFAULT false
);

```

4. Configure a conexão com o banco no PHP. Adicione dentro do arquivo ConnectionFactory.php as informações do seu usuário, senha, porta e nome do banco de dados.

5. Inicie o servidor PHP:

``` 
php -S localhost:8000 -t public
```

6. Acesse no navegador:

``` 
http://localhost:8000
``` 

## 🎨 Interface

A interface é responsiva e foi desenvolvida utilizando Tailwind CSS, garantindo boa experiência tanto em desktops quanto em dispositivos móveis.

## 📌 Próximos Passos (Ideias Futuras)

- Adicionar datas de criação e vencimento das tarefas

- Criar contador para exibir quantidade total de tarefas e quantidade de tarefas concluídas.

## 👩‍💻 Autor

Projeto desenvolvido por Maria Eduarda Kassianney ✨


# 📋 Task List (EN - US)

A to-do list project developed to practice Front-end and Back-end concepts, integrating HTML, Tailwind CSS, JavaScript, PHP, and PostgreSQL.

The goal of this project is to allow users to create, view, update, and delete tasks, saving everything persistently in the database!

## 🚀 Technologies Used

- HTML5 → Project structure
- Tailwind CSS → Fast and responsive styling
- JavaScript (ES6) → Front-end interactivity
- PHP 8+ → Back-end logic and database connection
- PostgreSQL → Relational database for task storage

## ⚙️ Features

- ✅ Add new tasks
- ✅ Mark tasks as completed
- ✅ Edit task descriptions
- ✅ Delete tasks
- ✅ Show empty state when there are no tasks
- ✅ Responsive interface with Tailwind

## 🛠️ How to Run the Project Locally

1. Clone this repository:

```
git clone https://github.com/your-username/your-repository.git
```

2. Enter the project folder:

```
cd your-repository
```

3. Set up the PostgreSQL database:

```
CREATE DATABASE todolist;
\c todolist;

CREATE TABLE list (
  id SERIAL PRIMARY KEY,
  description VARCHAR(255) NOT NULL,
  completed BOOLEAN DEFAULT false
);
```

4. Configure the database connection in PHP. Add your user, password, port, and database name information inside the `ConnectionFactory.php` file.

5. Start the PHP server:

```
php -S localhost:8000 -t public
```

6. Access in your browser:

```
http://localhost:8000
```

## 🎨 Interface

The interface is responsive and was developed using Tailwind CSS, ensuring a good experience on both desktops and mobile devices.

## 📌 Next Steps (Future Ideas)

- Add creation and due dates to tasks
- Create a counter to display the total number of tasks and the number of completed tasks

## 👩‍💻 Author

Project developed by Maria Eduarda Kassianney ✨
