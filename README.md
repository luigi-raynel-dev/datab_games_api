# Datab Games API | Dev Test
## A API em Lumen do teste da Datab

### Descrição
#### ***Esta api foi desenvolvida afim de consumirmos uma camada rest api de um sistema de consulta de pedidos de uma loja de games.***

### Decisões...
#### Além da decisão de partir para o desenvolvimento de uma api para o desafio proposto, decidi utilizar o micro framework do Laravel. Nosso querido **Lumen** 😏

### Antes de tudo...
#### Sei que parece óbvio, mas antes de instalar a aplicação cliente desse sistema vamos instalar nossa api e fazer rodá-la em localhost para que nosso cliente possa consultar seus dados.

### Requisitos
* Docker (Também recomendo o Docker Desktop 😉)
* Ferramenta de acesso a um banco de dados MySql (Que tal Workbench? 😁)

### Como instalar?
```sh
git clone https://github.com/luigi-raynel-dev/datab_games_api.git
```

> Vamos ao que interessa... 🏃 
# São apenas 4 passos pra configurarmos nossa api

<br>

### Passo 1 - Precisamos subir nossas imagens por um container do Docker
### E que imagens são essas?
* Nginx -> Nosso servidor 💪
* PHP 8.* -> Nossa tão amada linguagem 💓
* MySql -> Nosso banco de dados que não deixa na mão 😅

#### Agora na pasta do projeto vamos subir as imagens com o comando:
```sh
docker-compose up --build -d
```

### Legal né? Fazendo isso já temos uma aplicação inteira rodando e sem precisar que instalemos em nossa máquina. Shoooow....
> Mas não acabou! 😌
### Para o cliente conseguir consultar seus pedidos precisamos ter os dados armazenados no banco de dados. 

> Mas fica tranquilo que é agora que vem a parte legal...😉

<br>

### Passso 2 - Instalando as dependências do PHP
#### Tá na hora de instalar toda a galerinha do Laravel e do PHP
> Para isso rode o comando...
```sh
docker exec -it php composer update
```

<br>

### Passso 3 - Rodando as Migrations
#### Vamos usar as migrations que definem toda nossa modelagem do banco de dados
> Para isso rode o comando...
```sh
docker exec -it php /var/www/html/artisan migrate
```

<br>

### Passso 4 - Semeando nossa base de dados
#### Se você pensou que vamos inserir dado por dado para podermos testar nossa api você se enganou. Vamos usar nosso amigo *Seeder* que cuidará de "semear" todos os nossos dados e com ajuda do Factory ele inserirá dados fakes nos poupuando muito esforço. 
> Muito legal né? Então rode o comando...

```sh
docker exec -it php /var/www/html/artisan db:seed --class=DatabaseSeeder
```

<br>

> Show! Agora você deve acessar o banco local e escolher um usuário apenas copiando seu cpf ou cnpj para testarmos nosso cliente. Então se liga nos passos:
* Acessar a ferramenta de acesso ao banco de dados
* Inserir as credenciais (host: 127.0.0.1, db: datab_games, user: root, pass: databgamespass)
* Selecionar os registros da tabela datab_games.users e copiar um cnpj/cpf

### Agora sim! 🙌
### Temos tudo funcionando em poucos passos, que tal acessar essa api pelo nosso cliente?

> Acesse <https://github.com/luigi-raynel-dev/datab_games_app> e começe pelo ***README.md*** =)


## Agradecimentos
#### Gostaria de agradecê-los pela oportunidade de fazer um teste para essa empresa incrivel. Independentemente do resultado foi uma experiência incrível e estou muito feliz por ter realizado!"# datab_games_api" 
"# datab_games_api" 
