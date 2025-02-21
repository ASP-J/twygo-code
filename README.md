# TwygoTest App

Uma plataforma de cursos muito simples

![image](https://github.com/user-attachments/assets/f5804bf6-d894-4a2a-9116-713f73c8b477)



## Features no repositório

* API em Laravel;
* Interface em VueJs com JavaScript;
* Testes de unidade e de integração, para garantir o comportamento das principais funcionalidades;
* Banco de dados relacional postgres.

## Utilizando o projeto pelo docker

Em primeiro lugar é necessário ter o docker e o docker compose instalados em sua máquina, para isso segue o tutorial:

* [Tutorial de instalação do docker com compose](https://docs.docker.com/install/linux/docker-ce/ubuntu/)

#### Preparando o ambiente

Primeiramente, é necessário copiar o conteúdo de `.env.example`, para `.env` no diretório raiz, e se necessário, fazer as alterações para rodar em sua máquina.

Observação: Se você alterar os valores de `.env`, possivelmente precisará alterar os valores também nas envs da interface e da API.

**Setup inicial**

https://github.com/user-attachments/assets/f62fba04-2787-4977-9b36-65cc3a461f30

Para iniciar o projeto pela **primeira vez**, basta rodar os comandos abaixo:

```bash
$> docker compose up -d --remove-orphans
$> ./environment/setup.sh
```

##### Observação: Se você não for administrador de sua máquina, possivelmente precisará dar as devidas permissões para o arquivo `setup.sh`:

```bash
$> sudo chmod +x environment/setup.sh
```

Uma vez configurado, você não precisará mais rodar o script `setup.sh`.
Em vez disso, você precisará se preocupar apenas em subir e derrubar o ambiente:

#### Subir o ambiente

```bash
$> docker compose stop
$> docker compose up -d --remove-orphans
```

#### Derrubar o ambiente

```bash
$> docker compose stop
```

#### Utilização do servidor de desenvolvimento

Por padrão, a API já vem o servidor ativo quando os contâineres são iniciados. Para subir o ambiente da interface, rode o seguinte comando:

```bash
$> docker compose exec ui npm i
$> docker compose exec ui npm run dev
```

Agora, é necessário apenas acessar a porta que vc destinou a interface no arquivo `.env`, por padrão: `localhost:3001`
