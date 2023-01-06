-- Table: ksiazki.ksiazka

-- DROP TABLE ksiazki.ksiazka;

CREATE SEQUENCE ksiazki.ksiazka_id_seq;
CREATE TABLE ksiazki.ksiazka
(
    id bigint NOT NULL DEFAULT nextval('ksiazki.ksiazka_id_seq'),
    tytul character varying(60) NOT NULL,
    idwyd integer,
    idkat integer,
    CONSTRAINT ksiazka_pkey PRIMARY KEY (id)
)
WITH (OIDS = FALSE)
TABLESPACE pg_default;

ALTER SEQUENCE ksiazki.ksiazka_id_seq OWNED BY ksiazki.ksiazka.id; 