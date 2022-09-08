CREATE DATABASE bd_tcc2;
USE bd_tcc2;

CREATE TABLE Posto(
posto_id        INT PRIMARY KEY AUTO_INCREMENT,
posto_nome      VARCHAR(100),
posto_telefone  VARCHAR(15),
posto_endereco  VARCHAR(100),
posto_bairro    VARCHAR(100),
posto_numero    INT);

CREATE TABLE Paciente(
pac_id          INT PRIMARY KEY AUTO_INCREMENT,
pac_nome        VARCHAR(50),
pac_sexo        CHAR(1),
pac_data_nasc   VARCHAR(10),
pac_cpf         VARCHAR(20),
pac_celular     VARCHAR(15),
pac_email       VARCHAR(50),
pac_senha       VARCHAR(50),
pac_cep         CHAR(9),
pac_estado      CHAR(2),
pac_cidade      VARCHAR(50),
pac_bairro      VARCHAR(50),
pac_rua         VARCHAR(50),
pac_numeroCasa  INT,
pac_complemento VARCHAR(255),
FK_posto        INT,
FOREIGN KEY (FK_posto) REFERENCES posto(posto_id)
);

CREATE TABLE Profissional(
pro_id      INT PRIMARY KEY AUTO_INCREMENT,
pro_nome    VARCHAR(30),
pro_funcao  VARCHAR(20),
FK_posto    INT,
FOREIGN KEY (FK_posto)    REFERENCES posto(posto_id)
);

CREATE TABLE agendamento(
age_id           INT PRIMARY KEY AUTO_INCREMENT,
age_data         DATE,
age_horaInicio   TIME,
age_horaFim      TIME,
FK_posto         INT,
FK_paciente      INT,
FK_profissional  INT,
FOREIGN KEY (FK_posto)    REFERENCES Posto(posto_id),
FOREIGN KEY (FK_paciente) REFERENCES Paciente(pac_id),
FOREIGN KEY (FK_profissional) REFERENCES profissional(pro_id)
);

CREATE TABLE administradorLogin(
adm_id      INT PRIMARY KEY AUTO_INCREMENT,
adm_usuario VARCHAR(50),
adm_senha   VARCHAR(50),
FK_posto    INT,
FOREIGN KEY (FK_posto) REFERENCES posto(posto_id)
);

INSERT INTO posto VALUES (1,"UBS São Benedito", "(15)3521-6326","Rua São Benedito","Vila São Benedito", 674);
INSERT INTO posto VALUES (2,"UBS Jd. Maringá", "(15)3521-6371","Rua Euclide de Campos","Jardim Maringá", 215);
INSERT INTO posto VALUES (3,"UBS Vila Aparecida", "(15)3521-6370","Rua Matãoo","Vila Aparecida", 750);

INSERT INTO paciente VALUES (null, "Sara Carvalho dos Santos", 'F', '2002-02-14', "478.641.608-83", "(15)99601-4614", "csara5466@gmail.com", "123", '18403-070', 'SP', "Itapeva", "Jardim P�r-do-Sol", "Rua Jos� Carlos Fontes Ferreira", 33, "", 1);

INSERT INTO agendamento VALUES (NULL, 'Médico', '2019-09-23', '15:30:22', '15:30', 1 , 1);
INSERT INTO agendamento VALUES (NULL, 'Enfermeiro', '2019-09-23', '16:20:33', '15:30', 2 , 2);
INSERT INTO agendamento VALUES (NULL, 'Dentista', '2019-09-23', '12:50:44', '15:30', 3 , 3);

INSERT INTO administradorLogin VALUES (null, "sao_benedito", "123", 1);
INSERT INTO administradorLogin VALUES (null, "jd_maringa", "123", 2);
INSERT INTO administradorLogin VALUES (null, "vila_aparecida", "123", 3);