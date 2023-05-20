# Projeto CakeMovies - Catálogo de filmes

Desenvolvimento de um *CRUD* simples de um catálogo de filmes com uma página de listagem com capa, paginação, página de listagem para criação, edição e exclusão de registros.

## Tecnologias
### back-end
PHP 7.4
CakePHP 2.x

### front-end
Bootstrap 5.3

## Páginas contruídas
- Index dos filmes com capas
- Página de detalhes do filme
- Index CRUD - tabela com coluna actions com botões editar e excluir
- Form de cadastro
- Form de edição

## Modelagem DB (mysql)
###### Filmes
- id (pk)
- categoria_id (foreign_key)
- titulo (varchar 255)
- capa (varchar 255)
- sinopse (text)

###### Categorias
- id
- nome

## Observações
Pasta de upload da capa (permissão de escrita)
- App/webroot/media/filmes