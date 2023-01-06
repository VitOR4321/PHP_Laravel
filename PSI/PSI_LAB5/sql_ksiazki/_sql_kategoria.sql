-- Table: ksiazki.kategoria

-- DROP TABLE ksiazki.kategoria;

CREATE SEQUENCE ksiazki.kategoria_id_seq;
CREATE TABLE ksiazki.kategoria
(
    id bigint NOT NULL DEFAULT nextval('ksiazki.kategoria_id_seq'::regclass),
    opis character varying(50) NOT NULL,
    CONSTRAINT kategoria_pkey PRIMARY KEY (id)
)
WITH (OIDS = FALSE)
TABLESPACE pg_default;

ALTER SEQUENCE ksiazki.kategoria_id_seq OWNED BY ksiazki.kategoria.id;