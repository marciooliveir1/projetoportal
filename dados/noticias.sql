//criando tabela portal
CREATE TABLE portal(
  id_portal SERIAL,
  nm_portal VARCHAR(255),
  site VARCHAR(255),
  email VARCHAR(255),
  PRIMARY KEY(id_portal)
);
//criado tabela noticia
CREATE TABLE noticia(
  id_noticia SERIAL,
  id_portal INTEGER,
  titulo VARCHAR(255),
  data DATE,
  gravata VARCHAR(255),
  conteudo VARCHAR(7000),
  link VARCHAR(255),
  PRIMARY KEY(id_noticia),
  FOREIGN KEY (id_portal) REFERENCES portal(id_portal)
);
//criando tabela imagens
CREATE TABLE imagens(
  id_imagem SERIAL,
  id_noticia INTEGER,
  imagem VARCHAR(255),
  destaque BOOLEAN,
  PRIMARY KEY(id_imagem),
  FOREIGN KEY (id_noticia) REFERENCES noticia(id_noticia)
);
//criado tabela comentarios
CREATE TABLE comentarios(
  id_comentario SERIAL,
  id_noticia INTEGER,
  comentario VARCHAR(2048),
  email VARCHAR(255),
  PRIMARY KEY(id_comentario),
  FOREIGN KEY (id_noticia) REFERENCES noticia(id_noticia)
);
